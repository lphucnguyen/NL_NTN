<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_AuthController;
use App\Http\Controllers\Admin_HomeController;
use App\Http\Controllers\Client_HomeController;
use App\Http\Middleware\CheckAuthAdmin;
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

Route::get('/', function () {
    return redirect('/home');
});

// ======================= Cient ====================================================

Route::group(['prefix' => '/home'], function () {

    //Menu Client
    Route::get('/', [Client_HomeController::class, 'home']);
    Route::get('/shop', [Client_HomeController::class, 'shop']);
    Route::get('/payment', [Client_HomeController::class, 'payment']);
    Route::get('/about', [Client_HomeController::class, 'about']);
    Route::get('/contact', [Client_HomeController::class, 'contact']);

});

// ======================= Admin ====================================================

Route::group(['prefix' => '/admin'], function (){
    //Admin_AuthContrller
    Route::get('/login', [Admin_AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [Admin_AuthController::class, 'postLogin']);
    
    //Admin_HomeController
    Route::get('/logout', [Admin_HomeController::class, 'logout']);
    
    Route::get('', [Admin_HomeController::class, 'home'])->name('admin');

    Route::get('/product', [Admin_HomeController::class, 'product']);
    Route::get('/addproduct', [Admin_HomeController::class, 'addproduct']);

    Route::get('/promotion', [Admin_HomeController::class, 'promotion']);

    Route::get('/staff', [Admin_HomeController::class, 'staff']);
    Route::get('/addstaff', [Admin_HomeController::class, 'addstaff']);
    Route::post('/addstaff', [Admin_HomeController::class, 'postaddstaff']);

    Route::get('/order', [Admin_HomeController::class, 'order']);
    Route::get('/profile/{id}', [Admin_HomeController::class, 'profile']);

    Route::get('/statistical', [Admin_HomeController::class, 'statistical']);

    Route::get('/product_type', [Admin_HomeController::class, 'product_type']);
});
