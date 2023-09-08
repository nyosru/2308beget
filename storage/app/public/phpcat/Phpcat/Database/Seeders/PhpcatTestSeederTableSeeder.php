<?php

namespace Modules\Phpcat\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Phpcat\Entities\PhpcatTest;

class PhpcatTestSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        PhpcatTest::factory()
            ->count(50)
            // ->hasPosts(1)
            ->create();
    }
}
