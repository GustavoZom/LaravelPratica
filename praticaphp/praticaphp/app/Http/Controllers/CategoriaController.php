<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Cookie; // Para gerenciar cookies

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        
        Cookie::queue('ultima_visita_categorias', now()->toDateTimeString(), 60);
        $ultima_visita = Cookie::get('ultima_visita_categorias'); // Recupera o cookie

        return view('categorias.index', compact('categorias', 'ultima_visita'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string'
        ]);

        Categoria::create($request->only('nome', 'descricao'));

       
        return redirect()->route('categorias.index')->with('success', 'Categoria cadastrada com sucesso!');
    }

   
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string'
        ]);
        
        $categoria->update($request->only('nome', 'descricao'));

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }
    
    
}