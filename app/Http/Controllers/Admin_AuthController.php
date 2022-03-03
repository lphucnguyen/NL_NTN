<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin_AuthController extends Controller
{
    public function __construct()
    {
        @session_start();
        $this->middleware('CheckLogoutAdmin');
    }

    //View Login
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    //Xử lý login
    public function postLogin(Request $request)
    {
        if ($request->username == "" || $request->password == "") {
            return redirect('/admin/login')->with('noice', 'Tài khoản hoặc mật khẩu không được trống!');
        }

        $login_email = ['email' => $request->username, 'password' => $request->password];
        $login_sdt = ['SoDienThoai' => $request->username, 'password' => $request->password];

        if ( Auth::attempt($login_email) || Auth::attempt($login_sdt)) {
            return redirect('/admin');
        } else {
            return back()->with('noice', 'Tài khoản hoặc mật khẩu sai!');
        }
    }

    
}
