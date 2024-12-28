<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\CheckIfAdmin;
use App\Http\Controllers\LocationController;

Route::get('/', function () {
    // Check if user is authenticated
    if (Auth::check()) {
        // If logged in, redirect to user dashboard
        return redirect()->route('dashboard');
    }

    // If not logged in, redirect to login page
    return redirect()->route('login');
})->name('welcome');

// User login routes
Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserLoginController::class, 'login'])->name('login.submit');

// User dashboard route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

// Admin login routes
Route::get('/login-admin', [AdminLoginController::class, 'showLoginForm'])->name('auth.admin-login');
Route::post('/login-admin', [AdminLoginController::class, 'login'])->name('admin.login.submit');

// Admin-specific routes (accessible only to admins)
Route::middleware(['auth', CheckIfAdmin::class])->group(function () {
    Route::get('/admin', [LocationController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/create', [LocationController::class, 'create'])->name('locations.create');
    Route::post('/admin/store', [LocationController::class, 'store'])->name('locations.store');
});

// Standard Laravel authentication routes for users
Auth::routes();

// Home route for users
Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
Route::get('/location', [LocationController::class, 'showLocationAndDistance']);
