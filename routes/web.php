<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Model\Reports;


Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/report', [ReportController::class, 'showForm'])->name('report.form');
Route::post('/report', [ReportController::class, 'submitReport'])->name('report.submit');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth']);
Route::get('/history', [DashboardController::class, 'showHistory'])->name('report.history')->middleware(['auth']);
Route::get('/contact', [DashboardController::class, 'showContact'])->name('contact');

require __DIR__.'/auth.php';
