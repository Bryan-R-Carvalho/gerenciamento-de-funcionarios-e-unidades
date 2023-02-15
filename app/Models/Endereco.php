<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\EnderecoFuncionarioTrait;

class Endereco extends Model{
    
    use HasFactory;

    protected $fillable = [
        'cep',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado'
    ];
    public function funcionarios()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
