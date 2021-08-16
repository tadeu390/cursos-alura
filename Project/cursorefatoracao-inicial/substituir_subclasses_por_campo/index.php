<?php declare(strict_types=1);

namespace Alura\SubstituirSubclassesPorCampo;

require 'Microondas.php';

$microondas110 = Microondas::criarMicroOndas110();
echo "<p>{$microondas110->getVoltagem()}</p>";

$microondas220 = Microondas::criarMicroOndas220();
echo "<p>{$microondas220->getVoltagem()}</p>";
