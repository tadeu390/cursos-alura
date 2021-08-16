<?php

function funcao1()
{
    echo 'Entrei na função 1' . PHP_EOL;
    try {
        funcao2();

    } catch (Throwable $problema) {

        echo $problema->getMessage() . PHP_EOL;
        echo $problema->getLine() . PHP_EOL;
        echo $problema->getTraceAsString() . PHP_EOL;

       // throw new RuntimeException('Excecao foi tratada, mas, pega aí', $e->getCode(), $e);
    }

    echo 'Saindo da função 1' . PHP_EOL;
}

function funcao2()
{
    echo 'Entrei na função 2' . PHP_EOL;

    /* $divisao = intdiv(5, 0);
    $arrayFix = new SplFixedArray(2);
    $arrayFix[3] = 'valor'; */
    $exception = new RuntimeException('Essa é a minha mensagem de exceção');
    throw $exception;
    for ($i = 1; $i <= 5; $i++) {
        echo $i . PHP_EOL;
    }
    //var_dump(debug_backtrace());
    echo 'Saindo da função 2' . PHP_EOL;
}
//try {
    echo 'Iniciando o programa principal' . PHP_EOL;
    funcao1();
    echo 'Finalizando o programa principal' . PHP_EOL;
//} catch (RuntimeException $e) {
   // echo $e->getTraceAsString();
    //echo $e->getMessage();
    //echo $e->getPrevious()->getTraceAsString();
//}
