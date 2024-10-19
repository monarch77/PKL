<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClaimController;
use Illuminate\Support\Facades\Route;

//login
Route::get('/', [SessionController::class, 'index'])->name('login');
Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login', [SessionController::class, 'login']);

//signup
Route::get('/signup', [SessionController::class, 'indexRegister'])->name('signup');
Route::post('/signup', [SessionController::class, 'signup']);

//middleware
Route::middleware(['auth'])->group(function () {
    //profile
    Route::get('profile/form', function() {
        return view('register');
    })->name('showProfileForm');
    Route::post('/profile/complete', [SessionController::class, 'completeProfile'])->name('completeProfile');
    //admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile']);
    Route::get('/admin/klaim', [AdminController::class, 'showAllClaims'])
    ->name('admin.klaim');
    Route::patch('/admin/klaim/{id}', [AdminController::class, 'update'])->name('admin.klaim.update');
    Route::get('/admin/laporan', [AdminController::class, 'laporan']);
    
    //user
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user/ajukanklaim', [UserController::class, 'ajukanklaim']);
    Route::post('/user/ajukanklaim', [ClaimController::class, 'store'])->name('klaim.store');
    Route::get('/user/klaim', [UserController::class, 'klaim'])->name('user.klaim');
    Route::get('/user/klaim/{id}/edit', [ClaimController::class, 'edit'])->name('klaim.edit');
    Route::put('/user/klaim/{id}', [ClaimController::class, 'update'])->name('klaim.update');
    Route::delete('/user/klaim/{id}', [ClaimController::class, 'destroy'])->name('klaim.destroy');
});

//logout
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');

