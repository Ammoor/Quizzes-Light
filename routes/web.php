<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view("home");
});

Route::get('/guards', function () {
    return view("guards");
});

Route::get('/login-page', function () {
    return view("auth.login-page");
});

Route::get('/registration-page-student', function () {
    return view("auth.registration-page-student");
});

Route::get('/about-us', function () {
    return view("about-us");
});

Route::middleware('auth')->group(function () {
    Route::get('/student-dashboard-home', function () {
        return view("student-dashboard-home");
    })->name('student-dashboard-home');
});

Route::middleware('auth:administrator')->group(function () {
    Route::get('/admin-dashboard-home', function () {
        return view("admin-dashboard-home");
    })->name('admin-dashboard-home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
