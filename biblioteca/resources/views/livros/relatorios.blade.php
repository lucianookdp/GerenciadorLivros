<!-- resources/views/livros/relatorios.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Relatórios de Atividades Recentes</h1>
    <div class="mb-3 d-flex justify-content-between">
        <a href="{{ route('livros.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
        <button class="btn btn-danger" id="clear-activities"><i class="fas fa-trash"></i> Limpar Atividades</button>
    </div>
    <ul class="list-group" id="activity-list"></ul>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const activities = JSON.parse(localStorage.getItem('activities')) || [];
            const activityList = document.getElementById('activity-list');
            activities.forEach(activity => {
                const listItem = document.createElement('li');
                listItem.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');

                const detailsDiv = document.createElement('div');
                detailsDiv.innerHTML = `<h5 class="mb-1">${activity.action}</h5>
                                        <small>Livro: ${activity.livro} - Data: ${new Date(activity.time).toLocaleString()}</small>`;
                listItem.appendChild(detailsDiv);

                activityList.appendChild(listItem);
            });

            document.getElementById('clear-activities').addEventListener('click', function() {
                localStorage.removeItem('activities');
                activityList.innerHTML = '';
            });
        });
    </script>
@endsection
