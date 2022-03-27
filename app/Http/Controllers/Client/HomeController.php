<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

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
        return view('client.back.login');
    }

    public function register() {
        return view('client.back.register');
    }
}
