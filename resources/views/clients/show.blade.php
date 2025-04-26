@extends('layouts.app')

@section('content')
    <h1>Detalhes do Cliente</h1>
    <div class="card">
        <div class="card-body">
            @if($client->photo)
                <img src="{{ asset('storage/' . $client->photo) }}" width="100" class="img-thumbnail mb-3">
            @endif
            <p><strong>Nome:</strong> {{ $client->name }}</p>
            <p><strong>Nome Social:</strong> {{ $client->social_name ?? 'Não informado' }}</p>
            <p><strong>CPF/CNPJ:</strong> {{ $client->cpf_cnpj }}</p>
            <p><strong>Data de Nascimento:</strong>{{ \Carbon\Carbon::parse($client->created_at)->format('d/m/Y') }}</p>
            <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning">Editar</a>
        </div>
    </div>
@endsection
