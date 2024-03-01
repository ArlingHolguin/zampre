<?php

namespace App\Http\Livewire;

use App\Mail\PedidoMailable;
use App\Mail\PlacedOrderMailable;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Orden;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

//whatsapp
use App\Notifications\OrderProcessed;



class CreateOrder extends Component
{
    public $envio_type = 1;
    public $departamentos, $municipios = [];
    public $phone, $address, $casa, $references, $shipping_cost = 0;
    
    public $contact;
    

    public $departamento_id = "", $municipio_id = "";

    
    public $rules = [
        'contact' => 'required|regex:/[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/|max:35|min:4',
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13',
        'envio_type' => 'required'
    ];
    //
   

    public function mount(){
        $this->departamentos = Departamento::all();
        $this->contact = Auth::user()->name;
        $this->phone = Auth::user()->profile ? Auth::user()->profile->phone : '';
        $this->address = Auth::user()->profile ? Auth::user()->profile->address : '';
        // pluck('first_name')
    }

    public function create_order(){
        // $c = 100;
        // $cart = Cart::subtotal();

        // $subtotal =str_replace( ',', '', Cart::subtotal() );
        // $operation = $var + $c ;
        // dd($operation, $var, $cart);
         

        $rules = $this->rules;

        if($this->envio_type == 2){
            $rules['departamento_id'] = 'required';
            $rules['municipio_id'] = 'required';
            $rules['address'] = 'required';
            $rules['references'] = 'required';
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

        $code_id = IDGenerator(new Orden, 'code_id', 3, 'PWL');/// consecutivo de la orden 3 ceros y letras
        $orden = new Orden();

        $orden->user_id = auth()->user()->id;
        $orden->code_id = $code_id;
        $orden->contact = $this->contact;
        $orden->phone = $this->phone;
        $orden->envio_type = $this->envio_type;
        $orden->shipping_cost = 0;
        $subtotal = str_replace( ',', '', Cart::subtotal() );
        $orden->total = $this->shipping_cost + $subtotal;
        $orden->content = Cart::content();
        
        
        
        

        if ($this->envio_type == 2) {
            $orden->shipping_cost = $this->shipping_cost;
            $orden->departamento_id = $this->departamento_id;
            $orden->municipio_id = $this->municipio_id;
            $orden->address = $this->address;
            $orden->casa = $this->casa;
            $orden->references = $this->references;
            
        }

        $orden->save();

        foreach (Cart::content() as $item) {
            discount($item);
        }

        Cart::destroy();
        $this->emit('showSuccessMessage', __('Orden creada con éxito. '. $orden->code_id));
        // Evia correo confirmacion al cliente
        Mail::to($orden->user->email)->send(new PedidoMailable($orden)); 
        // Evia correo confirmacion al admin
        Mail::to(['pedidos@lese.com', 'otrocorreo@gmail.com'])->send(new PlacedOrderMailable($orden)); 
        
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

    // public function updatedMunicipioId($value){

    //     $municipio = Municipio::find($value);

    //     $this->shipping_cost = $municipio->cost;
    // }

    public function render(){
        return view('livewire.create-order');
    }
}


