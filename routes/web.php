<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TimeOffController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AdminDashboardController;

// 1. Guest Routes (Public)
Route::get('/', function () {
    return view('LandingPage');
})->name('Homepage');

// 2. Authenticated & Verified Routes
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Profile Settings
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource: Employees & Jobs (Otomatis mencakup index, create, store, show, edit, update, destroy)
    Route::resource('employees', EmployeeController::class);
    Route::resource('jobs', JobController::class);

    // Resource: Payroll (Manual & Custom Actions)
    Route::get('/payroll', [PayrollController::class, 'index'])->name('payroll.index');
    Route::get('/payroll/create', [PayrollController::class, 'create'])->name('payroll.create');
    Route::post('/payroll', [PayrollController::class, 'store'])->name('payroll.store');
    Route::get('/payroll/{id}/edit', [PayrollController::class, 'edit'])->name('payroll.edit');
    Route::put('/payroll/{id}', [PayrollController::class, 'update'])->name('payroll.update');
    Route::post('/payroll/{id}/pay', [PayrollController::class, 'pay'])->name('payroll.pay');

    // Resource: Time Off (Manual & Custom Actions)
    Route::get('/timeoffs', [TimeOffController::class, 'index'])->name('timeoffs.index');
    Route::get('/timeoffs/create', [TimeOffController::class, 'create'])->name('timeoffs.create');
    Route::post('/timeoffs', [TimeOffController::class, 'store'])->name('timeoffs.store');
    Route::get('/timeoffs/{id}/edit', [TimeOffController::class, 'edit'])->name('timeoffs.edit');
    Route::put('/timeoffs/{id}', [TimeOffController::class, 'update'])->name('timeoffs.update');
    Route::delete('/timeoffs/{id}', [TimeOffController::class, 'destroy'])->name('timeoffs.destroy');
    Route::put('/timeoffs/{id}/approve', [TimeOffController::class, 'approve'])->name('timeoffs.approve');
    Route::put('/timeoffs/{id}/reject', [TimeOffController::class, 'reject'])->name('timeoffs.reject');

});

require __DIR__ . '/auth.php';
