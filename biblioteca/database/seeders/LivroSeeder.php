<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livro;
use App\Models\Categoria;

class LivroSeeder extends Seeder
{
    public function run()
    {
        // Categorias pré-definidas
        $categorias = [
            'Romance', 'Aventura', 'Ficção', 'Biografia', 'História', 'Ciência', 'Fantasia', 'Tecnologia'
        ];

        // Cria as categorias no banco de dados
        foreach ($categorias as $categoria) {
            Categoria::create(['nome' => $categoria]);
        }

        // Cria 20 livros com categorias aleatórias
        Livro::factory()->count(20)->create();
    }
}
