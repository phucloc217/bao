<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\ChuyenMucController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TextClassificationController;
use Illuminate\Auth\Middleware\Authenticate;
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
Route::post('/predict', [TextClassificationController::class, 'predict']);
Route::get('/', [HomeController::class, 'index']);
// Route::get('/test', [AdminController::class, 'test']);


//Admin Page Route
Route::get('admin/login', [AdminController::class, 'login'])->name('login');
Route::post('admin/login', [AdminController::class, 'postLogin'])->name('postLogin');
Route::get('logout',[AdminController::class,'logout'])->name('logout');


Route::middleware(Authenticate::class)->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/thongtincanhan', [AdminController::class, 'UserInfo'])->name('UserInfo');
    Route::get('/dangnhap', [AdminController::class, 'login']);
    Route::resource('/baiviet', BaiVietController::class,['update-post'=>['update']]);
    Route::resource('/chuyenmuc', ChuyenMucController::class);
    Route::get('/chuyenmuc/delete/{id}', [ChuyenMucController::class, 'destroy']);
    Route::resource('/user', UserController::class);
    Route::resource('/nhomquyen',RoleController::class);
});


//Ckeditor Route
Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');
Route::get('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');


Route::get('/{slug}', [HomeController::class, 'loadUrl']);