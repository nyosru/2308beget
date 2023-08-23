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
            'amount_rub' => 150,
            'amount_domain' => 1,
//        'default' => false
        ]);
        DomainPrice::create([
            'amount_rub' => 1000,
            'amount_domain' => 10,
            'default' => true
        ]);
        DomainPrice::create([
            'amount_rub' => 5000,
            'amount_domain' => 100,
//        'default' => false
        ]);
        DomainPrice::create([
            'amount_rub' => 10000,
            'amount_domain' => 1000,
//        'default' => false
        ]);

        DomainPrice::create([
            'amount_rub' => 500,
            'amount_domain' => 1050,
//        'default' => false
        ]);
        DomainPrice::create([
            'amount_rub' => 100,
            'amount_domain' => 2,
//        'default' => false
        ]);

    }
}
