<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

// Produtos
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');

// Categorias
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');

// Página inicial
Route::get('/', [ProdutoController::class, 'index'])->name('home');