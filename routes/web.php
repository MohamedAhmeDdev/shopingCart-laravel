<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\Auth\RegisteredUserController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/profile', [RegisteredUserController::class, 'profile']);
Route::get('/orderList', [RegisteredUserController::class, 'orderList']);
Route::get('/invoice', [RegisteredUserController::class, 'invoice']);



// client controllers start 
Route::get('/', [clientController::class, 'index']);
Route::get('/shop', [clientController::class, 'shop']);
Route::get('/cart', [clientController::class, 'cart']);
Route::get('/checkout', [clientController::class, 'checkout'])->name('checkout');
Route::get('/addtocart/{id}', [clientController::class, 'addtocart'])->name('addtocart');
Route::post('/update_quantity/{id}', [clientController::class, 'update_quantity'])->name('quantity.update');
Route::get('/removeItem/{id}', [clientController::class, 'removeItem'])->name('remove_item_form_cart');
Route::post('/customerOrder', [clientController::class, 'store'])->name('customer_order');

//client controllers end 


//admin controllers start
Route::get('/admin', [AdminController::class, 'admin']);
//admin controllers end 

Route::resources( [
    'categories' => CategoryController::class,
    'sliders' => SlideController::class,
    'products' => ProductController::class,
    'order' => OrderController::class,
]);


Route::put('/products/{id}/activate', [ProductController::class, 'activate'])->name('products.activate');
Route::put('/products/{id}/deactivate', [ProductController::class, 'deactivate'])->name('products.deactivate');




