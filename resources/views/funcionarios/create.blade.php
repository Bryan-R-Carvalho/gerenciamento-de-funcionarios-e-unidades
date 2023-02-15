@extends('template.layout')
@section('title','Funcionarios')
@section('body')
    <h1 class="text-center">Cadastrar Funcionarios</h1>
    <form action="{{route('funcionarios.store')}}" method="POST">
        @method('POST')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" >
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email"  placeholder="E-mail" >
                </div>
                <div class="form-group">
                    <label for="idade">Idade</label>
                    <input type="number" class="form-control" id="idade" name="idade" min="18" max="100" placeholder="Idade">
                </div>
                <div class="form-group">
                    <label for="documento">documento</label>
                    <input type="text" class="form-control" id="documento" name="documento" maxlength="11" placeholder="documento" >
                </div>

                <div class="form-group">
                    <label for="unidades">Unidade</label>
                    <select name="id_unidade" class="form-control" >
                        <option value="">Selecione uma unidade</option>
                        @foreach($unidades as $unidade)
                            <option value="{{$unidade->id}}">{{$unidade->razao_social}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" maxlength="8" placeholder="CEP" onblur="buscaCep()">
                </div>
                
                <script >
                    function buscaCep() {
                        const cep = document.querySelector("#cep").value;
                        fetch(`https://viacep.com.br/ws/${cep}/json/`)
                            .then(response => response.json())
                            .then(dados => preencheCampos(dados))
                            .catch(error => console.error(error));
                            
                    }
                    function preencheCampos(dados) {
                        console.log(dados);
                        document.querySelector("#rua").value = dados.logradouro;
                        document.querySelector("#bairro").value = dados.bairro;
                        document.querySelector("#cidade").value = dados.localidade;
                        document.querySelector("#estado").value = dados.uf;

                    }
                </script>
                
                <div class="form-group">
                    <label for="rua">Rua</label>
                    <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" readonly>
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" readonly>
                </div>
                <div class="form-group">
                    <label for="numero">Numero</label>
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero">
                </div>
                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="cidade" readonly>
                </div>
                <div class="form-group">
                    <label for="Estado">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" readonly>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary px-4">Cadastrar</button>      
    </form>    
    
@endsection