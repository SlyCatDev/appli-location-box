<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('/profil')->group(function () {
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('/boxes')->group(function () {
    Route::get('/', [BoxController::class, 'index'])->name('boxes.index');
    Route::get('/create', [BoxController::class, 'create'])->name('boxes.create');
    Route::post('/', [BoxController::class, 'store'])->name('boxes.store');
    Route::get('/{box}', [BoxController::class, 'show'])->name('boxes.show');
    Route::get('/{box}/edit', [BoxController::class, 'edit'])->name('boxes.edit');
    Route::put('/{box}/update', [BoxController::class, 'update'])->name('boxes.update');
    Route::delete('/{box}', [BoxController::class, 'destroy'])->name('boxes.destroy');
});

Route::middleware('auth')->prefix('/tenants')->group(function () {
    Route::get('/', [BoxController::class, 'index'])->name('tenants.index');
    Route::get('/create', [BoxController::class, 'create'])->name('tenants.create');
    Route::post('/', [BoxController::class, 'store'])->name('tenants.store');
    Route::get('/{tenant}', [BoxController::class, 'show'])->name('tenants.show');
    Route::get('/{tenant}/edit', [BoxController::class, 'edit'])->name('tenants.edit');
    Route::put('/{tenant}/update', [BoxController::class, 'update'])->name('tenants.update');
    Route::delete('/{tenant}', [BoxController::class, 'destroy'])->name('tenants.destroy');
});

require __DIR__.'/auth.php';
