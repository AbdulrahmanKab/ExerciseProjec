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
Route::group(['middleware' => ['guest']],function(){
    Route::get('/login',[\App\Http\Controllers\Auth\LoginController::class,'index'])->name('login');
    Route::post('/login',[\App\Http\Controllers\Auth\LoginController::class,'loginSubmit'])->name('loginSubmit');
});

Route::group(['middleware' => 'auth'],function (){
    Route::group(['middleware' => \App\Http\Middleware\checkAdmin::class],function (){
    Route::get('/dashboard/admin',[\App\Http\Controllers\Admin\IndexController::class,'index'])->name('admin.home');
    });
    Route::group(['middleware' => \App\Http\Middleware\checkUser::class],function (){
        Route::get('/dashboard/user',[\App\Http\Controllers\User\IndexController::class,'index'])->name('user.home');
    });
    Route::get('/logout',[\App\Http\Controllers\Auth\LoginController::class,'logout']);
});
Route::view('/','welcome')->name('home');
