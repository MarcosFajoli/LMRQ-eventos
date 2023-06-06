@extends('layouts.main')

@section('title', 'LMRQ Eventos - Minhas participações')

@section('content')

    <div class="row justify-content-start">
        <h1 class="col-12">Minhas participações</h1>
        <p class="col-6">Listagem com todas as suas participações. <a href="/eventos">Visualize todos os eventos!</a></p>
    </div>

    @php 
        $count = 0; 
    @endphp

    @if (count($events) == 0)
        <h4 class="p-5">Não existem participações cadastradas no momento. <a href="/eventos">Visualize todos os eventos!</a></h3>
    @else
        @foreach($events as $event)
            @if ($count % 4 == 0)
                <div class="row">
            @endif 
                    <div class="col-3">
                        <div class="card bg-light mb-3">
                            <div class="card-header pt-3">
                                <h5 class="card-title">{{ $event->name }}</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">{{ $event->date }}</h6>
                                <p class="card-text">{{ $event->description }}</p>
                                <a href="/eventos/{{ $event->id }}" class="btn btn-light border-gray">Abrir</a>
                                <form action="/eventos/cancelar/{{ $event->id }}" method="POST" class="mt-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">Cancelar inscrição</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @php $count += 1; @endphp

            @if($count % 4 === 0 || $loop->last)
                </div>
            @endif
            
        @endforeach
    @endif

@endsection