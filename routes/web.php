<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HoteisController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\LocationController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//--------- Lista Hoteis-----------
Route::get('/hoteis', [HoteisController::class, 'index'])->name('hoteis.index');

Route::get('/hoteis/create', [HoteisController::class, 'create'])->name('hoteis.create');

Route::post('/hoteis', [HoteisController::class, 'store'])->name('hoteis.store');

Route::get('/hoteis/{id}', [HoteisController::class, 'show'])->name('hoteis.show');

Route::get('/hoteis/{id}/edit',[HoteisController::class, 'edit'])->name('hoteis.edit');

Route::put('/hoteis/{id}', [HoteisController::class, 'update'])->name('hoteis.update');

Route::delete('/hoteis/{id}', [HoteisController::class, 'destroy'])->name('hoteis.destroy');

Route::get('/localidades/cidades/{estadoId}', [LocationController::class, 'getCidades'])->name('localidades.cidades'); // Rota para buscar as cidades


