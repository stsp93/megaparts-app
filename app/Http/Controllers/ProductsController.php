<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
    public function showAll()
    {
        return view('product.results', ['products' => Product::latest()->simplePaginate(5)]);
    }

    public function showResults()
    {
        return view('product.results', ['products' => Product::latest()->search(request('q'))->simplePaginate(5)]);
    }

    public function showDetails($id)
    {
        $product = Product::findOrFail($id);

        return view('product.details', ['product' => $product]);
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

        $product = Product::findOrFail($productId);

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


    public function showCreate()
    {
        return view('product.create');
    }

    public function showEdit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', ['product' => $product]);
    }


    // CRUD

    public function create()
    {
        $formData = request()->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:10'],
            'price' => ['required', 'decimal:0,2'],
            'imageUrl' => ['required','url']
        ]);

        $product = Product::create($formData);
        
        return redirect('/private/manager')->with('notification', 'Успешно добавен продукт');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        // Check if the product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // Delete
        $product->delete();

        // Redirect back to a page, e.g., the product listing page
        return redirect('private/manager')->with('notification', 'Успешно изтрит продукт');
    }

    public function update($id)
    {
        $formData = request()->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:10'],
            'price' => ['required', 'decimal:0,2'],
            'imageUrl' => ['required','url']
        ]);

        $product = Product::findOrFail($id);
        $product->update($formData);

        return redirect('/private/manager')->with('notification', 'Успешна промяна');
    }


    public function showHome() {
        $manualSliderProducts = Product::where('slider', 'manual')->latest('updated_at')->get();
        $autoSliderProducts = Product::where('slider', 'auto')->latest('updated_at')->get();


        return view('home', ['manualProducts' => $manualSliderProducts,'autoProducts' => $autoSliderProducts]);
    }
}
