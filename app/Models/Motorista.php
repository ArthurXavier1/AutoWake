<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Caminhao;

class Motorista extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID',
        'Nome',
        'CPF',
        'Telefone',
    
    ];

    public function caminhao()
    {
        return $this->hasOne(Caminhao::class);
    }
}
