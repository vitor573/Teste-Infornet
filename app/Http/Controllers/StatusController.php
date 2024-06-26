<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class StatusController extends Controller
{
    protected $client;
    protected $url = 'https://teste-infornet.000webhostapp.com/api/prestadores/online';
    protected $username;
    protected $password;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->username = env('API_USERNAME');
        $this->password = env('API_PASSWORD');
    }

    public function statusPrestadores($prestadoresIds)
    {
        try {
            $response = $this->client->request('GET', $this->url, [
                'auth' => [$this->username, $this->password],
                'query' => ['prestadores' => $prestadoresIds],
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => 'Erro ao comunicar com a API: ' . $e->getMessage()];
        }
    }

    function generateRandomStatus($prestadoresIds)
    {
        $prestadores = [];
        for ($i = 1; $i <= 25; $i++) {
            $status = rand(0, 1) ? 'Online' : 'Offline';
            $prestadores[] = [
                'idPrestador' => $i,
                'status' => $status
            ];
        }

        $prestadoresIdsGenerated = array_column($prestadores, 'idPrestador');
        $matchingPrestadoresIds = array_intersect($prestadoresIdsGenerated, $prestadoresIds);

        $matchingPrestadores = array_filter($prestadores, function ($prestador) use ($matchingPrestadoresIds) {
            return in_array($prestador['idPrestador'], $matchingPrestadoresIds);
        });

        return array_values($matchingPrestadores);
    }
}
