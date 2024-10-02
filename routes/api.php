<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\TestController;
use App\Mail\UserActivated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



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

Route::post('register/user', [UserController::class, 'register']);
Route::post('users/{id}/activate', [UserController::class, 'activate']);


Route::get('test',function(){
    
    Mail::to('devsamiralzeer243@gmail.com')->send(new UserActivated());

    });