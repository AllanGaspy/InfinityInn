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
        User::factory()->create([
            'name' => 'douglas gomes',
            'name' => 'Allan guilherme',
            'email' => 'douglasgr@gmail.com',
            'email' => '',
        ]);
    }
}
