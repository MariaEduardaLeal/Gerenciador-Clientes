@extends('layouts.app')

@section('content')
    <h1>Editar Cliente</h1>
    <form action="{{ route('clients.update', $client) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nome*</label>
            <input type="text" name="name" class="form-control" value="{{ $client->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Data de Nascimento*</label>
            <input type="date" name="birth_date" class="form-control" value="{{ \Carbon\Carbon::parse($client->birth_date)->format('Y-m-d') }}" required>

        </div>
        <div class="mb-3">
            <label class="form-label">CPF/CNPJ*</label>
            <input type="text" name="cpf_cnpj" class="form-control" value="{{ $client->cpf_cnpj }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="photo" class="form-control">
            @if($client->photo)
                <img src="{{ asset('storage/' . $client->photo) }}" width="100" class="img-thumbnail mt-2">
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Nome Social</label>
            <input type="text" name="social_name" class="form-control" value="{{ $client->social_name }}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
