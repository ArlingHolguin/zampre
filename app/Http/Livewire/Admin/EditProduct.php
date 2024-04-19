<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

class EditProduct extends Component
{
    public $product, $categories;
    public $subcategories = [];
    public $brands = [];
    public $category_id;
    public $subcategory_id ="";
    public $brand_id= "";
    public $name, $slug;
    public $keywords = [];
    public $input = '';
    public $dimensions = [
        'width' => 0,
        'height' => 0,
        'length' => 0,
        'weight' => 0
    ];
    public $referencia;
    public $description;
    public $extracto;
    public $quantity;
    public $price;
    public $price_discount_percent;

    public $is_combo;
    public $selectedComboType = 'Combo x2'; // Valor predeterminado
    public $comboProperties = []; 

    public $selectedSizes = [];

    protected $listeners = [
        'refresh'
    ];

    protected $rules = [
        'category_id' => 'required',
        'product.subcategory_id' => 'required',
        'product.brand_id' => 'required',
        'product.name' => 'required|max:45',
        'product.referencia' => 'required|max:8|unique:products,referencia',
        'product.slug' => 'required|unique:products,slug',
        'product.description' => 'required|max:150',
        'product.extracto' => 'nullable|max:150',
        'product.keywords' => 'nullable|max:150',
        'product.price' => 'required|numeric|digits_between:0,8',
        'product.dimensions.width' => 'nullable|numeric|digits_between:0,5',
        'product.dimensions.height' => 'nullable|numeric|digits_between:0,5',
        'product.dimensions.length' => 'nullable|numeric|digits_between:0,5',
        'product.dimensions.weight' => 'nullable|numeric|digits_between:0,5',
        'product.quantity' => 'required|numeric|digits_between:0,5',
        'product.is_combo' => 'required|boolean',


    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->is_combo = $product->is_combo;
        $this->comboProperties = $product->combo_properties ?? $this->defaultComboProperties();
        // dd($this->is_combo);
        $this->categories = Category::all();
        $this->price_discount_percent = $product->price_discount_percent;

        $this->category_id = $product->subcategory->category->id;
        $this->subcategories = Subcategory::where('category_id', $this->category_id)->get();

        $this->brands = Brand::whereHas('categories', function (Builder $query) {
            $query->where('category_id', $this->category_id);
        })->get();

        
        // $this->keywords = ($product->keywords) ?? [];
        $this->keywords = json_decode($product->keywords, true) ?? [];
        if (is_null($this->product->images)) {
            $this->product->images = collect();
        }
    }

    public function defaultComboProperties()
    {
        // Retorna una estructura básica de las propiedades del combo
        return [
            'type' => $this->selectedComboType,
            'groups' => [
                'adultos' => [
                    'personas' => ['Mujer', 'Hombre'],
                    'tallas' => ['S', 'M', 'L', 'XL']
                ],
                'infantes' => [
                    'personas' => ['Niño', 'Niña'],
                    'tallas' => [4, 6, 8, 10, 12, 14]
                ]
            ]
        ];
    }

    public function saveComboProperties()
    {
        $this->comboProperties['type'] = $this->selectedComboType; // Asegura que el tipo actualizado esté guardado
        $this->product->combo_properties = $this->comboProperties;
        $this->product->save();

        $this->emit('saved');
    }

    
    

    public function updatedCategoryId($value)
    {
        $this->subcategories = Subcategory::where('category_id', $value)->get();

        $this->brands = Brand::whereHas('categories', function(Builder $query) use ($value){
            $query->where('category_id', $value);
        })->get();

        // $this->reset(['subcategory_id', 'brand_id']);
        $this->product->suncategory_id = "";
        $this->product->brand_id = "";
    }

    public function getSubcategoryProperty()
    {
        return Subcategory::find($this->product->subcategory_id);
    }   


    public function updatedInput($value)
    {
        if (str_contains($value, ',')) {
            $this->addKeyword(trim($value, ', '));
            $this->input = '';
        }
    }

    // public function updatedName($value){
    //     $this->slug = Str::slug($value);
    // }

    public function addKeyword()
    {
        $keywords = explode(',', $this->input);
        foreach ($keywords as $keyword) {
            $keyword = trim($keyword);
            if (!empty($keyword) && !in_array($keyword, $this->keywords)) {
                $this->keywords[] = $keyword;
            }
        }
        $this->input = ''; // Limpiar input después de agregar las keywords
    }

    public function removeKeyword($keyword)
    {
        $this->keywords = array_filter($this->keywords, fn ($kw) => $kw != $keyword);
    }

    public function updatedProductName($value)
    {
        $this->product->slug = Str::slug($value);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateProduct()
    {

        // dd($this->product); 
        if (!is_null($this->price_discount_percent) && $this->price_discount_percent > 0) {
            // Calcular el precio con descuento
            $discountAmount = $this->product->price * ($this->price_discount_percent / 100);
            $this->product->price_discount = $this->product->price - $discountAmount;
        }
        
        
        $this->product->keywords = json_encode($this->keywords);
        $this->product->category_id = $this->category_id;
        // $this->product->is_combo = $this->is_combo;
        $this->product->save();
        $this->emit('saved');
    }

    public function deleteImage(Image $image)
    {
        Storage::delete([$image->url]);
        $image->delete();
        $this->product = $this->product->fresh();
    }
    public function refresh()
    {
        $this->product = $this->product->fresh();
    }

    public function render()
    {
        return view('livewire.admin.edit-product')->layout('layouts.admin');
    }
}
