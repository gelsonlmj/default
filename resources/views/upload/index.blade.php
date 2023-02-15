@extends('layout')
@section('title', 'Importação de Ceps')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Importação de Ceps</h2>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

    <form action="{{ route('imports') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <div class="input-field col s4">
                <select multiple id="client_id" name="client_id[]">
                    <option disabled value="">:: Selecione ::</option>
                    @foreach ($clients as $clientId => $clientName)
                        <option value="{{$clientId}}">{{$clientName}}</option>
                    @endforeach;
                </select>
                <label>Cliente</label>
            </div>

            <div class = "file-field input-field col s8">
                <div class = "btn grey">
                    <span>Selecionar</span>
                    <input type = "file" id="file" name="file" />
                </div>

                <div class = "file-path-wrapper">
                    <input class = "file-path validate" type = "text" placeholder = "Arquivo" />
                </div>
            </div>
        </div>

        <div class="row">
            <button class="btn waves-effect green right" type="submit" name="submit">
                Enviar
                <i class="material-icons right">send</i>
            </button>
        </div>

    </form>
@endsection
