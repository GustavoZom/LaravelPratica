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

    <form action="/produtos" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" required>
        <br><br>
        <button type="submit">Cadastrar</button>
    </form>

    <h2>Lista de Produtos</h2>
    <ul>
        @foreach($produtos as $produto)
            <li>{{ $produto->nome }} - R$ {{ $produto->preco }}</li>
        @endforeach
    </ul>

    <a href="/categorias">Ir para Categorias</a>
</body>
</html>