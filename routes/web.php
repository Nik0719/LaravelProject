<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeBannerController;
use App\Http\Controllers\Front\FrontController;

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


// admin routes

Route::group(['middleware'=>'admin_auth'],function(){

    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/category/manage_category', [CategoryController::class, 'manage_category']);
    Route::get('admin/category/manage_category/{id}', [CategoryController::class, 'manage_category']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);
    Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.manage_category_process');

    Route::get('admin/size', [SizeController::class, 'index']);
    Route::get('admin/size/manage_size', [SizeController::class, 'manage_size']);
    Route::get('admin/size/manage_size/{id}', [SizeController::class, 'manage_size']);
    Route::get('admin/size/delete/{id}', [SizeController::class, 'delete']);
    Route::get('admin/size/status/{status}/{id}', [SizeController::class, 'status']);
    Route::post('admin/size/manage_size_process', [SizeController::class, 'manage_size_process'])->name('size.manage_size_process');

    Route::get('admin/tax', [TaxController::class, 'index']);
    Route::get('admin/tax/manage_tax', [TaxController::class, 'manage_tax']);
    Route::get('admin/tax/manage_tax/{id}', [TaxController::class, 'manage_tax']);
    Route::get('admin/tax/delete/{id}', [TaxController::class, 'delete']);
    Route::get('admin/tax/status/{status}/{id}', [TaxController::class, 'status']);
    Route::post('admin/tax/manage_tax_process', [TaxController::class, 'manage_tax_process'])->name('tax.manage_tax_process');

    Route::get('admin/home_banner', [HomeBannerController::class, 'index']);
    Route::get('admin/home_banner/manage_home_banner', [HomeBannerController::class, 'manage_home_banner']);
    Route::get('admin/home_banner/manage_home_banner/{id}', [HomeBannerController::class, 'manage_home_banner']);
    Route::get('admin/home_banner/delete/{id}', [HomeBannerController::class, 'delete']);
    Route::get('admin/home_banner/status/{status}/{id}', [HomeBannerController::class, 'status']);
    Route::post('admin/home_banner/manage_home_banner_process', [HomeBannerController::class, 'manage_home_banner_process'])->name('home_banner.manage_home_banner_process');


    Route::get('admin/coupon', [CouponController::class, 'index']);
    Route::get('admin/coupon/manage_coupon', [CouponController::class, 'manage_coupon']);
    Route::get('admin/coupon/manage_coupon/{id}', [CouponController::class, 'manage_coupon']);
    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete']);
    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);
    Route::post('admin/coupon/manage_coupon_process', [CouponController::class, 'manage_coupon_process'])->name('coupon.manage_coupon_process');

    Route::get('admin/customer', [CustomerController::class, 'index']);
    Route::get('admin/customer/show_customer/{id}', [CustomerController::class, 'show']);
    Route::get('admin/customer/status/{status}/{id}', [CustomerController::class, 'status']);


    Route::get('admin/product', [ProductController::class, 'index']);
    Route::get('admin/product/manage_product', [ProductController::class, 'manage_product']);
    Route::get('admin/product/manage_product/{id}', [ProductController::class, 'manage_product']);
    Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);
    Route::get('admin/product/status/{status}/{id}', [ProductController::class, 'status']);
    Route::get('admin/product/product_attr_delete/{paid}/{pid}',[ProductController::class,'product_attr_delete']);
    Route::get('admin/product/product_images_delete/{paid}/{pid}',[ProductController::class,'product_images_delete']);
    Route::post('admin/product/manage_product_process', [ProductController::class, 'manage_product_process'])->name('product.manage_product_process');


    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('admin/logout', function () {
        Session()->forget('ADMIN_LOGIN');
        Session()->forget('ADMIN_ID');
        return redirect('admin');
    });
});

Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');


// end of admin routes

Route::get('/', function () {
    return view('index');
});

Route::get('/logout', function () {
    Session()->forget('user');
    return redirect('/login');
});

Route::get('/', [FrontController::class, 'index']);

Route::resource('product','FrontController');

Route::get('product/{slug}', 'FrontController@product_detail')->name('product.product_detail');


Route::get('/contact-us', function () {
    return view('contact_us');
});

Route::get('/about-us', function () {
    return view('about');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/wishlist', function () {
    return view('wishlist');
});

Route::get('/shop', function () {
    return view('shop');
});

//   Route::get('product', function () {
//        return view('product');
//    });

Route::get('/my-account', function () {
    return view('my_account');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login']);

Route::get('/register', function () {
    return view('register');
});

Route::get('/404', function () {
    return view('404');
});
