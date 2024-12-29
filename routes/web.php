<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Middleware\CheckIfAdmin;

// Landing Page
Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
})->name('welcome');

// User Login
Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserLoginController::class, 'login'])->name('login.submit');

// User Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

// Admin Login
Route::get('/login-admin', [AdminLoginController::class, 'showLoginForm'])->name('auth.admin-login');
Route::post('/login-admin', [AdminLoginController::class, 'login'])->name('admin.login.submit');

// Admin Routes
Route::middleware(['auth', CheckIfAdmin::class])->group(function () {
    Route::get('/admin', [LocationController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/create', [LocationController::class, 'create'])->name('locations.create');
    Route::post('/admin/store', [LocationController::class, 'store'])->name('locations.store');
    Route::get('/admin/edit/{id}', [LocationController::class, 'edit'])->name('locations.edit');
    Route::put('/admin/update/{id}', [LocationController::class, 'update'])->name('locations.update');
    Route::delete('/admin/delete/{id}', [LocationController::class, 'destroy'])->name('locations.destroy');
});

// Location Public Access
Route::get('/location', [LocationController::class, 'showLocationAndDistance']);

// Route for generating Google Maps route with user's location
Route::get('/get-route', [LocationController::class, 'getRoute'])->name('location.getRoute');

// Default Laravel Authentication
Auth::routes();
