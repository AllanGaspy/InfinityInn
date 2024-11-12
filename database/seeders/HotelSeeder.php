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
                'estado_id' => 19,
                'cidade_id' => 3591,
                'hotel' => 'Plaza Barra',
                'quartos' => 43,
            ]);
            DB::table('hoteis')->insert([
                'estado_id' => 19,
                'cidade_id' => 3592,
                'hotel' => 'Porto Mar de Búzios',
                'quartos' => 18,
            ]);
            DB::table('hoteis')->insert([
                'estado_id' => 19,
                'cidade_id' => 3593,
                'hotel' => 'Silverton Paiva ExperienceAbre numa nova janela',
                'quartos' => 34,
            ]);

    }
    }

