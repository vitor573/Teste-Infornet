<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicoPrestadorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('servico_prestador')->insert([
            // Belo Horizonte
            ['prestador_id' => 1, 'servico_id' => 1, 'km_saida' => 10, 'valor_saida' => 50.00, 'valor_km_excedente' => 5.00],
            ['prestador_id' => 1, 'servico_id' => 2, 'km_saida' => 15, 'valor_saida' => 75.00, 'valor_km_excedente' => 6.00],
            ['prestador_id' => 1, 'servico_id' => 3, 'km_saida' => 20, 'valor_saida' => 100.00, 'valor_km_excedente' => 7.00],

            ['prestador_id' => 2, 'servico_id' => 1, 'km_saida' => 12, 'valor_saida' => 60.00, 'valor_km_excedente' => 5.50],
            ['prestador_id' => 2, 'servico_id' => 2, 'km_saida' => 18, 'valor_saida' => 80.00, 'valor_km_excedente' => 6.50],
            ['prestador_id' => 2, 'servico_id' => 3, 'km_saida' => 22, 'valor_saida' => 110.00, 'valor_km_excedente' => 7.50],

            ['prestador_id' => 3, 'servico_id' => 1, 'km_saida' => 11, 'valor_saida' => 55.00, 'valor_km_excedente' => 5.25],
            ['prestador_id' => 3, 'servico_id' => 2, 'km_saida' => 16, 'valor_saida' => 70.00, 'valor_km_excedente' => 6.25],
            ['prestador_id' => 3, 'servico_id' => 3, 'km_saida' => 19, 'valor_saida' => 95.00, 'valor_km_excedente' => 7.25],

            // Contagem
            ['prestador_id' => 10, 'servico_id' => 1, 'km_saida' => 11, 'valor_saida' => 55.00, 'valor_km_excedente' => 5.25],
            ['prestador_id' => 10, 'servico_id' => 2, 'km_saida' => 17, 'valor_saida' => 70.00, 'valor_km_excedente' => 6.25],
            ['prestador_id' => 10, 'servico_id' => 3, 'km_saida' => 21, 'valor_saida' => 95.00, 'valor_km_excedente' => 7.25],

            ['prestador_id' => 11, 'servico_id' => 1, 'km_saida' => 10, 'valor_saida' => 50.00, 'valor_km_excedente' => 5.00],
            ['prestador_id' => 11, 'servico_id' => 2, 'km_saida' => 15, 'valor_saida' => 75.00, 'valor_km_excedente' => 6.00],
            ['prestador_id' => 11, 'servico_id' => 3, 'km_saida' => 20, 'valor_saida' => 100.00, 'valor_km_excedente' => 7.00],

            ['prestador_id' => 12, 'servico_id' => 1, 'km_saida' => 13, 'valor_saida' => 65.00, 'valor_km_excedente' => 5.50],
            ['prestador_id' => 12, 'servico_id' => 2, 'km_saida' => 19, 'valor_saida' => 85.00, 'valor_km_excedente' => 6.50],
            ['prestador_id' => 12, 'servico_id' => 3, 'km_saida' => 23, 'valor_saida' => 110.00, 'valor_km_excedente' => 7.50],

            // Betim
            ['prestador_id' => 17, 'servico_id' => 1, 'km_saida' => 12, 'valor_saida' => 60.00, 'valor_km_excedente' => 5.50],
            ['prestador_id' => 17, 'servico_id' => 2, 'km_saida' => 18, 'valor_saida' => 80.00, 'valor_km_excedente' => 6.50],
            ['prestador_id' => 17, 'servico_id' => 3, 'km_saida' => 22, 'valor_saida' => 110.00, 'valor_km_excedente' => 7.50],

            ['prestador_id' => 18, 'servico_id' => 1, 'km_saida' => 11, 'valor_saida' => 55.00, 'valor_km_excedente' => 5.25],
            ['prestador_id' => 18, 'servico_id' => 2, 'km_saida' => 16, 'valor_saida' => 70.00, 'valor_km_excedente' => 6.25],
            ['prestador_id' => 18, 'servico_id' => 3, 'km_saida' => 19, 'valor_saida' => 95.00, 'valor_km_excedente' => 7.25],

            ['prestador_id' => 19, 'servico_id' => 1, 'km_saida' => 10, 'valor_saida' => 50.00, 'valor_km_excedente' => 5.00],
            ['prestador_id' => 19, 'servico_id' => 2, 'km_saida' => 15, 'valor_saida' => 75.00, 'valor_km_excedente' => 6.00],
            ['prestador_id' => 19, 'servico_id' => 3, 'km_saida' => 20, 'valor_saida' => 100.00, 'valor_km_excedente' => 7.00],

            ['prestador_id' => 20, 'servico_id' => 1, 'km_saida' => 13, 'valor_saida' => 65.00, 'valor_km_excedente' => 5.50],
            ['prestador_id' => 20, 'servico_id' => 2, 'km_saida' => 19, 'valor_saida' => 85.00, 'valor_km_excedente' => 6.50],
            ['prestador_id' => 20, 'servico_id' => 3, 'km_saida' => 23, 'valor_saida' => 110.00, 'valor_km_excedente' => 7.50],
        ]);
    }
}
