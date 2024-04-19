<?php

namespace App\Http\Livewire;

use App\Models\Color;
use Livewire\Component;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItemsSize extends Component
{
    public $product, $sizes;
    public $color_id = "";
    public $qty = 1;
    public $quantity = 0;
    public $size_id = "";

    public $colors = [];
    public $options = [];
    public $comboTypes = [];

    public $selectedSizes = [];
    public $errorMessage = '';

    public function mount()
    {
       
        $this->sizes = $this->product->sizes;
        // En tu componente o método donde defines las opciones:
        $this->options['image'] = optional($this->product->images->first())->url ? Storage::url($this->product->images->first()->url) : 'https://via.placeholder.com/150';


        $this->options['dimensions'] = ($this->product->dimensions);
        //prodcuto con envio gratis
        $this->options['free_shipping'] = $this->product->free_shipping;
        // $this->options['combo_properties'] = $this->product->combo_properties;

        $this->initializeComboOptions();
        
    }

    // private function initializeComboOptions()
    // {
    //     if ($this->product->is_combo && $this->product->combo_properties) {
    //         $this->comboTypes = $this->product->combo_properties['groups'];
    //     }
    // }
    private function initializeComboOptions()
{
    if ($this->product->is_combo && $this->product->combo_properties) {
        $this->comboTypes = $this->product->combo_properties['groups'];
        $this->parseComboType($this->product->combo_properties['type']);
    }
}

private function parseComboType($type)
{
    // Ejemplo de cómo podrías interpretar el tipo de combo
    $parts = explode(" ", $type);  // "Combo x3 Adultos/Infante"
    $number = filter_var($parts[1], FILTER_SANITIZE_NUMBER_INT);  // Captura "3" de "x3"

    $this->options['comboSelection'] = [
        'total' => $number,
        'types' => explode('/', $parts[2])  // ['Adultos', 'Infante']
    ];
}
    

public function validateSelections()
{
    $countSelections = 0;
    foreach ($this->selectedSizes as $group => $sizes) {
        foreach ($sizes as $size) {
            if (!empty($size)) {
                $countSelections++;
            }
        }
    }

    $comboSelected = isset($this->options['comboSelection']['total']) ? intval($this->options['comboSelection']['total']) : 0;
    
    // Verificar si las selecciones no solo son demasiadas sino también si son suficientes
    if ($countSelections > $comboSelected) {
        $this->errorMessage = "No puedes seleccionar más de {$comboSelected} tallas.";
    } elseif ($countSelections < $comboSelected) {
        $this->errorMessage = "Debes seleccionar exactamente {$comboSelected} tallas.";
    } else {
        $this->errorMessage = '';  // Limpiar el mensaje si la validación es exitosa
    }
}



    public function updatedSizeId($value)
    {
        $size = Size::find($value);
        $this->colors = $size->colors;
        $this->options['size_id'] = $size->id;
    }

    public function updatedColorId($value){    
        $size = Size::find($this->size_id);
        $color = $size->colors->find($value);
        if ($color) {
            $this->quantity = qty_available($this->product->id, $color->id, $size->id);
            $this->options['color_id'] = $color->id;
        } else {
            $this->quantity = 0;
            // O puedes manejar de otra manera cuando el color no se encuentra.
        }
        
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }

    public function decrement()
    {
        if ($this->qty > 1) {
            $this->qty = $this->qty - 1;
        }
    }

    public function addItem()
    {

        $this->validateSelections();
        if (!empty($this->errorMessage)) {
            // No proceder a añadir al carrito si hay un error
            return;
        }
        $dimensions = ($this->product->dimensions);

        if ($dimensions && isset($dimensions['weight'])) {
            $weight = $dimensions['weight'];
        } else {
            // Establece un valor predeterminado para weight si no está disponible
            $weight = 0;
        }

        $comboOptions = [
            'sizes' => $this->selectedSizes,
            // 'modelo_id' => //buscar el nombre del modelo por el id $this->color_id
            'modelo_name' => Color::find($this->color_id)->name,
        ];
        $itemsPro = Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price_discount ? $this->product->price_discount : $this->product->price,
            'weight' => $weight,
            'options' => array_merge($this->options, [
                'combo' => $comboOptions // Agrega las opciones de combo
            ])
        ]);

        // dd($itemsPro);

        $this->quantity = qty_available($this->product->id, $this->color_id, $this->size_id);
        $this->reset('qty');

        //emitir un evento// vuelve reactivo el cart 
        $this->emitTo('dropdown-cart', 'render');
        $this->emitTo('cart-mobile', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-items-size', [
            'comboTypes' => $this->comboTypes
        ]);
    }
}
