<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frete extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_comerciante',
        'marca_produto',
        'ano_fabricacao',
        'nome_motorista',
        'telefone',
        'tipo_carga',
        'capacidade_carga',
        'observacoes',
    ];
}