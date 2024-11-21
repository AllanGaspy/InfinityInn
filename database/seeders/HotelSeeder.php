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
                'cidade_id' => 91,
                'hotel' => 'Plaza Barra',
                'descricao' => 'Um hotel luxuoso com vista para o mar, localizado em um dos melhores destinos turísticos.',
                'valor_diaria' => 350.00,
                'quartos' => 43,
            ]);
            DB::table('hoteis')->insert([
                'estado_id' => 19,
                'cidade_id' => 92,
                'hotel' => 'Porto Mar de Búzios',
                'descricao' => 'Resort cinco estrelas com uma ampla área de lazer, piscinas aquecidas e um spa completo. Ideal para famílias e casais que buscam uma experiência inesquecível.',
                'valor_diaria' => 650.00,
                'quartos' => 18,
            ]);
            DB::table('hoteis')->insert([
                'estado_id' => 19,
                'cidade_id' => 93,
                'hotel' => 'Silverton Paiva ExperienceAbre numa nova janela',
                'descricao' => 'Pousada aconchegante perfeita para quem busca tranquilidade e conforto.',
                'valor_diaria' => 180.00,
                'quartos' => 34,
            ]);

    }
    }

