<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FruitController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Protected Routes
Route::group(['middleware' => ['auth:sanctum']] , function () {
    Route::apiResource('fruits',FruitController::class);
    Route::get('/fruits/search/{name}',[FruitController::class, 'search'])->name('fruits.search');
    Route::post('/logout',[AuthController::class, 'logout'])->name('user.logout');

});

// Public routes
Route::post('/user/register',[AuthController::class, 'register'])->name('user.register');
Route::post('/user/login',[AuthController::class, 'login'])->name('user.login');
