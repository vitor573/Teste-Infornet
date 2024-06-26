<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeoLocationController extends Controller
{
    public function buscarGeolocalizacao(Request $request)
    {
        // Dados do endereço que você deseja obter a geolocalização
        $endereco = $request->input('endereco');

        // Chamar o método getGeolocation para obter as coordenadas
        $geolocalizacao = $this->getGeolocation($endereco);

        // Verificar se a geolocalização foi obtida com sucesso
        if ($geolocalizacao) {
            // Aqui você pode processar os dados de geolocalização, como salvar no banco de dados ou retornar como resposta JSON
            return response()->json($geolocalizacao);
        } else {
            return response()->json(['error' => 'Não foi possível obter a geolocalização'], 500);
        }
    }
    public function getGeolocation($endereco)
    {
        // Endpoint da API externa
        $url = 'https://teste-infornet.000webhostapp.com/api/endereco/geocode/' . urlencode($endereco);

        // Dados de autenticação
        $username = env('API_USERNAME');
        $password = env('API_PASSWORD');

        // Faz a requisição GET com autenticação Basic Auth
        $response = Http::withBasicAuth($username, $password)->get($url);

        // Verifica se a requisição foi bem sucedida
        if ($response->successful()) {
            // Decodifica o JSON da resposta
            $data = $response->json();

            // Retorna os dados de latitude e longitude
            return [
                'lat' => $data['lat'],
                'lon' => $data['lon'],
            ];
        } else {
            return null;
        }
    }

    public function testeCalc($endereco)
{
    // Simulação de valores aleatórios para latitude e longitude
    $lat = -19.9245 + (mt_rand() / mt_getrandmax()) * (19.9229 - (-19.9245)); // Exemplo de intervalo para Belo Horizonte
    $lon = -43.9352 + (mt_rand() / mt_getrandmax()) * (43.9388 - (-43.9352)); // Exemplo de intervalo para Belo Horizonte

    return [
        'lat' => $lat,
        'lon' => $lon,
    ];
}

}
