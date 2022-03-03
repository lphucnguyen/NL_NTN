<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin_HomeController extends Controller
{
    public function __construct()
    {
        //Đăng nhập mới được vào các route bên dưới
        $this->middleware('CheckLoginAdmin');
    }


    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }


    //home
    public function home()
    {
        return view('admin.home.home');
    }


    //product
    public function product()
    {
        return view('admin.back.product');
    }


    //product_type
    public function product_type()
    {
        return view('admin.back.product_type');
    }


    //promotion
    public function promotion(){
        return view('admin.back.promotion');
    }


    //statistical
    public function statistical(){
        return view('admin.back.statistical');
    }


    //staff
    public function staff(){
        return view('admin.back.staff');
    }
    public function addstaff(){
        return view('admin.back.addstaff');
    }


    //order
    public function order(){
        return view('admin.back.order');
    }
}
