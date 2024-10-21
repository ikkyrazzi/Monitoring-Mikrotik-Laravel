<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PPPoEController;
use App\Http\Controllers\HotspotController;
use App\Http\Controllers\ReportController;

// Authentication Routes
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');

// Dashboard Route
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    // Realtime
    Route::get('cpu', [DashboardController::class, 'cpu'])->name('cpu');
    Route::get('load', [DashboardController::class, 'load'])->name('load');
    Route::get('uptime', [DashboardController::class, 'uptime'])->name('uptime');
    Route::get('{traffic}', [DashboardController::class, 'traffic'])->name('traffic');
});

// PPPoE Routes
Route::prefix('pppoe')->name('pppoe.')->group(function () {
    Route::get('secret', [PPPoEController::class, 'index'])->name('secret');
    Route::get('secret/active', [PPPoEController::class, 'active'])->name('active');
    Route::post('secret/add', [PPPoEController::class, 'add'])->name('add');
    Route::get('secret/edit/{id}', [PPPoEController::class, 'edit'])->name('edit');
    Route::post('secret/update', [PPPoEController::class, 'update'])->name('update');
    Route::get('secret/delete/{id}', [PPPoEController::class, 'delete'])->name('delete');
});

// Hotspot Routes
Route::prefix('hotspot')->name('hotspot.')->group(function () {
    Route::get('users', [HotspotController::class, 'users'])->name('users');
    Route::get('users/active', [HotspotController::class, 'active'])->name('active');
    Route::post('users/add', [HotspotController::class, 'add'])->name('add');
    Route::get('users/edit/{id}', [HotspotController::class, 'edit'])->name('edit');
    Route::post('users/update', [HotspotController::class, 'update'])->name('update');
    Route::get('users/delete/{id}', [HotspotController::class, 'delete'])->name('delete');
});

Route::prefix('report')->name('report.')->group(function () {
    // Store Data Up
    Route::get('up', [ReportController::class, 'up'])->name('up');

    // Store Data Down
    Route::get('down', [ReportController::class, 'down'])->name('down');
});

Route::get('report-traffic', [ReportController::class, 'index'])->name('traffic.index');

// Route::prefix('traffic')->name('traffic.')->group(function () {
//     // Report Traffic UP & Search
//     Route::get('/', [ReportController::class, 'index'])->name('index');
//     Route::get('/load', [ReportController::class, 'load'])->name('load');
//     Route::get('/search', [ReportController::class, 'search'])->name('search');
// });

