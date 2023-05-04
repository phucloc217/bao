<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index']);

Route::prefix('admin')->group(function () {
    Route::get('/thongke', [AdminController::class,'index']);
    Route::get('/baiviet', [BaiVietController::class,'index']); 
    Route::get('/thembaiviet', [BaiVietController::class,'create']); 
});

Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');
Route::get('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');