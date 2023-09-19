<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function sliderManagement()
    {
        $manualSliderProducts = Product::where('slider', 'manual')->orderBy('position', 'asc')->get();
        $autoSliderProducts = Product::where('slider', 'auto')->orderBy('position', 'asc')->get();
        $allProducts = Product::latest()->get();

        return view('admin.slider', ['allProducts' => $allProducts, 'manualProducts' => $manualSliderProducts, 'autoProducts' => $autoSliderProducts]);
    }

    public function saveSliders()
    {
        $sliderId = request()->input('sliderId');
        $productIds = request()->input('productIds');

        try {
            if ($sliderId === 'manualSlider') {
                $manualSliderProductIds = Product::where('slider', 'manual')->pluck('id')->toArray();
                // remove products from slider
                foreach ($manualSliderProductIds as $id) {
                    if (!in_array($id, $productIds)) {
                        Product::where('id', $id)->update(['slider' => ""]);
                    }
                }

                // add products to slider
                foreach ($productIds as $key => $productId) {
                    Product::find($productId)->touch();
                    Product::where('id', $productId)->update(['slider' => 'manual', 'position' => $key]);
                }
            } elseif ($sliderId === 'autoSlider') {
                $autoSliderProductsIds = Product::where('slider', 'auto')->pluck('id')->toArray();
                // remove products from slider
                foreach ($autoSliderProductsIds as $id) {
                    if (!in_array($id, $productIds)) {
                        Product::where('id', $id)->update(['slider' => ""]);
                    }
                }

                // add products to slider
                foreach ($productIds as $key => $productId) {
                    Product::where('id', $productId)->update(['slider' => 'auto', 'position' => $key]);
                }
            }
        } catch (Exception $e) {
            return dd($e);
        }

        return response()->json(['message' => 'Slider positions updated successfully']);
    }
}
