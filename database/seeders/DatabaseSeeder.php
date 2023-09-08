<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
//use Database\Seeders\DomainSeeder;
use Database\Factories\DomainSeeder;
use Database\Seeders\krugi\PhotoCupsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PhpcatNewsSeeder::class,

            DomainSeeder::class,
            DomainPaySeeder::class,
            PromocodeSeeder::class,
            DomainPricesSeeder::class,
            DomainOrderSeeder::class,
            // UserSeeder::class,
            // PostSeeder::class,
            // CommentSeeder::class,

            PhotoCupsSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
