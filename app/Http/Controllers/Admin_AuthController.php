<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_AuthController extends Controller
{
    //
    public function login(Request $request){
        echo $request->username;
        echo "<br>";
        echo $request->password;
    }
}
