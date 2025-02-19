<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\RMVC\Route\Route;

Route::get('/', [MainController::class, 'index'])->name('main.index')->middleware('auth');
Route::get('/admin/', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/admin/users/{user}/', [AdminController::class, 'showUser'])->name('admin.showUser')->middleware('auth');
Route::post('/admin/users/', [AdminController::class, 'store'])->name('admin.store')->middleware('auth');
