<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\CheckIfAdmin;
use App\Http\Controllers\LocationController;

Route::get('/', function () {
    // Cek apakah pengguna sudah login
    if (Auth::check()) {
        // Jika user login, arahkan ke dashboard mereka
        return redirect()->route('dashboard');
    }

    // Jika tidak login, arahkan ke halaman login
    return redirect()->route('login');
})->name('welcome');

// Route untuk halaman login
Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserLoginController::class, 'login'])->name('login.submit');

// Dashboard User
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

// Login Admin
Route::get('/login-admin', [AdminLoginController::class, 'showLoginForm'])->name('auth.admin-login');
Route::post('/login-admin', [AdminLoginController::class, 'login'])->name('admin.login.submit');

// Route Khusus Admin (Hanya Bisa Diakses oleh Admin)


Route::middleware(['auth', CheckIfAdmin::class])->group(function () {
    Route::get('/admin', [LocationController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/create', [LocationController::class, 'create'])->name('locations.create');
    Route::post('/admin/store', [LocationController::class, 'store'])->name('locations.store');
});


// Autentikasi Standar Laravel untuk User
Auth::routes();

// Home Route untuk User
Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
Route::get('/location', function () {
    return view('location');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
