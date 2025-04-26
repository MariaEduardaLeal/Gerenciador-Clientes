@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">
            <i class="bi bi-person-plus me-2"></i>
            {{ isset($client) ? 'Editar Cliente' : 'Cadastrar Cliente' }}
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ isset($client) ? route('clients.update', $client) : route('clients.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($client)) @method('PUT') @endif

            <div class="row g-3">
                <!-- Coluna 1 -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nome Completo *</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ $client->name ?? old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nome Social</label>
                        <input type="text" name="social_name" class="form-control"
                               value="{{ $client->social_name ?? old('social_name') }}">
                    </div>
                </div>

                <!-- Coluna 2 -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">CPF/CNPJ *</label>
                        <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control"
                               value="{{ $client->cpf_cnpj ?? old('cpf_cnpj') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data de Nascimento *</label>
                        <input type="date" name="birth_date" class="form-control"
                               value="{{ isset($client) ? $client->birth_date->format('Y-m-d') : old('birth_date') }}" required>
                    </div>
                </div>

                <!-- Foto -->
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" name="photo" class="form-control" accept=".png">
                        @error('photo')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                        @if(isset($client) && $client->photo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $client->photo) }}"
                                     class="img-thumbnail" width="100">
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Botões -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        {{ isset($client) ? 'Atualizar' : 'Salvar' }}
                    </button>
                    <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary ms-2">
                        <i class="bi bi-arrow-left me-1"></i> Voltar
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
@endpush
@endsection
