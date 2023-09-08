<?php
namespace Modules\Phpcat\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhpcatTestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Phpcat\Entities\PhpcatTest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $return = [

            'head' => $this->faker->name(),
            // 'date' => date('Y-m-d',( time()-3600*24*1000+(3600*24*rand(1,2999) ) ) ),
            'date' => date('Y-m-d',( time()-(3600*24*rand(1,299) ) ) ),

            'text' => $this->faker->text(),
            'code' => 'code: '.$this->faker->text(100)

            // // $table->string('link1');
            // // $table->string('link2');
            // // $table->string('link3');

            // 'name' => ,
            // 'email' => $this->faker->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' => Str::random(10),
        ];

        if( rand(1,5) == 1 )
        $return['link1'] = 'http://domen.'.rand(100,999).'.ru';
        if( rand(1,5) == 1 )
        $return['link2'] = 'http://domen.'.rand(100,999).'.ru';
        if( rand(1,5) == 1 )
        $return['link3'] = 'http://domen.'.rand(100,999).'.ru';

        return $return;

    }
}

