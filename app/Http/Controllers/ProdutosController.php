<?php

namespace App\Http\Controllers;

use App\http\Requests\FormRequestProduto;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    
    public function __construct(Produtos $produto)
    {
        $this->produto = $produto;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar  ?? '';
        $findProdutos = $this->produto->getProdutosPesquisarIndex($pesquisar);

       
        return view('pages.paginacao', compact('findProdutos'));
    }

    
    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Produtos::find($id);
        $buscaRegistro->delete();

        

        return response()->json(['success' => true]);
    }

 
    public function cadastrarProduto(FormRequestProduto $request)
    {
       if($request->method() == "POST"){
        //cira os dados
        $data = $request->all();
        Produtos::create($data);

        return redirect()->route('produto.index');
       }

       return view('pages.produtos.create');

       
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

   
    public function update(Request $request, string $id)
    {
        //
    }

   
    public function destroy(string $id)
    {
        //
    }
}
