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

    public function addToCart()
{
    $productId = request('product_id');

    $product = Product::find($productId);

    if (!$product) {
        abort(404);
    }

    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    array_push($_SESSION['cart'],$product);

    $notification = 'Успешно добавен продукт';

    // Redirect back to the previous page with the notification
    return redirect()->back()->with('notification', $notification);
}

}
