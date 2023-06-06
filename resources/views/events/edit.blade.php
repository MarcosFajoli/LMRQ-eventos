@extends('layouts.main')

@section('title', 'Editando: '.$event->name)

@section('content')

<h1>Editando: {{ $event->name }}</h1>
<form action="/eventos/editar/{{ $event->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mt-5">
        <div class="col-6 mb-3">
            <label for="name" class="form-label">Insira o nome do evento:</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{ $event->name }}">
        </div>
        <div class="col-6 mb-3">
            <label for="date" class="form-label">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ DateTime::createFromFormat('Y-m-d H:i:s', $event->date)->format('Y-m-d') }}">
        </div>
        <div class="col-8 mb-3">
            <label for="description" class="form-label">Descrição do evento:</label>
            <textarea type="text" class="form-control" id="description" name="description" aria-describedby="description" rows="3">{{ $event->description }}</textarea>
        </div>
        <div class="col-4 mb-3 form-check">
            <label class="form-label">Modalidade do evento:</label>
            @foreach($modalities as $modality)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="modal_id" id="{{ $modality->id }}" value="{{ $modality->id }}" {{ $modality->id == $event->modal_id ? "checked='checked'": "" }}>
                    <label class="form-check-label" for="{{ $modality->id }}">
                        {{ $modality->description }} (R$ {{ $modality->value }})
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row"></div>
        <div class="col-6 mb-3">
            <button type="submit" class="col-2 btn btn-primary mt-3">Editar</button>
            <button type="reset" class="col-2 btn btn-dark mt-3">Limpar</button>
        </div>
    </div>
</form>

@endsection