<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});


// O prefi serve para agrupar rotas referenta a um grupo tipo todas funçoes voltadas a produtos vao ficar dentro de prefix para não ficar um homeficação muito grande 
Route::prefix('produtos')->group(function (){
    Route::get('/',[ProdutosController::class, 'index'])->name('produto.index');

});