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

use App\Http\Controllers\Site\HomeController;
Route::group(['middleware' => 'lang'], function () {

Route::get('/', [HomeController::class, 'index']);
Route::get('/portfolio', [HomeController::class, 'portfolio']);
Route::get('/about-us', [HomeController::class, 'about_us']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/contact-us', [HomeController::class, 'contact_us']);
Route::post('/storeContact', [HomeController::class, 'storeContact'])->name('storeContact');

Route::post('/storeSubscribe', [HomeController::class, 'storeSubscribe'])->name('storeSubscribe');


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

});