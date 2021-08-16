@extends('layout')

@section('cabecalho')
    Episódios da temporada nº <b>{{ $temporada->numero }}</b>
@endsection

@section('conteudo')
@includeWhen(!empty($mensagem), 'mensagem', ['mensagem' => $mensagem])

<form action="{{route('episodios.assistir', $temporada->id)}}" method="POST">
    @csrf
    <ul class="list-group">
        @foreach($episodios as $episodio)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Episódio {{ $episodio->numero }}
                <input
                    type="checkbox" {{ $episodio->assistido ? 'checked' : '' }}
                    name="episodios[]"
                    value="{{ $episodio->id }}"
                >
            </li>
        @endforeach
    </ul>

    <button class="btn btn-primary mt-2 mb-2">Salvar</button>
</form>
@endsection