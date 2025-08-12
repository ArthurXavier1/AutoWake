<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filmes extends Model
{
    use HasFactory;

    protected $table = "filmes";

    protected $fillable = [
    'nome',
    'img_filme',
    'sinopse',
    'data_publicacao',
    'classificacao',
    'genero',
    'subgenero',
    'direcao',
    'atores'
];
     public function salvaPdf(){

 

    $pdf = Pdf::loadView('enviapdf');

    $output = $pdf->output();

   
    $caminho = public_path('pdfs/teste.pdf');

   
    if (!File::exists(public_path('pdfs'))) {
        File::makeDirectory(public_path('pdfs'), 0755, true);
    }

   
    file_put_contents($caminho, $output);

    return response()->json(['message' => 'PDF gerado e salvo com sucesso!', 'caminho' => asset('Documentos')]);
}


}