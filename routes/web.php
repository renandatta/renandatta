<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::get('login', [AuthController::class, 'login'])->name('admin.auth.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.auth.logout');
    Route::post('login', [AuthController::class, 'proses_login'])->name('admin.auth.login.proses');

    Route::get('/', [AdminController::class, 'index'])->name('admin');
});

Route::get('/', function () {
    return view('welcome');
});

Route::view('layout', 'admin.layouts.index');

