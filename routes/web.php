<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TicketController;

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

//Team Route
Route::resource('/tickets/', TicketController::class);
Route::get('/create-ticket', [TicketController::class, 'create']);
// Route::get('/edit-ticket/{ticket}', [TicketController::class, 'edit_ticket']);
// Route::post('/update-ticket/{ticket}', [TicketController::class, 'update']);
Route::delete('/ticket-delete/{ticket}', [TicketController::class, 'delete']);
Route::get('/ticket-status{ticket}', [TicketController::class, 'change_status']);
