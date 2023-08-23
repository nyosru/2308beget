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
            'amount' => 150,
            'amount_domain' => 1,
//        'default' => false
        ]);
        DomainPrice::create([
            'amount' => 1000,
            'amount_domain' => 10,
            'default' => true
        ]);
        DomainPrice::create([
            'amount' => 5000,
            'amount_domain' => 100,
//        'default' => false
        ]);
        DomainPrice::create([
            'amount' => 10000,
            'amount_domain' => 1000,
//        'default' => false
        ]);

        DomainPrice::create([
            'amount' => 500,
            'amount_domain' => 1050,
//        'default' => false
        ]);
        DomainPrice::create([
            'amount' => 100,
            'amount_domain' => 2,
//        'default' => false
        ]);

    }
}
