<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/login/page',[AuthController::class,'loginPage'])->name('login#page')->middleware('guest');
Route::post('/login',[AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('logout',[AuthController::class,'logout'])->name('logout');

// Role route group
Route::prefix('role')->middleware('auth')->group(function () {
    Route::get('/list',[RoleController::class,'index'])->name('role#index');
    Route::get('/create',[RoleController::class,'create'])->name('role#create');
    Route::post('/store',[RoleController::class,'store'])->name('role#store');
    Route::get('/{role}/edit',[RoleController::class,'edit'])->name('role#edit');
    Route::put('/{role}/update',[RoleController::class,'update'])->name('role#update');
    Route::delete('/{role}/destory',[RoleController::class,'destory'])->name('role#destory');
});

// User Route Gp
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/list',[UserController::class,'index'])->name('user#index');
    Route::get('/{user}/profile',[UserController::class,'show'])->name('user#profile');
    Route::get('/create',[UserController::class,'create'])->name('user#create');
    Route::post('/store',[UserController::class,'store'])->name('user#store');
    Route::get('/{user}/edit',[UserController::class,'edit'])->name('user#edit');
    Route::put('/{user}/update',[UserController::class,'update'])->name('user#update');
    Route::delete('/{user}/destory',[UserController::class,'destory'])->name('user#destory');
});
