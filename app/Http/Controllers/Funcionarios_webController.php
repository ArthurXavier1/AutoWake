<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class Funcionarios_webController extends Controller
{
    // Listar todos os funcionários
    public function index(Request $request)
    {
        $query = Funcionario::query();

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->input('nome') . '%');
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }
        if ($request->filled('cargo')) {
            $query->where('cargo', 'like', '%' . $request->input('cargo') . '%');
        }

        $funcionarios = $query->orderByDesc('id')->get();

        return view('funcionarios.index', compact('funcionarios'));
    }

    // Mostrar formulário de criação
    public function create()
    {
        return view('funcionarios.create');
    }

    // Armazenar novo funcionário
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
        ]);

        Funcionario::create($request->all());

        return redirect()
            ->route('funcionarios.index')
            ->with('success', 'Funcionário criado com sucesso!');
    }

    // Mostrar formulário de edição
    public function edit(Funcionario $funcionario)
    {
        return view('funcionarios.edit', compact('funcionario'));
    }

    // Atualizar funcionário existente
    public function update(Request $request, Funcionario $funcionario)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email,' . $funcionario->id,
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
        ]);

        $funcionario->update($request->only(['nome', 'email', 'cargo', 'salario']));

        return redirect()
            ->route('funcionarios.index')
            ->with('success', 'Funcionário atualizado com sucesso!');
    }

    // Excluir funcionário
    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();

        return redirect()
            ->route('funcionarios.index')
            ->with('success', 'Funcionário excluído com sucesso!');
    }

    // Mostrar detalhes do funcionário
    public function show(Funcionario $funcionario)
    {
        return view('funcionarios.show', compact('funcionario'));
    }

    // Gerar certificado em PDF
    public function certificado($id)
    {
        $relatorio = Funcionario::findOrFail($id);
        $pdf = Pdf::loadView('relatorios.certificado', compact('relatorio'));

        return $pdf->stream("certificado_{$relatorio->id}.pdf");
    }
}