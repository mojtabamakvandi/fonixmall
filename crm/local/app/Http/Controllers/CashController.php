<?php

namespace App\Http\Controllers;

use App\Cash;
use App\Customer;
use App\Factor;
use foo\bar;
use Illuminate\Http\Request;
use Session;
use Ipecompany\Smsirlaravel\Smsirlaravel;

class CashController extends Controller
{

    public static function GetDate()
    {
        $date = date("Y/m/d");
        return $date;
    }

    public static function GetTime()
    {
        $date = date("H:i:s");
        return $date;
    }

    public function index()
    {   $customer = new Customer;
        $customer->userName = "";
        $customer->userFamily = "";
        $customer->userBday = "";
        $customer->userEmail = "";
        return view('pages.cash',compact('customer'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'mobiles' => 'required'
            ]);
        $customer = Customer::where('userPhonenumber',$request->mobiles)->first();

        if($customer==null){
            $this->alert('error','مشتری یافت نشد!');
            return redirect('cp/cash');
        }else{
            return view('pages.cash',compact('customer'));
        }

    }

    public function add(Request $request)
    {
        $request->validate([
            'customer_id' => 'required'
        ]);
        $cash = new Cash;
        $cash->customer_id = $request->customer_id;
        $cash->factor_id = $request->factor_id;
        $cash->buy_date = $this->GetDate();
        $cash->buy_time = $this->GetTime();
        $cash->amount = $request->amount;
        $cash->offer = $request->offer;
        $cash->cash_id = \Auth::id();
        $cash->save();
        $this->alert('success','با موفقیت ثبت شد!');
        return redirect('cp/cash');
    }

    public function all()
    {
        $factors = Cash::where('factor_id','<>','NULL')->orderBy('id','DESC')->paginate(10);
        return view('pages.all',compact('factors'));
    }

    public function alert($type,$msg)
    {
        Session::flash('msg',$msg);
        Session::flash('type',$type);
    }

    public function customerAdd(Request $request)
    {
        $request->validate([
           'mobile' => 'required'
        ]);
        $customer = Customer::where('userPhonenumber',$request->mobile)->first();

        if($customer==null){
            $customer = new Customer;
            $customer->userId = $this->GenerateId();
            $customer->userName = 'مشتری';
            $customer->userFamily = 'محترم';
            $customer->userPhonenumber = $request->mobile;
            $customer->userPassword = \Hash::make("123456");
            $customer->save();
        }
        Smsirlaravel::send('سلام، به جمع مشتریان هایپرمارکت فونیکس مال خوش آمدید. لطفا به سایت http://fonixmall.com مراجعه کنید و پروفایل خود را تکمیل کنید تا از امتیازات آن بهره مند شوید', $customer->userPhonenumber);
        return view('pages.cash',compact('customer'));
    }

    public static function GenerateId()
    {
        //ini_alter('date.timezone', 'Asia/Tehran');
        $now = new \DateTime();
        $now = $now->format('YmdHis');
        $microTime = microtime();
        $id = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microTime);
        $id = substr($id, 11, 1);
        $random = (rand(10000, 99999));
        $va_id = $now . $id . $random;
        return $va_id;
    }
}
