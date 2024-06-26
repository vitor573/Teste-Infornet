<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('servicos')->insert([
            ['nome' => 'Serviço 1', 'situacao' => 'ativo'],
            ['nome' => 'Serviço 2', 'situacao' => 'ativo'],
            ['nome' => 'Serviço 3', 'situacao' => 'ativo'],
            ['nome' => 'Serviço 4', 'situacao' => 'ativo'],
            ['nome' => 'Serviço 5', 'situacao' => 'ativo'],
            ['nome' => 'Serviço 6', 'situacao' => 'ativo'],
            ['nome' => 'Serviço 7', 'situacao' => 'ativo'],
            ['nome' => 'Serviço 8', 'situacao' => 'ativo'],
            ['nome' => 'Serviço 9', 'situacao' => 'ativo'],
        ]);
    }
}
