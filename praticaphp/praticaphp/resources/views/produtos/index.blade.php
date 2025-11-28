<!DOCTYPE html>
<html>
<head>
    <title>Produtos</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" value="{{ old('nome') }}" required>
        <br>
        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" value="{{ old('preco') }}" required>
        <br>
        <label>Foto (PNG/JPG):</label>
        <input type="file" name="foto">
        <br>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <button type="submit">Cadastrar</button>
    </form>
    
    <hr>

    <h2>Lista de Produtos</h2>
    <table border="1" style="width:100%;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Foto</th>
                <th>Ações CRUD</th>
            </tr>
        </thead>
        <tbody>
        @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->nome }}</td>
                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                <td>
                    @if($produto->caminho_foto)
                        <img src="{{ Storage::url($produto->caminho_foto) }}" alt="{{ $produto->nome }}" style="width: 50px; height: 50px;">
                    @else
                        Sem foto
                    @endif
                </td>
                <td>
                    <a href="{{ route('produtos.edit', $produto) }}">Editar</a>
                    
                    <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>