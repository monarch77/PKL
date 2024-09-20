<?php

use App\Http\Controllers\claimAdminController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

//login
Route::get('/', [SessionController::class, 'index']);
Route::post('/', [SessionController::class, 'login']);


//admin
Route::get('/dashboardadmin', function () {
    return view('admin/dashboard');
});  

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
Route::get('/dashboarduser/ajukanklaim', function () {
    return view('user/pengajuan_klaim');
});

//logout
Route::get('/logout', [SessionController::class, 'logout']);

