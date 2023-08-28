<?php

namespace Database\Factories;

use App\Models\Domain;
use Illuminate\Database\Seeder;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Domain::factory()->create(['name' => 'сергейсб.рф', 'name_tech' => 'xn--90adfbu3bff.xn--p1ai']);
        Domain::factory()->create(['name' => 'сергейсб.рф', 'name_tech' => idn_to_ascii('сергейсб.рф')]);
        Domain::factory(20)->create();
    }
}
