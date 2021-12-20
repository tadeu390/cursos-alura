<?php

namespace Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Dominio\Aluno\Telefone;
use Alura\Arquitetura\Dominio\Cpf;

///classe de serviçio de aplicação
class AdicionarTelefoneService
{
    private RepositorioDeAluno $repositorioDeAluno;

    public function __construct(RepositorioDeAluno $repositorioDeAluno)
    {
        $this->repositorioDeAluno = $repositorioDeAluno;
    }

    public function executar(AdicionarTelefoneDto $dados): void
    {
        $this->repositorioDeAluno->adicionarTelefones($dados->cpfAluno, [new Telefone($dados->ddd, $dados->numero)]);
    }
}
