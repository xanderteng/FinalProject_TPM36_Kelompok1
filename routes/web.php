<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;

Route::get('/', function () {
    return view('landing');
})->name('landing');


Route::controller(AuthController::class)->group(function(){
    Route::get('/register', 'getRegister')->name('getRegister');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'getLogin')->name('getLogin');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/dashboard/{id}', 'dashboard')->name('dashboard');
});

Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('sendEmail');
