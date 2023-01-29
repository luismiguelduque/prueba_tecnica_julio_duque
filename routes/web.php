<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return  redirect('login');
});
Route::view('/login', 'login');
Route::view('/home', 'home')->middleware('emailVerified', 'lastLogin');
Route::view('/sesiones', 'sesiones');
Route::view('/verificacion', 'verificacion');
Route::post('/login', [AuthController::class, 'logIn']);