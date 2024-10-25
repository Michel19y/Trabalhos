<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Produto</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
     <link rel="icon" type="image" href="/img/p.png">
     <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
</head>
<style> H1{
    margin-top: 50PX
} </style>

<body data-bs-theme="dark">

    <center>
        <h1>Cadastrar Tipo Produto</h1>
    </center>

    <div class="container mt-5">
        <form method="POST" action="{{route('tipoproduto.store')}}">
            @csrf
            <!-- Campo de ID (desativado) -->
            <div class="mb-3">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help" disabled value="#">
                <div id="id-help" class="form-text">Não é necessário informar o ID para cadastrar um novo dado.</div>
            </div>

            <!-- Campo de Descrição -->
            <div class="mb-3">
                <label for="id-input-descricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="id-input-descricao" placeholder="Digite a descrição do produto" required name="descricao">
            </div>

            <!-- Botões de Enviar e Voltar -->
            <div class="d-flex justify-content-end mt-3">  
                <a href="{{url()->previous()}}" class="btn btn-vibrant">Voltar</a>
                <button type="submit" class="btn btn-vibrant">Enviar</button>
              
            </div>
        </form>
    </div>

</body>

</html>
