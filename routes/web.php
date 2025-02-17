<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ContractModelController;

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
    Route::get('/', [TenantController::class, 'index'])->name('tenants.index');
    Route::get('/create', [TenantController::class, 'create'])->name('tenants.create');
    Route::post('/', [TenantController::class, 'store'])->name('tenants.store');
    Route::get('/{tenant}', [TenantController::class, 'show'])->name('tenants.show');
    Route::get('/{tenant}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
    Route::put('/{tenant}/update', [TenantController::class, 'update'])->name('tenants.update');
    Route::delete('/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');
});

Route::middleware('auth')->prefix('/contract_models')->group(function () {
    Route::get('/', [ContractModelController::class, 'index'])->name('contract_models.index');
    Route::get('/create', [ContractModelController::class, 'create'])->name('contract_models.create');
    Route::post('/', [ContractModelController::class, 'store'])->name('contract_models.store');
    // Route::post('/save', [ContractModelController::class, 'save'])->name('contract_models.save');
    Route::get('/{contract_model}', [ContractModelController::class, 'show'])->name('contract_models.show');
    Route::get('/{contract_model}/edit', [ContractModelController::class, 'edit'])->name('contract_models.edit');
    Route::put('/{contract_model}/update', [ContractModelController::class, 'update'])->name('contract_models.update');
    Route::delete('/{contract_model}', [ContractModelController::class, 'destroy'])->name('contract_models.destroy');
});

require __DIR__.'/auth.php';
