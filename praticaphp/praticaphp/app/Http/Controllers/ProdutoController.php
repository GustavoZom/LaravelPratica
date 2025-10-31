<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric'
        ]);

        Produto::create($request->only('nome', 'preco'));

        // redireciona para a rota nomeada
        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }
}
