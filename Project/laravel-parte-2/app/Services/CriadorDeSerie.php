<?php

namespace App\Services;

use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nome, int $qtd_temporadas, int $ep_por_temporada): Serie
    {
        DB::beginTransaction();
            $serie = Serie::create([
                'nome' => $nome
            ]);
            $this->criarTemporadas($serie, $qtd_temporadas, $ep_por_temporada);
        DB::commit();

        return $serie;
    }

    private function criarTemporadas(Serie $serie, int $qtd_temporadas, int $ep_por_temporada): void
    {
        for ($i = 0; $i < $qtd_temporadas; $i++) {
            $temporada = $serie->temporadas()->create([
                'numero' => ($i + 1)
            ]);

            $this->criarEpisodios($temporada, $ep_por_temporada);
        }
    }

    private function criarEpisodios(Temporada $temporada, int $ep_por_temporada): void
    {
        for ($j = 0; $j < $ep_por_temporada; $j++) {
            $temporada->episodios()->create([
                'numero' => ($j + 1)
            ]);
        }
    }
}
