<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\OltController;
use App\Http\Controllers\OdpController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FiberCableController;
use App\Http\Controllers\FaultLogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/map', [MapController::class, 'index'])->name('map.index');
    Route::get('/map-data', [MapController::class, 'data'])->name('map.data');
    
    Route::resource('olts', OltController::class);
    Route::resource('odps', OdpController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('fiber_cables', FiberCableController::class);
    Route::resource('fault_logs', FaultLogController::class);
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
