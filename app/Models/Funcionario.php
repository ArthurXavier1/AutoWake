<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    // Definindo os campos que podem ser preenchidos no banco (mass assignment)
    protected $fillable = [
        'nome',
        'email',
        'cargo',
        'salario',
    ];
}