<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'GraficoController@loadDataGraphs')->name('templates.home');

Route::middleware(['auth'])->group(function () {
    Route::resource('/carros', 'CarroController')->only(['index', 'create', 'edit', 'destroy']);
    Route::resource('/cores', 'CorController')->only(['index', 'create', 'edit', 'destroy']);
    Route::resource('/marcas', 'MarcaController')->only(['index', 'create', 'edit', 'destroy']);
    Route::resource('/modelos', 'ModeloController')->only(['index', 'create', 'edit', 'destroy']);
});

Route::get('/relatorio', 'RelatorioController@createReport')->name('relatorio');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';