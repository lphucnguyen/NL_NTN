<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    // public $products;

    public function __construct()
    {
        // $this->middleware('client');
    }

    //home
    public function home()
    {
        return view('client.home.home');
    }

    //shop
    public function shop(){
        return view('client.back.shop');
    }

    //payment
    public function payment(){
        return view('client.back.payment');
    }

    //about
    public function about(){
        return view('client.back.about');
    }

    //contact
    public function contact(){
        return view('client.back.contact');
    }

    //checkout
    public function checkout(){
        $products = Cart::getContent();
        $total = Cart::getTotal();

        return view('client.back.checkout', compact('products', 'total'));
    }

    //product_detail
    public function product_detail($id){

        $product = Product::findOrFail($id);
        $type = $product->type;
        $images = $product->images;

        $productsRelated = Product::query()
                            ->where('type', '=', $type)
                            ->take(8)
                            ->get();
        
        $totalReviews = count($product->evaluates);

        return view('client.back.product_detail', compact(
            'product',
            'productsRelated',
            'images',
            'totalReviews'
        ));
    }

    public function login() {
        if(Auth::user()){
            return redirect('/home');
        }
        return view('client.back.login');
    }

    public function submitLogin(Request $request) {
        $request->validate([
            'email' => 'required|min:2',
            'password' => 'required|min:8'
        ],
        [
            'email.required' => 'Bạn chưa nhập email',
            'email.min' => 'Email ít nhất 2 kí tự',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 8 kí tự'
        ]);

        $isLogin = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if($isLogin){
            return redirect('/home/profile');
        }else{
            return redirect()->back()->withErrors([
                'Tài khoản hoặc mật khẩu không đúng'
            ]);
        }
    }

    public function register() {
        if(Auth::user()){
            return redirect('/home');
        }
        return view('client.back.register');
    }


    public function submitRegister(Request $request) {
        $request->validate([
            'email' => 'required|min:2',
            'fullname' => 'required|min:2:max:255',
            'password' => 'required|confirmed|min:8|max:255',
            'address' => 'required|min:8|max:255',
            'phone' => 'required|min:10'
        ],
        [
            'email.required' => 'Bạn chưa nhập email',
            'email.min' => 'Email ít nhất 2 kí tự',

            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 8 kí tự',
            'password.max' => 'Mật khẩu nhiều nhất 255 kí tự',
            'password.confirmed' => 'Mật khẩu không chính xác',

            'fullname.required' => 'Bạn chưa nhập họ tên',
            'fullname.min' => 'Họ tên ít nhất 2 kí tự',
            'fullname.max' => 'Họ tên nhiều nất 255 kí tự',

            'address.required' => 'Bạn chưa nhập địa chỉ',
            'address.min' => 'Địa chỉ ít nất 8 kí tự',
            'address.max' => 'Địa chỉ nhiều nất 255 kí tự',

            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.min' => 'Điện thoại ít nhất 10 kí tự',
        ]);

        $registeredUser = User::query()
                                ->where('email', $request->email)
                                ->orWhere('phone' , $request->phone)
                                ->get();

        if(count($registeredUser) == 0){
            // dd($request->fullname);
            User::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'address' => $request->address,
                'password' => Hash::make($request->password),
                'role' => 3,
                'phone' => $request->phone,
                'gender' => $request->gender
            ]);
            return redirect('/home/login')->with('success', 'Đăng kí thành công');
        }else{
            return redirect()->back()->withErrors([
                'Email hoặc số điện thoại đã tồn tại'
            ]);
        }
    }

    public function logout() {
        if(Auth::check()){
            Auth::logout();

            return redirect('/home');
        }
    }

    public function profile() {
        if(!Auth::check()){
            return redirect('/home/login');
        }

        return view('client.back.profile');
    }
}
