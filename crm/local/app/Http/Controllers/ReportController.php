<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Factor;
use App\Sale;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function sales()
    {
        $count = \DB::table('baskets_detailes')->where('productId','<>','NULL')->count();
        $sales = \DB::table('baskets_detailes')->where('productId','<>','NULL')->paginate(10);
        return view('reports.sales',compact('sales','count'));
    }

    public function ShowFactor(Request $request)
    {
        $facId = $request->facId;
        $factor = \DB::table('baskets_detailes')->where('productId','<>','NULL')->where('facId',$facId)->get();
        $f1 = \DB::table('baskets_detailes')->where('productId','<>','NULL')->where('facId',$facId)->first();
        $facDate = substr(verta($f1->facDate),0,10);
        $sum = Sale::sum('productPrice');
        $off = Sale::sum('offer');
        return view('sale.factor',compact('factor','facDate','f1','sum','off'));
    }

    public function nextCustomers()
    {
        $customers = \DB::table('Next')->where('Pay',0)->paginate(10);
        $count = \DB::table('Next')->where('Pay',0)->count();
        return view('reports.nextCustomers',compact('customers','count'));
    }

    public function online()
    {
        $factor = Factor::paginate(10);
        $count = Factor::count();
        $sum = Factor::sum('amount');
        return view('reports.online',compact('factor','count','sum'));
    }
}
