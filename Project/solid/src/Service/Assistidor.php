<?php

namespace Alura\Solid\Service;

use Alura\Solid\Model\Assistivel;

class Assistidor
{
    public function assitir(Assistivel $conteudo)
    {
        $conteudo->assistir();
    }

}
