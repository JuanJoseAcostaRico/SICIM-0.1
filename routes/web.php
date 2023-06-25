<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuppliesController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\ConditionController;
use App\Models\Departaments;
use App\Models\Instruments;
use App\Models\Conditions;
use App\Models\User;
use App\Models\Supplies;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::post('/user', 'store');
    Route::get('/user/{id}', 'show');
    Route::put('/user/{id}', 'update');
    Route::delete('/user/{id}', 'destroy');
});

Route::controller(SuppliesController::class)->group(function () {
    Route::get('/supplies', 'index');
    Route::post('/supply', 'store');
    Route::get('/supply/{id}', 'show');
    Route::put('/supply/{id}', 'update');
    Route::delete('/supply/{id}', 'destroy');
});

Route::controller(DepartamentController::class)->group(function () {
    Route::get('/departaments', 'index');
    Route::post('/departament', 'store');
    Route::get('/departament/{id}', 'show');
    Route::put('/departament/{id}', 'update');
    Route::delete('/departament/{id}', 'destroy');
});

Route::controller(InstrumentController::class)->group(function () {
    Route::get('/intruments', 'index');
    Route::post('/instrument', 'store');
    Route::get('/instrument/{id}', 'show');
    Route::put('/instrument/{id}', 'update');
    Route::delete('/instrument/{id}', 'destroy');
});

Route::controller(ConditionController::class)->group(function () {
    Route::get('/conditions', 'index');
    Route::post('/condition', 'store');
    Route::get('/condition/{id}', 'show');
    Route::put('/condition/{id}', 'update');
    Route::delete('/condition/{id}', 'destroy');
});
