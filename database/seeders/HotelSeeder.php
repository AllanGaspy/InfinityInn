<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('hoteis')->insert([
                'estado' => 'Rio de Janeiro',
                'municipio' => 'Rio de Janeiro',
                'hotel' => 'Plaza Barra',
                'quartos' => '43',
            ]);
            DB::table('hoteis')->insert([
                'estado' => 'Rio de Janeiro',
                'municipio' => 'búzios',
                'hotel' => 'Porto Mar de Búzios',
                'quartos' => '18',
            ]);
            DB::table('hoteis')->insert([
                'estado' => 'Pernambuco',
                'municipio' => 'Recife',
                'hotel' => 'Silverton Paiva ExperienceAbre numa nova janela',
                'quartos' => '34',
            ]);

    }
    }

