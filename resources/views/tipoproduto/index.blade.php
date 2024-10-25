<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tipos de Produtos</title>
    <link rel="icon" type="image" href="/img/p.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
  
</head>
<body>
    
    <div class="container mt-5">
        <a href="{{ route('home') }}"> <h1 class="text-center">Tipos De Produtos</h1></a>

      
        <div class="mt-1"> <!-- Ajustado para mt-3 -->
            <!-- Tabela usando Bootstrap -->
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipoProdutos as $item)
                        <tr>
                            <td scope="row">{{ $item->id }}</td>
                            <td>{{ $item->descricao }}</td>
                            <td>
                                <div class="d-flex"> <!-- Flexbox para alinhar botões sem espaço extra -->
                                    <a href="{{ route('tipoproduto.show', $item->id) }}" class="btn btn-vibrant">Mostrar</a>
                                    <a href="{{ route('tipoproduto.edit', $item->id) }}" class="btn btn-primary">Editar</a>
                                    <a href="#" class="btn btn-danger">Remover</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Botões alinhados à direita -->
            <div class="d-flex justify-content-end mt-3">
                <a href="{{url()->previous()}}" class="btn btn-vibrant">Voltar</a>    
                <a href="{{ route('tipoproduto.create') }}" class="btn btn-vibrant">Criar tipo produto</a>
            </div>
        </div>
    </div>

</body>
</html>
