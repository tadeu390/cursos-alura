<?php

namespace Alura\Leilao\Model;

use DomainException;

class Leilao
{
    /** @var Lance[] */
    private $lances;
    /** @var string */
    private $descricao;
    /** @var bool */
    private $finalizado = false;

    public function __construct(string $descricao)
    {
        $this->descricao = $descricao;
        $this->lances = [];
    }

    public function recebeLance(Lance $lance)
    {
        if (!empty($this->lances) && $this->ehDoUltimoUsuario($lance)) {
            throw new DomainException('Usuário não pode propor 2 lances consecutivos');
        }

        if ($this->quantidadeDeLancesPorUsuario($lance->getUsuario()) >= 5) {
            throw new DomainException('Usuário não pode propor mais de 5 lances por leilão');
        }

        $this->lances[] = $lance;
    }

    private function ehDoUltimoUsuario(Lance $lance): bool
    {
        $usuarioDoUltimoLance = $this->lances[array_key_last($this->lances)]->getUsuario();

        return $lance->getUsuario() == $usuarioDoUltimoLance;
    }

    private function quantidadeDeLancesPorUsuario(Usuario $usuario): int
    {
        return array_reduce($this->lances,
            function (int $totalAcumulado, Lance $lanceAtual) use($usuario) {
                if ($lanceAtual->getUsuario() == $usuario) {
                    return ++$totalAcumulado;
                }

                return $totalAcumulado;
            },
            0
        );
    }

    public function finaliza(): void
    {
        $this->finalizado = true;
    }

    public function estaFinalizado(): bool
    {
        return $this->finalizado;
    }

    /**
     * @return Lance[]
     */
    public function getLances(): array
    {
        return $this->lances;
    }
}
