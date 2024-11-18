<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservas')->insert([
            'nome'=>'douglas gomes',
            'estado_id' => 19,
            'cidade_id' => 91,
            'hotel' => 'Plaza Barra',
            'quartos' => 43,
            //adicionar cpf rg ?
        ]);
    }
}
