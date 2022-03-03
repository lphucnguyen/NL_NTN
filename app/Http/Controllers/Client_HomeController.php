<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Client_HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('client');
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
}
