<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoteisController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\LocationController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//--------- Lista Hoteis-----------
Route::get('/hoteis', [App\Http\Controllers\HoteisController::class, 'index'])->name('hoteis.index');

Route::get('/hoteis/create', [App\Http\Controllers\HoteisController::class, 'create'])->name('hoteis.create');

Route::post('/hoteis', [App\Http\Controllers\HoteisController::class, 'store'])->name('hoteis.store');

Route::get('/hoteis/{id}', [App\Http\Controllers\HoteisController::class, 'show'])->name('hoteis.show');

Route::get('/hoteis/{id}/edit',[App\Http\Controllers\HoteisController::class, 'edit'])->name('hoteis.edit');

Route::put('/hoteis/{id}', [App\Http\Controllers\HoteisController::class, 'update'])->name('hoteis.update');

Route::delete('/hoteis/{id}', [App\Http\Controllers\HoteisController::class, 'destroy'])->name('hoteis.destroy');

Route::get('/localidades/cidades/{estadoId}', [App\Http\Controllers\LocationController::class, 'getCidades'])->name('localidades.cidades'); // Rota para buscar as cidades


