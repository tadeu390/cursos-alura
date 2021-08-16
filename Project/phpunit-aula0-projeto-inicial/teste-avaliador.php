<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Services\Avaliador;

require_once 'vendor/autoload.php';

//arrumo a casa para o teste / Arrange - Given
$leilao = new Leilao('Fiat 147 0 KM');

$maria = new Usuario('Maria');
$joao = new Usuario('João');

$leilao->recebeLance(new Lance($joao, 2000));
$leilao->recebeLance(new Lance($maria, 2500));

$leiloeiro = new Avaliador();

//executo o código a ser testado / Act - When
$leiloeiro->avalia($leilao);

$maior_valor = $leiloeiro->getMaiorValor();

//verifico se a saída é a esperada / Assert - Then
$valor_esperado = 2500;

if ($maior_valor != $valor_esperado) {
    echo 'teste falhou';
} else {
    echo 'teste passou';
}

echo "\n";