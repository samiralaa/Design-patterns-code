<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register/admin', [AdminController::class, 'registerAdmin']);
Route::post('login/admin', [AdminController::class, 'loginAdmin']);

Route::post('register/user',[UserController::class,'register']);

Route::middleware(['auth:admin'])->group(function () {
    Route::get('view', [TestController::class, 'index']);
});
