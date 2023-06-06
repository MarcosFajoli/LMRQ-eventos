@extends('layouts.main')

@section('title', 'LMRQ Eventos - Meus eventos')

@section('content')

    <div class="row justify-content-start">
        <h1 class="col-12">Meus eventos</h1>
        <p class="col-6">Listagem com todos seus eventos cadastrados. <a href="/eventos/criar">Cadastre um novo evento!</a></p>
    </div>

    @php 
        $count = 0; 
    @endphp

    @if (count($events) == 0)
        <h4 class="p-5">Não existem eventos disponíveis no momento. <a href="/eventos/criar">Cadastre um novo evento para que ele apareça aqui!</a></h3>
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
                                <a href="/eventos/editar/{{ $event->id }}" class="btn btn-primary">Editar</a>
                                <a href="/eventos/deletar/{{ $event->id }}" class="btn btn-danger">Excluir</a>
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