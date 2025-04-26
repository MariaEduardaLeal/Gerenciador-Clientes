@extends('layouts.app')

@section('content')
    <h1>Clientes</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Novo Cliente</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF/CNPJ</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->cpf_cnpj }}</td>
                    <td>
                        <a href="{{ route('clients.show', $client) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
