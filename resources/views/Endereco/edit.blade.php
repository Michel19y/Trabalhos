<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit de Endereço</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="icon" type="image" href="/img/p.png">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>

<body>
    <div class="container">
        <form method="post" action="{{ route('endereco.update', $endereco->id) }}">
            @csrf
            @method("put")
            <div class="mb-3">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help" disabled
                    value="{{ $endereco->id }}">
                <div id="id-help" class="form-text">Não é necessário informar o ID para editar um dado.</div>
            </div>
            <div class="mb-3">
                <label for="id-input-bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="id-input-bairro" name="bairro"
                    placeholder="Digite o bairro" value="{{ $endereco->bairro }}">
            </div>
            <div class="mb-3">
                <label for="id-input-logradouro" class="form-label">Logradouro</label>
                <input type="text" class="form-control" id="id-input-logradouro" name="logradouro"
                    placeholder="Digite o logradouro" value="{{ $endereco->logradouro }}">
            </div>
            <div class="mb-3">
                <label for="id-input-numero" class="form-label">Número</label>
                <input type="text" class="form-control" id="id-input-numero" name="numero"
                    placeholder="Digite o numero" value="{{ $endereco->numero }}">
            </div>
            <div class="mb-3">
                <label for="id-input-complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control" id="id-input-complemento" name="complemento"
                    placeholder="Digite o complemento" value="{{ $endereco->complemento }}">
            </div>
            <div class="mb-3">  
               <a href="{{ route('endereco.index') }}" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-primary">Enviar</button>
           
            </div>
        </form>
    </div>
</body>

</html>
