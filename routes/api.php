<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

// Route::middleware('auth')->group(function () {
//     Route::resource('todos', TodoController::class);
//     Route::post('logout',[AuthController::class,'logout']);
// });



Route::resource('todos', TodoController::class);
