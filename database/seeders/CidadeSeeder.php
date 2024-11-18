<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cidadesPorEstado = [
            1 => ['Rio Branco', 'Cruzeiro do Sul', 'Sena Madureira', 'Tarauacá', 'Feijó'],
            2 => ['Maceió', 'Arapiraca', 'Palmeira dos Índios', 'Rio Largo', 'Penedo'],
            3 => ['Manaus', 'Parintins', 'Itacoatiara', 'Tefé', 'Manacapuru'],
            4 => ['Macapá', 'Santana', 'Laranjal do Jari', 'Oiapoque', 'Mazagão'],
            5 => ['Salvador', 'Feira de Santana', 'Vitória da Conquista', 'Camaçari', 'Xique Xique'],
            6 => ['Fortaleza', 'Juazeiro do Norte', 'Sobral', 'Maracanaú', 'Iguatu'],
            7 => ['Brasília', 'Taguatinga', 'Ceilândia', 'Samambaia', 'Planaltina'],
            8 => ['Vitória', 'Vila Velha', 'Serra', 'Cariacica', 'Guarapari'],
            9 => ['Goiânia', 'Aparecida de Goiânia', 'Anápolis', 'Rio Verde', 'Luziânia'],
            10 => ['São Luís', 'Imperatriz', 'Caxias', 'Timon', 'Bacabal'],
            11 => ['Belo Horizonte', 'Uberlândia', 'Contagem', 'Juiz de Fora', 'Betim'],
            12 => ['Campo Grande', 'Dourados', 'Três Lagoas', 'Corumbá', 'Ponta Porã'],
            13 => ['Cuiabá', 'Várzea Grande', 'Rondonópolis', 'Sinop', 'Tangará da Serra'],
            14 => ['Belém', 'Ananindeua', 'Santarém', 'Marabá', 'Castanhal'],
            15 => ['João Pessoa', 'Campina Grande', 'Santa Rita', 'Patos', 'Bayeux'],
            16 => ['Recife', 'Olinda', 'Jaboatão dos Guararapes', 'Caruaru', 'Petrolina'],
            17 => ['Teresina', 'Parnaíba', 'Picos', 'Floriano', 'Piripiri'],
            18 => ['Curitiba', 'Londrina', 'Maringá', 'Ponta Grossa', 'Cascavel'],
            19 => ['Rio de Janeiro', 'Niterói', 'Duque de Caxias', 'Nova Iguaçu', 'São Gonçalo'],
            20 => ['Natal', 'Mossoró', 'Parnamirim', 'Caicó', 'Macau'],
            21 => ['Porto Velho', 'Ji-Paraná', 'Ariquemes', 'Cacoal', 'Vilhena'],
            22 => ['Boa Vista', 'Rorainópolis', 'Caracaraí', 'Pacaraima', 'Alto Alegre'],
            23 => ['Porto Alegre', 'Caxias do Sul', 'Pelotas', 'Santa Maria', 'Novo Hamburgo'],
            24 => ['Florianópolis', 'Joinville', 'Blumenau', 'Chapecó', 'Itajaí'],
            25 => ['Aracaju', 'Nossa Senhora do Socorro', 'Lagarto', 'Estância', 'Itabaiana'],
            26 => ['São Paulo', 'Campinas', 'Guarulhos', 'Santos', 'São José dos Campos'],
            27 => ['Palmas', 'Araguaína', 'Gurupi', 'Porto Nacional', 'Paraíso do Tocantins'],
        ];

        $cidades = [];
        foreach ($cidadesPorEstado as $estadoId => $nomes) {
            foreach ($nomes as $nome) {
                $cidades[] = [
                    'nome' => $nome,
                    'uf' => $estadoId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('cidades')->insert($cidades);
    }
}
