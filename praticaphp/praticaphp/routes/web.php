<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

// Rotas de Recurso para CRUD Completo
Route::resource('produtos', ProdutoController::class);
Route::resource('categorias', CategoriaController::class);

// Página inicial
Route::get('/', [ProdutoController::class, 'index'])->name('home');