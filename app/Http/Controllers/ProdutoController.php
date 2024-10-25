<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;
use App\Models\TipoProduto;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Faz a consulta para obter os produtos
        $produtos = DB::select('SELECT Produtos.*, Tipo_Produtos.descricao 
        FROM Produtos 
        JOIN Tipo_Produtos ON Produtos.Tipo_Produtos_id = Tipo_Produtos.id');

        // Retorna a view "home" com a lista de produtos
        return view("produto.index")->with("produtos", $produtos);
    }

   



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $tipoProdutos = DB::SELECT("SELECT * FROM Tipo_Produtos");

        return view("produto.create")->with("tipoProduto", $tipoProdutos);

        //
    }
    public function inicio()
    {
        return view("/inicio.welcome");

        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validação dos dados recebidos
    $request->validate([
        'nome' => 'required|string|max:255',
        'preco' => 'required|numeric|min:0',
        'ingredientes' => 'required|string',
        'Tipo_Produtos_id' => 'required|exists:tipo_produtos,id',
        'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação da imagem
    ]);

    $Produto = new Produto();
    $Produto->nome = $request->nome;
    $Produto->preco = $request->preco;
    $Produto->ingredientes = $request->ingredientes;
    $Produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;

    // Se houver imagem, processa o upload
    if ($request->hasFile('imagem')) {
        $imagem = $request->file('imagem');
        $descricao = TipoProduto::find($Produto->Tipo_Produtos_id)->descricao;

        // Controla o nome do arquivo que será salvo
        $nomeImagem = "{$Produto->nome}-" . time() . ".{$imagem->getClientOriginalExtension()}";
        $caminhoImagem = public_path("img/$descricao");

        // Cria a pasta se não existir
        if (!file_exists($caminhoImagem)) {
            mkdir($caminhoImagem, 0755, true);
        }

        // Move a imagem para o diretório
        $imagem->move($caminhoImagem, $nomeImagem);

        // Atualiza a URL da imagem no produto
        $Produto->urlImage = "/img/$descricao/$nomeImagem";
    } else {
        // Caso não tenha imagem, define uma imagem padrão
        $Produto->urlImage = "/img/default.png"; // Caminho da imagem padrão
    }

    // Salva o produto
    $Produto->save();

    return redirect()->route("produto.index")->with('success', 'Produto cadastrado com sucesso!');
}

    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Faz a consulta para obter o produto pelo ID
            $produtos = DB::select("SELECT Produtos.*, Tipo_Produtos.descricao
                                    FROM Produtos
                                    JOIN Tipo_Produtos ON Produtos.Tipo_Produtos_id = Tipo_Produtos.id
                                    WHERE Produtos.id = ?", [$id]);
    
            // Verifica se o produto foi encontrado
            if (empty($produtos)) {
                return redirect()->route("produto.index")->with("message", ["Produto $id não encontrado.", "warning"]);
            }
    
            // Se o produto for encontrado, você pode retorná-lo para uma view
            return view('produto.show', ['produto' => $produtos[0]]); // Exemplo de view para mostrar o produto
    
        } catch (\Throwable $th) {
            return redirect()->route("produto.index")->with("message", [$th->getMessage(), "danger"]);
        }
    }
    

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $produto = Produto::find($id);
            $tipoProdutos = TipoProduto::all();
            if (isset($produto)) {
                return view("Produto/edit")->with("produto", $produto)->with("tipoProdutos", $tipoProdutos);
            }
            return redirect()->route("produto.index")->with("message", ["Produto $id não encontrado.", "warning"]);
        } catch (\Throwable $th) {
            return redirect()->route("produto.index")->with("message", [$th->getMessage(), "danger"]);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    
   
     public function update(Request $request, string $id)
     {
         try {
             // Encontra o produto ou lança uma exceção se não for encontrado
             $produto = Produto::findOrFail($id);
     
             // Atualiza os dados do produto
             $produto->nome = $request->nome;
             $produto->preco = $request->preco;
             $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
             $produto->ingredientes = $request->ingredientes;
     
             // Se a imagem foi enviada
             if ($request->hasFile('imagem')) {
                 $imagem = $request->file("imagem");
                 $descricao = TipoProduto::find($produto->Tipo_Produtos_id)->descricao;
     
                 // Controla o nome do arquivo que será salvo
                 $nomeImagem = $descricao . '-' . $produto->nome . '-' . time() . '.' . $imagem->getClientOriginalExtension();
                 $caminhoImagem = public_path("img/$descricao");
     
                 // Cria a pasta se não existir
                 if (!file_exists($caminhoImagem)) {
                     mkdir($caminhoImagem, 0755, true);
                 }
     
                 // Move a nova imagem para o diretório
                 $imagem->move($caminhoImagem, $nomeImagem);
     
                 // Remove a imagem antiga, se existir
                 if (file_exists(public_path($produto->urlImage)) && $produto->urlImage != "/img/default.png") {
                     unlink(public_path($produto->urlImage));
                 }
     
                 // Atualiza a URL da imagem no produto
                 $produto->urlImage = "/img/$descricao/$nomeImagem";
             }
     
             // Salva as alterações no produto
             $produto->save();
     
             return redirect()->route("produto.index")->with("message", ["Produto $id atualizado com sucesso", "success"]);
         } catch (\Throwable $th) {
             return redirect()->route("produto.index")->with("message", [$th->getMessage(), "danger"]);
         }
     }
     
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Encontra o produto ou lança uma exceção se não for encontrado
            $produto = Produto::findOrFail($id);
            
            // Remove a imagem, se existir
            if (file_exists(public_path($produto->urlImage)) && $produto->urlImage != "/img/default.png") {
                unlink(public_path($produto->urlImage));
            }
    
            // Deleta o produto
            $produto->delete();
    
            return redirect()->route("produto.index")->with("message", ["Produto $id removido com sucesso.", "success"]);
        } catch (\Throwable $th) {
            return redirect()->route("produto.index")->with("message", [$th->getMessage(), "danger"]);
        }
    }
}