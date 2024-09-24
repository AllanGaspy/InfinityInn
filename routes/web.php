<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//--Categorias-----------
Route::get('/categoria', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categoria.index');

Route::get('/categoria/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('categoria.create');

Route::post('/categoria', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categoria.store');

Route::get('/categoria/{id}', [App\Http\Controllers\CategoriaController::class, 'show'])->name('categoria.show');

