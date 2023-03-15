<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'create']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/', [TodoController::class, 'create']);
    Route::post('/{id}', [TodoController::class, 'update']);
    Route::get('/', [TodoController::class, 'index']);
    Route::get('/destroy/{id}', [TodoController::class, 'delete']);
});