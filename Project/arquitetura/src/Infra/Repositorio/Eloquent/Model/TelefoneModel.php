<?php

namespace Alura\Arquitetura\Infra\Repositorio\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

class TelefoneModel extends Model
{
    public $timestamps = false;
    protected $table = 'telefones';

    protected $fillable = [
        'ddd',
        'numero',
        'cpf_aluno'
    ];

}
