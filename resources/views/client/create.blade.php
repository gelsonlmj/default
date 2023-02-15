@extends('layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Inserir Cliente</h2>
        </div>
    </div>
</div>


@if ($errors->any())

    <div class="alert alert-danger">
        <strong>Erro!</strong>Verifique os campos abaixo.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<form action="{{ route('clients.store') }}" method="POST">

    @csrf

    <div class="row">
        <div class="col s12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="name" class="form-control" placeholder="Nome" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s7">
            <div class="form-group">
                <strong>Nome Fantasia:</strong>
                <input type="text" name="fantasyName" value="" class="form-control" placeholder="Nome Fantasia" required>
            </div>
        </div>

        <div class="col s3">
            <div class="form-group">
                <strong>Documento:</strong>
                <input type="text" name="documentNumber" value="" class="form-control" placeholder="CPF/CNPJ" required>
            </div>
        </div>

        <div class="col s2">
            <div class="form-group">
                <strong>Status:</strong>
                <select id="active" name="active" required>
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center right">
            <a class="btn btn-primary grey lighten-1" href="{{route('clients.index')}}">Voltar</a>
            <button type="submit" class="btn btn-primary green">Salvar</button>
        </div>
    </div>

</form>

@endsection
