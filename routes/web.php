<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\claimAdminController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

//login
Route::get('/', [SessionController::class, 'index']);
Route::post('/', [SessionController::class, 'login']);

//register
Route::get('/register', [SessionController::class, 'indexRegister']);

//middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboardadmin', action: [AdminController::class, 'index']);

});

//admin
Route::get('/dashboardadmin/profile', [ProfileAdminController::class, 'profile']);
Route::get('/dashboardadmin/klaim', [claimAdminController::class, 'klaim']);
Route::get('/dashboardadmin/laporan', function () {
    return view('admin/laporan');
});

//user
Route::get('/dashboarduser', function () {
    return view('user/dashboard');
});
Route::get('/dashboarduser/klaim', function () {
    return view('user/klaim');
});
Route::get('/dashboarduser/ajukanklaim', [ClaimController::class, 'create']);

//logout
Route::get('/logout', [SessionController::class, 'logout']);

