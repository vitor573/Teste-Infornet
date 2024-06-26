<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AutenticacaoController extends Controller
{
    public function login(Request $request)
    {
        // Verificar se email e senha foram fornecidos
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Obter as credenciais
        $credentials = $request->only('email', 'password');

        // Buscar o usuário pelo email
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return response()->json(['error' => 'Credenciais inválidas'], 401);
        }

        // Verificar a senha
        if (!Hash::check($credentials['password'], $user->password)) {
            return response()->json(['error' => 'Credenciais inválidas'], 401);
        }

        // Tentar gerar um token JWT
        try {
            if (!$token = JWTAuth::fromUser($user)) {
                return response()->json(['error' => 'Não foi possível criar o token'], 500);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Não foi possível criar o token'], 500);
        }

        // Retornar o token e o email
        return response()->json([
            'token' => $token,
            'email' => $user->email
        ]);
    }

    public function index()
{
    return csrf_token();
}


}
