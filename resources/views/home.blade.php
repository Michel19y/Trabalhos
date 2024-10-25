@extends('layouts.on')

<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="icon" type="image" href="/img/p.png">
@section('content')


<div class="mens">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            

                <div class="card-body">
                    @if (Auth::check())
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                          </div>
                        @endif
                        <h3 class="text-success">{{ __('Hey! You are logged in!') }}</h3>

                        <p>Pronto para explorar nosso cardápio do submundo?</p>
                    @else
                 
                    @endif
                </div>
            
        </div>
    </div>
</div>  </div>

<!-- Hero Section -->
<div class="hero-section text-center">
    <div class="hero-text">
        <h1>Bem-vindo à Pizzaria do Caronte</h1>
        <p>Onde cada mordida é uma jornada ao submundo.</p>
      
    </div>
</div>

<!-- Menu Section -->
<div class="menu-section" id="menu">
    <div class="container">
        <h2 class="text-center">Nosso Menu</h2>
        <div class="container mt-4">
    <h2 class="text-center">Lista de Produtos</h2>
    <div class="row">
        @if(isset($produtos) && count($produtos) > 0)
            @foreach ($produtos as $item)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $item->nome }}</h5>
                            <p>Preço: <strong>R$ {{ number_format($item->preco, 2, ',', '.') }}</strong></p>
                            <p>{{ $item->descricao }}</p>  
                             <a href="{{ route('produto.show', $item->id) }}" class="btn btn-vibrant">Mostrar</a>
                            <img src="{{ $item->urlImage }}" alt="Foto do Produto" class="img-product">

                         
                        </div>
                    </div>
                </div>
             
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-warning text-center">Nenhum produto encontrado.</div>
            </div>
        @endif
      <a href="{{ route('produto.show', $item->id) }}" class="btn btn-vibrant">Gerar pedido</a> </div>
</div>

            </div>
        </div>
    </div>
</div>

<!-- Products Section -->

<!-- Footer -->
<footer class="text-center mt-4">
    <p>&copy; 2024 Pizzaria do Caronte. Todos os direitos reservados. Ouse cruzar o rio.</p>
</footer>
<script>
    // Verifica se há uma mensagem de status
    window.onload = function() {
        const alertBox = document.querySelector('.mens');

        if (alertBox) {
            // Espera 3 segundos (3000 ms) e então esconde a mensagem
            setTimeout(() => {
                alertBox.style.transition = "opacity 0.5s ease"; // Transição suave
                alertBox.style.opacity = 0; // Faz a mensagem ficar invisível

                // Após a transição, remove o elemento do DOM
                setTimeout(() => {
                    alertBox.remove();
                }, 500); // Aguarda a transição antes de remover
            }, 2000);
        }
    };
</script>
@endsection
