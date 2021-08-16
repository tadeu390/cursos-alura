<?php

class MinhaExcecao extends DomainException
{
    public function exibe()
    {
        echo 'teste';
    }
}

try {
    throw new MinhaExcecao;

} catch (MinhaExcecao $e) {

    $e->exibe();
}