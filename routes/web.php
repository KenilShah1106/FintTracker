<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRCodeController;

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
});

// Route::get("/scan-qr-code", [QRCodeController::class,'scanQRCode']);
// Route::post("/process-qr-code", [QRCodeController::class,'processQRCode']);

Route::post("/store-image", [DashboardController::class, "storeImageFromUri"])->name("storeImageFromUri");





