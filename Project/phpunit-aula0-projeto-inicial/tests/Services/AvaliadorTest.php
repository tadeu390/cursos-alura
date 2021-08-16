<?php

namespace Alura\Leilao\Tests\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Services\Avaliador;
use DomainException;
use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase
{
    /**
     * @var Avaliador
     */
    private Avaliador $leiloeiro;

    /**
     * o método abaixo é executado uma única vez e antes mesmo de instanciar a classe
     */
    public static function setUpBeforeClass(): void
    {

    }

    /**
     * o método abaixo é executado antes de cada teste
     */
    protected function setUp(): void
    {
        echo "executando setup\n";
        $this->leiloeiro = new Avaliador();
    }

    /**
     * o método abaixo é executado após o término de cada teste
     */
    protected function tearDown(): void
    {

    }

    /**
     * o método abaixo é executado uma única vez após todos os testes serem executados
     */
    public static function tearDownAfterClass(): void
    {

    }

    /**
     * OBS.: Data providers são executados antes do método setUp
     */

    /**
     * @dataProvider leilaoEmOrdemCrescente
     * @dataProvider leilaoEmOrdemDeCrescente
     * @dataProvider leilaoEmOrdemAleatoria
     */
    public function testAvaliadorDeveEncontrarOMaiorValorDeLances(Leilao $leilao)
    {
        //executo o código a ser testado / Act - When
        $this->leiloeiro->avalia($leilao);

        $maior_valor = $this->leiloeiro->getMaiorValor();

        self::assertEquals(2500, $maior_valor);
    }

    /**
     * @dataProvider leilaoEmOrdemCrescente
     * @dataProvider leilaoEmOrdemDeCrescente
     * @dataProvider leilaoEmOrdemAleatoria
     */
    public function testAvaliadorDeveEncontrarOMenorValorDeLances(Leilao $leilao)
    {
        //executo o código a ser testado / Act - When
        $this->leiloeiro->avalia($leilao);

        $menor_valor = $this->leiloeiro->getMenorValor();

        $this->assertEquals(1700, $menor_valor);
    }

    /**
     * @dataProvider leilaoEmOrdemCrescente
     * @dataProvider leilaoEmOrdemDeCrescente
     * @dataProvider leilaoEmOrdemAleatoria
     */
    public function testAvaliadorDeveBuscarOsTresMaioresValores(Leilao $leilao)
    {
        $this->leiloeiro->avalia($leilao);

        $maiores_lances = $this->leiloeiro->getMaioresLances();

        self::assertCount(3, $maiores_lances);
        self::assertEquals(2500, $maiores_lances[0]->getValor());
        self::assertEquals(2000, $maiores_lances[1]->getValor());
        self::assertEquals(1700, $maiores_lances[2]->getValor());
    }

    public function leilaoEmOrdemCrescente()
    {
        echo "criando em ordem crescente \n";
        $leilao = new Leilao('Fiat 147 0 KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($ana, 1700));
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        return [
            'ordem-crescente' => [$leilao]
        ];
    }

    public function leilaoEmOrdemDeCrescente()
    {
        echo "criando em ordem decrescente \n";
        $leilao = new Leilao('Fiat 147 0 KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($ana, 1700));

        return [
            'ordem-decrescente' => [$leilao]
        ];
    }

    public function leilaoEmOrdemAleatoria()
    {
        echo "criando em ordem aleatória \n";
        $leilao = new Leilao('Fiat 147 0 KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($ana, 1700));

        return [
            'ordem-aleatoria' => [$leilao]
        ];
    }

    public function testleilaoVazioNaoPodeSerAValiado()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Não é possível avaliar um leilão vazio');
        $leilao = new Leilao('Fusca Azul');
        $this->leiloeiro->avalia($leilao);
    }

    public function testLeilaoFinalizadoNaoPodeSerAvaliado()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Leilão já finalizado');

        $leilao = new Leilao('Fiat 147 0 km');
        $leilao->recebeLance(new Lance(new Usuario('João'), 1000));
        $leilao->finaliza();

        $this->leiloeiro->avalia($leilao);
    }

    /* public function entregaLeiloes()
    {
        return [
            [$this->leilaoEmOrdemCrescente()],
            [$this->leilaoEmOrdemDeCrescente()],
            [$this->leilaoEmOrdemAleatoria()],
        ];
    } */
}
