<?php

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Dominio\Email;

class FabricaAluno
{
    private Aluno $aluno;

    public function comCpfEmailENome(string $numeroCPf, string $email, string $nome): self
    {
        $this->aluno = new Aluno(new Cpf($numeroCPf), $nome, new Email($email));
        return $this;
    }

    public function adicionaTelefone(string $ddd, string $numero): self
    {
        $this->aluno->adicionarTelefone($ddd, $numero);
        return $this;
    }

    public function aluno (): Aluno
    {
        return $this->aluno;
    }
}

$fabrica = new FabricaAluno();
$fabrica->comCpfEmailENome('123', 'tadeu@teste.com', 'tadeu')
    ->adicionaTelefone('342', 234)
    ->aluno();

//após o curso de padrões criacionais, refatatorar esta classe, o que foi feito acima é semelhante
//ao padrão builder