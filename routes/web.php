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
    return view('custom_welcome');
})->name('custom_welcome');


Auth::routes();

Route::get('/register', [App\Http\Controllers\HomeController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->middleware('auth');
    Route::post('/user', 'store')->middleware('auth');
    Route::get('/user/{id}', 'show')->middleware('auth');
    Route::put('/user/{id}', 'update')->middleware('auth');
    Route::delete('/user/{id}', 'destroy')->middleware('auth');
});

Route::controller(SuppliesController::class)->group(function () {
    Route::get('/supplies', 'index')->middleware('auth');
    Route::post('/supply', 'store')->middleware('auth');
    Route::get('/supply/{id}', 'show')->middleware('auth');
    Route::put('/supply/{id}', 'update')->middleware('auth');
    Route::delete('/supply/{id}', 'destroy')->middleware('auth');
});

Route::controller(DepartamentController::class)->group(function () {

    Route::get('/departaments', 'index')->middleware('auth');
    Route::post('/departament', 'store')->middleware('auth');
    Route::get('/departament/{id}', 'show')->middleware('auth');
    Route::put('/departament/{id}', 'update')->middleware('auth');
    Route::delete('/departament/{id}', 'destroy')->middleware('auth');
});

Route::controller(InstrumentController::class)->group(function () {
    Route::get('/intruments', 'index')->middleware('auth');
    Route::post('/instrument', 'store')->middleware('auth');
    Route::get('/instrument/{id}', 'show')->middleware('auth');
    Route::put('/instrument/{id}', 'update')->middleware('auth');
    Route::delete('/instrument/{id}', 'destroy')->middleware('auth');
});

Route::controller(ConditionController::class)->group(function () {
    Route::get('/conditions', 'index')->middleware('auth');
    Route::post('/condition', 'store')->middleware('auth');
    Route::get('/condition/{id}', 'show')->middleware('auth');
    Route::put('/condition/{id}', 'update')->middleware('auth');
    Route::delete('/condition/{id}', 'destroy')->middleware('auth');
});
 */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

