<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Writer\Ods\Thumbnails;

class EditProduct extends Component
{
    public $product, $categories;
    public $category_id;
    public $name, $slug;
    protected $listeners =[
            'refresh'
    ];

    public function mount(Product $product){
        $this->product = $product;
        $this->categories = Category::all();

        $this->category_id = $product->subcategory->category->id;

    }

    protected $rules = [
        'product.name' => 'required|max:45',
        'product.referencia' => 'required|max:8|unique:products,referencia',
        'product.slug' => 'required|unique:products,slug',
        'product.description' => 'required|max:150',
        'product.extracto' => 'nullable|max:150',
        'product.keywords' => 'nullable|max:150',
        'product.price' => 'required|numeric|digits_between:0,6',
        'product.quantity' => 'required|numeric|digits_between:0,5',

        'product.cabeza' => 'nullable|max:15',
        'product.estria' => 'nullable|max:15',
        'product.largo' => 'nullable|max:15',
        'product.rosca' => 'nullable|max:15',
        'product.hex' => 'nullable|max:15',
        'product.alto' => 'nullable|max:15',

        'category_id' => 'required'
];


    

    public function updateProductName($value){
        $this->product->slug = Str::slug($value);
    }   

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateProduct(){
        // $rules = $this->rules;
        // // $rules['referencia'] = 'required|max:8|unique:products,referencia,';
        // $rules['slug'] = 'required|unique:products,slug,' . $this->product->id;

        // $this->validate($rules);
        $this->product->category_id = $this->category_id;
        $this->product->save();
        $this->emit('saved');
    }

    public function deleteImage(Image $image){
        Storage::delete([$image->url]);
        $image->delete();
        $this->product = $this->product->fresh();
    }
    public function refresh(){
        $this->product = $this->product->fresh();
    }

    public function render()
    {
        return view('livewire.admin.edit-product')->layout('layouts.admin');
    }
}
