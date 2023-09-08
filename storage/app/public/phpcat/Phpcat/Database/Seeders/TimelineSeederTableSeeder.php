<?php

namespace Modules\Phpcat\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Phpcat\Database\factories\TimelineFactory;
use Modules\Phpcat\Entities\PhpcatNews;

class TimelineSeederTableSeeder extends Seeder
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
        PhpcatNews::factory()
        ->count(50)
        // ->hasPosts(1)
        ->create();
    }
}
