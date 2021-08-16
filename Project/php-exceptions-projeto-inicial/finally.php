<?php

/* $arquivo = fopen('temp.txt', 'w');

try {
    fwrite($arquivo, 'Qualquer coisa');
} catch (\Throwable $th) {

    echo 'Erro ao escrever no arquivo' . PHP_EOL;

} finally {
    fclose($arquivo);
} */

function a()
{
    try {
        echo 'código';
        throw new Exception('teste');
        return 0;

    } catch (Throwable $th) {

        echo 'Problema';
        return 1;
    } finally {
        echo 'Final';
    }
}

echo a();
