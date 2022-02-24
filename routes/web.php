<?php

use Illuminate\Support\Facades\Route;

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
        return view('client_template.home.home');
    });
    Route::get('/shop', function () {
        return view('client_template.back.shop');
    });
    Route::get('/payment', function () {
        return view('client_template.back.payment');
    });
    Route::get('/blog', function () {
        return view('client_template.back.blog');
    });
    Route::get('/about', function () {
        return view('client_template.back.about');
    });
    Route::get('/contact', function () {
        return view('client_template.back.contact');
    });
    Route::get('/hoaithuongmacnie', function () {
        return view('client_template.back.contact');
    });

});

// ======================= Admin ====================================================


Route::group(['prefix' => '/admin'], function (){

    Route::get('/', function () {
        return view('admin_template.home.home');
    });
    Route::get('/login', function () {
        return view('admin_template.auth.login');
    });

});
