<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
    public function showResults()
    {
        return view('product.results', ['products' => Product::latest()->search(request('q'))->simplePaginate(5)]);
    }

    public function showCart()
    {
        if (!session()->has('cart')) {
            session(['cart' => []]);
        }

        $products = session('cart');
        return view('product.cart', ['products' => $products]);
    }

    public function addToCart()
    {
        $productId = request('product_id');

        $product = Product::find($productId);

        if ($product) {
            session()->push('cart', $product);

        $notification = 'Успешно добавен продукт';
        } else {
            $notification = 'Продуктът не беше намерен';
        }
        

        // Redirect back to the previous page with the notification
        return redirect()->back()->with('notification', $notification);
    }

    public function removeFromCart()
    {
        $productId = request('product_id');

        $cart = session('cart', []);
    
        $index = array_search($productId, array_column($cart, 'id'));
    
        if ($index !== false) {
            array_splice($cart, $index, 1);
    
            session(['cart' => $cart]);
    
            $notification = 'Продуктът е премахнат успешно';
        } else {
            $notification = 'Няма такъв продукт в количката';
        }
    
        return redirect()->back()->with('notification', $notification);
    }
}
