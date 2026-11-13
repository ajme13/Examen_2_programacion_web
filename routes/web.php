<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProveedorController;

Route::get('/', function () {
    return view('Layouts.dashboard');
})->name('dashboard');

Route::resource('medicamentos', MedicamentoController::class);

Route::resource('empleados', EmpleadoController::class);

Route::resource('proveedores', ProveedorController::class)->parameters([
    'proveedores' => 'proveedor'
]);
