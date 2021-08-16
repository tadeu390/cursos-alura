<?php

namespace Tests\Feature;

use App\Serie;
use App\Services\CriadorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorDeSerieTest extends TestCase
{
    //Limpa todo o banco, dropando tudo. depois roda as migrations configurando tudo e deixando banco zerado e pronto
    //para uso. Perigoso isso, se o banco de prod estiver definido no .env e essa trait estiver presente nos arquivos de testes
    //pode acontecer algo desastroso no banco de dados. antes de executar os tests, apontar para um banco de dados em memory,
    //como o sqlite. para fazer isso só usar o .env.testing execuntando o seguinte comando artisan: php artisan config:cache --env=testing
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCriarSerie()
    {
        $criadorDeSerie = new CriadorDeSerie();
        $nomeSerie = 'Nome de teste';
        $serieCriada = $criadorDeSerie->criarSerie($nomeSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serieCriada);
        $this->assertDatabaseHas('series', ['nome' => $nomeSerie]);
        $this->assertDatabaseHas('temporadas', ['serie_id' => $serieCriada->id, 'numero' => 1]);
        $this->assertDatabaseHas('episodios', ['numero' => 1]);
    }
}
