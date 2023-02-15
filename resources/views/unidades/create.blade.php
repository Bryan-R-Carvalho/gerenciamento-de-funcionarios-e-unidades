@extends('template.layout')
@section('title','Unidades')
@section('body')
    <h1 class="text-center">Cadastrar Unidades</h1>
    <form action="{{route('unidades.store')}}" method="POST">
        @method('POST')
        @csrf
        <div class="form-group">
            <label for="razao social">Razão social</label>
            <input type="text" class="form-control" id="razao_social" name="razao_social" placeholder="Razão social" required>
        </div>
        <div class="form-group">
            <label for="nome fantasia">Nome fantasia</label>
            <input type="text" class="form-control" id="nome fantasia" name="nome_fantasia"  placeholder="Nome fantasia" required>
        </div>
        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" minlength="14" maxlength="14" placeholder="CNPJ" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>      
    </form>    
    
@endsection