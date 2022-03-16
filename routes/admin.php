<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;

// ======================= LoginController ====================================================

//Login
Route::get('/login', [LoginController::class, 'getLogin'])->name('admin.login');
Route::post('/login', [LoginController::class, 'postLogin']);


// ======================= HomeController ====================================================

Route::get('', [HomeController::class, 'home'])->name('admin.home');

//Logout
Route::get('/logout', [HomeController::class, 'logout']);

//Product
Route::get('/product', [HomeController::class, 'product']);
Route::get('/addproduct', [HomeController::class, 'addproduct']);
Route::post('/addproduct', [HomeController::class, 'postaddproduct']);
Route::post('/product/pd/{id}', [HomeController::class, 'product_detail']);
Route::get('/product/delete/{id}', [HomeController::class, 'delete_product']);
Route::get('/product/edit/{id}', [HomeController::class, 'edit_product']);
Route::post('/product/edit/{id}', [HomeController::class, 'post_edit_product']);

//promotion
Route::get('/promotion', [HomeController::class, 'promotion']);

//staff
Route::get('/staff', [HomeController::class, 'staff']);
Route::get('/addstaff', [HomeController::class, 'addstaff']);
Route::post('/addstaff', [HomeController::class, 'postaddstaff']);

//order
Route::get('/order', [HomeController::class, 'order']);

//profile
Route::get('/profile/{id}', [HomeController::class, 'profile']);

//statistical
Route::get('/statistical', [HomeController::class, 'statistical']);

//product_type
Route::get('/product_type', [HomeController::class, 'product_type']);
Route::get('/addproduct_type', [HomeController::class, 'addproduct_type']);
Route::post('/addproduct_type', [HomeController::class, 'postaddproduct_type']);
Route::get('/product_type/del/{id_PT}', [HomeController::class, 'delete_addproduct_type']);
Route::get('/product_type/edit/{id_PT}', [HomeController::class, 'edit_product_type']);
Route::post('/product_type/edit/{id_PT}', [HomeController::class, 'post_edit_product_type']);


