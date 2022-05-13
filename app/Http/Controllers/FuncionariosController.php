<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionarios;
use App\Empresas;
use DB;

class FuncionariosController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ViewCadastroFuncionario(){
        
        //LISTA OS VALORES DO COMBO EMPRESAS CHAVE ESTRANGEIRA

        $empresas = Empresas::all();

        //LISTA OS VALORES DO COMBO EMPRESAS CHAVE ESTRANGEIRA

        return view('cadastro.cadastro_funcionario',compact('empresas'));
    }

    public function ViewListaFuncionario(){
        return view('funcionario');
    }

    public function ViewEditaFuncionario($cd_funcionario){

        $FuncionarioEdita = Funcionarios::findOrFail($cd_funcionario);
        return view('cadastro.edita_funcionario', compact('FuncionarioEdita'));

    }

    public function CreateFuncionarios(Request $request){

      $regras =  [
            'cd_emp' => 'required',
            'nome' => 'required|max:50|unique:funcionarios',
            'sobrenome' => 'required|max:50',
            'email' => 'email'

        ];
      $respostas =  [
            'nome.required' => 'O Campo Precisa Ser Preenchido',
            'nome.max' => 'O nome deve conter apenas 50 caracteres',
            'nome.unique' => 'Funcionário Já Cadastrado no Sistema',
            'sobrenome.required' => 'O Campo Precisa Ser Preenchido',
            'sobrenome.max' =>'O Sobrenome deve conter apenas 50 caracteres',
            'email.email' => 'O campo precisa ser do tipo Email',
            'cd_emp.required' => 'É necessário escolher uma empresa'
        ];

        $request->validate($regras,$respostas);

        Funcionarios::create($request->all());

        \Session::flash('message', 'Funcionario Cadastrado com Sucesso!'); 
        \Session::flash('alert-class', 'alert-success'); 

      
        return redirect()->route('ListaFuncionario');

    }

    public function ReadFuncionarios(){

        $funcionarios =  DB::table("funcionarios")
                ->join('empresas', 'funcionarios.cd_emp', '=', 'empresas.cd_emp')
                ->select('funcionarios.cd_funcionario',
                         'funcionarios.nome',
                         'funcionarios.sobrenome',
                         'funcionarios.email',
                         'funcionarios.telefone',
                         DB::raw('empresas.nome as empresanome'))
                ->paginate(10);
  
        return view('funcionario',compact('funcionarios'))
           ->with('i', (request()->input('page', 1) - 1) * 10);

    }


    public function UpdateFuncionarios(Request $request, Funcionarios $cd_funcionario){

        $regras =  [
            'nome' => 'required|max:50',
            'email' => 'email',
            'site' => 'max:50'
           // 'logo' => 'image'
        ];
      $respostas =  [
            'nome.required' => 'O Campo Precisa Ser Preenchido',
            'nome.max' => 'O nome deve conter apenas 50 caracteres',
            'nome.unique' => 'Empresa Já Cadastrada no Sistema',
            'email.email' => 'O campo precisa ser do tipo Email',
            'site.max' => 'O Site deve conter apenas 50 caracteres'
        ];

        $request->validate($regras,$respostas);
        

        $cd_funcionario->update($request->all());

        \Session::flash('message', 'Funcionario Atualizado com Sucesso!'); 
        \Session::flash('alert-class', 'alert-success'); 

        return redirect()->route('ListaFuncionario');
    }

    public function DeleteFuncionarios($cd_funcionario){

        $FuncionarioDelete = Funcionarios::findOrFail($cd_funcionario);

        $FuncionarioDelete->delete();

        \Session::flash('message', 'Funcionario Deletado com Sucesso!'); 
        \Session::flash('alert-class', 'alert-success'); 

        return redirect()->route('ListaFuncionario');

    }
}
