<?php

namespace Database\Factories\krugi;

use Illuminate\Database\Eloquent\Factories\Factory;

class CupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $e = [
            'name' => $this->faker->name(),
            'opis' => $this->faker->text(),
            'lat' => '52.654',
            'lon' => '53.654',
        ];

        if (rand(1, 10) > 1) {
            $e['img1'] = 'https://via.placeholder.com/300.png/09f/fff';
            if (rand(1, 10) > 2) {
                $e['img2'] = 'https://via.placeholder.com/300.png/09f/fff';
                if (rand(1, 10) > 3) {
                    $e['img3'] = 'https://via.placeholder.com/300.png/09f/fff';
                    if (rand(1, 10) > 4) {
                        $e['img4'] = 'https://via.placeholder.com/300.png/09f/fff';
                    }
                }
            }
        }

        return $e;
    }
}
