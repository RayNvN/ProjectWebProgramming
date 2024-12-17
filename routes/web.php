<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function (){
    return view('welcome');
});

Route::get('/Lorem', function (){
    return view('LandingPage');
});

Route::get('/Login', [AuthController::class, 'login'])->name('login');
Route::get('/Signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/Signup', [AuthController::class, 'signupStore'])->name('signup.store');
Route::post('/Login', [AuthController::class, 'loginStore'])->name('login.store');

Route::get('/LandingPage', function () {
    return view('landing');
})->middleware('auth');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::resource('employees', EmployeeController::class);

// Routes for Payroll
Route::get('/payroll/create', [PayrollController::class, 'create'])->name('payroll.create');
Route::post('/payroll', [PayrollController::class, 'store'])->name('payroll.store');

// Route for viewing payroll list (index)
Route::get('/payroll', [PayrollController::class, 'index'])->name('payroll.index');

// Routes for editing payroll
Route::get('/payroll/{payroll}/edit', [PayrollController::class, 'edit'])->name('payroll.edit');
Route::put('/payroll/{payroll}', [PayrollController::class, 'update'])->name('payroll.update');
