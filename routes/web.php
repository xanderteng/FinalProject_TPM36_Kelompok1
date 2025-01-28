<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Public Routes (Authentication)
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Authentication routes handled by AuthController
Route::controller(AuthController::class)->group(function(){
    Route::get('/register', 'getRegister')->name('getRegister');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'getLogin')->name('getLogin');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});




Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');  // Show all teams
    Route::get('/team/{id}', [AdminController::class, 'show'])->name('show');  // Show specific team details
    Route::get('/team/{id}/edit', [AdminController::class, 'edit'])->name('edit');  // Show edit form
    Route::put('/team/{id}', [AdminController::class, 'update'])->name('update');  // Update team info
    Route::delete('/team/{id}', [AdminController::class, 'destroy'])->name('destroy');  // Delete team
});



