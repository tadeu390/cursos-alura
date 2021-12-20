<?php

namespace Alura\Arquitetura\Dominio\Indicacao;

use Alura\Arquitetura\Aluno\Aluno;

class Indicacao
{
    private Aluno $indicante;
    private Aluno $indicado;
    private \DateTimeImmutable $data;

    public function __construct(Aluno $indicante, Aluno $indicado)
    {
        $this->indicante = $this->indicante;
        $this->indicado = $this->indicado;

        $this->data = new \DateTimeImmutable();
    }
}
