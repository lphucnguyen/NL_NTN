<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;

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

// Route::get('/admin/login',[App\Http\Controllers\Admin\LoginController::class, 'getLogin'])->name('admin.login');
// Route::post('/admin/login',[App\Http\Controllers\Admin\LoginController::class, 'postLogin']);
// Route::get('/admin',[App\Http\Controllers\Admin\HomeController::class, 'home']);

Route::get('/', function () {
    return redirect('/home');
});

// ======================= HomeController ====================================================

Route::group(['prefix' => '/home'], function () {

    //Menu Client
    Route::get('/', [HomeController::class, 'home']);
    Route::get('/shop', [HomeController::class, 'shop']);
    Route::get('/payment', [HomeController::class, 'payment']);
    Route::get('/about', [HomeController::class, 'about']);
    Route::get('/contact', [HomeController::class, 'contact']);
    Route::get('/product_detail/{id}', [HomeController::class, 'product_detail']);

    Route::get('/login', [HomeController::class, 'login']);
    Route::post('/submitLogin', [HomeController::class, 'submitLogin'])->name('submitLogin');

    Route::get('/register', [HomeController::class, 'register']);
    Route::post('/submitRegister', [HomeController::class, 'submitRegister'])->name('submitRegister');

    Route::get('/logout', [HomeController::class, 'logout'])->middleware('UserClient');
    Route::get('/checkout', [HomeController::class, 'checkout'])->middleware('UserClient');
    Route::get('/profile', [HomeController::class, 'profile'])->middleware('UserClient');
});
