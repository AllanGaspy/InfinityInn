<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('categorias')->insert([
                'nome' => 'seila poura',
                'hoteis' => 'cucucucu',
                'apartamentos' => ' aurul',
            ]);
            DB::table('categorias')->insert([
                'nome' => 'sei',
                'hoteis' => ' alg',
                'apartamentos' => 'cudequema',
            ]);
            DB::table('categorias')->insert([
                'nome' => 'seuscu',
                'hoteis' => ' algum la',
                'apartamentos' => 'cudeapido',
            ]);
      
    }
    }

