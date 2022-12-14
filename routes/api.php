<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;
use \App\Http\Controllers\Api\Auth\RegisterController;
use \App\Http\Controllers\Api\Auth\LoginController;
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
Route::post('auth/register', RegisterController::class);
Route::post('auth/login', LoginController::class);

Route::group(["middleware" => "auth:sanctum"], function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource("user", UserApiController::class);
});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
