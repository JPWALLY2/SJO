<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {

        print_r($request->input());

        $dados = [
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'senha' => $request->input('senha')
        ];

        User::created($dados);
        $salvo = User::create($request->all());

        if ($salvo) {
            return response()->json(['tipo' => 'sucesso', 'msg' => 'Cadastro realizado com sucesso!']);
        } else {
            return response()->json(['tipo' => 'erro', 'msg' => 'Erro ao cadastrar o usuário!']);
        }
    }
}
