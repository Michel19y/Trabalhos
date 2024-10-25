@extends('layouts.on')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Meus Pedidos</h2>

    <div class="row">
        @if(isset($pedidos) && count($pedidos) > 0)
            @foreach($pedidos as $pedido)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header text-white bg-success text-center">
                            <h5 class="mb-0">Pedido #{{ $pedido->id }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Data:</label>
                                <input type="text" class="form-control" disabled value="{{ $pedido->created_at->format('d/m/Y H:i') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status:</label>
                                <input type="text" class="form-control" disabled value="{{ $pedido->status }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total:</label>
                                <input type="text" class="form-control" disabled value="R$ {{ number_format($pedido->total, 2, ',', '.') }}">
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('pedidos.show', $pedido->id) }}" class="btn btn-info">Ver Detalhes</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-warning text-center">Nenhum pedido encontrado.</div>
            </div>
        @endif
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-secondary">Voltar para o Menu</a>
    </div>
</div>
@endsection
