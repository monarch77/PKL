<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\claimAdminController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

//login
Route::get('/', function () {
    return view('login');
});

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

//logout
Route::get('/logout', function () {
    return view('login');
});
Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout');
