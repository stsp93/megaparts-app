<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show() {
       return view('product.results', ['products' => Product::latest()->search(request('q'))->simplePaginate(5)]);
    }
}
