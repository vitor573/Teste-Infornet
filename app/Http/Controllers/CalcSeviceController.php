<?php

namespace App\Http\Controllers;

use App\Models\Prestador;
use App\Models\ServicoPrestador;

class CalcSeviceController extends Controller
{
    protected $geoLocationController;

    public function __construct(GeoLocationController $geoLocationController)
    {
        $this->geoLocationController = $geoLocationController;
    }

    public function calcularValorServico($origem, $destino, $idPrestador)
    {
        $prestador = Prestador::find($idPrestador);
        if (!$prestador) {
            return response()->json(['error' => 'Prestador não encontrado'], 404);
        }

        $distanciaTotal = $this->calcularDistanciaTotal($origem, $destino, $prestador);

        $servicoPrestador = ServicoPrestador::where('prestador_id', $idPrestador)->first();
        if (!$servicoPrestador) {
            return response()->json(['error' => 'Prestador não oferece este serviço'], 400);
        }

        $valorTotal = $servicoPrestador['valor_saida'] + ($distanciaTotal - $servicoPrestador['km_saida']) * $servicoPrestador['valor_km_excedente'];
        $valorTotalFormatado = number_format($valorTotal, 2, ',', '.');

        $response = [
            'prestador' => $prestador->toArray(),
            'distancia_total_km' => $distanciaTotal,
            'valor_total' => $valorTotalFormatado,
        ];

        return response()->json($response);
    }

    private function calcularDistanciaTotal($origem, $destino, $prestador)
    {
        $geoOrigem = $this->geoLocationController->getGeolocation($origem['endereco']);
        //$geoOrigem = $this->geoLocationController->testeCalc($origem['endereco']);
        if (!$geoOrigem) {
            return response()->json(['error' => 'Erro ao obter geolocalização do endereço de origem'], 500);
        }

        $geoDestino = $this->geoLocationController->getGeolocation($destino['endereco']);
        //$geoOrigem = $this->geoLocationController->testeCalc($origem['endereco']);
        //funçao de teste
        if (!$geoDestino) {
            return response()->json(['error' => 'Erro ao obter geolocalização do endereço de destino'], 500);
        }

        $distanciaTotal = 0;
        $distanciaTotal += $this->calcularDistanciaEntrePontos($prestador->latitude, $prestador->longitude, $geoOrigem['lat'], $geoOrigem['lon']);
        $distanciaTotal += $this->calcularDistanciaEntrePontos($geoOrigem['lat'], $geoOrigem['lon'], $geoDestino['lat'], $geoDestino['lon']);
        $distanciaTotal += $this->calcularDistanciaEntrePontos($geoDestino['lat'], $geoDestino['lon'], $prestador->latitude, $prestador->longitude);

        return $distanciaTotal;
    }

    private function calcularDistanciaEntrePontos($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $distancia = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $distancia = acos($distancia);
        $distancia = rad2deg($distancia);
        $distancia = $distancia * 60 * 1.1515;
        $distancia = $distancia * 1.609344;

        return $distancia;
    }
}
