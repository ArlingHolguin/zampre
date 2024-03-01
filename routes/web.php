<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\ShoppingCart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', WelcomeController::class)->name('home');
Route::get('productos/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('search', SearchController::class)->name('search');
Route::get('categorias/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('mi-orden', ShoppingCart::class)->name('shopping-cart');
Route::get('orden/crear', CreateOrder::class)->middleware('auth')->name('orders-create');

Route::middleware(['auth'] )->group(function(){
    // Route::get('orden/crear', CreateOrder::class)->middleware('auth')->name('orders.create');
    Route::get('orden/{orden}/resumen', [OrderController::class, 'resumen'])->name('orders.resumen');
    Route::get('orden/{orden}/estado', [OrderController::class, 'show'])->name('orders.show');
    Route::put('orden/{orden}/update', [OrderController::class, 'files'])->name('orders.update');
    Route::get('mis-ordenes', [OrderController::class, 'index'])->name('orders.index');
    // Route::get('pedidos/{order}/pago', PaymentOrder::class)->name('orders.payment');
    // Route::get('pedidos/{order}/pay', [OrderController::class, 'pay'])->name('orders.pay');
    // Route::get('webhooks', WebhooksController::class)->name('webhooks');
    

});

Route::get('pdf', [PDFController::class, 'PDF'])->name('pdf');
Route::get('pdfpedido/{orden}', [OrderController::class, 'pdfpedido'])->name('pdfpedido');
// Route::get('/pdf', function () {
//     return view('prueba');
// });
