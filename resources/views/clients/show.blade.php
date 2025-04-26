@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h5 class="m-0 font-weight-bold text-primary">
            <i class="bi bi-person-lines-fill me-2"></i>
            Detalhes do Cliente
        </h5>
        <div class="btn-group">
            <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-warning">
                <i class="bi bi-pencil me-1"></i> Editar
            </a>
            <a href="{{ route('clients.index') }}" class="btn btn-sm btn-secondary">
                <i class="bi bi-list me-1"></i> Lista
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Foto -->
            <div class="col-md-3 text-center">
                @if($client->photo)
                    <img src="{{ asset('storage/' . $client->photo) }}"
                         class="img-thumbnail rounded-circle mb-3" width="200">
                @else
                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mx-auto"
                         style="width: 200px; height: 200px;">
                        <i class="bi bi-person-fill text-white" style="font-size: 5rem;"></i>
                    </div>
                @endif
            </div>

            <!-- Dados -->
            <div class="col-md-9">
                <div class="row g-3">
                    <div class="col-md-6">
                        <h5 class="border-bottom pb-2">Informações Pessoais</h5>
                        <p><strong>Nome:</strong> {{ $client->name }}</p>
                        <p><strong>Nome Social:</strong> {{ $client->social_name ?? 'Não informado' }}</p>
                        <p><strong>Data Nasc.:</strong> {{ \Carbon\Carbon::parse($client->birth_date)->format('Y-m-d') }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="border-bottom pb-2">Documentos</h5>
                        <p><strong>CPF/CNPJ:</strong> {{ $client->cpf_cnpj }}</p>
                        <p><strong>Cadastrado em:</strong> {{ $client->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
