<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateProducts extends Component
{
    public $categories;
    public $brands;
    public $name, $slug;
    public $referencia;
    public $description;
    public $extracto;
    public $keywords;
    public $quantity;
    public $price;
    public $category_id;
    public $cabeza;
    public $estria;
    public $largo;
    public $rosca;
    public $hex;
    public $alto;


    public function mount()
    {
        $this->categories = Category::all();
        $this->brands = Brand::all();
    }

    public function updatedName($value){
        $this->slug = Str::slug($value);
    }

    protected $rules = [
        'name' => 'required|max:45',
        'referencia' => 'required|max:8|unique:products',
        'slug' => 'required|unique:products',
        'description' => 'required|max:150',
        'extracto' => 'nullable|max:150',
        'keywords' => 'nullable|max:150',
        'price' => 'required|numeric|digits_between:0,6',
        'quantity' => 'required|numeric|digits_between:0,5',

        'cabeza' => 'nullable|max:15',
        'estria' => 'nullable|max:15',
        'largo' => 'nullable|max:15',
        'rosca' => 'nullable|max:15',
        'hex' => 'nullable|max:15',
        'alto' => 'nullable|max:15',

        'category_id' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        $this->validate();
        $product = new Product();
        $product->name = $this->name;
        $product->referencia = $this->referencia;
        $product->slug = $this->slug.'-'.$this->referencia;
        $product->description = $this->description;
        $product->extracto = $this->extracto;
        $product->keywords = $this->keywords;
        $product->quantity = $this->quantity;
        $product->price = $this->price;
        $product->category_id = $this->category_id;
        $product->cabeza = $this->cabeza;
        $product->estria = $this->estria;
        $product->largo = $this->largo;
        $product->rosca = $this->rosca;
        $product->hex = $this->hex;
        $product->alto = $this->alto;
        $product->save();

        return redirect()->route('EditProduct', $product);


    }

    

    public function render()
    {
        return view('livewire.admin.create-products')->layout('layouts.admin');
    }
}
