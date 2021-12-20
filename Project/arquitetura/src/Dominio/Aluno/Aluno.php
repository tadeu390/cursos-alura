<?php

namespace Alura\Arquitetura\Dominio\Aluno;

use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Dominio\Email;

class Aluno
{
    private Cpf $cpf;
    private string $nome;
    private Email $email;
    private array $telefones;

    public static function comCpfNomeEEmail(string $cpf, string $nome, string $email): self
    {
        return new Aluno(new Cpf($cpf), $nome, new Email($email));
    }

    public function __construct(Cpf $cpf, string $nome, Email $email)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefones = [];
    }

    public function adicionarTelefone(string $ddd, string $numero)
    {
        $this->telefones[] = Telefone::comDddETelefone($ddd, $numero);
        return $this;
    }

    public function cpf(): string
    {
        return $this->cpf;
    }

    public function nome(): string
    {
        return $this->nome;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function telefones(): array
    {
        return $this->telefones;
    }
}

//nem sempre o padrão namedConstructor ajudará na instanciação dos objetos
//porque se a classe tem muitas proprieidades fica dificil dar um nome legível
//Aluno::comCpfNomeEEmail('12321', 'tadeu', 'tadeu@g.com')
//->adicionarTelefone('123','123')
//->adicionarTelefone('123','123');


//Vimos neste curso a possibilidade de criar métodos estáticos que tornam
//mais amigáveis a criação de um objeto.