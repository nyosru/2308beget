<?php

namespace Database\Seeders;

use App\Models\DomainPrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DomainPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DomainPrice::create([
            'amount' => 149,
            'amount_domain' => 1,
//        'default' => false
        ]);
        DomainPrice::create([
            'amount' => 990,
            'amount_domain' => 10,
            'default' => true
        ]);
        DomainPrice::create([
            'amount' => 4900,
            'amount_domain' => 100,
//        'default' => false
        ]);
        DomainPrice::create([
            'amount' => 9900,
            'amount_domain' => 1000,
//        'default' => false
        ]);

        DomainPrice::create([
            'amount' => 500,
            'amount_domain' => 7,
//        'default' => false
        ]);
        DomainPrice::create([
            'amount' => 100,
            'amount_domain' => 7,
//        'default' => false
        ]);

    }
}
