<?php

// app/Http/Controllers/PrestadorController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestador;

class PrestadorController extends Controller
{
    public function index()
    {
        $prestadores = Prestador::all();
        return response()->json($prestadores);
    }

    public function create(Request $request)
    {
        $prestador = new Prestador();
        $prestador->nome = $request->input('nome');
        $prestador->logradouro = $request->input('logradouro');
        $prestador->bairro = $request->input('bairro');
        $prestador->numero = $request->input('numero');
        $prestador->latitude = $request->input('latitude');
        $prestador->longitude = $request->input('longitude');
        $prestador->cidade = $request->input('cidade');
        $prestador->UF = $request->input('UF');
        $prestador->situacao = $request->input('situacao');

        if ($prestador->save()) {
            return response()->json(['message' => 'Prestador criado com sucesso!'], 201);
        } else {
            return response()->json(['error' => 'Erro ao criar prestador'], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $prestador = Prestador::find($id);
        if (!$prestador) {
            return response()->json(['error' => 'Prestador not found'], 404);
        }
        $$prestador->nome = $request->input('nome');
        $prestador->logradouro = $request->input('logradouro');
        $prestador->bairro = $request->input('bairro');
        $prestador->numero = $request->input('numero');
        $prestador->latitude = $request->input('latitude');
        $prestador->longitude = $request->input('longitude');
        $prestador->cidade = $request->input('cidade');
        $prestador->UF = $request->input('UF');
        $prestador->situacao = $request->input('situacao');
        $prestador->save();
        return response()->json($prestador);
    }

    public function destroy($id)
    {
        $prestador = Prestador::find($id);
        if (!$prestador) {
            return response()->json(['error' => 'Prestador not found'], 404);
        }
        $prestador->delete();
        return response()->json(['message' => 'Prestador deleted'], 200);
    }
}
