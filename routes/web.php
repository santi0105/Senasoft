<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\BicicletaController;
use App\Http\Controllers\AlquilereController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EstadisticaController;
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
    Route::resource('eventos', EventoController::class);
    Route::resource('estadisticas', EstadisticaController::class);
});

require __DIR__.'/auth.php';
