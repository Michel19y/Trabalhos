@extends('layouts.on')

@section('content')

<center>
    <h1>Cadastrar as Informações do seu Usuário</h1>
</center>

<div class="container mt-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('userinfo.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Campo de ID (desativado) -->
        <div class="mb-3">
            <label for="id-input-id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help" disabled value="id">
            <div id="id-help" class="form-text">Não é necessário informar o ID para cadastrar um novo dado.</div>
        </div>

        <!-- Campo de Nome -->
        <div class="mb-3">
            <label for="id-input-profileImg" class="form-label">Foto de perfil</label>
            <input type="file" class="form-control" id="id-input-nome" placeholder="Digite seu Nome" required name="profileImg">
        </div>

        <!-- Campo de Status -->
        <div class="mb-3">
            <label for="id-input-status" class="form-label">Status</label>
            <input type="text" class="form-control" id="id-input-status" placeholder="Digite o Status" required name="status" maxlength="2" pattern=".{2}">
            <small class="form-text text-muted">Apenas 2 caracteres.</small>
        </div>

        <!-- Campo de Data de Aniversário -->
        <div class="mb-3">
            <label for="id-input-dataNasc" class="form-label">Data de Aniversário</label>
            <input type="date" class="form-control" id="id-input-dataNasc" required name="dataNasc">
        </div>

        <!-- Campo de Gênero -->
        <div class="mb-3">
            <label for="id-input-genero" class="form-label">Gênero</label>
            <input type="text" class="form-control" id="id-input-genero" placeholder="Digite o Gênero" required name="genero" maxlength="2" pattern=".{2}">
            <small class="form-text text-muted">Apenas 2 caracteres.</small>
        </div>

        <!-- Campo de Dono das Informações -->
        <div class="mb-3">
            <label for="id-input-dono" class="form-label">Dono das Informações</label>
            <input type="text" class="form-control" id="id-input-dono" value="{{ $user->name }}" required readonly>
            <input type="hidden" name="user_id" value="{{ $user->id }}">
        </div>

        <!-- Botões de Enviar e Voltar -->
        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('produto.index') }}" class="btn btn-vibrant">Voltar</a>
            <button type="submit" class="btn btn-vibrant">Enviar</button>
        </div>

    </form>
</div>

@endsection
