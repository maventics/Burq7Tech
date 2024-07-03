<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingController;
use Illuminate\Database\Query\IndexHint;
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

// Route::get('/admin', function () {
//     return view('welcome');
// });


Route::get('/admin', [LoginController::class, 'index'])->name('admin.login-view');
Route::POST('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');



Route::group(['middleware'=>['admin']],function () {

    Route::POST('/admin/logout',[LoginController::class,'Logout'])->name('logout');

    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('home.page');
    Route::get('/admin/profile_update/view', [AdminController::class, 'profile_update_view']);
    Route::post('/admin/update_profile',[AdminController::class , 'update_profile'])->name('update_profile');

    // Setting Routes
    Route::get('/admin/settings', [SettingController::class, 'index']);
    Route::post('/admin/update_setting', [SettingController::class, 'update_setting'])->name('update_setting');


});

// id -> int
// id -> logid -> string
