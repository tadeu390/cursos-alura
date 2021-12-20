<?php

namespace Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno;

//dto -> Data Transfer object
//esta classe apenas serve para transferir os dados para o domínio, não tem comportamento/açoes
//aqui a gente captura dados enviados através de classe controladora, terminal etc
class AdicionarTelefoneDto
{
    public string $cpfAluno;
    public string $ddd;
    public string $numero;

    public function __construct(string $cpfAluno, string $ddd, string $numero)
    {
        $this->cpfAluno = $cpfAluno;
        $this->ddd = $ddd;
        $this->numero = $numero;
    }
}
