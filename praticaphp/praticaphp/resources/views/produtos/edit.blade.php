<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto: {{ $produto->nome }}</title>
</head>
<body>
    <h1>Editar Produto</h1>

    <form action="{{ route('produtos.update', $produto) }}" method="POST">
        @csrf
        @method('PUT') 
        
        <label>Nome:</label>
        <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}" required>
        <br>
        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" value="{{ old('preco', $produto->preco) }}" required>
        <br>
        
        @if ($errors->any())
            <div style="color:red;">
                </div>
        @endif

        <button type="submit">Atualizar Produto</button>
    </form>
    
    <hr>
    <a href="{{ route('produtos.index') }}">Voltar para a Lista</a>
</body>
</html>