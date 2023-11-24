<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RewardsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\KeywordController;

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
\Illuminate\Support\Facades\Auth::routes();


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/scan-qr-code', function () {
    return view('scanqrcode');
})->name('scanqrcode');
Route::get('/get-keywords', [KeywordController::class,'getKeywords']);

Route::get('/payment', function () {
    return view('paymentsuccessfull');
})->name('paymentsuccess');

Route::get('/payment-cancel', [RewardsController::class, 'paymentCancel'])->name('paymentcancel');

Route::post("/store-image", [DashboardController::class, "storeImageFromUri"])->name("storeImageFromUri");

Route::post('/storeInDb', [DashboardController::class, 'storeInDbFromChat'])->name('storeInDbFromChat');




