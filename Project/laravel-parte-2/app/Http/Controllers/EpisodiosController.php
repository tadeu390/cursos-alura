<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        $episodios = $temporada->episodios;
        $mensagem = $request->session()->get('mensagem');

        return view('episodios.index', compact('temporada', 'episodios', 'mensagem'));
    }

    public function assistir(Temporada $temporada, Request $request)
    {
        $episodiosAssistidos = isset($request->episodios) ? $request->episodios : [];
        $temporada->episodios->each(function (Episodio $episodio) use ($episodiosAssistidos) {
            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
        });
        $temporada->push();

        $request->session()->flash('mensagem', 'Episódios marcados como assistidos');

        return redirect()->back();
    }
}
/* 11
4 placa 12 ano de garantia
inversor com 15 anos de garantia
12 x no cartão com juros
30 a 60 dias
custo de padrão novo = 1800 bifásico
cada placa  */