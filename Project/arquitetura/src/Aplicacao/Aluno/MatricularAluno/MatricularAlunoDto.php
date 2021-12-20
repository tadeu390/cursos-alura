<?php

namespace Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno;

//dto -> Data Transfer object
//esta classe apenas serve para transferir os dados para o domínio, não tem comportamento/açoes
//aqui a gente captura dados enviados através de classe controladora, terminal etc
class MatricularAlunoDto
{
    public string $cpfAluno;
    public string $nomeAluno;
    public string $emailAluno;

    public function __construct(string $cpfAluno, string $nomeAluno, string $emailAluno)
    {
        $this->cpfAluno = $cpfAluno;
        $this->nomeAluno = $nomeAluno;
        $this->emailAluno = $emailAluno;
    }
}
