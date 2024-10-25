<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;
use App\Models\TipoProduto;
use Illuminate\Support\Facades\Storage;


class PedidosController extends Controller
{
    //

    public function index()
    {
     
    

        // Retorna a view "home" com a lista de produtos
        return view("pedidos.index")->with('index');
    }

}
