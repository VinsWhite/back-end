<?php

namespace Database\Factories;

use App\Models\Autore;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'descrizione' => fake()->text(100),
            'anno_pubblicazione' => fake()->datetime(),
            'autore_id' => Autore::get()->random()->id,
            'categoria_id' => Categoria::get()->random()->id,
        ];
    }
}
