<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {

        print_r($request->input());

        $dados = [
            'nome'  => $request->input('nome'),
            'email' => $request->input('email'),
            'senha' => Hash::make($request->input('senha'))
        ];

        $salvo = User::create($dados);
        // $salvo = User::create($request->all());

        if ($salvo) {
            return response()->json($request->input());
            // return response()->json(['tipo' => 'sucesso', 'msg' => 'Cadastro realizado com sucesso!']);
        } else {
            return response()->json(['tipo' => 'erro', 'msg' => 'Erro ao cadastrar o usuário!']);
        }
    }

    public function verificarEmail(Request $request)
{
    $existe = User::where('email', $request->email)->exists();
    return response()->json(['existe' => $existe]);
}
}
