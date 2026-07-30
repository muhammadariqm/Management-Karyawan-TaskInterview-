<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\WilayahController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/api/provinces', [WilayahController::class,'provinces']);
Route::get('/api/regencies/{id}', [WilayahController::class,'regencies']);
Route::get('/api/districts/{id}', [WilayahController::class,'districts']);
Route::get('/api/villages/{id}', [WilayahController::class,'villages']);
// Route::get('/api/provinces', function () {abort(500);});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::resource('employees', EmployeeController::class);
});