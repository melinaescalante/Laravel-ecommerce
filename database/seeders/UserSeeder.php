<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('users')->insert([
            'name'=>'Melina',
            'email'=>'meliescalantee@gmail.com',
            'password'=>\Hash::make('melina'),
            'created_at'=>now()
        ]);
        \DB::table('users')->insert([
            'name'=>'Romina',
            'email'=>'romi@gmail.com',
            'password'=>\Hash::make('romi'),
            'created_at'=>now()
        ]);
        \DB::table('users')->insert([
            'name'=>'Marta Rodriguez',
            'email'=>'marta@gmail.com',
            'password'=>\Hash::make('marta'),
            'created_at'=>now()
        ]);
    }
}
