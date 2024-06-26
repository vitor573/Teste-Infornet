<?php

// app/Http/Controllers/ServicoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    public function show()
    {
        $servicos = Servico::all();
        return response()->json($servicos);
    }

    public function create(Request $request)
    {
        $servico = new Servico();
        $servico->nome = $request->input('nome');
        $servico->descricao = $request->input('descricao');
        $servico->preco = $request->input('preco');
        $servico->tempo_execucao = $request->input('tempo_execucao');
        $servico->situacao = $request->input('situacao');

        if ($servico->save()) {
            return response()->json(['message' => 'Servico criado com sucesso!'], 201);
        } else {
            return response()->json(['error' => 'Erro ao criar servico'], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $servico = Servico::find($id);
        if (!$servico) {
            return response()->json(['error' => 'Serviço não encontrado'], 404);
        }
        $servico->nome = $request->input('nome');
        $servico->situacao = $request->input('situacao');
        $servico->save();
        return response()->json($servico);
    }

    public function destroy($id)
    {
        $servico = Servico::find($id);
        if (!$servico) {
            return response()->json(['error' => 'Serviço não encontrado'], 404);
        }
        $servico->delete();
        return response()->json(['message' => 'Serviço deletado'], 200);
    }
}
