<?php

namespace App\Http\Controllers;

use App\Group\UserGroup;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        // show all users
        $users = User::all();
        $groups = UserGroup::all();
        return view('pages.users',compact('users','groups'));
    }

    public function show(Request $request)
    {
        // Show single user profile
        $groups = UserGroup::all();
        $user = User::find($request->user);
        \Session::put('user_id',$user->id);
        return view('pages.ShowProfile',compact('user','groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'family' => 'required|max:50',
            'ncode' => 'required|max:10|min:10',
            'mobile' => 'required|unique:users|max:11|min:11',
            'email' => 'required|email',
            'bday' => 'required',
            'password' => 'required|min:6',
        ]);
        // add new user
        $user = new User;
        $user->name = $request->name;
        $user->family = $request->family;
        $user->ncode = $request->ncode;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->bday = $request->bday;
        $user->password = \Hash::make($request->password);
        $user->group_id = $request->group_id;
        $user->save();
        $this->alert('success','کاربر '.$user->name.' '.$user->family.' با موفقیت ایجاد شد');
        return back();
    }

    public function edit(Request $request)
    {
        // Show edit form
        $groups = UserGroup::all();
        $user = User::find($request->user);
        \Session::put('user_id',$user->id);
        return view('pages.editUser',compact('user','groups'));
    }

    public function update(Request $request)
    {
        // do update for a user
        $request->validate([
            'name' => 'required|max:50',
            'family' => 'required|max:50',
            'ncode' => 'required|max:10|min:10',
            'email' => 'required|email',
            'bday' => 'required',
        ]);
        $user = User::find($request->user);
        $user->name = $request->name;
        $user->family = $request->family;
        $user->ncode = $request->ncode;
        $user->email = $request->email;
        $user->bday = $request->bday;
        $user->group_id = $request->group_id;
        $user->save();
        $this->alert('success','کاربر '.$user->name.' '.$user->family.' با موفقیت ویرایش شد');
        return back();
    }

    public function destroy(Request $request)
    {
        // delete a user
        $user = User::find($request->user);
        $this->alert('success','کاربر '.$user->name.' '.$user->family.' با موفقیت حذف شد');
        $user->delete();
        return back();
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);
        $user = User::find(\Session::get('user_id'));
        $user->password = \Hash::make($request->password);
        $user->save();
        $this->alert('success','رمز عبور '.$user->name.' '.$user->family.' با موفقیت تغییر کرد');
        return back();
    }

    public function avatarUpload(Request $request)
    {
        if($request->hasFile('avatar')){
            $user = User::find($request->user);
            $photo = $request->avatar;
            $name = time().$photo->getClientOriginalName();
            $directory = public_path()."/"."/../../img/avatars" ;
            $photo->move($directory,$name);
            $user->avatar = $name;
            $user->save();
            $this->alert('success','آواتار '.$user->name.' '.$user->family.' با موفقیت آپلود شد');
            return back();
        }else{
            return back();
        }

    }

    public function alert($type,$msg)
    {
        \Session::flash('msg',$msg);
        \Session::flash('type',$type);
    }


}
