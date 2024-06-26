<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestador;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\CalcSeviceController;


class SearchPrestadorController extends Controller
{

    protected $statusController;
    protected $calcSeviceController;

    public function __construct(StatusController $statusController, CalcSeviceController $calcSeviceController)
    {
        $this->statusController = $statusController;
        $this->calcSeviceController = $calcSeviceController;
    }

    public function searchPrestador(Request $request)
    {
        $origem = $request->input('origem');
        $destino = $request->input('destino');
        $servico_id = $request->input('servico_id');
        $quantidade = $request->input('quantidade', 100);
        $ordenacao = $request->input('ordenacao', ['nome']);
        $ordem = $request->input('ordem', 'asc');
        $filtros = $request->input('filtros', []);

        $prestadores = Prestador::whereHas('servico_prestador', function ($query) use ($servico_id) {
            $query->where('servico_id', $servico_id);
        })->orderBy('prestadores.id', 'asc')->get();

        foreach ($prestadores as $prestador) {

            $prestador->valor_total = $this->calcSeviceController->calcularValorServico($origem, $destino, $prestador->id);
        }

        if (!empty($filtros)) {
            $prestadores = $this->filter($filtros, $prestadores);

        }

        $prestadores = $this->orderPrestadores($prestadores, $ordenacao, $ordem);

        return response()->json($prestadores);
    }

    public function filter($filtros, $prestadores)
    {
        $prestadoresOnline = [];
        $prestadoresOffline = [];

        if (isset($filtros['status'])) {
            $prestadoresIds = $prestadores->pluck('id')->toArray();
            //$status = $this->statusController->statusPrestadores($prestadoresIds);
            $status = $this->statusController->generateRandomStatus($prestadoresIds);

            $prestadores = $this->combinePrestadoresWithStatus($prestadores);


            if (isset($status['prestadores'])) {
                foreach ($status['prestadores'] as $prestador) {
                    if ($prestador['status'] === 'Online') {
                        $prestadoresOnline[] = $prestador;
                    } else {
                        $prestadoresOffline[] = $prestador;
                    }
                }


                if ($filtros['status'] === 'online') {
                    $prestadores = collect($prestadoresOnline);
                } elseif ($filtros['status'] === 'offline') {
                    $prestadores = collect($prestadoresOffline);
                }
            }
        }

        if (isset($filtros['cidade'])) {
            $prestadores = $prestadores->filter(function ($prestador) use ($filtros) {
                return $prestador['cidade'] === $filtros['cidade'];
            });
        }

        if (isset($filtros['estado'])) {
            $prestadores = $prestadores->filter(function ($prestador) use ($filtros) {
                return $prestador['estado'] === $filtros['estado'];
            });
        }



        return $prestadores->values()->toArray();
    }

    protected function combinePrestadoresWithStatus($prestadores)
    {
        $prestadoresIds = $prestadores->pluck('id')->toArray();
        $statusArray = $this->statusController->generateRandomStatus($prestadoresIds);

        // Criar um mapa de status por idPrestador para fácil acesso
        $statusMap = [];
        foreach ($statusArray as $status) {
            $statusMap[$status['idPrestador']] = $status['status'];
        }

        // Adicionar status aos prestadores correspondentes
        foreach ($prestadores as &$prestador) {
            $idPrestador = $prestador->id;
            if (isset($statusMap[$idPrestador])) {
                $prestador->status = $statusMap[$idPrestador];
            }
        }

        return $prestadores;
    }

    public function orderPrestadores($prestadores, $ordenacao, $ordem)
    {
        $prestadores = collect($prestadores);

        foreach ((array) $ordenacao as $campo) {

            if (isset($prestadores[0][$campo])) {
                $prestadores = $prestadores->sortBy($campo, SORT_REGULAR, $ordem === 'desc');
            }
        }

        return $prestadores->toArray();
    }



}
