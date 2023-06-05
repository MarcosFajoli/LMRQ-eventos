@extends('layouts.main')

@section('title', 'LMRQ Eventos - Todos os eventos')

@section('content')

    <div class="row justify-content-start">
        <h1 class="col-12">{{ $event->name }}</h1>
        <p class="col-6">{{ $event->description }}</p>
    </div>
    <div class="row"> 
        <div class="col">
            <h6 class="text-muted">{{ $event->date }}</h6>
        </div>
    </div>

@endsection