@extends('layouts.main')

@section('title', 'LMRQ Eventos - Evento')

@section('content')

    <div class="row mb-3">
        <h1 class="col-12">{{ $event->name }}</h1>
        <p class="col-6 text-muted">{{ $event->date }} &nbsp; | &nbsp; {{ $eventUser['name'] }}</p>
    </div>
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
            <a class="btn btn-primary me-1" href="#">Editar evento</a>
            <a class="btn btn-danger" href="#">Apagar evento</a>
        </div>
    </div>
    @endif

@endsection