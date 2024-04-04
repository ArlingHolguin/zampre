<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Livewire\Admin\BrandComponent;
use App\Http\Livewire\Admin\CreateProducts;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\ShowCategory;
use App\Http\Livewire\Admin\ShowProducts;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/mostrar-productos', ShowProducts::class)->name('ShowProducts');
//ruta para mostrar las ordenes
Route::get('/ordenes', [OrderController::class, 'index'])->name('admin.ordenes.index');
Route::get('/ordenes/{orden}', [OrderController::class, 'show'])->name('admin.orders.show');
//ruta para crear un producto
Route::get('/crear-productos', CreateProducts::class)->name('CreateProducts');
//ruta para editar el producto
Route::get('/editar-producto/{product}/edit', EditProduct::class)->name('EditProduct');  

//ruta para subir imagenes del prodcuto 
Route::post('/product/{product}/file', [ProductController::class, 'files'])->name('ProductFile');

// Category Routes
Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/categories/{category}', ShowCategory::class)->name('admin.categories.show');

//routes brand 
Route::get('/brands', BrandComponent::class)->name('admin.brands.index');


