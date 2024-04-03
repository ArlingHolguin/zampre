<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{
   
    use WithFileUploads;

    public $brands, $categories, $category, $rand;

    public $createForm =[
        'name' => null,
        'slug' => null,
        'extract' => null,
        'icon' => null,
        'brands' => [],
        'keywords' => []
    ];

    public $editForm =[
        'open' => false,
        'name' => null,
        'slug' => null,
        'extract' => null,
        'icon' => null,
        'brands' => [],
        'keywords' => []
    ];

    public $editIcon;

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.slug' => 'required|unique:categories,slug',
        'createForm.extract' => 'nullable',
        'createForm.keywords' => 'nullable',
        'createForm.icon' => 'required|image|max:200',
        'createForm.brands' => 'required'
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.slug' => 'slug',
        'createForm.extract' => 'extracto',
        'createForm.keywords' => 'keywords',
        'createForm.icon' => 'icono',
        'createForm.brands' => 'marca',

        'editForm.name' => 'nombre',
        'editForm.slug' => 'slug',
        'editForm.extract' => 'extracto',
        'editForm.keywords' => 'keywords',
        'editIcon' => 'icono',
        'editForm.brands' => 'marca'
    ];
    

    protected $listeners = ['delete'];

    public function updatedCreateFormName($value){
        $this->createForm['slug'] = Str::slug($value);
    }
    public function updatedEditFormName($value){
        $this->editForm['slug'] = Str::slug($value);
    }
    

    public function mount(){
        $this->getBrands();
        $this->getCategories();
        $this->rand = rand();
    }

    public function getBrands(){
        $this->brands = Brand::all();
    }

    public function save(){
        $this->validate();
        // dd($this->createForm);
        // $image = $this->createForm['image']->store('categories');
        $icon = $this->createForm['icon']->store('categories');

        $category = Category::create([
            'name' => $this->createForm['name'],
            'slug' => $this->createForm['slug'],
            'extracto' => $this->createForm['extract'],
            'keywords' => json_encode($this->createForm['keywords']),
            'icon' => $icon,
        ]);

        $category->brands()->attach($this->createForm['brands']);
        $this->rand = rand();

        $this->reset('createForm');
        $this->getCategories();
        $this->emit('saved');

        

    }

    public function edit(Category $category){
        $this->reset(['editIcon']);
        $this->resetValidation();
        $this->category = $category;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $category->name;
        $this->editForm['slug'] = $category->slug;
        $this->editForm['extract'] = $category->extracto;
        $this->editForm['keywords'] = ($category->keywords);
        $this->editForm['brands'] = $category->brands->pluck('id');
        $this->editForm['icon'] = ($category->icon);


    }

    public function update(){
        $rules =[
            'editForm.name' => 'required',
            'editForm.slug' => 'required|unique:categories,slug,'.$this->category->id,
            'editForm.extract' => 'nullable',
            'editForm.keywords' => 'nullable',
            'editForm.brands' => 'required'

        ];

        if($this->editIcon){
            $rules['editIcon'] = 'required|image|max:200';
        }

        $this->validate($rules);

        if($this->editIcon){
            Storage::delete($this->editForm['icon']);
            $this->editForm['icon'] = $this->editIcon->store('categories');
        }

        $this->category->update($this->editForm);
        $this->category->brands()->sync($this->editForm['brands']);
        $this->reset(['editForm', 'editIcon']);
        $this->getCategories();
    }

    

    public function getCategories(){
        $this->categories = Category::all();
    }

    public function delete(Category $category){
        $category->delete();
        $this->getCategories();

    }

    public function render()
    {
        return view('livewire.admin.create-category');
    }
}
