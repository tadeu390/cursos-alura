<?php

namespace Alura\Arquitetura\Infra\Repositorio\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

class AlunoModel extends Model
{
    public $timestamps = false;
    protected $table = 'alunos';
    protected $primaryKey = 'cpf';

    protected $fillable = [
        'cpf',
        'nome',
        'email'
    ];

    public function telefones()
    {
        return $this->hasMany(TelefoneModel::class, 'cpf_aluno', 'cpf');
    }
}
