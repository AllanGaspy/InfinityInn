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
                'localizacao' => 'Rio de Janeiro',
                'hotel' => 'Plaza Barra',
                'quartos' => '43',
            ]);
            DB::table('categorias')->insert([
                'localizacao' => 'Buzios',
                'hotel' => 'Porto Mar de Búzios',
                'quartos' => '18',
            ]);
            DB::table('categorias')->insert([
                'localizacao' => 'Recife',
                'hotel' => 'Silverton Paiva ExperienceAbre numa nova janela',
                'quartos' => '34',
            ]);

    }
    }

