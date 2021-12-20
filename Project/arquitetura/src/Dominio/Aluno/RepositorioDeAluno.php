<?php

namespace Alura\Arquitetura\Dominio\Aluno;

use Alura\Arquitetura\Dominio\Cpf;

interface RepositorioDeAluno
{
    public function adicionar(Aluno $aluno): void;
    public function atualizar(Aluno $aluno): void;
    public function adicionarTelefones(string $cpf, array $telefones): void;
    public function buscarPorCpf(Cpf $cpf): Aluno;
    /**return Aluno[] */
    public function buscarTodos(): array;
}
