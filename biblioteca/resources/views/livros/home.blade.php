@extends('layouts.app')

@section('content')
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('imgs/imagem1.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('imgs/imagem2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('imgs/imagem3.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <div class="content-section mt-5">
        <h2 class="text-primary">Sobre o Gerenciador</h2>
        <p>O <strong>Gerenciador de Livros</strong> é uma aplicação projetada para facilitar o gerenciamento de bibliotecas pessoais e profissionais. Nossa plataforma permite que você:</p>
        <ul class="list-unstyled">
            <li><i class="fas fa-plus-circle text-primary"></i> Adicione novos livros ao seu catálogo</li>
            <li><i class="fas fa-edit text-primary"></i> Edite as informações dos livros existentes</li>
            <li><i class="fas fa-eye text-primary"></i> Visualize detalhes completos de cada livro</li>
            <li><i class="fas fa-trash-alt text-primary"></i> Delete livros que não são mais necessários</li>
            <li><i class="fas fa-tags text-primary"></i> Classifique livros por categorias para uma melhor organização</li>
        </ul>
    </div>
  
    <div class="content-section mt-5">
        <h2 class="text-primary">Benefícios</h2>
        <p>Utilizar o <strong>Gerenciador de Livros</strong> traz diversos benefícios, como:</p>
        <ul class="list-unstyled">
            <li><i class="fas fa-check-circle text-primary"></i> Melhoria na organização da sua biblioteca</li>
            <li><i class="fas fa-check-circle text-primary"></i> Acesso rápido e fácil às informações dos livros</li>
            <li><i class="fas fa-check-circle text-primary"></i> Geração de relatórios precisos para acompanhamento</li>
        </ul>
    </div>
@endsection