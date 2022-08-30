<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\SlidersController;
use App\Http\Controllers\Dashboard\ServicesController;
use App\Http\Controllers\Dashboard\SubscribesController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\PortfoliosController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\ClientReviewsController;

Route::get('/change-language/{lang}', [HomeController::class,'changeLang']);


Route::group(['prefix' => 'admin', 'middleware' => 'lang'], function () {

    Route::get('/login', [HomeController::class, 'loginPage'])->middleware('adminGuest');
    Route::post('/signin', [HomeController::class, 'signin'])->name('admin.login')->middleware('adminGuest');

    Route::group([ 'middleware' => 'IsAdmin'], function () {
        Route::get('/adminLogout', [HomeController::class, 'adminLogout']);

        Route::get('/dashboard', [HomeController::class, 'index']);
        Route::get('/notifications', [HomeController::class, 'notifications']);
        Route::put('/read/{id}', [HomeController::class, 'read'])->name('read_notify');

        Route::get('/settings', [SettingsController::class, 'index']);
        Route::put('/settings/update', [SettingsController::class, 'update'])->name('updateSetting');

        Route::resource('/roles', RolesController::class);
        Route::resource('/admins', AdminsController::class);

        Route::get('/contacts', [ContactUsController::class,'index'])->name('contacts.index');
        Route::get('/contacts/{contacts}', [ContactUsController::class,'show'])->name('contacts.show');
        Route::delete('/contacts/{contacts}/delete', [ContactUsController::class,'destroy'])->name('contacts.destroy');
        Route::get('/subscribes', [SubscribesController::class,'index'])->name('subscribes.index');
        Route::delete('/subscribes/{subscribes}/delete', [SubscribesController::class,'destroy'])->name('subscribes.destroy');

        Route::resource('/portfolios', PortfoliosController::class);
        Route::resource('/sliders', SlidersController::class);
        Route::resource('/services', ServicesController::class);
        Route::resource('/users', UsersController::class);
        Route::resource('/client_reviews', ClientReviewsController::class);

        
    });
});