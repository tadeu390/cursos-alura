<?php

use Alura\Solid\Model\Curso;
use Alura\Solid\Service\CalculadorPontuacao;

require('../vendor/autoload.php');


$calcPontuacao = new CalculadorPontuacao();
$curso = new Curso('programação php');
echo $calcPontuacao->recuperarPontuacao($curso);