<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livro;
use App\Models\Categoria;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $categoriasNomes = [
            'Romance',
            'Aventura',
            'Ficção',
            'Biografia',
            'Suspense',
            'Fantasia',
            'História',
            'Ciência',
            'Poesia',
            'Drama'
        ];

        foreach ($categoriasNomes as $nome) {
            Categoria::create(['nome' => $nome]);
        }

        Livro::factory()->count(10)->create();
    }
}
