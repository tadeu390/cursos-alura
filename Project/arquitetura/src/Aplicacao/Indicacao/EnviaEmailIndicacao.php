<?php

namespace Alura\Arquitetura\Aplicacao;

use Alura\Arquitetura\Dominio\Aluno\Aluno;

Interface EnviaEmailIndicacao
{
    public function enviaPara(Aluno $alunoIndicacao): void;
}

/**
 * O conceito de Services
 *  Que há Domain, Application e Infrastructure Services
 *  Domain Services são classes que representam uma ação entre mais de uma entidade
 *  Application Services controlam o fluxo de alguma regra em nossa aplicação
 *  Infrastructure Services são implementações de interfaces presentes nas camadas de domínio ou de aplicação
*/