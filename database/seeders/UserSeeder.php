<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'douglas gomes',
            'email' => 'douglasgomes902@andr.com.br',
            'password' => Hash::make('1234567'),
        ]);
        DB::table('users')->insert([
            'name' => 'allan guilherme',
            'email' => 'allan@csi.com',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => ' andre neves',
            'email' => 'andreneves@gmail.com.br',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => ' jorge ',
            'email' => 'jorge@gmail.com.br',
            'password' => Hash::make('12345678'),
        ]);
    }
}
