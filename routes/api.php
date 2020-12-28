<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::post('message/save', [ApiController::class, 'message_save']);

