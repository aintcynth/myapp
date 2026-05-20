<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public admission routes
Route::get('/admission', [AdmissionController::class, 'create'])->name('admission.create');
Route::post('/admission', [AdmissionController::class, 'store'])->name('admission.store');

// Role-based Dashboards (Protected)
Route::middleware('auth')->group(function () {
    // Dashboard landing page should always go to the logged-in user's role dashboard
    Route::get('/dashboard', function () {
        $user = auth()->user();

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'staff' => redirect()->route('staff.dashboard'),
            default => redirect()->route('user.dashboard'),
        };
    })->name('dashboard');

    Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/staff/dashboard', [DashboardController::class, 'staffDashboard'])->name('staff.dashboard');
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});


// Admin/Staff admission routes (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/admin/admissions', [AdmissionController::class, 'index'])->name('admin.admissions.index');
    Route::post('/admin/admissions/{admission}', [AdmissionController::class, 'updateStatus'])->name('admin.admissions.update');
});

// Admin management routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/courses', [AdminController::class, 'courses'])->name('admin.courses.index');
    Route::post('/admin/courses', [AdminController::class, 'storeCourse'])->name('admin.courses.store');
    Route::get('/admin/centers', [AdminController::class, 'centers'])->name('admin.centers.index');
    Route::post('/admin/centers', [AdminController::class, 'storeCenter'])->name('admin.centers.store');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users.index');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
});


