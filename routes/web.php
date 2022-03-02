<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ======================= Cient ====================================================
Route::get('/', function () {
    return redirect('/home');
});

Route::group(['prefix' => '/home'], function () {

    //Menu Client
    Route::get('/', function () {
        return view('client.home.home');
    });
    Route::get('/shop', function () {
        return view('client.back.shop');
    });
    Route::get('/payment', function () {
        return view('client.back.payment');
    });
    Route::get('/blog', function () {
        return view('client.back.blog');
    });
    Route::get('/about', function () {
        return view('client.back.about');
    });
    Route::get('/contact', function () {
        return view('client.back.contact');
    });

});

// ======================= Admin ====================================================

Route::group(['prefix' => '/admin'], function (){

    Route::get('/', function () {
        return view('admin.home.home');
    });
    Route::get('/login', function () {
        return view('admin.auth.login');
    });
    Route::get('/product', function () {
        return view('admin.back.product');
    });
    Route::get('/product_type', function () {
        return view('admin.back.product_type');
    });
    Route::get('/staff', function () {
        return view('admin.back.staff');
    });
    Route::get('/order', function () {
        return view('admin.back.order');
    });
    Route::get('/promotion', function () {
        return view('admin.back.promotion');
    });
    Route::get('/statistic', function () {
        return view('admin.back.statistic');
    });
});
