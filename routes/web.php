<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\ChuyenMucController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TextClassificationController;
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
//Text Classfier
Route::get('/test', [TextClassificationController::class,'test']);
Route::get('/', [HomeController::class,'index']);


//Admin Page Route
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class,'index']);
    Route::get('/dangnhap', [AdminController::class,'login']);
    Route::resource('/baiviet', BaiVietController::class); 
    Route::resource('/chuyenmuc', ChuyenMucController::class); 
    Route::get('/chuyenmuc/delete/{id}', [ChuyenMucController::class,'destroy']);
   
});


//Ckeditor Route
Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');
Route::get('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');


Route::get('/{slug}',[HomeController::class,'loadUrl']);


