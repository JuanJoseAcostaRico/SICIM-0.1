<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuppliesController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\ConditionController;
use App\Models\Supplies;
use Illuminate\Support\Facades\Auth;

Route::group(['prefix' => 'panel'], function () {

    // Rutas de usuarios
    Route::get('usuarios/listausu', [UserController::class, 'index'])->name('usuarios.lista');
    Route::get('usuarios/registrousu', [UserController::class, 'create'])->name('usuarios.registro');
    Route::post('usuarios', [UserController::class, 'store'])->name('usuarios.store');
    Route::get('usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show');
    Route::get('/user/{id}/edit',[UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('usuarios.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');

    // Rutas de departamentos
    Route::get('departamento/listadep', [DepartamentController::class, 'index'])->name('departamento.lista');
    Route::get('departamento/registrodep', [DepartamentController::class, 'create'])->name('departamento.registro');
    Route::post('departamento', [DepartamentController::class, 'store'])->name('departamento.store');
    Route::get('departamento/{id}', [DepartamentController::class, 'show'])->name('departamento.show');
    Route::get('/departament/{id}/edit', [DepartamentController::class, 'edit'])->name('departamento.edit');
    Route::put('/departament/{id}', [DepartamentController::class, 'update'])->name('departamento.update');
    Route::delete('/departament/{id}', [DepartamentController::class, 'destroy'])->name('departamento.destroy');

    //Rutas Insumos
    Route::get('inventario/insumos/listainsumo', [SuppliesController::class, 'index'])->name('inventario.insumos.lista');
    Route::get('inventario/insumos/registroinsumo', [SuppliesController::class, 'create'])->name('inventario.insumos.registro');
    Route::post('inventario/insumos', [SuppliesController::class, 'store'])->name('inventario.insumos.store');
    Route::get('inventario/insumos/{id}', [SuppliesController::class, 'show'])->name('inventario.insumos.show');
    Route::get('inventario/insumos/{id}/edit', [SuppliesController::class, 'edit'])->name('inventario.insumos.edit');
    Route::put('inventario/insumos/{id}', [SuppliesController::class, 'update'])->name('inventario.insumos.update');
    Route::delete('inventario/insumos/{id}', [SuppliesController::class, 'destroy'])->name('inventario.insumos.destroy');

    //Rutas Instrumentos
    Route::get('inventario/instrumentos/listainstrumento', [InstrumentController::class, 'index'])->name('inventario.instrumentos.lista');
    Route::get('inventario/instrumentos/registroinstrumento', [InstrumentController::class, 'create'])->name('inventario.instrumentos.registro');
    Route::post('inventario/instrumentos', [InstrumentController::class, 'store'])->name('inventario.instrumentos.store');
    Route::get('inventario/instrumentos/{id}', [InstrumentController::class, 'show'])->name('inventario.instrumentos.show');
    Route::get('inventario/instrumentos/{id}/edit', [InstrumentController::class, 'edit'])->name('inventario.instrumentos.edit');
    Route::put('inventario/instrumentos/{id}', [InstrumentController::class, 'update'])->name('inventario.instrumentos.update');
    Route::delete('inventario/instrumentos/{id}', [InstrumentController::class, 'destroy'])->name('inventario.instrumentos.destroy');
});

    //Rutas para Respaldos Sidebar

    Route::get('/panel/respaldos/respaldo', function () {
        return view('panel.respaldos.respaldo');
    });

    Route::get('/panel/respaldos/restauracion', function () {
        return view('panel.respaldos.restauracion');
    });


    //Ruta para Reportes Sidebar

    Route::get('/panel/reportes/listarepo', function () {
        return view('panel.reportes.listaRepo');
    });


    //Rutas para Sistema Sidebar

    Route::get('/panel/sistema/gestioncuenta', function () {
        return view('panel.sistema.gestionCuenta');
    });

    Route::get('/panel/sistema/gestionsicim', function () {
        return view('panel.sistema.gestionSicim');
    });



