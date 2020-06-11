<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function roles()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('pages.roles',compact('roles','permissions'));
    }

    public function edit(Request $request)
    {
        $role = Role::find($request->role);
        $permissions = Permission::all();
        return view('pages.rolesEdit',compact('role','permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        $this->alert('success','نقش '.$role->display_name.' با موفقیت ایجاد شد');
        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
        ]);
        $role = Role::find($request->role);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        $role->permissions()->sync($request->permission_role);
        $this->alert('success','نقش '.$role->display_name.' با موفقیت ویرایش شد');
        return back();
    }

    public function destroy(Request $request)
    {
        $role = Role::find($request->role);
        $this->alert('success','نقش '.$role->display_name.' با موفقیت حذف شد');
        $role->delete();
        return back();
    }

    public function alert($type,$msg)
    {
        \Session::flash('msg',$msg);
        \Session::flash('type',$type);
    }
}
