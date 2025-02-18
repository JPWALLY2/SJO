<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {

        $dados = [
            'nome' => $request->get('nome'),
           'senha' => $request->get('senha')
        ];

        print_r($dados);

        // User::created($dados);
        // User::create($request->all());

        // if ($salvo) {
        //     return response()->json(['tipo' => 'sucesso', 'msg' => 'Cadastro realizado com sucesso!']);
        // } else {
        //     return response()->json(['tipo' => 'erro', 'msg' => 'Erro ao cadastrar o usuário!']);
        // }
    }
}
