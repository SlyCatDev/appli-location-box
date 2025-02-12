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

require __DIR__.'/auth.php';
