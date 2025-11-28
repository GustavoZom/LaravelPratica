@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h2>Cadastrar Produto</h2>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome do Produto</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Preço</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoria</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">Selecione uma categoria</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
        </form>
    </div>

    <div class="col-md-6">
        <h2>Lista de Produtos</h2>
        @if($products->count() > 0)
            <div class="list-group">
                @foreach($products as $product)
                    <div class="list-group-item">
                        <h5>{{ $product->name }}</h5>
                        <p class="mb-1">{{ $product->description }}</p>
                        <small>Preço: R$ {{ number_format($product->price, 2, ',', '.') }}</small><br>
                        <small>Categoria: {{ $product->category->name }}</small>
                    </div>
                @endforeach
            </div>
        @else
            <p>Nenhum produto cadastrado.</p>
        @endif
    </div>
</div>
@endsection