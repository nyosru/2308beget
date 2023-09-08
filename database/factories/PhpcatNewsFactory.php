<?php

namespace Database\Factories;

use App\Models\PhpcatNews;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhpcatNews>
 */
class PhpcatNewsFactory extends Factory
{


    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PhpcatNews::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'head' => $this->faker->name(),
            'text' => $this->faker->text(500),
            'date' => date('Y-m-d',time()-(3600*rand(1,9999)))
        ];
    }
}
