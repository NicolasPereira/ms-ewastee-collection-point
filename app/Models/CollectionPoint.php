<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'localidade',
        'uf',
    ];
}
