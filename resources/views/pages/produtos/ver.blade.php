@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('atualizar.produto', $findProdutos->id) }}">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ver Produto</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" value="{{ isset($findProdutos->nome) ? $findProdutos->nome: @old('nome') }}" class="form-control @error('nome') is-invalid @enderror" name="nome" disabled>
            @if ($errors->has('nome'))
                <div class="invalid-feedback"> {{ $errors->first('nome') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <input  value="{{ isset($findProdutos->descricao) ? $findProdutos->descricao: @old('descricao') }}" class="form-control @error('valor') is-invalid @enderror" name="descricao" disabled>
            @if ($errors->has('descricao'))
                <div class="invalid-feedback"> {{ $errors->first('descricao') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Valor</label>
            <input id='mascara_valor' value="{{ isset($findProdutos->valor) ? $findProdutos->valor: @old('valor') }}" class="form-control @error('valor') is-invalid @enderror" name="valor" disabled>
            @if ($errors->has('valor'))
                <div class="invalid-feedback"> {{ $errors->first('valor') }}</div>
            @endif
        </div>
    </form>
@endsection