<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            HotelSeeder::class,
            EstadoSeeder::class,
            ReservaSeeder::class,
            CidadeSeeder::class,

            ]);

           // $path = database_path('seeders/infinitinn.sql');
           // DB::unprepared(file_get_contents($path));
           // $this->comand->info('banco de dados importados com sucesso');
    }
}
