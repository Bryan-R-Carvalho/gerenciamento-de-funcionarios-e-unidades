<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UnidadeController,
    FuncionarioController
};

Route::get('/', function () {
    return view('home');
});

Route::get('/unidades', [UnidadeController::class, "index"])->name('unidades.index');
Route::get('/unidades/create', [UnidadeController::class, "create"])->name('unidades.create');
Route::post('/unidades', [UnidadeController::class, "store"])->name('unidades.store');
Route::put('/unidades/{id}', [UnidadeController::class, "update"])->name('unidades.update');
Route::get('/unidades/edit/{id}', [UnidadeController::class, "edit"])->name('unidades.edit');
Route::delete('/unidades/{id}', [UnidadeController::class, "destroy"])->name('unidades.destroy');

Route::get('/funcionarios', [FuncionarioController::class, "index"])->name('funcionarios.index');
Route::get('/funcionarios/create', [FuncionarioController::class, "create"])->name('funcionarios.create');
Route::post('/funcionarios', [FuncionarioController::class, "store"])->name('funcionarios.store');
Route::put('/funcionarios/{id}', [FuncionarioController::class, "update"])->name('funcionarios.update');
Route::get('/funcionarios/edit/{id}', [FuncionarioController::class, "edit"])->name('funcionarios.edit');
Route::delete('/funcionarios/{id}', [FuncionarioController::class, "destroy"])->name('funcionarios.destroy');