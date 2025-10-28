<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class Funcionario_reactController extends Controller
{
    // Função para listar todos os funcionários
    public function index(Request $request)
{
    $query = Funcionario::query();

    if ($request->filled('nome')) {
        $query->where('nome', 'like', '%' . $request->nome . '%');
    }
    if ($request->filled('email')) {
        $query->where('email', 'like', '%' . $request->email . '%');
    }
    if ($request->filled('cargo')) {
        $query->where('cargo', 'like', '%' . $request->cargo . '%');
    }

    return response()->json($query->get());
}


    // Função para armazenar um novo funcionário
    public function store(Request $request)
{
    // Validação dos campos
    $request->validate([
    'nome' => 'required|string|max:255',
    'email' => 'required|email|unique:funcionarios,email',
    'cargo' => 'required|string|max:255',
    'salario' => 'required|numeric|min:0',
]);


    // Cria o novo funcionário
    $funcionario = Funcionario::create($request->all());

    // Retorna uma resposta de sucesso
    return response()->json([
        'message' => 'Funcionário criado com sucesso!',
        'data' => $funcionario
    ], 201);  // Status 201 - Criado com sucesso
}


    // Função para mostrar o formulário de edição
    public function edit(Funcionario $funcionario)
    {
        return view('funcionarios.edit', compact('funcionario'));
    }

    // Função para atualizar um funcionário
    public function update(Request $request, Funcionario $funcionario)
    {
        // Validação dos campos do formulário de edição
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email,' . $funcionario->id,
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',  // Adicionando a validação para salário > 0
        ]);

        // Atualiza o funcionário
        $funcionario->update($request->only(['nome', 'email', 'cargo', 'salario']));

        // Retorna o funcionário atualizado
        return response()->json($funcionario);
    }

    // Função para excluir um funcionário
    public function destroy(Funcionario $funcionario)
    {
        // Exclui o funcionário
        $funcionario->delete();

        // Retorna sucesso com status 204 (sem conteúdo)
        return response()->json(null, 204);
    }

    // Função para exibir detalhes de um funcionário
    public function show(Funcionario $funcionario)
    {
        // Verifica se o funcionário foi encontrado
        if (!$funcionario) {
            return response()->json(['error' => 'Funcionário não encontrado!'], 404);
        }

        return response()->json($funcionario);
    }

    // Função para gerar certificado de um funcionário
    public function certificado($id)
    {
        $relatorio = Funcionario::findOrFail($id);
        $pdf = Pdf::loadView('relatorios.certificado', compact('relatorio'));
        return $pdf->stream("certificado_{$relatorio->id}.pdf");
    }
}