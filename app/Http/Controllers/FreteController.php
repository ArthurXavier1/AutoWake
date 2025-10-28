<?php

namespace App\Http\Controllers;

use App\Models\Frete;
use Illuminate\Http\Request;

class FreteController extends Controller
{
    public function exibe_Fretes(Request $request)
    {
        return view('Cadastro_Fretes');
    }

    public function processaFrete(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'email_comerciante' => 'required|email',
            'marca_produto' => 'required|string',
            'ano_fabricacao' => 'required|digits:4',
            'nome_motorista' => 'required|string',
            'telefone' => 'nullable|digits:11',
            'tipo_carga' => 'required|string',
            'capacidade_carga' => 'nullable|numeric',
            'observacoes' => 'nullable|string',
        ]);

        // Criar o registro no banco de dados
        $frete = new Frete();
        $frete->email_comerciante = $request->email_comerciante;
        $frete->marca_produto = $request->marca_produto;
        $frete->ano_fabricacao = $request->ano_fabricacao;
        $frete->nome_motorista = $request->nome_motorista;
        $frete->telefone = $request->telefone;
        $frete->tipo_carga = $request->tipo_carga;
        $frete->capacidade_carga = $request->capacidade_carga;
        $frete->observacoes = $request->observacoes;
        $frete->save();

        // Retornar resposta de sucesso
        return response()->json([
            'message' => 'Frete cadastrado com sucesso!',
            'frete' => $frete
        ], 201); // Código 201 para sucesso na criação
    }

}