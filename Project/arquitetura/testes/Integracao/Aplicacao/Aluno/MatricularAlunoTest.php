<?php

namespace Alura\Arquitetura\Testes\Integracao\Aplicacao\Aluno;

use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoService;
use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Infra\Repositorio\Eloquent\RepositorioDeAlunoComEloquent;
use Alura\Arquitetura\Infra\Repositorio\Memoria\Aluno\RepositorioDeAlunoEmMemoria;
use PHPUnit\Framework\TestCase;

class MatricularAlunoTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoRepositorio()
    {
        //require 'bootstrap/app.php';
        /* $dadosAluno = new MatricularAlunoDto('123.123.134-84', 'teste', 'teste@teste.com');

        $repositorioDeAlunoEmMemoria = new RepositorioDeAlunoComEloquent();
        $useCase = new MatricularAlunoService($repositorioDeAlunoEmMemoria);

        $useCase->executar($dadosAluno);

        $aluno = $repositorioDeAlunoEmMemoria->buscarPorCpf(new Cpf('123.123.134-84'));

        $this->assertSame('123.123.134-84', (string) $aluno->cpf());
        $this->assertSame('teste', (string) $aluno->nome());
        $this->assertSame('teste@teste.com', (string) $aluno->email());

        $this->assertEmpty($aluno->telefones()); */
    }
}

//testes de integração com o banco de dados
