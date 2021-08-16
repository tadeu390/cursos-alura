<?php

namespace Tests\Feature;

use App\Episodio;
use App\Temporada;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TemporadaTest extends TestCase
{
    /**
     * temporario
     *
     * @var mixed
     */
    private $temporada;

    /**
     * setUp
     * Metodo rodado antes de qualquer teste da classe
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $temporada = new Temporada();

        $episodio1 = new Episodio();
        $episodio1->assistido = true;
        $episodio2 = new Episodio();
        $episodio2->assistido = false;
        $episodio3 = new Episodio();
        $episodio3->assistido = true;

        $temporada->episodios->add($episodio1);
        $temporada->episodios->add($episodio2);
        $temporada->episodios->add($episodio3);

        $this->temporada = $temporada;
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testBuscaPOrEpisodiosAssistidos()
    {
        $episodiosAssitidos = $this->temporada->getEpisodiosAssistidos();

        $this->assertCount(2, $episodiosAssitidos);

        foreach ($episodiosAssitidos as $episodiosAssitido) {
            $this->assertTrue($episodiosAssitido->assistido);
        }
    }

    public function testBuscaTodosOsEpisodios()
    {
        $episodios = $this->temporada->episodios;

        $this->assertCount(3, $episodios);
    }
}
