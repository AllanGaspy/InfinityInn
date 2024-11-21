<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HoteisController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\PostagemController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HoteisController::class, 'welcome'])->name('home');
Route::get('/buscars', [HoteisController::class, 'buscar'])->name('buscar');
Route::get('/hotel/{id}', [HoteisController::class, 'show'])->name('hotel.show');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function (){


    //--------- Lista Hoteis-----------
    Route::get('/hoteis', [HoteisController::class, 'index'])->name('hoteis.index');

    Route::get('/hoteis/create', [HoteisController::class, 'create'])->name('hoteis.create');

    Route::post('/hoteis', [HoteisController::class, 'store'])->name('hoteis.store');

    Route::get('/hoteis/{id}', [HoteisController::class, 'show'])->name('hoteis.show');

    Route::get('/hoteis/{id}/edit',[HoteisController::class, 'edit'])->name('hoteis.edit');

    Route::put('/hoteis/{id}', [HoteisController::class, 'update'])->name('hoteis.update');

    Route::delete('/hoteis/{id}', [HoteisController::class, 'destroy'])->name('hoteis.destroy');




    // Rota para buscar as cidades
    Route::get('/localidades/cidades/{estadoId}', [LocationController::class, 'getCidades'])->name('localidades.cidades');



    //--------- Postagens-----------
    Route::get('/postagem', [PostagemController::class, 'index'])->name('postagem.index');

    Route::get('/postagem/create', [PostagemController::class, 'create'])->name('postagem.create');

    Route::post('/postagem', [PostagemController::class, 'store'])->name('postagem.store');

    Route::get('/postagem/{id}', [PostagemController::class, 'show'])->name('postagem.show');

    Route::get('/postagem/{id}/edit',[PostagemController::class, 'edit'])->name('postagem.edit');

    Route::put('/postagem/{id}', [PostagemController::class, 'update'])->name('postagem.update');

    Route::delete('/postagem/{id}', [PostagemController::class, 'destroy'])->name('postagem.destroy');



    //--------- Reservas-----------
    Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');

    Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');

    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');

    Route::get('/reservas/{id}', [ReservaController::class, 'show'])->name('reservas.show');

    Route::get('/reservas/{id}/edit',[ReservaController::class, 'edit'])->name('reservas.edit');

    Route::put('/reservas/{id}', [ReservaController::class, 'update'])->name('reservas.update');

    Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');

});
