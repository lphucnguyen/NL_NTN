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


    //product list
    public function product()
    {
        $list_product = DB::table('sanpham as a')
                        ->leftJoin('loaisanpham as b','a.id_LoaiSanPham','b.id')
                        ->select('a.*', 'b.TenLoaiSanPham')
                        ->get();
        return view('admin.back.product', compact('list_product'));
    }

    //add product
    public function addproduct()
    {
        $product_type = DB::table('loaisanpham')->get();
        return view('admin.back.addproduct', compact('product_type'));
    }

    //post add product
    public function postaddproduct(Request $request)
    {
        //Hàm xóa dấu tiếng việt
        function vn_str_filter($str)
        {
            $unicode = array(
                'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
                'd' => 'đ',
                'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
                'i' => 'í|ì|ỉ|ĩ|ị',
                'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
                'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
                'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
                'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
                'D' => 'Đ',
                'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
                'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
                'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
                'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
                'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            );

            foreach ($unicode as $nonUnicode => $uni) {
                $str = preg_replace("/($uni)/i", $nonUnicode, $str);
            }
            return $str;
        }

        //Kiểm tra file img1
        if ($request->hasFile('product_img1')) {
            $img1 = $request->product_img1;

            $name_img1 = date("Y_m_d", time()) . "_img1_" . str_replace(' ', '', vn_str_filter($request->product_name)) . "." . $img1->getClientOriginalExtension();
            $img1->move('images/products/', $name_img1);
        }
        //Kiểm tra file img2
        if ($request->hasFile('product_img2')) {
            $img2 = $request->product_img2;

            $name_img2 = date("Y_m_d", time()) . "_img2_" . str_replace(' ', '', vn_str_filter($request->product_name)) . "." . $img2->getClientOriginalExtension();
            $img2->move('images/products/', $name_img2);
        }
        //Kiểm tra file img3
        if ($request->hasFile('product_img3')) {
            $img3 = $request->product_img3;

            $name_img3 = date("Y_m_d", time()) . "_img3_" . str_replace(' ', '', vn_str_filter($request->product_name)) . "." . $img3->getClientOriginalExtension();
            $img3->move('images/products/', $name_img3);
        }

        $addP = DB::table('sanpham')->insert([
            'id_LoaiSanPham' => $request->product_type,
            'TenSanPham' => $request->product_name,
            'MoTa' => $request->product_des,
            'Gia' => $request->product_price,
            'SoLuong' => $request->product_quantity,
        ]);

        $lastid =  DB::getPdo('sanpham')->lastInsertId();
        if ($addP) {
            $addImg = DB::table('hinhanh')->insert([
                ['TenHinhAnh' => $name_img1, 'id_SanPham' => $lastid],
                ['TenHinhAnh' => $name_img2, 'id_SanPham' => $lastid],
                ['TenHinhAnh' => $name_img3, 'id_SanPham' => $lastid]
            ]);

            if ($addImg) {
                return back()->with('notify_success', 'Thêm sản phẩm thành công');
            } else {
                return back()->with('notify_fail', 'Lỗi thêm hình ảnh sản phẩm thất bại!!!');
            }
        } else {
            return back()->with('notify_fail', 'Lỗi thêm sản phẩm thất bại!!!');
        }
    }

    //ajax product detail
    public function product_detail($id){
        $product = DB::table('sanpham as a')
                ->leftJoin('loaisanpham as b', 'a.id_LoaiSanPham', 'b.id')
                ->select('a.*', 'b.TenLoaiSanPham')
                ->where('a.id', $id)->first();

        $img = DB::table('hinhanh')->where('id_SanPham', $id)->get();
        return view('admin.ajax.product_detail', compact('product', 'img'));
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

        if (count($checkTK) > 0) {
            return back()->with('notify_fail', 'Sđt hoặc email đã tồn tại!');
        }

        if ($request->password != $request->repass) {
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

        if ($createTK) {
            return back()->with('notify_success', 'Tạo tài khoản thành công!!!');
        } else {
            return back()->with('notify_fail', 'Lỗi tạo tài khoản không thành công!!!');
        }
    }

    //order
    public function order()
    {
        return view('admin.back.order');
    }

    //profile
    public function profile($id)
    {
        $info = DB::table('taikhoan')->where('id', $id)->first();
        return view('admin.back.profile', compact('info'));
    }
}
