<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrestadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prestadores')->insert([
            // Belo Horizonte
            ['nome' => 'Prestador 1', 'logradouro' => 'Av. Afonso Pena', 'bairro' => 'Centro', 'numero' => 1000, 'latitude' => -19.9191, 'longitude' => -43.9386, 'cidade' => 'Belo Horizonte', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 2', 'logradouro' => 'Rua dos Goitacazes', 'bairro' => 'Centro', 'numero' => 200, 'latitude' => -19.9244, 'longitude' => -43.9406, 'cidade' => 'Belo Horizonte', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 3', 'logradouro' => 'Rua da Bahia', 'bairro' => 'Centro', 'numero' => 300, 'latitude' => -19.9229, 'longitude' => -43.9384, 'cidade' => 'Belo Horizonte', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 4', 'logradouro' => 'Av. Amazonas', 'bairro' => 'Centro', 'numero' => 400, 'latitude' => -19.9224, 'longitude' => -43.9413, 'cidade' => 'Belo Horizonte', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 5', 'logradouro' => 'Rua Carijós', 'bairro' => 'Centro', 'numero' => 500, 'latitude' => -19.9214, 'longitude' => -43.9407, 'cidade' => 'Belo Horizonte', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 6', 'logradouro' => 'Rua Rio de Janeiro', 'bairro' => 'Centro', 'numero' => 600, 'latitude' => -19.9205, 'longitude' => -43.9401, 'cidade' => 'Belo Horizonte', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 7', 'logradouro' => 'Av. do Contorno', 'bairro' => 'Floresta', 'numero' => 700, 'latitude' => -19.9157, 'longitude' => -43.9219, 'cidade' => 'Belo Horizonte', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 8', 'logradouro' => 'Rua Timbiras', 'bairro' => 'Lourdes', 'numero' => 800, 'latitude' => -19.9321, 'longitude' => -43.9416, 'cidade' => 'Belo Horizonte', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 9', 'logradouro' => 'Rua Alagoas', 'bairro' => 'Savassi', 'numero' => 900, 'latitude' => -19.9367, 'longitude' => -43.9371, 'cidade' => 'Belo Horizonte', 'UF' => 'MG', 'situacao' => 'ativo'],

            // Contagem
            ['nome' => 'Prestador 10', 'logradouro' => 'Av. João César de Oliveira', 'bairro' => 'Eldorado', 'numero' => 1000, 'latitude' => -19.9454, 'longitude' => -44.0503, 'cidade' => 'Contagem', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 11', 'logradouro' => 'Rua José Faria da Rocha', 'bairro' => 'Eldorado', 'numero' => 200, 'latitude' => -19.9411, 'longitude' => -44.0534, 'cidade' => 'Contagem', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 12', 'logradouro' => 'Rua Tiradentes', 'bairro' => 'Inconfidentes', 'numero' => 300, 'latitude' => -19.9432, 'longitude' => -44.0561, 'cidade' => 'Contagem', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 13', 'logradouro' => 'Av. Severino Ballesteros', 'bairro' => 'Industrial', 'numero' => 400, 'latitude' => -19.9456, 'longitude' => -44.0631, 'cidade' => 'Contagem', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 14', 'logradouro' => 'Rua Rio Comprido', 'bairro' => 'Novo Riacho', 'numero' => 500, 'latitude' => -19.9408, 'longitude' => -44.0627, 'cidade' => 'Contagem', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 15', 'logradouro' => 'Av. General David Sarnoff', 'bairro' => 'Cidade Industrial', 'numero' => 600, 'latitude' => -19.9275, 'longitude' => -44.0423, 'cidade' => 'Contagem', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 16', 'logradouro' => 'Av. Cardeal Eugênio Pacelli', 'bairro' => 'Cidade Industrial', 'numero' => 700, 'latitude' => -19.9224, 'longitude' => -44.0369, 'cidade' => 'Contagem', 'UF' => 'MG', 'situacao' => 'ativo'],

            // Betim
            ['nome' => 'Prestador 17', 'logradouro' => 'Av. Amazonas', 'bairro' => 'Centro', 'numero' => 1000, 'latitude' => -19.9604, 'longitude' => -44.1978, 'cidade' => 'Betim', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 18', 'logradouro' => 'Rua do Rosário', 'bairro' => 'Centro', 'numero' => 200, 'latitude' => -19.9632, 'longitude' => -44.1979, 'cidade' => 'Betim', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 19', 'logradouro' => 'Av. Bandeirantes', 'bairro' => 'Brasiléia', 'numero' => 300, 'latitude' => -19.9543, 'longitude' => -44.2023, 'cidade' => 'Betim', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 20', 'logradouro' => 'Rua José da Silva', 'bairro' => 'Vila Cristina', 'numero' => 400, 'latitude' => -19.9516, 'longitude' => -44.2024, 'cidade' => 'Betim', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 21', 'logradouro' => 'Rua do Cedro', 'bairro' => 'Filadélfia', 'numero' => 500, 'latitude' => -19.9462, 'longitude' => -44.2042, 'cidade' => 'Betim', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 22', 'logradouro' => 'Av. Marco Túlio Isaac', 'bairro' => 'Centro', 'numero' => 600, 'latitude' => -19.9701, 'longitude' => -44.1986, 'cidade' => 'Betim', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 23', 'logradouro' => 'Av. Juscelino Kubitschek', 'bairro' => 'Guarujá', 'numero' => 700, 'latitude' => -19.9392, 'longitude' => -44.2069, 'cidade' => 'Betim', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 24', 'logradouro' => 'Rua dos Eucaliptos', 'bairro' => 'Cruzeiro do Sul', 'numero' => 800, 'latitude' => -19.9384, 'longitude' => -44.2007, 'cidade' => 'Betim', 'UF' => 'MG', 'situacao' => 'ativo'],
            ['nome' => 'Prestador 25', 'logradouro' => 'Av. das Palmeiras', 'bairro' => 'Vila Verde', 'numero' => 900, 'latitude' => -19.9505, 'longitude' => -44.1946, 'cidade' => 'Betim', 'UF' => 'MG', 'situacao' => 'ativo'],
        ]);
    }
}
