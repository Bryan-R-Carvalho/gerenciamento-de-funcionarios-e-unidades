@extends("template.layout")
@section("title","Funcionarios")
@section("body")
<div class="container my-5">
    <div>
        <h1>Funcionarios</h1>
        <a href="{{route('funcionarios.create')}}" class="btn btn-primary mb-3">Cadastrar</a>
    </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($funcionarios as $funcionario)
                    <tr>
                        <td>{{$funcionario->nome}}</td>
                        <td>{{$funcionario->email}}</td>
                        <td>{{$funcionario->idade}}</td>
                        <td>{{$funcionario->documento}}</td>
                        <td class="d-flex">
                            <a href="{{route('funcionarios.edit', $funcionario->id)}}" class="btn btn-primary mr-1"><i class="fa fa-pencil"></i></a>
                            <form action="{{route('funcionarios.destroy', $funcionario->id)}}" method="POST" >
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div class="d-flex justify-content-center mt-5">
        {{ $funcionarios->links('pagination::bootstrap-4') }}
    </div>
@endsection