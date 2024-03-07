<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('home');
})->middleware('auth');

// auth
Route::get('/login/page',[AuthController::class,'loginPage'])->name('login.page')->middleware('guest');
Route::post('/login',[AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('logout',[AuthController::class,'logout'])->name('logout');

// user
Route::resource('user', UserController::class)->middleware('auth');

// role
Route::resource('role', RoleController::class)->middleware('auth');
