<?php
namespace Modules\Phpcat\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Phpcat\Entities\PhpcatNews;

class TimelineFactory extends Factory
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
     * @return array
     */
    public function definition()
    {

        return [
            'head' => $this->faker->name(),
            'date' => date('Y-m-d',time()-(3600*rand(1,9999)))
        ];
    }
}

