<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        Categoria::create($request->only(['nome', 'descricao']));

        return redirect('/categorias')->with('success', 'Categoria cadastrada com sucesso!');
    }
}
