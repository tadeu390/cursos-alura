<?php

namespace Alura\Arquitetura\Testes\Unidade\Aplicacao\Aluno;

use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\AdicionarTelefoneDto;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\AdicionarTelefoneService;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoService;
use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Infra\Repositorio\Memoria\Aluno\RepositorioDeAlunoEmMemoria;
use PHPUnit\Framework\TestCase;

class AdicionarTelefoneTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoRepositorio()
    {
        //primeiro adiciono o aluno
        $dadosAluno = new MatricularAlunoDto('123.123.134-84', 'teste', 'teste@teste.com');

        $repositorioDeAlunoEmMemoria = new RepositorioDeAlunoEmMemoria();
        $useCase = new MatricularAlunoService($repositorioDeAlunoEmMemoria);

        $useCase->executar($dadosAluno);

        //depois tento adicionar o telefone
        $dadosTelefoneAluno = new AdicionarTelefoneDto('123.123.134-84', '33', '878765458');

        $useCase = new AdicionarTelefoneService($repositorioDeAlunoEmMemoria);

        $useCase->executar($dadosTelefoneAluno);

        $aluno = $repositorioDeAlunoEmMemoria->buscarPorCpf(new Cpf('123.123.134-84'));

        $this->assertNotEmpty($aluno->telefones());
    }
}
//aqui estamos fazendo teste de unidade, testando a parte da aplicação do app