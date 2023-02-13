@extends('layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Cliente</h2>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('client.index') }}"> Back</a>
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

<form action="{{ route('client.update', $client->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="row">
        <div class="col s12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="name" value="{{$client->name}}" class="form-control" placeholder="Nome" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s7">
            <div class="form-group">
                <strong>Nome Fantasia:</strong>
                <input type="text" name="fantasyName" value="{{$client->fantasyName}}" class="form-control" placeholder="Nome Fantasia" required>
            </div>
        </div>

        <div class="col s3">
            <div class="form-group">
                <strong>Documento:</strong>
                <input type="text" name="documentNumber" value="{{$client->documentNumber}}" class="form-control" placeholder="CPF/CNPJ" required>
            </div>
        </div>

        <div class="col s2">
            <div class="form-group">
                <strong>Status:</strong>
                <select id="active" name="active">
                    <option value="1" >Ativo</option>
                    <option value="0" >Inativo</option>
                </select>
            </div>
        </div>
    </div>

</form>

@endsection
