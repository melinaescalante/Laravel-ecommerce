<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            [
                'genre_id' => 1,
                'name' => 'Puzzles',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 2,
                'name' => 'Accion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 3,
                'name' => 'Misterio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 4,
                'name' => 'Gore',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 5,
                'name' => 'Gore II',
                'created_at' => now(),
                'updated_at' => now(),
            ]]
        );
    }
}
