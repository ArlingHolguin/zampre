<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Livewire\Admin\CreateProducts;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\ShowProducts;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/mostrar-productos', ShowProducts::class)->name('ShowProducts');
//ruta para crear un producto
Route::get('/crear-productos', CreateProducts::class)->name('CreateProducts');
//ruta para editar el producto
Route::get('/editar-producto/{product}/edit', EditProduct::class)->name('EditProduct');  

//ruta para subir imagenes del prodcuto 
Route::post('/product/{product}/file', [ProductController::class, 'files'])->name('ProductFile');
