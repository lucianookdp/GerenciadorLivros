<?php

namespace Database\Factories;

use App\Models\Livro;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivroFactory extends Factory
{
    protected $model = Livro::class;

    public function definition()
    {
        // Obtém uma categoria aleatória
        $categoria = Categoria::inRandomOrder()->first();

        return [
            'titulo' => $this->faker->sentence(3),
            'autor' => $this->faker->name,
            'ano_publicacao' => $this->faker->year,
            'descricao' => $this->faker->paragraph,
            'categoria_id' => $categoria->id,
        ];
    }
}
