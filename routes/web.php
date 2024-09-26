<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;

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


 
//Admin login
Route::get('/admins', [AdminController::class, 'index'])->name('admin.sign.in');
Route::post('/admin.dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/admin-dashboard', [SuperAdminController::class, 'dashboard']);
Route::get('/admin-logout', [SuperAdminController::class, 'logout']);
