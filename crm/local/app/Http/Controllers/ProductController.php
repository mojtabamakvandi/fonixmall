<?php

namespace App\Http\Controllers;

use App\Product;
use App\HyperProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all()
    {
        $products = Product::orderBy('productRegDate','DESC')->paginate(10);
        $count = Product::count();
        return view('products.all',compact('products','count'));
    }

    public function HyperProduct()
    {
        $products = HyperProduct::orderBy('id','DESC')->paginate(10);
        $count = HyperProduct::count();
        return view('products.hyper_product',compact('products','count'));
    }
}
