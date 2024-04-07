<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Livewire\Admin\BrandComponent;
use App\Http\Livewire\Admin\CreateProducts;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\SettingsComponent;
use App\Http\Livewire\Admin\ShowCategory;
use App\Http\Livewire\Admin\ShowProducts;
use App\Http\Livewire\Admin\UserComponent;
use Illuminate\Support\Facades\Route;

Route::middleware(['can:productos'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::group(['middleware' => ['can:productos']], function () {
    Route::get('/mostrar-productos', ShowProducts::class)->name('ShowProducts');
    Route::get('/crear-productos', CreateProducts::class)->name('CreateProducts');
    Route::get('/editar-producto/{product}/edit', EditProduct::class)->name('EditProduct'); 
    Route::post('/product/{product}/file', [ProductController::class, 'files'])->name('ProductFile');
 });

 Route::group(['middleware' => ['can:ordenes']], function () {
     Route::get('/ordenes', [OrderController::class, 'index'])->name('admin.ordenes.index');
     Route::get('/ordenes/{orden}', [OrderController::class, 'show'])->name('admin.orders.show');

 });

 Route::group(['middleware' => ['can:categorias']], function () { 
     // Category Routes
     Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
     Route::get('/categories/{category}', ShowCategory::class)->name('admin.categories.show');

  });

  Route::group(['middleware' => ['can:marcas']], function () { 

      //routes brand 
      Route::get('/brands', BrandComponent::class)->name('admin.brands.index');
  });
  Route::group(['middleware' => ['can:users']], function () { 
      //users
      Route::get('/users', UserComponent::class)->name('admin.users.index');

   });

//    Route::group(['middleware' => ['can:settings']], function () { 
    //users
    Route::get('/settings', SettingsComponent::class)->name('admin.settings.index');

//  });




