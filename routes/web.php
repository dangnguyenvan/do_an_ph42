<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Seller\OrderController as SellerOrderController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/show_product_by_category/{id}', [HomeController::class, 'show'])->name('show');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::get('/list', [ProductController::class, 'index'])->name('list');
    Route::get('/detail/{id}', [ProductController::class, 'show'])->name('show');

});
Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
    Route::get('/', [CartController::class, 'getCartInfo'])->name('cart-info'); 
    Route::post('cart/{id}', [CartController::class, 'addCart'])->name('add-cart');
    Route::get('remove_cart/{id}',[CartController::class,'removeCart'])->name('remove_cart');

    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('checkout-complete', [CartController::class, 'checkoutComplete'])->name('checkout-complete');
    Route::get('/update-cart/{id}',[CartController::class,'updateCart'])->name('update_cart');
});
//Route::get('/view-checkout-status/{id}/{email}',[CartController::class,'checkout_status'])->name('checkout_status');
//Route::post('/product/{test_id/}test/{custom_id}', 'ProductController@update')->name('product.test');
Route::get('/order-info/{order_id}/email/{email}',[OrderController::class,'orderInfo'])->name('order_info');
Route::get('/order-cancel/{id}',[OrderController::class,'orderCancel'])->name('order_cancel');
Route::get('/my-order/user-id/{id}',[OrderController::class,'myOrder'])->middleware(['auth'])->name('my_order');
Route::get('/order-detail/{order_id}',[OrderController::class,'orderDetail'])->middleware(['auth'])->name('order_detail');
Route::get('/my-account',[AccountController::class,'viewAccount'])->middleware(['auth'])->name('view_account');
Route::get('/edit-account',[AccountController::class,'editAccount'])->middleware(['auth'])->name('edit_account');
Route::put('/update-account/{id}',[AccountController::class,'updateAccount'])->middleware(['auth'])->name('update_account');
Route::get('/change-password',[AccountController::class,'changePassword'])->middleware(['auth'])->name('change_password');
Route::put('/update-passowrd/{id}',[AccountController::class,'updatePassword'])->middleware(['auth'])->name('update_password');
Route::get('/search-status',[OrderController::class,'searchByStatus'])->middleware(['auth'])->name('search_by_status');
Route::get('/search-date',[OrderController::class,'searchByDate'])->middleware(['auth'])->name('search_by_date');
Route::get('/search-code',[OrderController::class,'searchByCode'])->middleware(['auth'])->name('search_by_code');



Route::get('/dashboard', function () {
    return view('dashboards.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['check_login_seller'] ,'prefix' => 'seller', 'as' => 'seller.'], function () {

    // route for module Category
	// Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    //     Route::get('/list', [CategoryController::class, 'index'])->name('index');
    //     Route::get('/create', [CategoryController::class, 'create'])->name('create');
    //     Route::post('/store', [CategoryController::class, 'store'])->name('store');
    //     Route::get('/show/{id}', [CategoryController::class, 'show'])->name('show');
    //     Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    //     Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
    //     Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    // });

    // route for module Post
	

    // route for module Product
    // Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    //     Route::get('/list', [ProductController::class, 'index'])->name('index');
    //     Route::get('/create', [ProductController::class, 'create'])->name('create');
    //     Route::post('/store', [ProductController::class, 'store'])->name('store');
    //     Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');
    //     Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    //     Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
    //     Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
    // });

    // route for module Order
    Route::group(['prefix' => 'order-customer', 'as' => 'order-customer.'], function () {
        Route::get('/list', [SellerOrderController::class, 'listOrderCustomer'])->name('list_order');
        Route::get('/detail/{id}', [SellerOrderController::class, 'OrderDetailCustomer'])->name('order_detail');
        Route::put('/update-status/{id}', [SellerOrderController::class, 'updateOrderStatusCustomer'])->name('update_status_order');
        Route::get('/search-status', [SellerOrderController::class, 'searchByStatusCustomer'])->name('search_by_status');
        Route::get('/search-date', [SellerOrderController::class, 'searchByDateCustomer'])->name('search_by_date');
        Route::get('/search-code', [SellerOrderController::class, 'searchByCodeCustomer'])->name('search_by_code');
    });
    Route::group(['prefix' => 'order-guest', 'as' => 'order-guest.'], function () {
        Route::get('/list', [SellerOrderController::class, 'listOrderGuest'])->name('list_order');
        Route::get('/detail/{id}', [SellerOrderController::class, 'OrderDetailGuest'])->name('order_detail');
        Route::put('/update-status/{id}', [SellerOrderController::class, 'updateOrderStatusGuest'])->name('update_status_order');
        Route::get('/search-status', [SellerOrderController::class, 'searchByStatusGuest'])->name('search_by_status');
        Route::get('/search-date', [SellerOrderController::class, 'searchByDateGuest'])->name('search_by_date');
        Route::get('/search-code', [SellerOrderController::class, 'searchByCodeGuest'])->name('search_by_code');
        // Route::delete('/delete/{id}', [SellerOrderController::class, 'destroy'])->name('destroy');
        // Route::get('/edit/{id}', [SellerOrderController::class, 'edit'])->name('edit');
    });

    

    // route for module Promotion
    // Route::group(['prefix' => 'promotion', 'as' => 'promotion.'], function () {
    //     Route::get('/list', [PromotionController::class, 'index'])->name('index');
    //     Route::get('/create', [PromotionController::class, 'create'])->name('create');
    //     Route::post('/store', [PromotionController::class, 'store'])->name('store');
    //     Route::get('/show/{id}', [PromotionController::class, 'show'])->name('show');
    //     Route::get('/edit/{id}', [PromotionController::class, 'edit'])->name('edit');
    //     Route::put('//update/{id}', [PromotionController::class, 'update'])->name('update');
    //     Route::delete('/delete/{id}', [PromotionController::class, 'destroy'])->name('destroy');
    // });

});
Route::group(['middleware' => ['check_login_admin'] ,'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/list', [AdminUserController::class, 'listUser'])->name('list_user');
            Route::put('/update-status/{id}', [AdminUserController::class, 'updateStatusUser'])->name('update_status_user');
            Route::get('/edit/{id}', [AdminUserController::class, 'editUser'])->name('edit_user');
            Route::put('/update-role/{id}', [AdminUserController::class, 'updateRole'])->name('update_role');
        });
});


//verify email
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//      return redirect('/');
// })->middleware(['auth', 'signed'])->name('verification.verify');
// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');