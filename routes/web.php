<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// COMMON ROUTES
// index
// show
// create
// store
// edit
// update
// destroy

Route::get('/', function () {
    return view('home');
});

Route::get('/search', [ProductsController::class, 'showResults']);
Route::get('/cart', [ProductsController::class, 'showCart']);

Route::post('/add-to-cart', [ProductsController::class,'addToCart']);
Route::post('/remove-from-cart', [ProductsController::class,'removeFromCart']);