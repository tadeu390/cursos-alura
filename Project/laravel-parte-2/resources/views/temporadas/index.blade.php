@extends('layout')

@section('cabecalho')
    Temporadas de <b>{{ $serie->nome }}</b>
@endsection

@section('conteudo')
<ul class="list-group">
    @foreach($temporadas as $temporada)
        <li class="list-group-item d-flex justify-content-between align-items-center">
           <a href="{{route('temporadas.episodios', $temporada->id)}}">Temporada {{ $temporada->numero }}</a>
           <span class="badge badge-secondary">
               {{$temporada->getEpisodiosAssistidos()->count()}} / {{ $temporada->episodios->count() }}
            </span>
        </li>
    @endforeach
</ul>
@endsection