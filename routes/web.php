<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ViewController;
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

Route::get('/', [ViewController::class, 'home'])->name('home');

// Product routes
Route::get('/products', [ViewController::class, 'allProducts']);
Route::get('/search', [ViewController::class, 'results']);
Route::get('/details/{id}', [ViewController::class, 'details']);
Route::get('/cart', [ViewController::class, 'cart']);

Route::post('/add-to-cart', [ProductsController::class,'addToCart']);
Route::post('/remove-from-cart', [ProductsController::class,'removeFromCart']);

// User routes

Route::get('/login', [ViewController::class, 'login']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [ViewController::class, 'register']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// private routes

// Manager Access
Route::prefix('private/manager')->middleware(['manager'])->group(function () {
    Route::get('/', [ViewController::class, 'managerPanel']);
    Route::get('/delete/{id}', [ProductsController::class, 'delete']);
    Route::get('/create', [ViewController::class, 'create']);
    Route::post('/create', [ProductsController::class, 'create']);
    Route::get('/edit/{id}', [ViewController::class, 'edit']);
    Route::post('/edit/{id}', [ProductsController::class, 'update']);
});
//Only Admins access
Route::prefix('private/admin')->middleware(['admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin-home');
    Route::get('/slider', [AdminController::class, 'sliderManagement'])->name('sliderManagement');
    Route::post('/slider', [AdminController::class, 'saveSliders']);
});



