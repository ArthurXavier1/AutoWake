<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Filmes;

class FilmesController extends Controller
{

    
public function certificado($id)
{
    $filme = filmes::findOrFail($id);
    $pdf = Pdf::loadView('certificado', compact('filme'));
    return $pdf->stream("certificado_{$filme->titulo}.pdf");
    
}
    public function salvar_filme(Request $request)
    {
        try {
            $filme = new Filmes();
            $filme->nome = $request->nome_film;
            $filme->img_filme = $request->imgf;
            $filme->sinopse = $request->sinopse;
            $filme->data_publicacao = $request->publicacao_filme;
            $filme->classificacao = $request->classificacao;
            $filme->genero = $request->genero;
            $filme->subgenero = $request->sub_genero;
            $filme->direcao = $request->direcao;
            $filme->atores = $request->atores;

            $filme->save();

            return response()->json([
                'mensagem' => 'Filme salvo com sucesso!',
                'dados' => $filme
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'mensagem' => 'Erro ao salvar filme',
                'erro' => $e->getMessage()
            ], 500);
        }
    }

    public function vem_filmes()
    {
        $filmes = Filmes::all();
        return response()->json([
            'mensagem' => 'Filmes encontrados com sucesso!',
            'dados' => $filmes
        ], 200);
    }

    public function exibir_filmes($id)
    {
        $filme = Filmes::find($id);

        if (!$filme) {
            return response()->json([
                'mensagem' => 'Filme não encontrado.'
            ], 404);
        }

        return response()->json([
            'mensagem' => 'Filme encontrado com sucesso!',
            'dados' => $filme
        ], 200);
    }

    public function exibe_formulario_filmeupdate($id)
    {
        $filme = Filmes::find($id);

        if (!$filme) {
            return response()->json([
                'mensagem' => 'Filme não encontrado.'
            ], 404);
        }

        return response()->json([
            'mensagem' => 'Dados do filme carregados.',
            'dados' => $filme
        ], 200);
    }

    public function editar_filme(Request $request, $id)
    {
        try {
            $request->validate([
                'nome_film' => 'required|string',
                'imgf' => 'required|string',
                'sinopse' => 'required|string',
                'publicacao_filme' => 'required|date',
                'classificacao' => 'required|string',
                'genero' => 'required|string',
                'sub_genero' => 'required|string',
                'direcao' => 'required|string',
                'atores' => 'required|string',
            ]);

            $filme = Filmes::findOrFail($id);

            $filme->update([
                'nome' => $request->nome_film,
                'img_filme' => $request->imgf,
                'sinopse' => $request->sinopse,
                'data_publicacao' => $request->publicacao_filme,
                'classificacao' => $request->classificacao,
                'genero' => $request->genero,
                'subgenero' => $request->sub_genero,
                'direcao' => $request->direcao,
                'atores' => $request->atores
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Filme atualizado com sucesso!',
                'dados' => $filme,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar filme',
                'erro' => $e->getMessage(),
            ], 500);
        }
    }

    public function deletar_filme($id)
    {
        $filme = Filmes::find($id);

        if (!$filme ) {
            return response()->json([
                'mensagem' => 'Filme não encontrado.'
            ], 404);
        }

        $filme->delete();

        return response()->json([
            'mensagem' => 'Filme deletado com sucesso!'
        ], 200);
    }

    public function filtra_filmes(Request $request)
{
    $filmes = new Filmes();

    if ($request->has('nome')) {
        $nome = $request->input('nome');
        $filmes = $filmes->where('nome', 'like', '%' . $nome . '%');
    }

    if ($request->has('ordem')) {
        switch ($request->input('ordem')) {
            case 'az':
                $filmes = $filmes->orderBy('nome', 'asc');
                break;
            case 'za':
                $filmes = $filmes->orderBy('nome', 'desc');
                break;
            case 'data_asc':
                $filmes = $filmes->orderBy('data_publicacao', 'asc');
                break;
            case 'data_desc':
                $filmes = $filmes->orderBy('data_publicacao', 'desc');
                break;
            default:
                break;
        }
    }

    if ($request->has('genero')) {
        $genero = $request->input('genero');
        $filmes = $filmes->where('genero', '=', $genero);
    }

    if ($request->has('subgenero')) {
        $subgenero = $request->input('subgenero');
        $filmes = $filmes->where('subgenero', '=', $subgenero);
    }

    if ($request->has('classificacao')) {
        $classificacao = $request->input('classificacao');
        $filmes = $filmes->where('classificacao', '=', $classificacao);
    }

    if ($request->has('ano')) {
        $ano = $request->input('ano');
        $filmes = $filmes->whereYear('data_publicacao', '=', $ano);
    }

    if ($request->has('direcao')) {
        $direcao = $request->input('direcao');
        $filmes = $filmes->where('direcao', 'like', '%' . $direcao . '%');
    }

    if ($request->has('ator')) {
        $ator = $request->input('ator');
        $filmes = $filmes->where('atores', 'like', '%' . $ator . '%');
    }

    $resultados = $filmes->get();

    return response()->json([
        'mensagem' => 'Filmes filtrados com sucesso',
        'filmes' => $resultados,
        'total' => $resultados->count()
    ], 200);
}
}