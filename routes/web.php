<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;


Route::get('/', function () {
    return view('dashboard');
});

// Role route group
Route::prefix('role')->group(function () {
    Route::get('/create',[RoleController::class,'create'])->name('role#create');
    Route::post('/store',[RoleController::class,'store'])->name('role#store');
});
