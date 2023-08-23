<?php

namespace Database\Seeders;

use App\Models\DomainOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DomainOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        DomainOrder::factory(10)->create();
        DomainOrder::factory()->count(10)->create();

        DomainOrder::factory(10)->create();
        DomainOrder::factory()->create([
            'id' => 111,
            'domain_price_id' => 5, // 500
        ]);
        DomainOrder::factory()->create([
            'id' => 112,
            'domain_price_id' => 5, // 500
        ]);
        DomainOrder::factory()->create([
            'id' => 113,
            'domain_price_id' => 5, // 500
        ]);
        DomainOrder::factory()->create([
            'id' => 114,
            'domain_price_id' => 5, // 500
        ]);
        DomainOrder::factory()->create([
            'id' => 115,
            'domain_price_id' => 5, // 500
        ]);
        DomainOrder::factory()->create([            'id' => 211,            'domain_price_id' => 6, // 100
        ]);
        DomainOrder::factory()->create([            'id' => 212,            'domain_price_id' => 6, // 100
        ]);
        DomainOrder::factory()->create([            'id' => 213,            'domain_price_id' => 6, // 100
        ]);
        DomainOrder::factory()->create([            'id' => 214,            'domain_price_id' => 6, // 100
        ]);
        DomainOrder::factory()->create([            'id' => 215,            'domain_price_id' => 6, // 100
        ]);
//        DB::table('users')->insert([
//            'name' => Str::random(10),
//            'email' => Str::random(10).'@gmail.com',
//            'password' => Hash::make('password'),
//        ]);

    }
}
