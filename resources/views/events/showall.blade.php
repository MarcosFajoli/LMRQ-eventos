@extends('layouts.main')

@section('title', 'LMRQ Eventos - Todos os eventos')

@section('content')


    <div class="row justify-content-start">
        @if (!$search)
            <h1 class="col-12">LMRQ Eventos - Todos os eventos</h1>
            <p class="col-6">Listagem com todos os eventos disponíveis!</p>
        @else
            <h1 class="col-12">Resultado para: {{ $search }}</h1>
            <p class="col-6">Listagem com todos os eventos disponíveis com base na pesquisa.</p>
        @endif
    </div>

    @php 
        $count = 0; 
    @endphp

    @if (!$events)
        <h4 class="p-5">Não existem eventos disponíveis no momento. Cadastre um novo evento para que ele apareça aqui!</h3>
    @else
        @foreach($events as $event)
            @if ($count % 3 == 0)
                <div class="row">
            @endif 
                    <div class="col-4">
                        <div class="card bg-light mb-3">
                            <div class="card-header pt-3">
                                <h5 class="card-title">{{ $event->name }}</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">{{ $event->date }}</h6>
                                <p class="card-text">{{ $event->description }}</p>
                                <a href="/eventos/{{ $event->id }}" class="btn btn-primary">Abrir evento</a>
                            </div>
                        </div>
                    </div>
                    @php $count += 1; @endphp

            @if($count % 3 === 0 || $loop->last)
                </div>
            @endif
            
        @endforeach
    @endif

@endsection