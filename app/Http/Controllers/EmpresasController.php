<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;
use DB;

class EmpresasController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ViewCadastroEmpresa(){
        return view('cadastro.cadastro_empresa');
    }

    public function ViewListaEmpresa(){
        return view('empresa');
    }

    public function ViewEditaEmpresa($cd_emp){

        $EmpresaEdita = Empresas::findOrFail($cd_emp);
        return view('cadastro.edita_empresa', compact('EmpresaEdita'));

    }

    public function CreateEmpresas(Request $request){

        $regras =  [
            'nome' => 'required|max:50|unique:empresas',
            'email' => 'email',
            'site' => 'max:50',
            'logo' => 'required'
        ];
      $respostas =  [
            'nome.required' => 'O Campo Precisa Ser Preenchido',
            'nome.max' => 'O nome deve conter apenas 50 caracteres',
            'nome.unique' => 'Empresa Já Cadastrada no Sistema',
            'email.email' => 'O campo precisa ser do tipo Email',
            'site.max' => 'O Site deve conter apenas 50 caracteres',
            'logo.required'=>'É necessario salvar uma imagem'
        ];

        $request->validate($regras,$respostas);

      $nameFile = null;

      $data = getimagesize($request->logo);
      $width = $data[0];
      $height = $data[1];

      if($width>=100 && $height>=100){
    
     if ($request->hasFile('logo') 
        && $request->file('logo')->isValid()) {


        $name = uniqid(date('HisYmd'));
 

        $extension = $request->logo->extension();
 

        $nameFile = "{$name}.{$extension}";
 

        $upload = $request->logo->storeAs('categories', $nameFile);

        if ( !$upload )
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();
     }


        Empresas::create($request->all());

        \Session::flash('message', 'Empresa Cadastrada com Sucesso!'); 
        \Session::flash('alert-class', 'alert-success'); 

      
        return redirect()->route('ListaEmpresa');
    }
    else {
        \Session::flash('message', 'Empresa não pode ser cadastrada, imagem não possui os requisitos minimos de 100x100!'); 
        \Session::flash('alert-class', 'alert-danger'); 
        
        return redirect()->route('ListaEmpresa');  
    
    }

    }

    public function ReadEmpresas(){

        $empresas = Empresas::latest()->paginate(10);
  
        return view('empresa',compact('empresas'))
           ->with('i', (request()->input('page', 1) - 1) * 10);

    }


    public function UpdateEmpresas(Request $request, Empresas $cd_emp){

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
        \Session::flash('message', 'Empresa Atualizada com Sucesso!'); 
        \Session::flash('alert-class', 'alert-success'); 

        

        $cd_emp->update($request->all());
        return redirect()->route('ListaEmpresa');
    }

    public function DeleteEmpresas($cd_emp){


        $validar = DB::table("empresas")
                ->join('funcionarios', 'empresas.cd_emp', '=', 'funcionarios.cd_emp')
                ->select("funcionarios.cd_emp")
                ->where('funcionarios.cd_emp', '=', $cd_emp)
                ->count();

        if($validar >= 1 ) {

            \Session::flash('message', 'Não é possivel deletar a empresa, existem funcionarios ativos'); 
            \Session::flash('alert-class', 'alert-danger'); 


            return redirect()->route('ListaEmpresa');

        }       

        else{

            
            $EmpresaDelete = Empresas::findOrFail($cd_emp);

            $EmpresaDelete->delete();

            \Session::flash('message', 'Empresa Deletada com Sucesso!'); 
            \Session::flash('alert-class', 'alert-success'); 
    
    
            return redirect()->route('ListaEmpresa');

        }


    }
}
