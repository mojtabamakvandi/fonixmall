<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Factor;
use App\HyperProduct;
use App\Product;
use App\Sale;
use Illuminate\Http\Request;
use Ipecompany\Smsirlaravel\Smsirlaravel;
class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cp()
    {
        $credit = Smsirlaravel::credit();
        $productCount = Product::count();
        $customerCount = Customer::count();
        $hpCount = HyperProduct::count();
        $onlineSales = Factor::sum('amount')*10;
        return view('pages.dashboard',compact('productCount','customerCount','hpCount','onlineSales','credit'));
    }

    public function GetSmsLines()
    {
        return Smsirlaravel::getLines();
    }

    public function mailbox()
    {
        return view('pages.mailbox');
    }

    public function sendmail()
    {
        return view('pages.sendmail');
    }

    public function sentbox()
    {
        return view('pages.sentbox');
    }

    public function readmail()
    {
        return view('pages.readmail');
    }

    public function drafts()
    {
        return view('pages.drafts');
    }

    public function trash()
    {
        return view('pages.trash');
    }

    public function calender()
    {
        return view('pages.calender');
    }

    public function lock()
    {
        return view('auth.lockscreen');
    }

    public function user()
    {
        return view('layouts.user');
    }



}
