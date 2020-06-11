<?php

namespace App\Http\Controllers;
use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function permissions()
    {
        $permissions = Permission::all();
        return view('pages.permissions',compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
        ]);

        $permission = new Permission;
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
        $this->alert('success','دسترسی '.$permission->display_name.' با موفقیت ایجاد شد');
        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'display_name' => 'required',
            'description' => 'required',
        ]);
        $permission = Permission::find($request->role);
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
        $this->alert('success','دسترسی '.$permission->display_name.' با موفقیت ویرایش شد');
        return back();
    }

    public function destroy(Request $request)
    {
        $permission = Permission::find($request->role);
        $this->alert('success','دسترسی '.$permission->display_name.' با موفقیت حذف شد');
        $permission->delete();
        return back();
    }

    public function alert($type,$msg)
    {
        \Session::flash('msg',$msg);
        \Session::flash('type',$type);
    }
}
