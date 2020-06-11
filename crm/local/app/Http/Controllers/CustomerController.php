<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Group;
use App\Sale;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function allGroups()
    {
        $groups = Group::all();
        return view('customers.allGroups', compact('groups'));
    }

    public function addGroup(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'minScore' => 'required',
        ]);
        Group::create($request->all());
        return redirect()->route('allGroups')->with('success','گروه با موفقیت ساخته شد');
    }

    public function delGroup(Request $request)
    {
        $group = Group::find($request->id);
        $group->delete();

        return redirect()->route('allGroups')->with('success','گروه با موفقیت حذف شد');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'minScore' => 'required',
        ]);
        $group = Group::find($request->id);
        $group->update($request->all());

        return redirect()->route('allGroups')->with('success','گروه با موفقیت ویرایش شد');
    }

    public function all()
    {
        $customers = Customer::where('userPhonenumber','<>','NULL')->paginate(10);
        $count = Customer::count();
        return view('customers.all',compact('customers','count'));
    }

    public function scores()
    {
        return view('customers.scores');
    }

    public function settings()
    {
        return view('customers.settings');
    }

    public function addFromAPI()
    {
        $param['action'] 	= 'GetContacts';
        $param['username'] 	= '916989778';
        $param['password'] 	= '1740490541';
        $param['start'] 	= '0';
        $param['sort'] 		= 'DESC';  // ASC OR DESC
        $param['id'] 		= '14534';  // ASC OR DESC
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, "http://crm.vonmedia.ir/post/sendJson.php");
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $ch, CURLINFO_HEADER_OUT, true);
        curl_setopt( $ch,CURLOPT_POST, true);
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($param));
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($param)))
        );

        curl_setopt( $ch, CURLOPT_TIMEOUT, 500 );
        $result = curl_exec( $ch );
        $result = json_decode($result);
        return $result;
    }

    public function show(Request $request)
    {
        $buys = Sale::where('userId',$request->id)->sum('productPrice');
        $last_buy = Sale::where('userId',$request->id)->orderBy('facId','DESC')->first();
        $customer = Customer::where('userId',$request->id)->first();
        return view('customers.show', compact('customer','buys','last_buy'));
    }


}
