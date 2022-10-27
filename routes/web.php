<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ProductController;


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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// require __DIR__.'/auth.php';




// client controllers start 
Route::get('/', [clientController::class, 'index']);
Route::get('/shop', [clientController::class, 'shop']);
Route::get('/cart', [clientController::class, 'cart']);
Route::get('/checkout', [clientController::class, 'checkout']);

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





