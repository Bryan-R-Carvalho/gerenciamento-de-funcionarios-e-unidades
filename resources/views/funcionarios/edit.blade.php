@extends("template.layout")
@section("title","Funcionarios")
@section("body")
    <h1 class="text-center">Editar funcionario</h1>
    <form action="{{route('funcionarios.update', $funcionario->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{$funcionario->nome}}">
        </div>
        <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email"  placeholder="E-mail" value="{{$funcionario->email}}" >
        </div>
        <div class="form-group">
            <label for="idade">Idade</label>
            <input type="number" class="form-control" id="idade" name="idade" min="18" max="100" value="{{$funcionario->idade}}">
        </div>
        <div class="form-group">
            <label for="documento">documento</label>
            <input type="text" class="form-control" id="documento" name="documento" maxlength="11" value="{{$funcionario->documento}}">
        </div>

        <div class="form-group">
            <label for="unidade">Unidade</label>
            <select name="id_unidade" class="form-control" >
                <option value="">Selecione uma unidade</option>
                <option value="{{$funcionario->id_unidade}}" selected>{{$unidade->razao_social}}</option>
                @foreach($unidades as $uni)
                    <option value="{{$uni->id}}">{{$uni->razao_social}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" maxlength="8" value="{{$cep->cep}}" onblur="buscaCep()">
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
            <input type="text" class="form-control" id="rua" name="rua" value="{{$cep->rua}}" readonly>
        </div>
        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro" value="{{$cep->bairro}}" readonly>
        </div>
        <div class="form-group">
            <label for="numero">Numero</label>
            <input type="text" class="form-control" id="numero" name="numero" value="{{$cep->numero}}">
        </div>
        <div class="form-group">
            <label for="complemento">Complemento</label>
            <input type="text" class="form-control" id="complemento" name="complemento" value="{{$cep->complemento}}">
        </div>
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" value="{{$cep->cidade}}" readonly>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" value="{{$cep->estado}}" readonly>
        </div>
        

        <button type="submit" class="btn btn-primary">Salvar</button>      
    </form>    
@endsection