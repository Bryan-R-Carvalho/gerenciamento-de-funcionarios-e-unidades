<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Funcionario,
    Endereco,
    Unidade
};
class FuncionarioController extends Controller
{
    
    protected $funcionario;
    protected $endereco;
    protected $unidade;

    public function __construct(Funcionario $funcionario,Endereco $endereco, Unidade $unidade)
    {
        $this->funcionario = $funcionario;
        $this->endereco = $endereco;
        $this->unidade = $unidade;
    }
    public function index()
    {
        $funcionarios = $this->funcionario->paginate(10);
        return view('funcionarios.index', compact('funcionarios'));
    }
    public function create()
    {
        $unidades = $this->unidade->all();
        return view('funcionarios.create', compact('unidades'));
    }
    public function store(Request $request)
    {
        Endereco::create([
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
       ]);
        $endereco = Endereco::latest()->first();

       Funcionario::create([
              'nome' => $request->nome,
              'email' => $request->email,
              'idade' => $request->idade,
              'documento' => $request->documento,
              'id_endereco' => $endereco->id,
              'id_unidade' => $request->id_unidade,
         ]);
         
         return response()->json([
             'message' => 'Funcionário cadastrado com sucesso!'
         ]);
    }
    public function edit($id)
    {
        return view('funcionarios.edit');
    }
    public function update(Request $request, $id)
    {
        return redirect()->route('funcionarios.index');
    }
    public function destroy($id)
    {
        return redirect()->route('funcionarios.index');
    }
}
