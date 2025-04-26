@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <i class="bi bi-people me-2"></i>Clientes
    </h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Novo Cliente
    </a>
</div>

<div class="card shadow">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>CPF/CNPJ</th>
                        <th>Data Nasc.</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($client->photo)
                                    <img src="{{ asset('storage/' . $client->photo) }}"
                                         class="rounded-circle me-3" width="40" height="40">
                                @else
                                    <div class="bg-secondary rounded-circle me-3 d-flex align-items-center justify-content-center"
                                         style="width: 40px; height: 40px;">
                                        <i class="bi bi-person-fill text-white"></i>
                                    </div>
                                @endif
                                <div>
                                    <strong>{{ $client->name }}</strong>
                                    @if($client->social_name)
                                        <div class="text-muted small">{{ $client->social_name }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>{{ $client->cpf_cnpj }}</td>
                        <td>{{ \Carbon\Carbon::parse($client->birth_date)->format('Y-m-d') }}</td>
                        <td class="text-end">
                            <div class="btn-group">
                                <a href="{{ route('clients.show', $client) }}"
                                   class="btn btn-sm btn-outline-primary" title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('clients.edit', $client) }}"
                                   class="btn btn-sm btn-outline-warning" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('clients.destroy', $client) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Excluir"
                                            onclick="return confirm('Tem certeza que deseja excluir?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            <i class="bi bi-exclamation-circle fs-1 text-muted"></i>
                            <p class="mt-2">Nenhum cliente cadastrado</p>
                            <a href="{{ route('clients.create') }}" class="btn btn-sm btn-primary">
                                Cadastrar Primeiro Cliente
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
