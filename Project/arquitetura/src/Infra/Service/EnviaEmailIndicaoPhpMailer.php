<?php

namespace Alura\Arquitetura\Infra\Aluno;

use Alura\Arquitetura\Aplicacao\EnviaEmailIndicacao;
use Alura\Arquitetura\Dominio\Aluno\Aluno;

class EnviaEmailIndicaoPhpMailer implements EnviaEmailIndicacao
{
    public function enviaPara(Aluno $alunoIndicacao): void
    {
        //envia e-mail
    }
}
