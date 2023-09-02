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

        $domain = rand(1, 2) == 1 ? 'com' : (rand(1, 2) == 1 ? 'рф' : 'ru');

        $a = [
            // 'name'=> Str::random(10).'.'.( rand(1,2) == 1 ? 'com' : 'ru' ),
            'name' => fake()->word() . '.' . $domain,
            'user_id' => 1
        ];

//        if ($domain == 'рф')
            $a['name_tech'] = ($domain == 'рф') ? idn_to_ascii($a['name']) : $a['name'];
//        echo idn_to_ascii('täst.de');

        if (rand(1, 3) == 1)
            $a['payed_do'] = date('Y-m-d', $_SERVER['REQUEST_TIME'] + 5 * 300 * 24 * 3600);

        return $a;
    }
}
