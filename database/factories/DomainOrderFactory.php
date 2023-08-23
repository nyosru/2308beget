<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DomainOrder>
 */
class DomainOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'user_id' => 1,
            'price_id' => rand(1,5),

//        $table->string('domain')->nullable();
//            $table->integer('amount')->default(1);
//        $table->integer('promocode_id')->unsigned()->nullable();
//            $table->integer('promocode_amount')->unsigned()->nullable();
//            $table->boolean('payed')->default(false);
//        $table->dateTime('payed_dt')->nullable();

        ];
    }
}
