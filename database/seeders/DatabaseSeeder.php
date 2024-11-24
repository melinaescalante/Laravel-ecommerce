<?php

namespace Database\Seeders;

use App\Models\User;

use App\Models\Game;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RatingSeeder::class,
            GenreSeeder::class,
            UserSeeder::class,
            GameSeeder::class,
        BlogSeeder::class
        ]);

    }
}
