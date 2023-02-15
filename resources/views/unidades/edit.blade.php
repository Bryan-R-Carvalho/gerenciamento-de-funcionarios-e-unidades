@extends("template.layout")
@section("title","Unidades")
@section("body")
    <h1 class="text-center">Editar unidade</h1>
    <form action="{{route('unidades.update', $unidade->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="razao social">Razão social</label>
            <input type="text" class="form-control" id="razao_social" name="razao_social" placeholder="Razão social" value="{{ $unidade->razao_social }}">
        </div>
        <div class="form-group">
            <label for="nome fantasia">Nome fantasia</label>
            <input type="text" class="form-control" id="nome fantasia" name="nome_fantasia"  placeholder="Nome fantasia" value="{{ $unidade->nome_fantasia }}">
        </div>
        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" minlength="14" maxlength="14" placeholder="CNPJ" value="{{ $unidade->cnpj }}">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>      
    </form>    
@endsection