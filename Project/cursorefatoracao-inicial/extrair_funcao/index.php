<?php declare(strict_types=1);

$saldos = [
    'Giovanni' => 3000,
    'Erika' => 5000,
];

function exibeErro()
{
    echo "<p>Correntista não existente.</p>";
}

function exibeSaldo(string $nome, array $saldos)
{
    echo "<p>O saldo do {$nome} é: {$saldos['Giovanni']}</p>";
}

function exibeSaldoCorrentista(string $nome, $saldos)
{
    return (array_key_exists($nome, $saldos)) ? exibeSaldo($nome, $saldos) : exibeErro();
}

exibeSaldoCorrentista("Giovanni", $saldos);