@extends('layouts.main')

@section('title', 'Cadastrar novo evento')

@section('content')

<h1>Cadastrar novo evento</h1>
<form>
    <div class="row">
        <div class="col-12 form-text pb-3 pt-3">Você poderá modificar as informações após a criação, se desejar.</div>
        <div class="col-6 mb-3">
            <label for="nameEvent" class="form-label">Insira o nome do evento:</label>
            <input type="text" class="form-control" id="nameEvent" aria-describedby="nameEvent">
        </div>
        <div class="col-6 mb-3">
            <label for="dateEvent" class="form-label">Data do evento:</label>
            <input type="date" class="form-control" id="dateEvent">
        </div>
        <div class="col-8 mb-3">
            <label for="descEvent" class="form-label">Descrição do evento:</label>
            <textarea type="text" class="form-control" id="descEvent" aria-describedby="descEvent" rows="3"></textarea>
        </div>
        <div class="col-4 mb-3 form-check">
            <label class="form-label">Modalidade do evento:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="modality" id="deluxe" checked>
                <label class="form-check-label" for="deluxe">
                    Deluxe (R$200,00)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="modality" id="premium">
                <label class="form-check-label" for="premium">
                    Premium (R$150,00)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="modality" id="default">
                <label class="form-check-label" for="default">
                    Padrão (R$50,00)
                </label>
            </div>
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