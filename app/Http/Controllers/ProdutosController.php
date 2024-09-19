<?php

namespace App\Http\Controllers;

use App\Models\Componentes;
use App\http\Requests\FormRequestProduto;
use App\Models\Produtos;
use Brian2694\Toastr\Facades\Toastr;
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

       
        return view('pages.produtos.paginacao', compact('findProdutos'));
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

        //swit case
       if($request->method() == "POST"){
        //cira os dados
        $data = $request->all();
        $componentes = new Componentes;
        $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
        Produtos::create($data);
        Toastr::success('Gravado com Sucesso');
        return redirect()->route('produto.index');
       }

       return view('pages.produtos.create');

       
    }

    public function atualizarProduto(FormRequestProduto $request, $id)
    {
        
        
       if($request->method() == "PUT"){
        
        $data = $request->all();
        $componentes = new Componentes;
        $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
        $buscaRegistro = Produtos::find($id);
        $buscaRegistro->update($data);

        return redirect()->route('produto.index');
       }

        $findProdutos = Produtos::where('id', '=', $id)->first();
        
       return view('pages.produtos.atualiza', compact('findProdutos'));

       
    }

    public function verProduto(FormRequestProduto $request, $id)
    {
        
        
            // $data = $request->all();
            // $componentes = new Componentes;
            
            // $buscaRegistro = Produtos::find($id);
            // $buscaRegistro->update($data);

            $findProdutos = Produtos::where('id', '=', $id)->first();
    
            return view('pages.produtos.ver', compact('findProdutos'));
           
    }

    
}
