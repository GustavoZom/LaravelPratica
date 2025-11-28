<!DOCTYPE html>
<html>
<head>
    <title>Lista e Cadastro de Categorias</title>
</head>
<body>
    <h1>Cadastro de Categorias</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif
    
    @if(isset($ultima_visita))
        <p style="color:blue;">Última visita registrada via **Cookie**: {{ $ultima_visita }}</p>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" value="{{ old('nome') }}" required>
        <br>
        <label>Descrição:</label>
        <textarea name="descricao">{{ old('descricao') }}</textarea>
        <br>
        
        @if ($errors->any())
            <div style="color:red;">
                </div>
        @endif

        <button type="submit">Cadastrar Categoria</button>
    </form>
    
    <hr>

    <h2>Lista de Categorias</h2>
    <ul>
        @foreach($categorias as $categoria)
            <li>
                {{ $categoria->nome }} 
                @if($categoria->descricao)
                    - ({{ $categoria->descricao }})
                @endif
                
                <a href="{{ route('categorias.edit', $categoria) }}">Editar</a>
                <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>