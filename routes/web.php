<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('admin/companies', CompanyController::class);
    Route::resource('admin/employees', EmployeeController::class);
    Route::get('admin/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
    Route::post('admin/login', [AuthController::class, 'checkLogin'])->name('login.check');
});

