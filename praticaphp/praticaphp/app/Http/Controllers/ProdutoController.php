<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage; // Para gerenciar o upload/remoção de arquivos

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
            'preco' => 'required|numeric',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:2048' 
        ]);

        $dados = $request->only('nome', 'preco');
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
           
            $caminho_foto = $request->file('foto')->store('public/produtos');
            $dados['caminho_foto'] = $caminho_foto; // Adiciona o caminho para salvar no DB
        }

        Produto::create($dados);

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }
    
    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
        ]);
        
        $produto->update($request->only('nome', 'preco'));

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        
        if ($produto->caminho_foto) {
             Storage::delete($produto->caminho_foto);
        }
        
        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
    
}