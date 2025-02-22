<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\ProfileController;
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
    
    Route::get('profile/form', function() {
        return view('register');
    })->name('showProfileForm');
    Route::post('/profile/complete', [SessionController::class, 'completeProfile'])->name('completeProfile');

    //admin
    Route::get('/admin/dashboard', [ManagerController::class, 'index'])->name('manager.dashboard');
    Route::get('/admin/akun', [ManagerController::class, 'indexUser'])->name('manager.akun');
    Route::get('/admin/akun/{id}/edit', [ManagerController::class, 'editUser'])->name('manager.akun.edit');
    Route::post('/admin/akun/{id}', [ManagerController::class, 'updateUser'])->name('manager.akun.update');
    Route::delete('/admin/akun/{id}', [ManagerController::class, 'deleteUser'])->name('manager.akun.delete');
    Route::get('/admin/profile', [AdminController::class, 'profileAdmin'])->name('manager.profile');
    Route::get('/admin/password', [AdminController::class, 'passwordAdmin'])->name('manager.password');

    //manager
    Route::get('/manager/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/manager/klaim', [AdminController::class, 'showAllClaims'])->name('admin.klaim');
    Route::patch('/admin/klaim/{id}', [AdminController::class, 'update'])->name('admin.klaim.update');
    Route::patch('/admin/klaim/{id}/reject', [AdminController::class, 'reject'])->name('admin.klaim.reject');
    Route::get('/manager/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
    Route::get('/manager/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/manager/password', [AdminController::class, 'password'])->name('admin.password');
    
    //nasabah
    Route::get('/nasabah/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/nasabah/ajukanklaim', [UserController::class, 'ajukanklaim']);
    Route::post('/nasabah/ajukanklaim', [ClaimController::class, 'store'])->name('klaim.store');
    Route::get('/nasabah/klaim', [UserController::class, 'klaim'])->name('user.klaim');
    Route::get('/nasabah/klaim/{id}/edit', [ClaimController::class, 'edit'])->name('klaim.edit');
    Route::put('/nasabah/klaim/{id}', [ClaimController::class, 'update'])->name('klaim.update');
    Route::delete('/nasabah/klaim/{id}', [ClaimController::class, 'destroy'])->name('klaim.destroy');
    Route::get('/nasabah/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/nasabah/password', [UserController::class, 'password'])->name('user.password');


    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');


});

//logout
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');

