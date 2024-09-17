<?php

use Illuminate\Support\Facades\Route;

//login
Route::get('/', function () {
    return view('login');
});

//admin
Route::get('/dashboardadmin', function () {
    return view('admin/dashboard');
});

Route::get('/dashboardadmin/profile', function () {
    return view('admin/profile');
});

Route::get('/dashboardadmin/laporan', function () {
    return view('admin/laporan');
});

Route::get('/dashboardadmin/klaim', function () {
    return view('admin/klaim');
});


//user
Route::get('/dashboarduser', function () {
    return view('user/dashboard');
});

//logout
Route::get('/logout', function () {
    return view('login');
});
