<!DOCTYPE html>
<html>
<head>
    <title>Categorias</title>
</head>
<body>
    <h1>Cadastro de Categorias</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form action="/categorias" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <label>Descrição:</label>
        <textarea name="descricao"></textarea>
        <button type="submit">Cadastrar</button>
    </form>

    <h2>Lista de Categorias</h2>
    <ul>
        @foreach($categorias as $categoria)
            <li>{{ $categoria->nome }} - {{ $categoria->descricao }}</li>
        @endforeach
    </ul>
</body>
</html>