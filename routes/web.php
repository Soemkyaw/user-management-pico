<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('dashboard');
});

// Role route group
Route::prefix('role')->group(function () {
    Route::get('/list',[RoleController::class,'index'])->name('role#index');
    Route::get('/create',[RoleController::class,'create'])->name('role#create');
    Route::post('/store',[RoleController::class,'store'])->name('role#store');
});

Route::prefix('user')->group(function () {
    Route::get('/list',[UserController::class,'index'])->name('user#index');
    Route::get('/create',[UserController::class,'create'])->name('user#create');
    Route::post('/store',[UserController::class,'store'])->name('user#store');
});
