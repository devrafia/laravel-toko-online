<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('stores', [Controllers\StoreController::class, 'index'])->name('stores.index');

Route::middleware('auth')->group(function () {
    Route::resource('stores', Controllers\StoreController::class)->except('index');
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
