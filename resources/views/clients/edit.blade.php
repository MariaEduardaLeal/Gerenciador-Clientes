@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h5 class="m-0 font-weight-bold text-primary">
            <i class="bi bi-pencil-square me-2"></i>
            Editar Cliente
        </h5>
        <a href="{{ route('clients.show', $client) }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Voltar
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('clients.update', $client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <!-- Coluna 1 -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nome Completo *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $client->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nome Social</label>
                        <input type="text" name="social_name" class="form-control @error('social_name') is-invalid @enderror"
                               value="{{ old('social_name', $client->social_name) }}">
                        @error('social_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Coluna 2 -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">CPF/CNPJ *</label>
                        <input type="text" name="cpf_cnpj" id="cpf_cnpj"
                               class="form-control @error('cpf_cnpj') is-invalid @enderror"
                               value="{{ old('cpf_cnpj', $client->cpf_cnpj) }}" required>
                        @error('cpf_cnpj')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data de Nascimento *</label>
                        <input type="date" name="birth_date"
                               class="form-control @error('birth_date') is-invalid @enderror"
                               value="{{ \Carbon\Carbon::parse(old('birth_date', $client->birth_date))->format('Y-m-d') }}" required>
                        @error('birth_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Foto -->
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Foto (PNG apenas)</label>
                        <input type="file" name="photo"
                               class="form-control @error('photo') is-invalid @enderror"
                               accept=".png">
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if($client->photo)
                            <div class="mt-3 d-flex align-items-center">
                                <img src="{{ asset('storage/' . $client->photo) }}"
                                     class="img-thumbnail rounded me-3" width="100">
                                <div>
                                    <p class="mb-1 small text-muted">Foto atual</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Botões -->
                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save me-2"></i>
                        Atualizar Cliente
                    </button>
                    <a href="{{ route('clients.index') }}" class="btn btn-light px-4 ms-2">
                        <i class="bi bi-x me-2"></i>
                        Cancelar
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
        $('#cpf_cnpj').mask('000.000.000-00', {
            onKeyPress: function(cpf, e, field, options) {
                if (cpf.length > 14) {
                    $(field).mask('00.000.000/0000-00');
                }
            }
        });

        // Validação de PNG antes do upload
        $('input[name="photo"]').on('change', function(e) {
            const file = e.target.files[0];
            if (file && !file.name.toLowerCase().endsWith('.png')) {
                alert('Apenas arquivos PNG são permitidos!');
                $(this).val('');
            }
        });
    });
</script>
@endpush
@endsection
