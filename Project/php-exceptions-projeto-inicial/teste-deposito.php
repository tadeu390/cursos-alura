<?php

use Alura\Banco\Modelo\Conta\ContaCorrente;
use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Endereco;

require_once 'autoload.php';

$contaCorrente = new ContaCorrente(
    new Titular(new CPF('123.123.123-12'),
    'Tadeu',
        new Endereco('cidade', 'bairro', 'rua', 123)
    )
);

try {
    $contaCorrente->deposita(-100);

} catch (InvalidArgumentException $e) {

    echo 'Valor a depositar precisa ser positivo, seu ráquer perigoso' . PHP_EOL;
    echo $e->getMessage();
}
