<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;

class UnidadeController extends Controller
{
    private $unidade;
    public function __construct(Unidade $unidade)
    {
        $this->unidade = $unidade;
    }
    public function index()
    {
        $unidades = $this->unidade->paginate(20);
        return view('unidades.index', compact('unidades'));
    }
    public function create()
    {
        return view('unidades.create');
    }
    public function store(Request $request)
    {
        try{
        $data = $request->validate([
            'razao_social' => 'required',
            'nome_fantasia' => 'required',
            'cnpj' => 'required|min:14|max:14|unique:unidades',
        ],[
            'razao_social.required' => 'O campo Razão social é obrigatório',
            'nome_fantasia.required' => 'O campo Nome fantasia é obrigatório',
            'cnpj.required' => 'O campo CNPJ é obrigatório',
            'cnpj.min' => 'O campo CNPJ deve ter 14 caracteres',
            'cnpj.max' => 'O campo CNPJ deve ter 14 caracteres',
            'cnpj.unique' => 'O CNPJ informado já está cadastrado',
        ]);
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
        $this->unidade->create($data);
        return redirect()->back()->with('success', 'Unidade cadastrada com sucesso!');
    }
    public function edit($id)
    {
        $unidade = $this->unidade->find($id);
        return view('unidades.edit', compact('unidade'));
    }
    public function update(Request $request, $id)
    {
        $unidade = $this->unidade->find($id);
        $unidade->update($request->all());
        return redirect()->route('unidades.index');
    }
    public function destroy($id)
    {
        $this->unidade->find($id)->delete();
        return redirect()->route('unidades.index');
    }
    
}
