<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promocode>
 */
class PromocodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->word(),
//                ->comment('что за промокод');
            'kolvo' => rand(1, 10),
//            ->comment('Количество купонов что добавиться при использовании');
            'date_start' => date('Y-m-d', time() - rand(1, 10) * 24 * 3600),
//            ->comment('дата старта');
            'date_end' => date('Y-m-d', time() + rand(1, 10) * 7 * 24 * 3600)
//            ->comment('дата последнего дня работы кода');
        ];
    }
}
