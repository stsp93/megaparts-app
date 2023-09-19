<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
// REST API METHOD
    public function getProducts() {
        //  For Client-Side Render
        $perPage = 5;
        $page = request()->input('page', 1);
    
        // Retrieve products from the database with pagination
        $products = Product::latest()->paginate($perPage, ['*'], 'page', $page);
    
        return response()->json(['products' => $products]);
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



}
