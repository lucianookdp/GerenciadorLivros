@extends('layouts.app')

@section('content')
    <h1>Editar Livro</h1>
    <form action="/livros/{{ $livro->id }}" method="POST" class="mt-3" onsubmit="registerActivity('Editado', document.getElementById('titulo').value)">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $livro->titulo) }}">
            @if ($errors->has('titulo'))
                <div class="text-danger">{{ $errors->first('titulo') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" value="{{ old('autor', $livro->autor) }}">
            @if ($errors->has('autor'))
                <div class="text-danger">{{ $errors->first('autor') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
            <input type="text" name="ano_publicacao" id="ano_publicacao" class="form-control" value="{{ old('ano_publicacao', $livro->ano_publicacao) }}">
            @if ($errors->has('ano_publicacao'))
                <div class="text-danger">{{ $errors->first('ano_publicacao') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="form-select">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id', $livro->categoria_id) == $categoria->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                @endforeach
            </select>
            @if ($errors->has('categoria_id'))
                <div class="text-danger">{{ $errors->first('categoria_id') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control">{{ old('descricao', $livro->descricao) }}</textarea>
            @if ($errors->has('descricao'))
                <div class="text-danger">{{ $errors->first('descricao') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Atualizar</button>
    </form>

    <script>
        function registerActivity(action, title) {
            let activities = JSON.parse(localStorage.getItem('activities')) || [];
            activities.push({ action: action, livro: title, time: new Date() });
            localStorage.setItem('activities', JSON.stringify(activities));
        }
    </script>
@endsection