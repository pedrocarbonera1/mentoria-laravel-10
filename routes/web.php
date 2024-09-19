<?php


use App\Http\Controllers\BarbeirosController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


// O prefi serve para agrupar rotas referenta a um grupo tipo todas funçoes voltadas a produtos vao ficar dentro de prefix para não ficar um homeficação muito grande 
Route::prefix('produtos')->group(function (){
    Route::get('/',[ProdutosController::class, 'index'])->name('produto.index');
    //Cadastro Create
    Route::get('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    //Editar update
    Route::get('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    //Ver 
    Route::get('/verProduto/{id}', [ProdutosController::class, 'verProduto'])->name('ver.produto');
    //Deletar Produto 
    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');
});
