<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateProducts extends Component
{
    public $categories;
    public $subcategories = [];
    public $brands = [];
    public $name, $slug;
    public $dimensions = [
        'width' => 0,
        'height' => 0,
        'length' => 0,
        'weight' => 0
    ];

    public $referencia;
    public $description;
    public $extracto;
    public $keywords = [];
    public $input = '';
    public $quantity;
    public $price= 0;
    public $category_id = "";
    public $subcategory_id ="";
    public $brand_id= "";

    protected $rules = [
        'name' => 'required|max:45',
        'referencia' => 'required|max:8|unique:products',
        'slug' => 'required|unique:products',
        'description' => 'required|max:2000',
        'extracto' => 'nullable|max:150',
        'keywords' => 'nullable|max:150',
        'price' => 'required|numeric|digits_between:0,8',
        'quantity' => 'required|numeric|digits_between:0,5',
        'dimensions.width' => 'nullable|numeric|digits_between:0,5',
        'dimensions.height' => 'nullable|numeric|digits_between:0,5',
        'dimensions.length' => 'nullable|numeric|digits_between:0,5',
        'dimensions.weight' => 'nullable|numeric|digits_between:0,5',
        
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'brand_id' => 'required'
    ];

    public function mount()
    {
        $this->categories = Category::all();
        $this->brands = Brand::all();
    }

    public function updatedInput($value)
    {
        if (str_contains($value, ',')) {
            $this->addKeyword(trim($value, ', '));
            $this->input = '';
        }
    }

    public function addKeyword($keyword)
    {
        if (!empty($keyword) && !in_array($keyword, $this->keywords)) {
            $this->keywords[] = $keyword;
        }
    }

    public function removeKeyword($keyword)
    {
        $this->keywords = array_filter($this->keywords, fn($kw) => $kw != $keyword);
    }

    public function updatedCategoryId($value){
        $this->subcategories = Subcategory::where('category_id', $value)->get();

        $this->brands = Brand::whereHas('categories', function(Builder $query) use ($value){
            $query->where('category_id', $value);
        })->get();

        $this->reset(['subcategory_id', 'brand_id']);
    }

    // Propiedad computada para obtener la subcategoria seleccionada
    public function getSubcategoryProperty(){
        return Subcategory::find($this->subcategory_id);
    }

    public function updatedName($value){
        $this->slug = Str::slug($value);
    }

    

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        $rules = $this->rules;

        if($this->subcategory_id){
            if(!$this->subcategory->color && !$this->subcategory->color){
                $rules['quantity'] = 'required|numeric|digits_between:0,5';
            }
        }
        $this->validate($rules);

        $product = new Product();
        $product->name = $this->name;
        $product->referencia = $this->referencia;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $dimensions = [
            'width' => (int) $this->dimensions['width'],
            'height' => (int) $this->dimensions['height'],
            'length' => (int) $this->dimensions['length'],
            'weight' => (int) $this->dimensions['weight'],
        ];
    
        $product->fill(['dimensions' => $dimensions]);
        $product->extracto = $this->extracto;
        $product->keywords = json_encode($this->keywords);
        if($this->subcategory_id){
            if(!$this->subcategory->color && !$this->subcategory->color){                
                $product->quantity = $this->quantity;
            }
        }
        $product->price = $this->price;
        $product->category_id = $this->category_id;
        $product->subcategory_id = $this->subcategory_id;
        $product->brand_id = $this->brand_id;
        // dd($product);
        $product->save();

        return redirect()->route('EditProduct', $product);


    }

    

    public function render()
    {
        return view('livewire.admin.create-products')->layout('layouts.admin');
    }
}
