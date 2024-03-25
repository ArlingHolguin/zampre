<?php

namespace App\Http\Livewire;

use App\Mail\PedidoMailable;
use App\Mail\PlacedOrderMailable;
use App\Models\Courier;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Orden;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

//whatsapp
use App\Notifications\OrderProcessed;



class CreateOrder extends Component
{
    public $envio_type = 1;
    public $payment_type = 1;
    public $departamentos, $municipios = [];
    public $phone, $address, $casa, $references, $shipping_cost = 0;
    
    public $contact;
    public $identification;
    public $departamento_id = "";
    public $municipio_id = "";

    public $isLoading = false;

    public $validResponses = [];

    public $selectedShippingOption = null;

    public $freeShipping = null;
    
    
    public $rules = [
        'contact' => 'required|regex:/[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/|max:35|min:4',
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13',
        'envio_type' => 'required',
        'references' => 'required|max:100|min:5',
        'identification' => 'required|max:15|min:5',
        'departamento_id' => 'required',
        'municipio_id' => 'required',
        'casa' => 'required_if:envio_type,2',
    ];
    //

    
   

    public function mount(){
        $this->departamentos = Departamento::all();
        $this->contact = Auth::user()->name;
        $this->phone = Auth::user()->profile ? Auth::user()->profile->phone : '';
        $this->address = Auth::user()->profile ? Auth::user()->profile->address : '';
        $this->identification = Auth::user()->profile ? Auth::user()->profile->identification : '';
        $this->isLoading = false;
        // $this->freeShipping = Cart::content()->where('options.free_shipping', true)->count();
        $this->freeShipping = Cart::content()->contains(function ($item) {
            return $item->options->free_shipping == 0;
        }) ? 0 : 1;


        // dd(Cart::content());
       
    }

    

    public function calculateShippingCost() {
        
        $this->isLoading = true;
        // dd($this->isLoading);

        $couriers = Courier::all();
         $validResponses = [];

         foreach ($couriers as $courier) {

            $body = [
                "origin" => [
                    'name' => "Zampre Online",
                    'company' => "Zampre",
                    'email' => "ventas@zampreonline.com",
                    'phone' => "3016358844",
                    'street' => "carrera 54 # 10 - 110",
                    'number' => "1400",
                    'district' => "palo blanco sector el eden",
                    'city' => "11001000",
                    'state' => "CN",
                    'country' => "CO",
                    'postalCode' => "66236890",
                    'reference' => "Barrio xx",
                    'identificationNumber' => "66236890",
                    "coordinates" => [
                        "latitude" => "4.684761",
                        "longitude" => "-74.029515"
                    ]
                ],
                "destination" => [
                    'name' => Auth::user()->name,
                    'company' => $this->contact ?? Auth::user()->name,
                    'email' =>  Auth::user()->email,
                    'phone' =>  $this->phone ?? Auth::user()->profile->phone,
                    'street' => $this->address ?? '',
                    'number' => $this->address ?? '',
                    'district' => $this->references ?? '',
                    'city' => Municipio::find($this->municipio_id)->code,
                    'state' => Municipio::find($this->municipio_id)->state_code,
                    'country' => "CO",
                    'postalCode' => "",
                    'reference' => $this->references,
                    'identificationNumber' => "66236890",
                    "coordinates" => [
                        "latitude" => "",
                        "longitude" => ""
                    ]
                ],
                "packages" => [
                    [
                        "content" => "ropa",
                        "amount" => 1,
                        "type" => "box",
                        "weight" => 1,
                        "insurance" => 0,
                        "declaredValue" => 0,
                        "weightUnit" => "KG",
                        "lengthUnit" => "CM",
                        "dimensions" => [
                            "length" => 11,
                            "width" => 15,
                            "height" => 20
                        ]
                    ]
                ],
                "shipment" => [
                    "carrier" => $courier->name,
                    "type" => 1
                ],
                "settings" => [
                    "currency" => "COP"
                ]
            ];

            // dd($body);
            
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('ENVIA_API_KEY'),
            ])->post('https://api.envia.com/ship/rate/', $body);
    
            if ($response->successful()) {
                
                $data = $response->json();
                // dd($data);
                if (!isset($data['meta']) || $data['meta'] !== 'error') {
                    $validResponses[] = $data;                    
                }
            } else {
                
                // Manejar otros tipos de errores
            }
        }
        $flattenedResponses = collect($validResponses)->flatMap(function ($response) {
            return $response['data'];
        });
        
        // Ordenar por precio
        $sortedResponses = $flattenedResponses->sortBy('totalPrice');

        if (count($sortedResponses) > 0) {
            $firstOption = $sortedResponses->values()->first();
            $this->selectShippingOption($firstOption['totalPrice'], $firstOption['carrierId'].'-'.$firstOption['serviceId']);
        }
        
        $this->validResponses = $sortedResponses->values()->all();
        $this->isLoading = false;
        // return $validResponses;
    }

    // public function selectShippingOption($cost) {
    //     $this->shipping_cost = $cost;
    // }
    public function selectShippingOption($cost, $uniqueServiceId){
        $this->shipping_cost = $cost;
        $this->selectedShippingOption = $uniqueServiceId;
    }



    public function create_order(){

        $rules = $this->rules;

        if($this->envio_type == 2){
            $rules['address'] = 'required';
        }

        $this->validate($rules);
        //funcion que genera el consecutivo de la orden 
        function IDGenerator($model, $trow, $length = 4, $prefix){
            $data = $model::orderBy('id','desc')->first();
            if(!$data){
                $og_length = $length;
                $last_number = '';
            }else{
                $code = substr($data->$trow, strlen($prefix)+1);
                $actial_last_number = ($code/1)*1;
                $increment_last_number = ((int)$actial_last_number)+1;
                $last_number_length = strlen($increment_last_number);
                $og_length = $length - $last_number_length;
                $last_number = $increment_last_number;
            }
            $zeros = "";
            for($i=0;$i<$og_length;$i++){
                $zeros.="0";
            }
            return $prefix.'-'.$zeros.$last_number;
        }//end funcion que genera el consecutivo de la orden 

        $code_id = IDGenerator(new Orden, 'code_id', 3, 'ZON');
        $infoClient = getClientInfo();
        $orden = new Orden();

        $orden->user_id = auth()->user()->id;
        $orden->code_id = $code_id;
        $orden->contact = $this->contact;
        $orden->identification = $this->identification;
        $orden->phone = $this->phone;
        $orden->envio_type = $this->envio_type;
        $orden->shipping_cost = $this->shipping_cost;
        $subtotal = str_replace( ',', '', Cart::subtotal() );
        $orden->total = $this->shipping_cost + $subtotal;
        $orden->content = Cart::content();
        $orden->info_ip = json_encode($infoClient);
        $orden->shipping_cost = $this->shipping_cost;
        $orden->departamento_id = $this->departamento_id;
        $orden->municipio_id = $this->municipio_id;
        $orden->references = $this->references;       

        if ($this->envio_type == 2) {
            $orden->address = $this->address;
            $orden->casa = $this->casa;
            
        }

        $orden->payment_type = $this->payment_type;

        $orden->save();
        
        foreach (Cart::content() as $item) {
            discount($item);
        }

        Cart::destroy();
        $this->emit('showSuccessMessage', __('Orden creada con éxito. '. $orden->code_id));
        // Evia correo confirmacion al cliente
        Mail::to($orden->user->email)->send(new PedidoMailable($orden)); 
        // Evia correo confirmacion al admin
        Mail::to(['ventas@zampreonline.com'])->send(new PlacedOrderMailable($orden)); 
        
        $this->emit('showSuccessMessage', __('Revisa tu correo electrónico para ver el detalle de la orden '.$orden->user->email));
         //whatsapp notification al cliente - > activar linea
        // $orden->user->notify(new OrderProcessed($orden));

        // $this->emit('alert', 'success', __('Orden creada con éxito. '. $orden->code_id));
        $this->emit('showSuccessMessage', __('Orden '. $orden->code_id.''.' creada.'));

        return redirect()->route('orders.resumen', $orden);

        //envio de notificacion indicando que se ha recibido el pedido
        // $correo = new PedidoMailable();

       
    }

    public function updatedEnvioType($value){
        if ($value == 1) {
            $this->resetValidation([
                'departamento_id', 'municipio_id', 'address'
            ]);
        }
    }

    public function updatedDepartamentoId($value){
        $this->municipios = Municipio::where('departamento_id', $value)->get();
        $this->reset(['municipio_id']);
        
    }

    public function updatedMunicipioId($value){
        $this->validResponses = [];
        $this->shipping_cost = 0;
        $this->selectedShippingOption = null;
    }

    public function render(){
        return view('livewire.create-order');
    }
}


