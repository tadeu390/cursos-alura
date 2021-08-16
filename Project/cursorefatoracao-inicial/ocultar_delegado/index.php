<?php declare(strict_types=1);

namespace Alura\OcultarDelegado;

require 'Departamento.php';
require 'Gerente.php';
require 'Pessoa.php';

$maria = new Pessoa(new Departamento(new Gerente('José')));

/* echo $maria
    ->getDepartamento()
    ->getGerente()
    ->getNome(); */

echo $maria->getNomeGerente();
//lei de demeter, princípio do menor conhecimento
//um objeto só deve ter conhecimento de objetos que estão próximos a ele
//o objeto