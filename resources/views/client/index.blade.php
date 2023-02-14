@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Clientes</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success green right" href="{{ route('clients.create') }}">Adicionar Cliente</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Nome Fantasia</th>
                <th>CPF/CNPJ</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>

            @forelse($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->fantasyName }}</td>
                    <td>{{ $client->documentNumber }}</td>
                    <td>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST">  
                            @csrf

                            <a class="btn btn-primary yellow" href="{{ route('clients.edit', $client->id) }}">Editar</a>

                            @method('DELETE')
                            <button type="submit" class="btn btn-danger red lighten-1">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty

                <tr>
                    <td colspan="3">There are no users.</td>
                </tr>

            @endforelse

        </tbody>

    </table>

    {!! $clients->withQueryString()->links('pagination::bootstrap-4') !!}

@endsection