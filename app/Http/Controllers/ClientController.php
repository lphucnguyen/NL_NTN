<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function shop(){
        return view('client.back.shop');
    }
}
