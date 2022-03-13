<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        @session_start();
        // $this->middleware('CheckLogoutAdmin');
    }

    //View Login
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    //Xử lý login
    public function postLogin(Request $request)
    {
        $login_email = [
            'email' =>  $request->username,
            'password' => $request->password,
        ];

        $login_phone = [
            'phone' => $request->username,
            'password' => $request->password
        ];

        if ( (Auth::attempt($login_email) || Auth::attempt($login_phone)) && (Auth::user()->role <3) ) {
            return redirect('/admin');
        } else {
            return back()->with('error', 'Tài khoản hoặc mật khẩu sai!');
        }
    }
}
