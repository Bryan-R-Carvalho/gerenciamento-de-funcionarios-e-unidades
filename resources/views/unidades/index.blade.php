@extends("template.layout")
@section("title","Unidades")
@section("body")
<div class="container my-5">
    <div>
        <h1>Unidades</h1>
        <p>Unidades cadastradas:</p>
    </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Razão social</th>
                    <th scope="col">Nome fantasia</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unidades as $unidade)
                    <tr>
                        <td>{{$unidade->razao_social}}</td>
                        <td>{{$unidade->nome_fantasia}}</td>
                        <td>{{$unidade->cnpj}}</td>
                        <td class="d-flex">
                            <a href="{{route('unidades.edit', $unidade->id)}}" class="btn btn-primary mr-1"><i class="fa fa-pencil"></i></a>
                            <form action="{{route('unidades.destroy', $unidade->id)}}" method="POST" >
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
            {{ $unidades->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection