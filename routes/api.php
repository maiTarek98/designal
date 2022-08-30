<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Controllers\Api\CountrysController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\CouponsController;

Route::get('/get_countrys', [CountrysController::class, 'get_countrys']);
Route::get('/common_questions', [HomeController::class, 'common_questions']);
Route::get('/privacy_policys', [HomeController::class, 'privacy_policys']);
Route::get('/term_conditions', [HomeController::class, 'term_conditions']);
Route::get('/settings', [HomeController::class, 'settings']);
Route::get('/all_categorys', [HomeController::class, 'all_categorys']);

Route::get('/subject', [HomeController::class, 'subject']);

Route::post('/register', [UsersController::class, 'register']);
Route::post('/login', [UsersController::class, 'login'])->name('login');
Route::post('/forget_pass', [UsersController::class, 'forget_pass']);
Route::post('/check_code', [UsersController::class, 'check_code_forget_pass']);
Route::post('/reset_password', [UsersController::class, 'reset_password']);

Route::group(['middleware' => 'auth:api'], function(){
    
    Route::get('/profile', [UsersController::class,'profile']);
    Route::post('/update_profile', [UsersController::class,'update_profile']);    
    Route::post('/logout', [UsersController::class,'logout']);
    Route::post('/store_contact', [HomeController::class, 'store_contact']);

    Route::post('/store_coupon', [CouponsController::class, 'store_coupon']);
    Route::get('/get_coupons', [CouponsController::class, 'get_coupons']);
    Route::get('/single_coupon', [CouponsController::class, 'single_coupon']);
    Route::post('/add_coupon_wishlist/{coupon}', [CouponsController::class, 'add_coupon_wishlist']);
    Route::get('/show_wishlist', [CouponsController::class, 'show_wishlist']);
    Route::post('/like_coupon/{coupon}', [CouponsController::class, 'like_coupon']);
    Route::delete('/del_wishlist_coupon/{id}',[CouponsController::class, 'del_wishlist_coupon']);
    Route::delete('/del_like_coupon/{id}',[CouponsController::class, 'del_like_coupon']);

    Route::get('/all_coupons', [CouponsController::class, 'all_coupons']);
    Route::get('/filter_coupon', [CouponsController::class, 'filter_coupon']);
    Route::get('/get_notifications', [UsersController::class,'get_notifications']);



});
