<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
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
})->name('home');

// Product routes
Route::get('/products', [ProductsController::class, 'showAll']);
Route::get('/search', [ProductsController::class, 'showResults']);
Route::get('/details/{id}', [ProductsController::class, 'showDetails']);
Route::get('/cart', [ProductsController::class, 'showCart']);

Route::post('/add-to-cart', [ProductsController::class,'addToCart']);
Route::post('/remove-from-cart', [ProductsController::class,'removeFromCart']);

// User routes

Route::get('/login', [UserController::class, 'showLogin']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/logout', [UserController::class, 'logout']);

// private routes

// Manager Access
Route::prefix('private/manager')->middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'showManagerPanel']);
    Route::get('/delete/{id}', [ProductsController::class, 'delete']);

});
//Only Admins access
Route::prefix('private/admin')->middleware(['admin'])->group(function () {
    Route::get('/', [UserController::class, 'showAdminPanel'])->middleware('admin'); 
});

