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
        // Buscar informações do prestador
        $prestador = Prestador::find($idPrestador);
        if (!$prestador) {
            return response()->json(['error' => 'Prestador não encontrado'], 404);
        }

        // Calcular distância total em linha reta
        $distanciaTotal = $this->calcularDistanciaTotal($origem, $destino, $prestador);

        // Verificar se o serviço está disponível para esse prestador
        $servicoPrestador = ServicoPrestador::where('prestador_id', $idPrestador)->first();
        if (!$servicoPrestador) {
            return response()->json(['error' => 'Prestador não oferece este serviço'], 400);
        }

        // Calcular valor do serviço
        $valorTotal = $servicoPrestador['valor_saida'] + ($distanciaTotal - $servicoPrestador['km_saida']) * $servicoPrestador['valor_km_excedente'];
        $valorTotalFormatado = number_format($valorTotal, 2, ',', '.');

        // Preparar resposta
        $response = [
            'prestador' => $prestador->toArray(),
            'distancia_total_km' => $distanciaTotal,
            'valor_total' => $valorTotalFormatado, // Usar o valor formatado
        ];


        return response()->json($response);
    }

    private function calcularDistanciaTotal($origem, $destino, $prestador)
    {
        // Obter a geolocalização do endereço de origem
        //$geoOrigem = $this->geoLocationController->getGeolocation($origem['endereco']);
        $geoOrigem = $this->geoLocationController->testeCalc($origem['endereco']);

        if (!$geoOrigem) {
            return response()->json(['error' => 'Erro ao obter geolocalização do endereço de origem'], 500);
        }

        // Obter a geolocalização do endereço de destino
        //$geoDestino = $this->geoLocationController->getGeolocation($destino['endereco']);
        $geoDestino = $this->geoLocationController->testeCalc($destino['endereco']);

        if (!$geoDestino) {
            return response()->json(['error' => 'Erro ao obter geolocalização do endereço de destino'], 500);
        }

        // Calcular distância total em linha reta
        $distanciaTotal = 0;

        // Distância do prestador até a origem
        $distanciaTotal += $this->calcularDistanciaEntrePontos($prestador->latitude, $prestador->longitude, $geoOrigem['lat'], $geoOrigem['lon']);

        // Distância da origem até o destino
        $distanciaTotal += $this->calcularDistanciaEntrePontos($geoOrigem['lat'], $geoOrigem['lon'], $geoDestino['lat'], $geoDestino['lon']);

        // Distância do destino até o prestador
        $distanciaTotal += $this->calcularDistanciaEntrePontos($geoDestino['lat'], $geoDestino['lon'], $prestador->latitude, $prestador->longitude);

        return $distanciaTotal;
    }

    private function calcularDistanciaEntrePontos($lat1, $lon1, $lat2, $lon2)
    {
        // Fórmula de Haversine para calcular distância em linha reta
        $theta = $lon1 - $lon2;
        $distancia = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $distancia = acos($distancia);
        $distancia = rad2deg($distancia);
        $distancia = $distancia * 60 * 1.1515;
        $distancia = $distancia * 1.609344; // Converter para quilômetros

        return $distancia;
    }
}
