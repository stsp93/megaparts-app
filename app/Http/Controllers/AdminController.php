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
        $manualSliderProducts = Product::where('slider', 'manual')->latest('updated_at')->get();
        $autoSliderProducts = Product::where('slider', 'auto')->latest('updated_at')->get();
        $allProducts = Product::latest()->get();

        return view('admin.slider', ['allProducts' => $allProducts, 'manualProducts' => $manualSliderProducts, 'autoProducts' => $autoSliderProducts]);
    }

    public function saveSliders()
    {
        $formId = request()->input('form_id');
        DB::enableQueryLog();
        $productIds = request()->input('product_ids');
        try {
            if ($formId === 'manual-form') {
                $manualSliderProductIds = Product::where('slider', 'manual')->pluck('id')->toArray();
                // remove products from slider
                foreach ($manualSliderProductIds as $id) {
                    if (!in_array($id, $productIds)) {
                        Product::where('id', $id)->update(['slider' => ""]);
                    }
                }

                // add products to slider
                foreach ($productIds as $key => $productId) {
                    Product::where('id', $productId)->update(['slider' => 'manual']);
                }
            } elseif ($formId === 'auto-form') {
                $autoSliderProductsIds = Product::where('slider', 'auto')->pluck('id')->toArray();
                // remove products from slider
                foreach ($autoSliderProductsIds as $id) {
                    if (!in_array($id, $productIds)) {
                        Product::where('id', $id)->update(['slider' => ""]);
                    }
                }

                // add products to slider
                foreach ($productIds as $key => $productId) {
                    Product::where('id', $productId)->update(['slider' => 'auto']);
                }
            }
        } catch (Exception $e) {
            return dd($e);
        }


        dd(DB::getQueryLog());
        return redirect()->back();
    }
}
