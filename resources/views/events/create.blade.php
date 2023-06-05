@extends('layouts.main')

@section('title', 'Cadastrar novo evento')

@section('content')

<h1>Cadastrar novo evento</h1>
<form action="/eventos" method="POST">
    @csrf
    <div class="row">
        <div class="col-12 form-text pb-3 pt-3">Você poderá modificar as informações após a criação, se desejar.</div>
        <div class="col-6 mb-3">
            <label for="name" class="form-label">Insira o nome do evento:</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
        </div>
        <div class="col-6 mb-3">
            <label for="date" class="form-label">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="col-8 mb-3">
            <label for="description" class="form-label">Descrição do evento:</label>
            <textarea type="text" class="form-control" id="description" name="description" aria-describedby="description" rows="3"></textarea>
        </div>
        <div class="col-4 mb-3 form-check">
            <label class="form-label">Modalidade do evento:</label>
            @foreach($modalities as $modality)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="modal_id" id="{{ $modality->id }}" value="{{ $modality->id }}">
                    <label class="form-check-label" for="{{ $modality->id }}">
                        {{ $modality->description }} (R$ {{ $modality->value }})
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row"></div>
        <div class="col-6 mb-3">
            <button type="submit" class="col-2 btn btn-success mt-3">Cadastrar</button>
            <button type="reset" class="col-2 btn btn-dark mt-3">Limpar</button>
        </div>
    </div>
</form>

@endsection