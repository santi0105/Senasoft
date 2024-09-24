<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\BicicletaController;
use App\Http\Controllers\AlquilereController;
use App\Http\Controllers\EntregaController;
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
    Route::resource('roles', RoleController::class);
    Route::resource('centros', CentroController::class);
    Route::resource('bicicletas', BicicletaController::class);
    Route::resource('alquileres', AlquilereController::class);
    Route::resource('entregas', EntregaController::class);
});

require __DIR__.'/auth.php';
