<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Admin_HomeController extends Controller
{
    public function __construct()
    {
        @session_start();
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
    public function promotion()
    {
        return view('admin.back.promotion');
    }


    //statistical
    public function statistical()
    {
        return view('admin.back.statistical');
    }


    //staff
    public function staff()
    {
        return view('admin.back.staff');
    }
    public function addstaff()
    {
        return view('admin.back.addstaff');
    }
    public function postaddstaff(Request $request)
    {
        $checkTK = DB::table('taikhoan')
                    ->where('SoDienThoai', $request->phone)
                    ->orWhere('email', $request->email)
                    ->get();

        if (count($checkTK) > 0){
            return back()->with('notify_fail', 'Sđt hoặc email đã tồn tại!');
        }


        if ($request->password != $request->repass){
            return back()->with('notify_fail', 'Mật khẩu xác nhận không chính xác');
        }

        $createTK = DB::table('taikhoan')->insert([
            'HoTen' => $request->fullname,
            'email' => $request->email,
            'SoDienThoai' => $request->phone,
            'GioiTinh' => $request->gender,
            'password' => bcrypt($request->password),
            'id_LoaiTaiKhoan' => 1,

        ]);

        if ($createTK){
            return back()->with('notify_success', 'Tạo tài khoản thành công!!!');
        }else{
            return back()->with('notify_fail', 'Lỗi tạo tài khoản không thành công!!!');
        }
    }

    //order
    public function order()
    {
        return view('admin.back.order');
    }

    //profile
    public function profile($id){
        return view('admin.back.profile');
    }
}
