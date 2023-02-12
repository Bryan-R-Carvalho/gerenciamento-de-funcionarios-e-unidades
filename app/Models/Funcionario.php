<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'documento',
        'idade',
        'id_endereco',
        'id_unidade',
    ];
    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }
}
