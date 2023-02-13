@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Clientes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success green right" href="{{ route('create') }}">Adicionar Cliente</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <th>Nome Fantasia</th>
            <th>CPF/CNPJ</th>
            <th width="280px">Ação</th>
        </tr>

        @foreach ($clients as $client)

        <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->fantasyName }}</td>
            <td>{{ $client->documentNumber }}</td>
            <td>

                <form action="{{ route('destroy', $client->id) }}" method="POST">  
                    @csrf

                    <a class="btn btn-primary yellow accent-" href="{{ route('edit', $client->id) }}">Editar</a>

                    @method('DELETE')
                    <button type="submit" class="btn btn-danger red lighten-1">Delete</button>
                </form>
            </td>
        </tr>

        @endforeach

    </table>

    {!! $clients->links() !!}

@endsection
