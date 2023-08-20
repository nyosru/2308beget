<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Domain>
 */
class DomainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $a = [
            // 'name'=> Str::random(10).'.'.( rand(1,2) == 1 ? 'com' : 'ru' ),
            'name'=> fake()->word().'.'.( rand(1,2) == 1 ? 'com' : ( rand(1,2) == 1 ? 'рф' : 'ru' ) ),
            'user_id' => 1
        ];

        if( rand(1,3) == 1 )
            $a['payed_to'] = date('Y-m-d',$_SERVER['REQUEST_TIME']+5*300*24*3600);

        return $a;
    }
}
