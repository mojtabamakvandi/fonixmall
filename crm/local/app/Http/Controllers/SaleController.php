<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $count = \DB::table('baskets_detailes')->where('productId','<>','NULL')->count();
        $sale = \DB::table('baskets_detailes')->where('productId','<>','NULL')->paginate(10);
        return view('sale.all',compact('count','sale'));
    }
}
