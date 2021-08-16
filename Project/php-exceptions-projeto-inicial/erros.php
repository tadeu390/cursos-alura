<?php

//por default o php não exibe notices, sendo assim é necessário colocar a função abaixo
error_reporting(E_ALL);
//diz se deve exibir na tela ou não os erros reportados
ini_set('display_errors', 1);
//habilita log de erros, por padrão manda pro syslog
ini_set('log_errors', 1);
//se definir essa linha abaixo, vc específica para onde que deve ir os logs, em vez do syslog
ini_set('error_log', './teste.log');
//essas configs devem ser feitas direto no php.ini. vc pode ter
//um php ini por ambiente, prod,qa,dev,etc.
//--------------

//criando um tratador de erros pra nossa aplicação
//frameworks normalmente implementam isso
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    echo '<pre>';
    var_dump($errno, $errstr, $errfile, $errline);

    switch ($errno) {
        case E_WARNING :
            //throw new Exception('teste');
            echo 'isso é perigoso';
            break;
        case E_NOTICE :
            //throw new Exception('teste2');
            echo 'Melhor não fazer isso';
            break;
    }

    return true;
});


//NOTICE, FALHAS NO CÓDIGO QUE NÃO PARAM A EXECUÇÃO DO CÓDIGO
//PORÉM PODE TRAZER PROBLEMAS, VAI EXISTIR ESSE ALERTA NO CÓDIGO
//ENQUANTO NÃO FOR AJUSTADO
echo $var;
echo @$array[12];
// @ -> operador de supressão de erro. ele esconde o erro. nunca deve-se usar

//WARNING
//ALGO QUE EM ALGUM FUTURO PRÓXIMO IRÁ PARAR DE FUNCIONAR, POIS O PHP REMOVERÁ
//SUA IMPLEMENTAÇÃO POR ESTAR DEFASADA

//ACESSAR CONSTANTE QUE NÃO EXISTE IRÁ PARAR FUNCIONAR A PARTIR DO PHP 8,
//SENDO ASSIM, IRÁ LANÇAR UM WARNING
echo CONSTANTE;