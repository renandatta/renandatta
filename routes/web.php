<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::get('login', [AuthController::class, 'login'])->name('admin.auth.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.auth.logout');
    Route::post('login', [AuthController::class, 'proses_login'])->name('admin.auth.login.proses');

    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::prefix('features')->group(function () {
        Route::get('/', [FeatureController::class, 'index'])->name('admin.features');
        Route::post('search', [FeatureController::class, 'search'])->name('admin.features.search');
        Route::post('info', [FeatureController::class, 'info'])->name('admin.features.info');
        Route::post('save', [FeatureController::class, 'save'])->name('admin.features.save');
        Route::post('delete', [FeatureController::class, 'delete'])->name('admin.features.delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users');
        Route::post('search', [UserController::class, 'search'])->name('admin.users.search');
        Route::post('info', [UserController::class, 'info'])->name('admin.users.info');
        Route::post('save', [UserController::class, 'save'])->name('admin.users.save');
        Route::post('delete', [UserController::class, 'delete'])->name('admin.users.delete');
    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::view('layout', 'admin.layouts.index');

