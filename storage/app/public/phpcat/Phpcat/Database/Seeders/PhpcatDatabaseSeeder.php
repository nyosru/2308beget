<?php

namespace Modules\Phpcat\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PhpcatDatabaseSeeder extends Seeder
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
        // $this->call("TestsSeeder");

        $this->call([
        	// UserSeeder::class,
        	// PostSeeder::class,
            PhpcatTestSeederTableSeeder::class,
            TimelineSeederTableSeeder::class
    	]);
    }
}
