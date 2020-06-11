<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    protected function authenticated($request, $user)
    {
        if($user->group_id==3) {
            return redirect('/cp/cash');
        } else {
            return redirect('/cp');
        }
    }

    use AuthenticatesUsers;

    protected $redirectTo = '/cp';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
