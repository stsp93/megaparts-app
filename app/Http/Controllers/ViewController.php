<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ViewController extends Controller
{
    public function home() {
        $manualSliderProducts = Product::where('slider', 'manual')->orderBy('position', 'asc')->get();
        $autoSliderProducts = Product::where('slider', 'auto')->orderBy('position', 'asc')->get();


        return view('home', ['manualProducts' => $manualSliderProducts,'autoProducts' => $autoSliderProducts]);
    }

    public function login()
    {
        return view('user.login');
    }

    public function register() {
        return view('user.register');
    }

    public function allProducts()
    {
        return view('product.results', ['products' => Product::latest()->simplePaginate(5)]);
    }

    public function results()
    {
        return view('product.results', ['products' => Product::latest()->search(request('q'))->simplePaginate(5)]);
    }

    public function details($id)
    {
        $product = Product::findOrFail($id);

        return view('product.details', ['product' => $product]);
    }

    public function cart()
    {
        if (!session()->has('cart')) {
            session(['cart' => []]);
        }

        $products = session('cart');
        return view('product.cart', ['products' => $products]);
    }


    public function managerPanel()
    {

        return view('user.manager',['products' => Product::latest()->simplePaginate(5)]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', ['product' => $product]);
    }
}
