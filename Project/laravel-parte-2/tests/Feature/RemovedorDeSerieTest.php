<?php

namespace Tests\Feature;

use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorDeSerieTest extends TestCase
{
    //Limpa todo o banco, dropando tudo. depois roda as migrations configurando tudo e deixando banco zerado e pronto
    //para uso. Perigoso isso, se o banco de prod estiver definido no .env e essa trait estiver presente nos arquivos de testes
    //pode acontecer algo desastroso no banco de dados. antes de executar os tests, apontar para um banco de dados em memory,
    //como o sqlite. para fazer isso só usar o .env.testing execuntando o seguinte comando artisan: php artisan config:cache --env=testing
    use RefreshDatabase;
    /**
     * serie
     *
     * @var mixed
     */
    private $serie;

    /**
     * setUp
     * Metodo rodado antes de qualquer teste da classe
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $criadorDeSerie = new CriadorDeSerie();
        $this->serie = $criadorDeSerie->criarSerie('Nome da série', 1, 1);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRemoverUmaSerie()
    {
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);

        $removedorDeSerie = new RemovedorDeSerie();
        $nomeDaSerie = $removedorDeSerie->removerSerie($this->serie->id);
        $this->assertIsString($nomeDaSerie);
        $this->assertEquals('Nome da série', $this->serie->nome);
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    }
}
