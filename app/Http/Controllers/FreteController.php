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
    $frete = Frete::create([
        'email_comerciante' => $request->email_comerciante,
        'marca_produto' => $request->marca_produto,
        'ano_fabricacao' => $request->ano_fabricacao,
        'nome_motorista' => $request->nome_motorista,
        'telefone' => $request->telefone,
        'tipo_carga' => $request->tipo_carga,
        'capacidade_carga' => $request->capacidade_carga,
        'observacoes' => $request->observacoes,
    ]);

    // Redireciona de volta para o formulário com mensagem de sucesso
    return redirect()->back()->with('success', 'Frete cadastrado com sucesso!');
}


}