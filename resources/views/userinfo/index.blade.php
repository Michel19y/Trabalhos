@extends('layouts.on')

@section('content')
   <div class="container mt-5">
        <h2 class="text-center mb-4">Perfil inicial</h2>

        <div class="row">
       <center>      <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header text-white bg-primary text-center">
                        <h5 class="mb-0"> Nome:
                            {{ $userInfos->name ?? 'Usuário não encontrado' }}</h5>
                    </div>
                    <div class="card-body">
                       
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="text" class="form-control" disabled value="{{ $userInfos->email ?? 'N/A' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Senha:</label>
                            <input type="text" class="form-control" disabled value="{{ $userInfos->password ?? 'N/A' }}">
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
</center>
        <div class="text-center mt-4">
            @if(isset($userInfos))  <a href="{{ route('home') }}" class="btn btn-vibrant">Voltar</a>
            <a href="{{ route('userinfo.show', ['id' => Auth::user()->id]) }}" class="btn btn-vibrant">Ver mais</a>

           {{-- :     <a href="{{ route('userinfo.edit', $userInfos->id) }}" class="btn btn-secondary">Editar</a> --}}
            @else<a href="{{ route('home') }}" class="btn btn-secondary">Voltar</a>
                <p>Nenhuma informação de usuário disponível.</p>
            @endif
          
        </div>
    </div>
@endsection
