<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('postagens')->insert([
            'hotel' => 'Plaza Barra',
            'estado_id' => 19,
            'cidade_id' => 3591,
            'quartos' => 43,
        ]);
        DB::table('postagens')->insert([
            'hotel' => 'Porto Mar de Búzios',
            'estado_id' => 19,
            'cidade_id' => 3592,
            'quartos' => 18,
        ]);
    }
}
