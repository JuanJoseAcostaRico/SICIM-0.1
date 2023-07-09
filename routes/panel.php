<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuppliesController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\ConditionController;
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
});

    //Rutas para Inventario Sidebar
    Route::get('/panel/inventario/registroinstrumento', function () {
        return view('panel.inventario.registroInstrumento');
    });

    Route::get('/panel/inventario/listainstrumento', function () {
        return view('panel.inventario.listaInstrumento');
    });

    Route::get('/panel/inventario/registroinsumo', function () {
        return view('panel.inventario.registroInsumo');
    });

    Route::get('/panel/inventario/listainsumo', function () {
        return view('panel.inventario.listaInsumo');
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

    /*
    // Rutas de inventario
    Route::get('inventario/registroinsumo', [SuppliesController::class, 'create'])->name('inventario.registroinsumo');
    Route::get('inventario/listainsumo', [SuppliesController::class, 'index'])->name('inventario.listainsumo');
    Route::get('inventario/registroinstrumento', [InstrumentController::class, 'create'])->name('inventario.registroinstrumento');
    Route::get('inventario/listainstrumento', [InstrumentController::class, 'index'])->name('inventario.listainstrumento');


    // Rutas de departamentos
    Route::get('departamento/registrodep', [DepartamentController::class, 'create'])->name('departamento.registro');
    Route::get('departamento/listadep', [DepartamentController::class, 'index'])->name('departamento.lista');

    // Rutas de respaldos
    Route::get('respaldos/respaldo', [BackupController::class, 'backup'])->name('respaldos.respaldo');
    Route::get('respaldos/restauracion', [BackupController::class, 'restore'])->name('respaldos.restauracion');

    // Rutas de reportes
    Route::get('reportes/listarepo', [ReportController::class, 'index'])->name('reportes.lista');

    // Rutas de sistema
    Route::get('sistema/gestioncuenta', [SystemController::class, 'accountManagement'])->name('sistema.gestioncuenta');
    Route::get('sistema/gestionsicim', [SystemController::class, 'sicimManagement'])->name('sistema.gestionsicim');
    */

