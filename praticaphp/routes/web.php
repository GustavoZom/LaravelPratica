<?php

use app\Http\Controllers\ProdutoController;
use app\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return redirect('/produtos');
});

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);

Route::get('/categorias', [CategoriaController::class, 'index']);
Route::post('/categorias', [CategoriaController::class, 'store']);
