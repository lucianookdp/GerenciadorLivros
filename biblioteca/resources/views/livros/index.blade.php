<!-- resources/views/livros/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Gerenciador</h1>
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <p class="lead">Total de Livros: {{ $totalLivros }}</p>
        <div>
            <a href="{{ route('livros.create') }}" class="btn btn-primary me-2"><i class="fas fa-plus"></i> Adicionar Livro</a>
            <a href="{{ route('livros.index') }}" class="btn btn-secondary me-2"><i class="fas fa-sync"></i> Refresh</a>
            <a href="{{ route('livros.relatorios') }}" class="btn btn-info"><i class="fas fa-file-alt"></i> Logs</a>
        </div>
    </div>

    <form method="GET" action="{{ route('livros.index') }}" class="mb-4">
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
                    <a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                    <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display:inline-block;" onsubmit="registerActivity('Deletado', '{{ $livro->titulo }}')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Deletar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <script>
        function registerActivity(action, title) {
            let activities = JSON.parse(localStorage.getItem('activities')) || [];
            activities.push({ action: action, livro: title, time: new Date() });
            localStorage.setItem('activities', JSON.stringify(activities));
        }
    </script>
@endsection
