<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/Johanna-Natasha-Agaatsz', [DashboardController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/get-data-users', [UserController::class, 'getDataUser']);
Route::get('/create-data-users', [UserController::class, 'createDataUser']);
Route::get('/edit-data-users', [UserController::class, 'getDataUser']);
Route::post('/update-data-users', [UserController::class, 'getDataUser']);
Route::delete('/delete-data-users', [UserController::class, 'getDataUser']);
Route::post('/restore-data-users', [UserController::class, 'getDataUser']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
