<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

Route::get('assets/{folder}/{filename}', function ($folder,$filename){
    $path = storage_path('app/' . $folder . '/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::prefix('admin')->group(function () {

    Route::get('login', [AuthController::class, 'login'])->name('admin.auth.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.auth.logout');
    Route::post('login', [AuthController::class, 'proses_login'])->name('admin.auth.login.proses');

    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::prefix('profiles')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('admin.profiles');
        Route::post('search', [ProfileController::class, 'search'])->name('admin.profiles.search');
        Route::post('info', [ProfileController::class, 'info'])->name('admin.profiles.info');
        Route::post('save', [ProfileController::class, 'save'])->name('admin.profiles.save');
        Route::post('delete', [ProfileController::class, 'delete'])->name('admin.profiles.delete');
    });

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

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories');
        Route::post('search', [CategoryController::class, 'search'])->name('admin.categories.search');
        Route::post('info', [CategoryController::class, 'info'])->name('admin.categories.info');
        Route::post('save', [CategoryController::class, 'save'])->name('admin.categories.save');
        Route::post('delete', [CategoryController::class, 'delete'])->name('admin.categories.delete');
    });

    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.posts');
        Route::post('search', [PostController::class, 'search'])->name('admin.posts.search');
        Route::post('info', [PostController::class, 'info'])->name('admin.posts.info');
        Route::post('save', [PostController::class, 'save'])->name('admin.posts.save');
        Route::post('delete', [PostController::class, 'delete'])->name('admin.posts.delete');
    });

    Route::prefix('services')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('admin.services');
        Route::post('search', [ServiceController::class, 'search'])->name('admin.services.search');
        Route::post('info', [ServiceController::class, 'info'])->name('admin.services.info');
        Route::post('save', [ServiceController::class, 'save'])->name('admin.services.save');
        Route::post('delete', [ServiceController::class, 'delete'])->name('admin.services.delete');
    });

    Route::prefix('clients')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('admin.clients');
        Route::post('search', [ClientController::class, 'search'])->name('admin.clients.search');
        Route::post('info', [ClientController::class, 'info'])->name('admin.clients.info');
        Route::post('save', [ClientController::class, 'save'])->name('admin.clients.save');
        Route::post('delete', [ClientController::class, 'delete'])->name('admin.clients.delete');
    });

    Route::prefix('messages')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('admin.messages');
        Route::post('search', [MessageController::class, 'search'])->name('admin.messages.search');
        Route::post('info', [MessageController::class, 'info'])->name('admin.messages.info');
        Route::post('save', [MessageController::class, 'save'])->name('admin.messages.save');
        Route::post('delete', [MessageController::class, 'delete'])->name('admin.messages.delete');
    });
});

