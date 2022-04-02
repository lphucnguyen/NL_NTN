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
Route::get('/product', [HomeController::class, 'product'])->name('admin.product');
Route::post('/addproduct', [HomeController::class, 'post_add_product'])->name('admin.product.add');
Route::get('/addproduct/list', [HomeController::class, 'add_product_list'])->name('admin.product.addlist');
Route::post('/addproduct/list', [HomeController::class, 'post_add_product_list']);
Route::post('/product/pd/{id}', [HomeController::class, 'product_detail']);
Route::get('/product_delete', [HomeController::class, 'product_delete_list'])->name('admin.product.deletelist')->middleware('UserAdmin');
Route::get('/product/delete/{id}', [HomeController::class, 'delete_product']);
Route::post('/product/delete/list', [HomeController::class, 'delete_product_list'])->name('admin.product.deletes');
Route::get('/product/edit/{id}', [HomeController::class, 'edit_product']);
Route::post('/product/edit/{id}', [HomeController::class, 'post_edit_product']);
Route::get('/product/restore/{id}', [HomeController::class, 'post_restore_product']);
Route::post('/product/restore/list', [HomeController::class, 'post_restore_product_list'])->name('admin.product.restorelist');

//promotion
Route::get('/promotion', [HomeController::class, 'promotion'])->name('admin.promotion');
Route::post('/promotion/add', [HomeController::class, 'post_add_promotion'])->name('admin.promotion.add');
Route::get('/promotion/del/{id}', [HomeController::class, 'delete_promotion']);

//staff
Route::get('/staff', [HomeController::class, 'staff'])->name('admin.staff');
Route::get('/addstaff', [HomeController::class, 'addstaff'])->middleware('UserAdmin');
Route::post('/addstaff', [HomeController::class, 'postaddstaff'])->middleware('UserAdmin');
Route::get('/staff/del/{id}', [HomeController::class, 'delete_staff'])->middleware('UserAdmin');
Route::post('/staff/edit', [HomeController::class, 'edit_staff'])->name('admin.staff.edit')->middleware('UserAdmin');

//order
Route::get('/order', [HomeController::class, 'order'])->name('admin.order');
Route::get('/order/detail/{id}', [HomeController::class, 'order_detail']);
Route::post('/order/action/list', [HomeController::class, 'order_action'])->name('admin.order.actionlist');

//profile
Route::get('/profile/{id}', [HomeController::class, 'profile'])->name('admin.profile');
Route::post('/profile/edit', [HomeController::class, 'post_edit_profile'])->name('admin.profile.edit');

//statistical
Route::get('/statistical', [HomeController::class, 'statistical'])->name('admin.statistical');
Route::post('/statistical', [HomeController::class, 'submit_statistical']);

//product_type
Route::get('/product_type', [HomeController::class, 'product_type']);
Route::post('/addproduct_type', [HomeController::class, 'postaddproduct_type'])->name('admin.product_type.add');
Route::get('/product_type/del/{id_PT}', [HomeController::class, 'delete_addproduct_type']);
Route::get('/product_type/edit/{id_PT}', [HomeController::class, 'edit_product_type']);
Route::post('/product_type/edit/{id_PT}', [HomeController::class, 'post_edit_product_type']);


