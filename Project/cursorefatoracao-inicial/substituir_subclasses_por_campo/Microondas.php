<?php declare(strict_types=1);

namespace Alura\SubstituirSubclassesPorCampo;

class Microondas
{
    private int $voltagem;

    private function __construct(int $voltagem)
    {
        $this->voltagem = $voltagem;
    }

    public function getVoltagem(): int
    {
        return $this->voltagem;
    }

    public static function criarMicroOndas110(): Microondas
    {
        return new Microondas(110);
    }

    public static function criarMicroOndas220(): Microondas
    {
        return new Microondas(220);
    }
}
