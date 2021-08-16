<?php

namespace Alura\Leilao\Services;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use DomainException;

class Avaliador
{
    private float $maior_valor = -INF;
    private float $menor_valor = INF;
    private $maiores_lances;

    public function avalia(Leilao $leilao): void
    {
        if ($leilao->estaFinalizado()) {
            throw new DomainException('Leilão já finalizado');
        }

        if (empty($leilao->getLances())) {
            throw new DomainException('Não é possível avaliar um leilão vazio');
        }

        foreach ($leilao->getLances() as $lance) {
            if ($lance->getValor() > $this->maior_valor) {
                $this->maior_valor = $lance->getValor();
            }
            if ($lance->getValor() < $this->menor_valor) {
                $this->menor_valor = $lance->getValor();
            }
        }

        $lances = $leilao->getLances();
        usort($lances, function (Lance $lance1, Lance $lance2) {
            return $lance2->getValor() - $lance1->getValor();
        });

        $this->maiores_lances = array_slice($lances, 0, 3);
    }

    /**
     * Get the value of maior_valor
     */
    public function getMaiorValor()
    {
        return $this->maior_valor;
    }

    /**
     * Get the value of menor_valor
     */
    public function getMenorValor()
    {
        return $this->menor_valor;
    }

    /**
     * Get the value of maiores_lances
     */
    public function getMaioresLances()
    {
        return $this->maiores_lances;
    }
}
