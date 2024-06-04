<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define o estado padrão do modelo.
     * Aqui, são definidos os valores padrão para os atributos do modelo User.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Gera um nome falso para o usuário
            'name' => fake()->name(),
            
            // Gera um email único e seguro para o usuário
            'email' => fake()->unique()->safeEmail(),
            
            // Define a data e hora de verificação do email como agora
            'email_verified_at' => now(),
            
            // Define a senha do usuário (a mesma senha hash para todos os usuários gerados)
            'password' => static::$password ??= Hash::make('password'),
            
            // Gera um token de lembrança aleatório
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indica que o endereço de email do modelo deve ser não verificado.
     * Este método permite alterar o estado do modelo para refletir um email não verificado.
     *
     * @return static
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
