<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ipecompany\Smsirlaravel\Smsirlaravel;
use mysql_xdevapi\Session;

class SmsController extends Controller
{
    public function sms()
    {
        $credit = Smsirlaravel::credit();
        return view('smsirlaravel.index',compact('credit'));
    }

    public function ChkOtp()
    {
        return view('auth.otp');
    }

    public function otp(Request $request)
    {
        $otp = \Session::get('otp');
        if($otp == $request->otp){
            return redirect('password/reset/otp');
        }
        else{
            \Session::flash('err','کد تصدیق صحیح نمی باشد');
            return back();
        }
    }

    public function SendRegisterOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|min:11|max:11',
        ]);
        $user = User::whereMobile($request->mobile)->first();
        if($user==null){
            \Session::put('mobile',$request->mobile);
            $this->SendOtpToUser($request->mobile);
            return redirect('CheckRegisterOtp');
        }else{
            \Session::flash('err','شما قبلا با این شماره ثبت نام کردید');
            return back();
        }

    }

    public function CheckRegisterOTP(Request $request)
    {
        $otp = $request->otp;
        if(\Session::get('otp')==$otp){
            return redirect('PostRegister');
        }else{
            \Session::flash('err','کد تصدیق صحیح نمی باشد');
            return back();
        }
    }

    public function ShowRegisterOtp()
    {
        return view('auth.RegisterOTP');
    }

    public function SendOtpToUser($mobile)
    {
        $otp = rand(000000,999999);
        \Illuminate\Support\Facades\Session::put('mobile',$mobile);
        \Session::put('otp',$otp);
        Smsirlaravel::send($otp,$mobile);
    }

    public function PostRegister()
    {
        return view('auth.PostRegister');
    }

    public function CompleteRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'family' => 'required|max:30',
            'ncode' => 'required|max:10|min:10',
            'bday' => 'required',
            'password' => 'required|min:6|max:30'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->family = $request->family;
        $user->ncode = $request->ncode;
        $user->bday = $request->bday;
        $user->mobile = \Session::get('mobile');
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::login($user);
        return redirect('/cp');
    }
}
