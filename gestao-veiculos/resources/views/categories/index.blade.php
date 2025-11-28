@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h2>Cadastrar Categoria</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome da Categoria</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Categoria</button>
        </form>
    </div>

    <div class="col-md-6">
        <h2>Lista de Categorias</h2>
        @if($categories->count() > 0)
            <div class="list-group">
                @foreach($categories as $category)
                    <div class="list-group-item">
                        <h5>{{ $category->name }}</h5>
                        <p class="mb-1">{{ $category->description }}</p>
                        <small>{{ $category->products->count() }} produtos</small>
                    </div>
                @endforeach
            </div>
        @else
            <p>Nenhuma categoria cadastrada.</p>
        @endif
    </div>
</div>
@endsection