<?php

namespace Alura\Arquitetura\Infra\Repositorio\Memoria\Aluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoNaoEncontradoException;
use Alura\Arquitetura\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Dominio\Cpf;
use Exception;

class RepositorioDeAlunoEmMemoria implements RepositorioDeAluno
{
    private array $alunos;

    public function adicionar(Aluno $aluno): void
    {
        $this->alunos[] = $aluno;
    }

    public function atualizar(Aluno $aluno): void
    {

    }

    public function adicionarTelefones(string $cpf, array $telefones): void
    {
        $aluno = $this->buscarPorCpf(new Cpf($cpf));
        foreach ($telefones as $telefone) {
            $aluno->adicionarTelefone($telefone->ddd(), $telefone->numero());
        }
    }

    public function buscarPorCpf(Cpf $cpf): Aluno
    {
        $alunosFiltrados = array_filter($this->alunos, fn ($aluno) => $aluno->cpf() == $cpf);

        if (count($alunosFiltrados) === 0) {
            throw new AlunoNaoEncontradoException($cpf);
        }

        if (count($alunosFiltrados) > 1) {
            throw new Exception();
        }

        return $alunosFiltrados[0];
    }

    public function buscarTodos(): array
    {
        return $this->alunos;
    }
}
