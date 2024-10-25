
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View do produto</title>
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
    <a href="{{ route('home') }}">  <H1>Produtos Da Pizzaria</H1> </a>


    <div class="container mt-5">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>tipo do produto </th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->preco }}</td>
                        <td>{{ $item->descricao }}</td>
                        <td>
                            <a href="{{ route('produto.show', $item->id) }}" class="btn btn-vibrant">Mostrar</a>
                            <a href="{{ route('produto.edit', $item->id) }}" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-danger btnRemover" data-bs-toggle="modal"
                               data-bs-target="#deleteModal" value="{{ route('produto.destroy', $item->id) }}">
                                Remover
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        <!-- Botões alinhados à direita -->
        <div class="d-flex justify-content-end mt-3"> 
            <a href="{{url()->previous()}}" class="btn btn-vibrant">Voltar</a>
            <a href="{{ route('produto.create') }}" class="btn btn-vibrant me-2">Criar produto</a>
          
        </div>
    
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Remoção de recurso</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Deseja realmente remover este recurso?
                    </div>
                    <div class="modal-footer">
                        <form id="id-form-modal-botao-remover" method="post" action="">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            let arrayBotaoRemover = document.querySelectorAll(".btnRemover");
            let formModalBotaoRemover = document.querySelector("#id-form-modal-botao-remover");
            arrayBotaoRemover.forEach(element => {
                element.addEventListener('click', configuraBotaoRemoverModal);
            });
    
            function configuraBotaoRemoverModal() {
                formModalBotaoRemover.setAttribute("action", this.getAttribute("value"));
            }
        </script>
    </div>
    