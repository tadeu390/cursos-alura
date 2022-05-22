<?php

use Alura\DesignPattern\CalculadoraDeDescontos;
use Alura\DesignPattern\CalculadoraDeImpostos;
use Alura\DesignPattern\Impostos\Icms;
use Alura\DesignPattern\Orcamento;

require 'vendor/autoload.php';

/* $caculadora = new CalculadoraDeImpostos();
$orcamento = new Orcamento();
$orcamento->valor = 100;

echo $caculadora->calcula($orcamento, new Icms()); */

$caculadora = new CalculadoraDeDescontos();

$orcamento = new Orcamento();
$orcamento->valor = 600;
$orcamento->quantidade = 5;

echo $caculadora->calcula($orcamento);

