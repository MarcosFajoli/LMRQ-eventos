@extends('layouts.main')

@section('title', 'LMRQ Eventos - Evento')

@section('content')

    <div class="row mb-3">
        <h1 class="col-12">{{ $event->name }}</h1>
        <p class="col-6 text-muted">{{ $event->date }} &nbsp; | &nbsp; {{ $eventUser['name'] }} &nbsp; | &nbsp; Participantes: {{ count($event->users) }}</p>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="row"> 
                <div class="col-12">
                    <h3 class="">Descrição do evento: </h3>
                </div>
                <div class="col">
                    <p>{{ $event->description }}</p>
                </div>
            </div>

            @if(auth()->user() && $event->user_id == auth()->user()->id)
            <div class="row mt-5">
                <div class="col">
                    <a class="btn btn-primary me-1" href="/eventos/editar/{{ $event->id }}">Editar evento</a>
                    <form action="/eventos/{{ $event->id }}" method="POST" class="mt-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Apagar evento</button>
                    </form>
                </div>
            </div>
            @endif
        </div>
        <div class="col-6">
            @if(!$hasJoined)
                <form action="/eventos/participar/{{ $event->id }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success">Confirmar presença</button>
                </form>
            @else
                <form action="/eventos/cancelar/{{ $event->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Cancelar presença</button>
                </form>
            @endif

        </div>
    </div>
    

@endsection