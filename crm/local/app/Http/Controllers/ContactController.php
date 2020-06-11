<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Group;
use App\User;
use Illuminate\Http\Request;
use Ipecompany\Smsirlaravel\Smsirlaravel;

class ContactController extends Controller
{
    public function texts()
    {
        $credit = Smsirlaravel::credit();
        $messages = \DB::table('smsirlaravel_logs')->orderBy('id','DESC')->paginate(10);
        $customers = Customer::where('userPhonenumber','<>','NULL')->get();
        $customer_groups = Group::all();
        $employeers = User::all();
        $user_groups = \DB::table('user_groups')->get();
        return view('contacts.texts',compact('credit','messages','customers','customer_groups','employeers','user_groups'));
    }

    public function sendToANumber(Request $request)
    {
        $request->validate([
            'mobile' => 'required|max:11|min:11',
            'text'  => 'required'
        ]);
        Smsirlaravel::send($request->text,$request->mobile);
        $this->alert('success','پیامک با موفقیت ارسال شد');
        return back();
    }

    public function sendToACustomer(Request $request)
    {
        $request->validate([
            'mobile' => 'required|max:11|min:11',
            'text'  => 'required'
        ]);
        Smsirlaravel::send($request->text,$request->mobile);
        $this->alert('success','پیامک با موفقیت ارسال شد');
        return back();
    }

    public function sendToCustomersGroup(Request $request)
    {
        $request->validate([
            'customers_group' => 'required',
            'text'  => 'required'
        ]);
        $numb = Customer::select('userPhonenumber')->where('group_id',$request->customers_group)->where('userPhonenumber','<>','NULL')->get();
        $i=0;
        foreach ($numb as $value){

            $numbers[$i]=$value->userPhonenumber;
            $i++;
        }
        Smsirlaravel::send($request->text,$numbers);
        $this->alert('success','پیامک با موفقیت ارسال شد');
        return back();
    }

    public function sendToAEmployeer(Request $request)
    {
        $request->validate([
            'mobile' => 'required|max:11|min:11',
            'text'  => 'required'
        ]);
        Smsirlaravel::send($request->text,$request->mobile);
        $this->alert('success','پیامک با موفقیت ارسال شد');
        return back();
    }

    public function sendToEmployeersGroup(Request $request)
    {
        $request->validate([
            'user_groups' => 'required',
            'text'  => 'required'
        ]);
        $numb = User::select('mobile')->where('group_id',$request->user_groups)->where('mobile','<>','NULL')->get();
        $i=0;
        foreach ($numb as $value){

            $numbers[$i]=$value->mobile;
            $i++;
        }
        Smsirlaravel::send($request->text,$numbers);
        $this->alert('success','پیامک با موفقیت ارسال شد');
        return back();
    }

    public function fax()
    {
        return view('contacts.fax');
    }


    public function alert($type,$msg)
    {
        \Session::flash('msg',$msg);
        \Session::flash('type',$type);
    }


}
