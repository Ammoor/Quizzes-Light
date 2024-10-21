<?php

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\FetchFromDataBase;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("welcome");
});

Route::get('/home', function () {
    return view("home");
});

Route::middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('/login-page-student', function () {
        return view("auth.login-page-student");
    });

    Route::get('/login-page-admin', function () {
        return view("auth.login-page-admin");
    });

    Route::get('/guards', function () {
        return view("guards");
    });
});

Route::get('/about-us', function () {
    return view("about-us");
});

Route::middleware('auth')->group(function () {
    Route::get('/student-dashboard-home', function () {
        return view("student-dashboard-home");
    })->name('student-dashboard-home');

    Route::get('/student-profile', function () {
        return view("student-profile");
    });

    Route::get('/student-tests', function () {
        return view("student-tests");
    });
});

Route::middleware('auth:administrator')->group(function () {
    Route::get('/admin-dashboard-home', function () {
        return view("admin-dashboard-home");
    })->name('admin-dashboard-home');

    Route::get('/admin-profile', function () {
        return view("admin-profile");
    })->name('admin-profile');

    Route::get('/generate-quiz', [FetchFromDataBase::class, 'specializationData']);
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
