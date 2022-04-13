<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\UserType;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductType;
use App\Models\Promotion;
use App\Models\StaffHistory;

class HomeController extends Controller
{
    public function __construct()
    {
        @session_start();
        $this->middleware('CheckLoginAdmin');
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    // ======================================HOME=======================================================
    //home
    public function home()
    {
        return view('admin.home.home');
    }

    // =====================================PRODUCT====================================================
    //product list
    public function product()
    {
        $product_list = Product::leftJoin('product_type as b', 'product.type', 'b.id')
            ->select('product.*', 'b.name_type')
            ->get();
        $product_type = ProductType::all();

        return view('admin.back.product', compact('product_list', 'product_type'));
    }
    //product delete list
    public function product_delete_list()
    {
        $product_list = Product::onlyTrashed()
            ->leftJoin('product_type as b', 'product.type', 'b.id')
            ->select('product.*', 'b.name_type')
            ->get();
        $product_type = ProductType::all();
        return view('admin.back.product_delete', compact('product_list', 'product_type'));
    }

    //post add product
    public function post_add_product(Request $request)
    {

        $addP = DB::table('product')->insert([
            'type' => $request->product_type,
            'name' => $request->product_name,
            'description' => $request->product_des,
            'price' => $request->product_price,
            'quantity' => $request->product_quantity,
        ]);

        $lastid =  DB::getPdo('product')->lastInsertId();


        if ($addP) {

            $history = new StaffHistory;
            $history->staff_id = Auth::id();
            $history->title = "Thêm sản phẩm mới";
            $history->content = "● Tên sản phẩm: $request->product_name\n" .
                "● Loại sản phẩm: " . ProductType::whereId($request->product_type)->first()->name_type . "\n" .
                "● Giá sản phẩm: " . number_format($request->product_price) . "\n" .
                "● Số lượng sản phẩm: $request->product_quantity\n" .
                "● Mô tả sản phẩm: \n$request->product_des";
            $history->save();

            //Kiểm tra file img1
            if ($request->hasFile('product_img1')) {
                $img1 = $request->product_img1;

                $name_img1 = "img1_" . date("Y_m_d", time()) . "_" . $lastid . "." . $img1->getClientOriginalExtension();
                $img1->move('images/products/', $name_img1);
            }
            //Kiểm tra file img2
            if ($request->hasFile('product_img2')) {
                $img2 = $request->product_img2;

                $name_img2 = "img2_" . date("Y_m_d", time()) . "_" . $lastid . "." . $img2->getClientOriginalExtension();
                $img2->move('images/products/', $name_img2);
            }
            //Kiểm tra file img3
            if ($request->hasFile('product_img3')) {
                $img3 = $request->product_img3;

                $name_img3 = "img3_" . date("Y_m_d", time()) . "_" . $lastid . "." . $img3->getClientOriginalExtension();
                $img3->move('images/products/', $name_img3);
            }

            $addImg = ProductImage::insert([
                ['name' => $name_img1, 'product_id' => $lastid],
                ['name' => $name_img2, 'product_id' => $lastid],
                ['name' => $name_img3, 'product_id' => $lastid]
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

    //add product list
    public function add_product_list()
    {
        $product_type = ProductType::all();

        return view('admin.back.add_product_list', compact('product_type'));
    }

    //post add product list
    public function post_add_product_list(Request $request)
    {
        $sl = count($request->name);
        $content_history = "";
        for ($i = 0; $i < $sl; $i++) {
            $addP = DB::table('product')->insert([
                'type' => $request->type[$i],
                'name' => $request->name[$i],
                'description' => $request->description[$i],
                'price' => $request->price[$i],
                'quantity' => $request->quantity[$i],
            ]);

            $lastid =  DB::getPdo('product')->lastInsertId();

            //Kiểm tra file img1
            // if ($request->hasFile('product_img1')) {
            $img1 = $request->product_img1[$i];

            $name_img1 = "img1_" . date("Y_m_d", time()) . "_" . $lastid . "." . $img1->getClientOriginalExtension();
            $img1->move('images/products/', $name_img1);
            // }
            //Kiểm tra file img2
            // if ($request->hasFile('product_img2')) {
            $img2 = $request->product_img2[$i];

            $name_img2 = "img2_" . date("Y_m_d", time()) . "_" . $lastid . "." . $img2->getClientOriginalExtension();
            $img2->move('images/products/', $name_img2);
            // }
            //Kiểm tra file img3
            // if ($request->hasFile('product_img3')) {
            $img3 = $request->product_img3[$i];

            $name_img3 = "img3_" . date("Y_m_d", time()) . "_" . $lastid . "." . $img3->getClientOriginalExtension();
            $img3->move('images/products/', $name_img3);
            // }

            $addImg = ProductImage::insert([
                ['name' => $name_img1, 'product_id' => $lastid],
                ['name' => $name_img2, 'product_id' => $lastid],
                ['name' => $name_img3, 'product_id' => $lastid]
            ]);

            $content_history .= "● ID sản phẩm: $lastid\n● Tên sản phẩm: " . $request->name[$i] . "\n\n";
        }

        $history = new StaffHistory;
        $history->staff_id = Auth::id();
        $history->title = "Thêm danh sách sản phẩm mới";
        $history->content = "Các sản phẩm vừa thêm:\n" . $content_history;
        $history->save();

        return redirect()->route('admin.product')->with('notify_success', 'Đã thêm danh sách sản phẩm mới thành công!');
    }

    //ajax product detail
    public function product_detail($id)
    {
        $product = DB::table('product as a')
            ->leftJoin('product_type as b', 'a.type', 'b.id')
            ->select('a.*', 'b.name_type')
            ->where('a.id', $id)->first();

        $img = DB::table('product_images')->where('product_id', $id)->get();
        return view('admin.ajax.product_detail', compact('product', 'img'));
    }

    //ajax edit product
    public function edit_product($id)
    {
        $product = Product::where('id', $id)->first();
        $product_type = ProductType::get();
        $img = ProductImage::where('product_id', $id)->get();
        return view('admin.ajax.edit_product', compact('product', 'product_type', 'img'));
    }
    //post edit product
    public function post_edit_product(Request $request, $id)
    {
        $name = $type = $price = $description = $quantity = $image1 = $image2 = $image3 = null;

        $old = Product::find($request->id);

        $history = new StaffHistory;
        $history->staff_id = Auth::id();
        $history->title = "Chỉnh sửa sản phẩm (ID Product: " . $id . ", $old->name)";

        if ($old->name != $request->name) {
            $name = "● Tên: $old->name ➔ $request->name \n";
        }
        if ($old->type != $request->type) {
            $type = "● Loại: "
                . ProductType::whereId($old->type)->first()->name_type .
                "  ➔ "
                . ProductType::whereId($request->type)->first()->name_type . "\n";
        }
        if ($old->price != $request->price) {
            $price = "● Giá: " . number_format($old->price) . " ➔ " . number_format($request->price) . " \n";
        }
        if ($old->quantity != $request->quantity) {
            $quantity = "● Số lượng: $old->quantity ➔ $request->quantity \n";
        }
        if ($old->description != $request->description) {
            $description = "● Mô tả cũ: \n$old->description\n● Mô tả mới:\n$request->description";
        }
        if ($request->hasFile('img1')) {
            $image1 = "● Đã thay đổi ảnh 1\n";
        }
        if ($request->hasFile('img2')) {
            $image2 = "● Đã thay đổi ảnh 2\n";
        }
        if ($request->hasFile('img3')) {
            $image3 = "● Đã thay đổi ảnh 3\n";
        }

        $history->content = $name . $image1 . $image2 . $image3 .  $type . $price . $quantity . $description;

        $history->save();

        $update = Product::find($request->id);
        $update->name = $request->name;
        $update->type = $request->type;
        $update->price = $request->price;
        $update->quantity = $request->quantity;
        $update->description = $request->description;

        if ($update->save()) {

            //Kiểm tra file img1
            if ($request->hasFile('img1')) {
                $img1 = $request->img1;

                $name_img1 = "img1_" . date("Y_m_d", time()) . "_" . $id . "." . $img1->getClientOriginalExtension();
                $img1->move('images/products/', $name_img1);

                //Xoa file hinh trong public/images/products
                $file_img1 = ProductImage::whereId($request->id_img1_old)->first();
                $file_path1 = public_path() . "/images/products/" . $file_img1->name;
                File::delete($file_path1);

                ProductImage::whereId($request->id_img1_old)
                    ->update([
                        'name' => $name_img1,
                    ]);
            }

            //Kiểm tra file img2
            if ($request->hasFile('img2')) {
                $img2 = $request->img2;

                $name_img2 = "img2_" . date("Y_m_d", time()) . "_" . $id . "." . $img2->getClientOriginalExtension();
                $img2->move('images/products/', $name_img2);

                //Xoa file hinh trong public/images/products
                $file_img2 = ProductImage::whereId($request->id_img2_old)->first();
                $file_path2 = public_path() . "/images/products/" . $file_img2->name;
                File::delete($file_path2);

                ProductImage::whereId($request->id_img2_old)
                    ->update([
                        'name' => $name_img2,
                    ]);
            }

            //Kiểm tra file img3
            if ($request->hasFile('img3')) {
                $img3 = $request->img3;

                $name_img3 = "img3_" . date("Y_m_d", time()) . "_" . $id . "." . $img3->getClientOriginalExtension();
                $img3->move('images/products/', $name_img3);

                //Xoa file hinh trong public/images/products
                $file_img3 = ProductImage::whereId($request->id_img3_old)->first();
                $file_path3 = public_path() . "/images/products/" . $file_img3->name;
                File::delete($file_path3);

                ProductImage::whereId($request->id_img3_old)
                    ->update([
                        'name' => $name_img3,
                    ]);
            }

            return redirect('/admin/product')->with('notify_success', 'Thay đổi thông tin sán phẩm thành công!');
        } else {
            return redirect('/admin/product')->with('notify_fail', 'Thay đổi thông tin sản phẩm thất bại');
        }
    }

    //delete product
    public function delete_product($id)
    {

        //Xoa file hinh trong public/images/products
        // $arr_img = DB::table('product_images')->where('product_id', $id)->get();
        // foreach ($arr_img as $k => $v) {
        //     $file_path = public_path() . "/images/products/" . $v->name;

        //     File::delete($file_path);
        // }

        $product = Product::find($id);
        $history = new StaffHistory;
        $history->staff_id = Auth::id();
        $history->title = "Xóa sản phẩm";
        $history->content = "Sản phẩm và các hình ảnh liên quan đã bị xóa\nThông tin sản phẩm đã xóa:\n" .
            "● Tên sản phẩm: $product->name\n" .
            "● Loại sản phẩm: " . ProductType::whereId($product->type)->first()->name_type . "\n" .
            "● Giá sản phẩm: " . number_format($product->price) . "\n" .
            "● Số lượng sản phẩm: $product->quantity\n" .
            "● Mô tả sản phẩm: \n$product->description";
        $history->save();

        $delete = Product::find($id)->delete();

        if ($delete) {
            return redirect('/admin/product')->with('notify_success', 'Xóa sản phẩm thành công');
        } else {
            return redirect('/admin/product')->with('notify_fail', 'Xóa sản phẩm thất bại!!!');
        }
    }

    //delete list product
    public function delete_product_list(Request $request)
    {
        $list_product_id = $request->product_records;

        $content_history = "";

        foreach ($list_product_id as $value) {
            $product = Product::find($value);

            $content_history .= "● ID sản phẩm: $value\n" .
                "● Tên sản phẩm: $product->name\n" .
                "● Loại sản phẩm: " . ProductType::whereId($product->type)->first()->name_type . "\n\n";

            $del  = Product::withTrashed()->find($value)->delete();

            if (!$del) {
                return redirect()->route('admin.product')->with('notify_fail', 'Xóa sản phẩm "' . Product::find($value)->name . '" thất bại');
            }
        }

        $history = new StaffHistory;
        $history->staff_id = Auth::id();
        $history->title = "Xóa danh sách sản phẩm";
        $history->content = "Sản phẩm và các hình ảnh liên quan đã bị xóa\nThông tin danh sách sản phẩm đã xóa:\n" . $content_history;
        $history->save();

        return redirect()->route('admin.product')->with('notify_success', 'Đã xóa các sản phẩm thành công');
    }

    //post restore product
    public function post_restore_product($id)
    {

        $restore  = Product::withTrashed()->find($id)->restore();

        if ($restore) {
            return redirect()->route('admin.product')->with('notify_success', 'Đã khôi phục sản phẩm thành công');
        } else {
            return redirect()->route('admin.product.deletelist')->with('notify_fail', 'Khôi phục sản phẩm thất bại');
        }
    }

    //post restore products list
    public function post_restore_product_list(Request $request)
    {
        $list_product_id = $request->product_records;
        foreach ($list_product_id as $value) {
            $restore  = Product::withTrashed()->find($value)->restore();

            if (!$restore) {
                return redirect()->route('admin.product.deletelist')->with('notify_fail', 'Khôi phục sản phẩm "' . Product::find($value)->name . '" thất bại');
            }
        }

        return redirect()->route('admin.product')->with('notify_success', 'Đã khôi phục các sản phẩm thành công');
    }

    // ===================================PRODUCT TYPE====================================================
    //product_type list
    public function product_type()
    {
        $list = DB::table('product_type')->get();
        return view('admin.back.product_type', compact('list'));
    }
    //add product type (giao dien)
    public function addproduct_type()
    {
        return view('admin.back.addproduct_type');
    }
    //post add product type
    public function postaddproduct_type(Request $request)
    {
        $add = DB::table('product_type')->insert([
            'name_type' => $request->product_type_name
        ]);

        if ($add) {

            $history = new StaffHistory;
            $history->staff_id = Auth::id();
            $history->title = "Thêm loại sản phẩm";
            $history->content = "Đã thêm loại sản phẩm mới: \"$request->product_type_name\"\n";
            $history->save();

            return back()->with('notify_success', 'Thêm loại sản phẩm thành công');
        } else {
            return back()->with('notify_fail', 'Thêm loại sản phẩm thất bại!!!');
        }
    }

    //edit product type
    public function edit_product_type($id)
    {
        $pt = ProductType::where('id', $id)->first();
        return view('admin.ajax.edit_product_type', compact('pt'));
    }

    //post edit product type
    public function post_edit_product_type(Request $request, $id)
    {
        $update = ProductType::find($id);
        $update->name_type = $request->name_type;
        if ($update->save()) {
            return redirect('/admin/product_type')->with('notify_success', 'Đã thay đổi tên từ "' . $request->old_name . '" thành "' . $request->name_type . '" thành công!');
        } else {
            return redirect('/admin/product_type')->with('notify_fail', 'Thay đổi tên loại sản phẩm thất bại');
        }
    }

    //delete product type
    public function delete_addproduct_type($id)
    {
        //Xoa file hinh trong public/images/products
        $arr_product = Product::where('type', $id)->get();
        foreach ($arr_product as $value) {
            $arr_img = ProductImage::where('product_id', $value->id)->get();
            foreach ($arr_img as $v) {
                $file_path = public_path() . "/images/products/" . $v->name;

                File::delete($file_path);
            }
        }

        $del = DB::table('product_type')->where('id', $id)->delete();

        if ($del) {
            return back()->with('notify_success', 'Xóa loại sản phẩm thành công');
        } else {
            return back()->with('notify_fail', 'Xóa loại sản phẩm thất bại!!!');
        }
    }


    // =====================================PROMOTION==================================================
    //promotion
    public function promotion()
    {
        $list = Promotion::all();
        return view('admin.back.promotion', compact('list'));
    }

    //post add promotion
    public function post_add_promotion(Request $request)
    {
        if ($request->start_date >= $request->end_date) {
            return redirect()->route('admin.promotion')->with('notify_fail', 'Thời gian khuyến mãi không hợp lệ, ngày bắt đầu phải nhỏ hơn ngày kết thúc!');
        }

        $check = Promotion::where('code', $request->code)->get();

        if (count($check) > 0) {
            return redirect()->route('admin.promotion')->with('notify_fail', 'Mã khuyễn mãi đã tồn tại!');
        }

        $add = Promotion::create($request->all());
        $add->code = strtoupper($request->code);

        if ($add->save()) {

            $history = new StaffHistory;
            $history->staff_id = Auth::id();
            $history->title = "Thêm mã khuyến mãi";
            $history->content = "Đã thêm mã khuyến mãi mới: \"$request->code\"\n";
            $history->save();

            return redirect()->route('admin.promotion')->with('notify_success', 'Đã thêm mã khuyến mãi mới');
        } else {
            return redirect()->route('admin.promotion')->with('notify_fail', 'Thêm mã khuyến mãi thất bại');
        }
    }

    //delete promotion
    public function delete_promotion($id)
    {

        $promotion = Promotion::find($id);

        $history = new StaffHistory;
        $history->staff_id = Auth::id();
        $history->title = "Xóa mã khuyến mãi";
        $history->content = "Thông tin mã khuyến mãi đã xóa:\n" .
            "● Mã khuyến mãi: $promotion->code\n" .
            "● Giá trị: $promotion->percent%\n" .
            "● Ngày bắt đầu: " . date('d/m/Y', strtotime($promotion->start_date)) . "\n" .
            "● Ngày kết thúc: " . date('d/m/Y', strtotime($promotion->end_date)) . "";
        $history->save();

        if (Promotion::find($id)->delete()) {
            return redirect()->route('admin.promotion')->with('notify_success', 'Xóa mã khuyến mãi thành công');
        } else {
            return redirect()->route('admin.promotion')->with('notify_fail', 'Xóa mã khuyến mãi thất bại!!!');
        }
    }

    // ================================STATISTICAL (Thống kê)===========================================
    //statistical
    public function statistical()
    {
        $order = Order::all();
        $order_detail = OrderDetail::all();
        $order_detail_groupby = OrderDetail::groupby('product_id')
            ->selectRaw('product_id, sum(quantity) as quantity')
            ->orderBy('quantity', 'DESC')
            ->take(5)
            ->get();

        return view('admin.back.statistical', compact('order', 'order_detail', 'order_detail_groupby'));
    }

    //subtmit statistical
    public function submit_statistical(Request $request)
    {
        $start = $request->start_date;
        $end = $request->end_date;

        $order = Order::whereBetween('created_at', [$start, $end])->get();
        $order_detail = OrderDetail::whereBetween('created_at', [$start, $end])->get();
        $order_detail_groupby = OrderDetail::groupby('product_id')
            ->selectRaw('product_id, sum(quantity) as quantity')
            ->orderBy('quantity', 'DESC')
            ->take(5)
            ->get();

        $product_buy = OrderDetail::groupby('product_id')
            ->whereBetween('created_at', [$start, $end])
            ->selectRaw('product_id, sum(quantity) as quantity')
            ->get();

        return view(
            'admin.back.statistical',
            compact('order', 'order_detail', 'start', 'end', 'order_detail_groupby')
        );
    }

    // ======================================STAFF======================================================
    //staff list
    public function staff()
    {
        $staff = User::where('role', '<', 3)->where('role', '<>', 1)->get();
        return view('admin.back.staff', compact('staff'));
    }

    //Form thêm tài khoản nhân viên
    public function addstaff()
    {
        return view('admin.back.add_staff');
    }

    //post add staff
    public function postaddstaff(Request $request)
    {
        $checkTK = DB::table('users')
            ->where('phone', $request->phone)
            ->orWhere('email', $request->email)
            ->get();

        if (count($checkTK) > 0) {
            return back()->with('notify_fail', 'Sđt hoặc email đã tồn tại!');
        }

        if ($request->password != $request->repass) {
            return back()->with('notify_fail', 'Mật khẩu xác nhận không chính xác');
        }

        $createTK = DB::table('users')->insert([
            'fullname' => $request->fullname,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'password' => bcrypt($request->password),
            'role' => 2,
        ]);

        if ($createTK) {
            return back()->with('notify_success', 'Tạo tài khoản thành công!!!');
        } else {
            return back()->with('notify_fail', 'Lỗi tạo tài khoản không thành công!!!');
        }
    }

    //delete staff
    public function delete_staff($id)
    {
        $del = User::withTrashed()->find($id);

        if ($del->delete()) {
            return back()->with('notify_success', 'Xóa nhân viên "' . $del->fullname . '" thành công!!!');
        } else {
            return back()->with('notify_fail', 'Xóa nhân viên "' . $del->fullname . '" thất bại!!!');
        }
    }

    //edit staff
    public function edit_staff(Request $request)
    {
        $update = User::find($request->id);
        $update->email = $request->email;
        $update->phone = $request->phone;

        if (isset($request->new_pass) && $request->new_pass != null) {
            $update->new_pass = bcrypt($request->new_pass);
        }

        if ($update->save()) {
            return back()->with('notify_success', 'Thay đổi thông tin nhân viên thành công');
        } else {
            return back()->with('notify_fail', 'Thay đổi thông tin nhân viên thất bại!!!');
        }
    }

    // ====================================ORDER==================================================
    //status:
    //Chưa xác nhận
    //Đang giao hàng
    //Đã hoàn thành
    //Thất bại

    //order
    public function order()
    {
        $order = Order::leftjoin('users as b', 'user_id', 'b.id')
            ->leftjoin('users as c', 'admin_id', 'c.id')
            ->select('order.*', 'b.fullname as user_fullname', 'c.fullname as admin_fullname')
            ->get();
        return view('admin.back.order', compact('order'));
    }

    //order detail
    public function order_detail($id)
    {
        $order = Order::leftjoin('promotion as a', 'promotion_id', 'a.id')
            ->select('order.*', 'a.percent')
            ->where('order.id', $id)->first();

        $order_detail = OrderDetail::leftjoin('product as b', 'order_detail.product_id', 'b.id')
            ->select('order_detail.*', 'b.name', 'b.description', 'b.price')
            ->where('order_detail.order_id', $id)
            ->get();
        // return $order_detail;

        $user = User::whereId($order->user_id)->first();

        $staff = User::whereId($order->admin_id)->first();

        return view('admin.back.order_detail', compact('order', 'order_detail', 'user', 'staff'));
    }

    //order action
    public function order_action(Request $request)
    {
        $list_id = $request->order_records;
        $content_history = "";

        //Xác nhận đơn hàng
        if (isset($request->submit_confirm)) {
            foreach ($list_id as $c) {
                if (Order::find($c)->status != "Chưa xác nhận") {
                    return redirect()->route('admin.order')->with('notify_fail', 'Hành động không hợp lí, có đơn hàng đã xác nhận. Xin kiểm tra lại!!!');
                }
            }

            foreach ($list_id as $v) {
                $update = Order::find($v);

                $content_history = "● ID đơn hàng: $v\n" .
                    "● Trạng thái đơn hàng: \"$update->status\" ➔ \"Đang giao hàng\" \n\n";

                $update->status = "Đang giao hàng";
                $update->admin_id = Auth::id();
                $update->delivery_date = date('Y-m-d');
                $update->save();
            }
        }

        //Đơn hàng hoàn thành
        if (isset($request->submit_done)) {

            foreach ($list_id as $c) {
                if (Order::find($c)->status != "Đang giao hàng") {
                    return redirect()->route('admin.order')->with('notify_fail', 'Hành động không hợp lí. Xin kiểm tra lại!!!');
                }
                if (Auth::id() != Order::find($c)->admin_id && Order::find($c)->admin_id != null) {
                    return redirect()->route('admin.order')->with('notify_fail', 'Bạn không phải người đã duyệt đơn hàng này.');
                }
            }


            foreach ($list_id as $v) {
                $update = Order::find($v);

                $content_history = "● ID đơn hàng: $v\n" .
                    "● Trạng thái đơn hàng: \"$update->status\" ➔ \"Đã hoàn thành\" \n\n";

                $update->status = "Đã hoàn thành";
                $update->receiving_date = date('Y-m-d');
                $update->save();
            }
        }

        //Đơn hàng thất bại
        if (isset($request->submit_fail)) {

            foreach ($list_id as $c) {
                if (Order::find($c)->status != "Đang giao hàng") {
                    return redirect()->route('admin.order')->with('notify_fail', 'Hành động không hợp lí. Xin kiểm tra lại!!!');
                }
                if (Auth::id() != Order::find($c)->admin_id && Order::find($c)->admin_id != null) {
                    return redirect()->route('admin.order')->with('notify_fail', 'Bạn không phải người đã duyệt đơn hàng này.');
                }
            }


            foreach ($list_id as $v) {
                $update = Order::find($v);

                $content_history = "● ID đơn hàng: $v\n" .
                    "● Trạng thái đơn hàng: \"$update->status\" ➔ \"Thất bại\" \n\n";

                $update->status = "Thất bại";
                $update->save();
            }
        }

        $history = new StaffHistory;
        $history->staff_id = Auth::id();
        $history->title = "Cập nhật trạng thái đơn hàng";
        $history->content = "Trang thái đơn hàng đã được cập nhật:\n" . $content_history;
        $history->save();

        return redirect()->route('admin.order')->with('notify_success', 'Cập nhật trạng thái đơn hàng thành công');
    }

    // ====================================PROFILE==================================================
    //profile
    public function profile($id)
    {
        $info = User::whereId($id)->first();
        $history = StaffHistory::where('staff_id', $id)->get();
        $order = Order::leftjoin('users', 'admin_id', 'users.id')
            ->select('*', 'users.fullname')
            ->where('admin_id', $id)
            ->get();
        return view('admin.back.profile', compact('info', 'history', 'order'));
    }

    //Edit profile
    public function post_edit_profile(Request $request)
    {
        $update = User::find($request->id);
        $update->fullname = $request->fullname;
        $update->gender = $request->gender;
        $update->address = $request->address;
        $update->birthday = $request->birthday;

        if ($request->hasFile('avatar')) {
            $img = $request->avatar;

            $name_img = "avatar_" . date("Y_m_d", time()) . "_$request->id." . $img->getClientOriginalExtension();
            $img->move('images/avatar/', $name_img);

            $update->avatar = $name_img;
        }

        if ($update->save()) {
            return redirect('/admin/profile/' . Auth::id())->with('notify_success', 'Cập nhật thông tin cá nhân thành công!');
        } else {
            return redirect('/admin/profile/' . Auth::id())->with('notify_fail', 'Cập nhật thông tin cá nhân thất bại!');
        }
    }
}
