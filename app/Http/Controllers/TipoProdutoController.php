<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;
use App\Models\TipoProduto;
use Illuminate\Support\Facades\Storage;


class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Vai no banco de dados e busca todos os dados da tabela Tipo_Produtos
        // Esses dados são salvos na variável $tipoProdutos
        // $tipoProdutos = TipoProduto::all();
        $tipoProdutos = DB::select('SELECT * FROM Tipo_Produtos');
        // Mando carregar a view index de TipoProduto com a variável $tipoProdutos
        // No comando with o primeiro argumento é o nome da variável que será criada
        // dentro da view. O segundo é os dados que ela irá conter.
        return view("tipoproduto.index")->with("tipoProdutos", $tipoProdutos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tipoproduto.create");
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


        
                $tipoProduto = new TipoProduto();
                $tipoProduto->descricao = $request->descricao;
                $tipoProduto->save();
                return redirect()->route('tipoproduto.index');
   
        
        
        
        //return view("tipoproduto.store");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $tipoProdutos = DB::select('SELECT * from Tipo_Produtos WHERE id = ?', [$id]);
            if (count($tipoProdutos) == 1) {
                return view("TipoProduto/show")->with("tipoProduto", $tipoProdutos[0]);
            }
            return redirect()->route("tipoproduto.index")->with("message", ["TipoProduto $id não encontrado.", "warning"]);
        } catch (\Throwable $th) {
            return redirect()->route("tipoproduto.index")->with("message", [$th->getMessage(), "danger"]);
        }
    }
        
        
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $tipoProduto = TipoProduto::find($id);
            if (isset($tipoProduto)) {
                return view("TipoProduto/edit")->with("tipoProduto", $tipoProduto);
            }
            return redirect()->route("tipoproduto.index")->with("message", ["TipoProduto $id não encontrado.", "warning"]);
        } catch (\Throwable $th) {
            return redirect()->route("tipoproduto.index")->with("message", [$th->getMessage(), "danger"]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $tipoProduto = TipoProduto::find($id);
            if (isset($tipoProduto)) {
                $tipoProduto->descricao = $request->descricao;
                $tipoProduto->update();
                return redirect()->route("tipoproduto.index")->with("message", ["TipoProduto atualizado com sucesso.", "success"]);
            }
            return redirect()->route("tipoproduto.index")->with("message", ["TipoProduto $id não encontrado.", "warning"]);
        } catch (\Throwable $th) {
            return redirect()->route("tipoproduto.index")->with("message", [$th->getMessage(), "danger"]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
