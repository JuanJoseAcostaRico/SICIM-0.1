<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuppliesController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\MovementsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BackupController;
use Illuminate\Support\Facades\Auth;

Route::group(['prefix' => 'panel'], function () {

    // Rutas de usuarios
    Route::get('usuarios/listausu', [UserController::class, 'index'])->middleware('can:usuarios.lista')->name('usuarios.lista');
    Route::get('usuarios/registrousu', [UserController::class, 'create'])->middleware('can:usuarios.registro')->name('usuarios.registro');
    Route::post('usuarios', [UserController::class, 'store'])->name('usuarios.store');
    Route::get('usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->middleware('can:usuarios.edit')->name('usuarios.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('usuarios.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');

    // Rutas de departamentos
    Route::get('departamento/listadep', [DepartamentController::class, 'index'])->middleware('can:departamento.lista')->name('departamento.lista');
    Route::get('departamento/registrodep', [DepartamentController::class, 'create'])->middleware('can:departamento.registro')->name('departamento.registro');
    Route::post('departamento', [DepartamentController::class, 'store'])->name('departamento.store');
    Route::get('departamento/{id}', [DepartamentController::class, 'show'])->middleware('can:departamento.show')->name('departamento.show');
    Route::get('/departament/{id}/edit', [DepartamentController::class, 'edit'])->middleware('can:departamento.edit')->name('departamento.edit');
    Route::put('/departament/{id}', [DepartamentController::class, 'update'])->name('departamento.update');
    Route::delete('/departament/{id}', [DepartamentController::class, 'destroy'])->name('departamento.destroy');

    //Rutas Insumos
    Route::get('inventario/insumos/listainsumo', [SuppliesController::class, 'index'])->middleware('can:inventario.insumos.lista')->name('inventario.insumos.lista');
    Route::get('inventario/insumos/registroinsumo', [SuppliesController::class, 'create'])->middleware('can:inventario.insumos.registro')->name('inventario.insumos.registro');
    Route::post('inventario/insumos', [SuppliesController::class, 'store'])->name('inventario.insumos.store');
    Route::get('inventario/insumos/{id}', [SuppliesController::class, 'show'])->middleware('can:inventario.insumos.show')->name('inventario.insumos.show');
    Route::get('inventario/insumos/{id}/edit', [SuppliesController::class, 'edit'])->middleware('can:inventario.insumos.edit')->name('inventario.insumos.edit');
    Route::put('inventario/insumos/{id}', [SuppliesController::class, 'update'])->name('inventario.insumos.update');
    Route::delete('inventario/insumos/{id}', [SuppliesController::class, 'destroy'])->name('inventario.insumos.destroy');

    //Rutas Movimientos Insumos
    Route::get('inventario/insumos/movimiento/listamovimiento', [MovementsController::class, 'index'])->name('inventario.movimientos.lista');
    Route::get('inventario/insumos/movimiento/registromovimiento', [MovementsController::class, 'create'])->name('inventario.movimientos.registro');
    Route::post('inventario/insumos/movimiento', [MovementsController::class, 'store'])->name('inventario.insumos.movimientos.store');
    Route::get('inventario/insumos/movimiento/{id}', [MovementsController::class, 'show'])->name('inventario.insumos.movimientos.show');
    Route::get('inventario/insumos/movimiento/{id}/edit', [MovementsController::class, 'edit'])->name('inventario.insumos.movimientos.edit');
    Route::put('inventario/insumos/movimiento/{id}', [MovementsController::class, 'update'])->name('inventario.insumos.movimientos.update');
    Route::delete('inventario/insumos/movimiento/{id}', [MovementsController::class, 'destroy'])->name('inventario.insumos.movimientos.destroy');

    //Rutas Instrumentos
    Route::get('inventario/instrumentos/listainstrumento', [InstrumentController::class, 'index'])->middleware('can:inventario.instrumentos.lista')->name('inventario.instrumentos.lista');
    Route::get('inventario/instrumentos/registroinstrumento', [InstrumentController::class, 'create'])->middleware('can:inventario.instrumentos.registro')->name('inventario.instrumentos.registro');
    Route::post('inventario/instrumentos', [InstrumentController::class, 'store'])->name('inventario.instrumentos.store');
    Route::get('inventario/instrumentos/{id}', [InstrumentController::class, 'show'])->middleware('can:inventario.instrumentos.show')->name('inventario.instrumentos.show');
    Route::get('inventario/instrumentos/{id}/edit', [InstrumentController::class, 'edit'])->middleware('can:inventario.instrumentos.edit')->name('inventario.instrumentos.edit');
    Route::put('inventario/instrumentos/{id}', [InstrumentController::class, 'update'])->name('inventario.instrumentos.update');
    Route::delete('inventario/instrumentos/{id}', [InstrumentController::class, 'destroy'])->name('inventario.instrumentos.destroy');

    //Ruta para Reportes Sidebar
    Route::get('reportes/listareposupply', function () {
        return view('panel.reportes.listaRepoSupply');
    })->middleware('can:panel.reportes')->name('panel.reportes.supply');
    Route::get('reportes/listarepoinstrument', [ReportController::class, 'listaRepoInstrumentView'])->middleware('can:panel.reportes')->name('panel.reportes.instrument');
    // reportes insumos
    Route::get('/reportes/insumos', [ReportController::class, 'insumos'])->name('reportes.insumos');
    Route::get('/reportes/insumosporfechas', [ReportController::class, 'insumosporfechas'])->name('reportes.insumosporfechas');
    //reportes instrumentos
    Route::get('/reportes/instrumentos', [ReportController::class, 'instrumentos'])->name('reportes.instrumentos');
    Route::get('/reportes/instrumentosporfechas', [ReportController::class, 'instrumentosporfechas'])->name('reportes.instrumentosporfechas');
    Route::get('/reportes/instrumentospornombre', [ReportController::class, 'instrumentospornombre'])->name('reportes.instrumentospornombre');
    Route::get('/reportes/instrumentospordepartamento', [ReportController::class, 'instrumentospordepartamento'])->name('reportes.instrumentospordepartamento');
    // reportes movimientos
    Route::get('/reportes/movimientos', [ReportController::class, 'movimientos'])->name('reportes.movimientos');
    Route::get('/reportes/movimientosporfechas', [ReportController::class, 'movimientosporfechas'])->name('reportes.movimientosporfechas');
    Route::get('/reportes/movimientosporlote', [ReportController::class, 'movimientosporlote'])->name('reportes.movimientosporlote');
    Route::get('/reportes/movimientosporinsumo', [ReportController::class, 'movimientosporinsumo'])->name('reportes.movimientosporinsumo');

    //Respaldos Y Restauración
    Route::get('/respaldos/respaldo', [BackupController::class, 'index'])->middleware('can:respaldo.index')->name('respaldo.index');
    Route::post('/respaldos/crear', [BackupController::class, 'crearRespaldo'])->middleware('throttle:2,1')->name('respaldo.crearRespaldo');
    Route::post('/respaldos/restaurar', [BackupController::class, 'restaurarRespaldo'])->middleware('throttle:2,1')->name('respaldo.restaurarRespaldo');

});

//Rutas para Sistema Sidebar
Route::get('/panel/sistema/gestioncuenta', function () {
    return view('panel.sistema.gestionCuenta');
});


