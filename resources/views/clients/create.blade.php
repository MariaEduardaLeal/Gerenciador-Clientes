@extends('layouts.app')

@section('content')
    <h1>Cadastrar Cliente</h1>
    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome*</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Data de Nascimento*</label>
            <input type="date" name="birth_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">CPF/CNPJ*</label>
            <input type="text" name="cpf_cnpj" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Nome Social</label>
            <input type="text" name="social_name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
