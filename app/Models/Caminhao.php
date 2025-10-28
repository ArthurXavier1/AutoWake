<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Motorista;

class Caminhao extends Model
{
    protected $fillable = [
        'motorista_id',
        'modelo',
        'ano',
        'placa',
        'rastreador',
    ];

    public function motorista()
    {
        return $this->belongsTo(Motorista::class);
    }
}
