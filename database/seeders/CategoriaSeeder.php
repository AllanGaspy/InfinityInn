<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
            DB::table('categorias')->insert([
                'hoteis' => 'joao alg',
            ]);
            DB::table('categorias')->insert([
                'hoteis' => 'seila poura',
            ]);
            DB::table('categorias')->insert([
                'hoteis' => 'cudequem ta lendo',
            ]);
      
    }
    }

