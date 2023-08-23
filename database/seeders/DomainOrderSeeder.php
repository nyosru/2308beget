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
        DomainOrder::factory(10)->create();
    }
}
