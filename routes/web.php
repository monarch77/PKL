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


//user
Route::get('/dashboarduser', function () {
    return view('user/dashboard');
});
