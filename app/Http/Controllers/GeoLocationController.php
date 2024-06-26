<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeoLocationController extends Controller
{
    public function buscarGeolocalizacao(Request $request)
    {
        $endereco = $request->input('endereco');
        $geolocalizacao = $this->getGeolocation($endereco);

        if ($geolocalizacao) {
            return response()->json($geolocalizacao);
        } else {
            return response()->json(['error' => 'Não foi possível obter a geolocalização'], 500);
        }
    }

    public function getGeolocation($endereco)
    {
        $url = 'https://teste-infornet.000webhostapp.com/api/endereco/geocode/' . urlencode($endereco);
        $username = env('API_USERNAME');
        $password = env('API_PASSWORD');

        $response = Http::withBasicAuth($username, $password)->get($url);

        if ($response->successful()) {
            $data = $response->json();
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
        $lat = -19.9245 + (mt_rand() / mt_getrandmax()) * (19.9229 - (-19.9245));
        $lon = -43.9352 + (mt_rand() / mt_getrandmax()) * (43.9388 - (-43.9352));

        return [
            'lat' => $lat,
            'lon' => $lon,
        ];
    }
}
