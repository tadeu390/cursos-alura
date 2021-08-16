<?php declare(strict_types=1);

namespace Alura\SubstituirArrayPorObjeto;

class Usuario
{
    private $nome;
    private $sobreNome;
    private $empresa;
    private $cargo;

    public function __construct(
        string $nome, string $sobreNome, string $empresa, string $cargo
    ) {
        $this->nome = $nome;
        $this->sobreNome = $sobreNome;
        $this->empresa = $empresa;
        $this->cargo = $cargo;
    }

    public function getNome () : string
    {
        return $this->nome;
    }

    public function getSobreNome () : string
    {
        return $this->sobreNome;
    }

    public function getEmpresa () : string
    {
        return $this->empresa;
    }

    public function getCargo () : string
    {
        return $this->cargo;
    }
}
