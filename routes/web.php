<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TimeOffController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('Homepage');

Route::get('/Lorem', function () {
    return view('LandingPage');
});

Route::get('/Login', [AuthController::class, 'login'])->name('login');
Route::get('/Signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/Signup', [AuthController::class, 'signupStore'])->name('signup.store');
Route::post('/Login', [AuthController::class, 'loginStore'])->name('login.store');

Route::get('/LandingPage', function () {
    return view('landing');
})->middleware('auth');

Route::get('/employees', [EmployeeController::class, 'index'])->middleware(['auth', 'verified'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->middleware(['auth', 'verified'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->middleware(['auth', 'verified'])->name('employees.store');
Route::resource('employees', EmployeeController::class)->middleware(['auth', 'verified']);

// Routes for Payroll
Route::get('/payroll/create', [PayrollController::class, 'create'])->middleware(['auth', 'verified'])->name('payroll.create');
Route::post('/payroll', [PayrollController::class, 'store'])->middleware(['auth', 'verified'])->name('payroll.store');

// Route for viewing payroll list (index)
Route::get('/payroll', [PayrollController::class, 'index'])->middleware(['auth', 'verified'])->name('payroll.index');

// Routes for editing payroll
Route::get('/payroll/{id}/edit', [PayrollController::class, 'edit'])->middleware(['auth', 'verified'])->name('payroll.edit');
Route::put('/payroll/{id}', [PayrollController::class, 'update'])->middleware(['auth', 'verified'])->name('payroll.update');
Route::post('/payroll/{id}/pay', [PayrollController::class, 'pay'])->middleware(['auth', 'verified'])->name('payroll.pay');

// Routes for Time Off
Route::get('/timeoffs/create', [TimeOffController::class, 'create'])->middleware(['auth', 'verified'])->name('timeoffs.create');
Route::post('/timeoffs', [TimeOffController::class, 'store'])->middleware(['auth', 'verified'])->name('timeoffs.store');

// Route for viewing time off list (index)
Route::get('/timeoffs', [TimeOffController::class, 'index'])->middleware(['auth', 'verified'])->name('timeoffs.index');

// Routes for editing time off
// routes/web.php
Route::get('timeoffs/{id}/edit', [TimeOffController::class, 'edit'])->middleware(['auth', 'verified'])->name('timeoffs.edit');
Route::put('timeoffs/{id}', [TimeOffController::class, 'update'])->middleware(['auth', 'verified'])->name('timeoffs.update');


// Route for deleting time off
Route::delete('timeoffs/{id}', [TimeOffController::class, 'destroy'])->middleware(['auth', 'verified'])->name('timeoffs.destroy');

Route::put('/timeoffs/{id}/approve', [TimeOffController::class, 'approve'])->middleware(['auth', 'verified'])->name('timeoffs.approve');
Route::put('/timeoffs/{id}/reject', [TimeOffController::class, 'reject'])->middleware(['auth', 'verified'])->name('timeoffs.reject');


Route::get('/Nexa', function () {
    return view('LandingPage');
})->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->middleware(['auth', 'verified'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->middleware(['auth', 'verified'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware(['auth', 'verified'])->name('profile.destroy');
});

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');


Route::get('/jobs', [JobController::class, 'index'])->middleware(['auth', 'verified'])->name('jobs.index');
Route::get('/jobs/create', [JobController::class, 'create'])->middleware(['auth', 'verified'])->name('jobs.create');
Route::post('/jobs', [JobController::class, 'store'])->middleware(['auth', 'verified'])->name('jobs.store');
Route::resource('jobs', JobController::class)->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
