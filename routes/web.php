<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\AuthController;


Route::get('/login', [AuthController::class, 'index'])->name("login");
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::group(["middleware" => "auth"], function(){
	Route::get('/', [DashboardController::class, 'index']);
	Route::resource('user', UserController::class);
	Route::post('/user/import', [UserController::class, 'import']);
	Route::resource('group', GroupController::class);
	Route::get('/getUser', [UserController::class, 'getUser']);
	Route::post('/getUser', [UserController::class, 'getApiUser']);
	Route::post('/user/import', [UserController::class, 'import']);
	Route::post('/group/import', [GroupController::class, 'import']);
});


