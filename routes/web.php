<?php

use App\Http\Controllers\InvestmentController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [InvestmentController::class, 'dashboard'])->name('dashboard');

Route::get('/investments', [InvestmentController::class, 'index'])->name('investments.index');
Route::get('/investments/create', [InvestmentController::class, 'create'])->name('investments.create');
Route::post('/investments', [InvestmentController::class, 'store'])->name('investments.store');
Route::get('/investments/{investment}/edit', [InvestmentController::class, 'edit'])->name('investments.edit');
Route::put('/investments/{investment}', [InvestmentController::class, 'update'])->name('investments.update');
Route::delete('/investments/{investment}', [InvestmentController::class, 'destroy'])->name('investments.destroy');