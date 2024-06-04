<!-- resources/views/livros/lista.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Lista de Livros</h1>
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <p class="lead">Total de Livros: {{ $totalLivros }}</p>
        <div>
            <a href="{{ route('livros.lista') }}" class="btn btn-secondary"><i class="fas fa-sync"></i> Refresh</a>
        </div>
    </div>

    <form method="GET" action="{{ route('livros.lista') }}" class="mb-4">
        <div class="row g-2">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Buscar por título ou autor" value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="categoria_id" class="form-select">
                    <option value="">Escolha a categoria...</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select name="sort_by" class="form-select">
                    <option value="">Ordenar por...</option>
                    <option value="ano_publicacao" {{ request('sort_by') == 'ano_publicacao' ? 'selected' : '' }}>Ano de Publicação</option>
                    <option value="autor" {{ request('sort_by') == 'autor' ? 'selected' : '' }}>Autor</option>
                    <option value="titulo" {{ request('sort_by') == 'titulo' ? 'selected' : '' }}>Título</option>
                </select>
            </div>
        </div>
        <div class="row g-2 mt-2">
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Buscar</button>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Filtrar</button>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Ordenar</button>
            </div>
        </div>
    </form>

    <ul class="list-group">
        @foreach ($livros as $livro)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">{{ $livro->titulo }}</h5>
                    <small>{{ $livro->autor }} - {{ $livro->ano_publicacao }} - {{ $livro->categoria ? $livro->categoria->nome : 'Sem Categoria' }}</small>
                </div>
                <div>
                    <a href="{{ route('livros.show', $livro->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</a>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
