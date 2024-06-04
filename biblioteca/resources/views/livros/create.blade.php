@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Adicionar Livro</h1>
    <form action="{{ route('livros.store') }}" method="POST" onsubmit="registerActivity('Adicionado', document.getElementById('titulo').value)">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" value="{{ old('autor') }}">
        </div>
        <div class="mb-3">
            <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
            <input type="number" class="form-control" id="ano_publicacao" name="ano_publicacao" value="{{ old('ano_publicacao') }}">
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao">{{ old('descricao') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select class="form-select" id="categoria_id" name="categoria_id">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Adicionar Livro</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
    </form>

    <script>
        function registerActivity(action, title) {
            let activities = JSON.parse(localStorage.getItem('activities')) || [];
            activities.push({ action: action, livro: title, time: new Date() });
            localStorage.setItem('activities', JSON.stringify(activities));
        }
    </script>
@endsection