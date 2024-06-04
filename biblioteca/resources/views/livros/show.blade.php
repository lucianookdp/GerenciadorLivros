@extends('layouts.app')

@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">{{ $livro->titulo }}</h5>
            <p class="card-text"><strong>Autor:</strong> {{ $livro->autor }}</p>
            <p class="card-text"><strong>Ano de Publicação:</strong> {{ $livro->ano_publicacao }}</p>
            <p class="card-text"><strong>Categoria:</strong> {{ $livro->categoria ? $livro->categoria->nome : 'Sem Categoria' }}</p>
            <p class="card-text"><strong>Descrição:</strong> {{ $livro->descricao ?? 'N/A' }}</p>
            <a href="{{ route('livros.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>
@endsection