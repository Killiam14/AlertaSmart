<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ConfigurationController;

// Redirección al login si no está autenticado
Route::get('/', function () {
    return redirect('/login');
});

// Dashboard de usuario
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rutas para administración de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Formulario de reportes
Route::get('/report', [ReportController::class, 'showForm'])->name('report.form');
Route::post('/report', [ReportController::class, 'submitReport'])->name('report.submit');

// Historial y contacto
Route::get('/history', [DashboardController::class, 'showHistory'])->name('report.history')->middleware(['auth']);
Route::get('/contact', [DashboardController::class, 'showContact'])->name('contact');

// Ruta de administración exclusiva para admins
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.users'); // Ruta para gestionar usuarios
    Route::get('/admin/manage-reports', [AdminController::class, 'manageReports'])->name('admin.reports');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/configurations', [ConfigurationController::class, 'edit'])->name('configurations.edit');
    Route::put('/admin/configurations', [ConfigurationController::class, 'update'])->name('configurations.update');
});

require __DIR__.'/auth.php';
