@extends('layouts.app')
 
@section('content')

@if(\Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Listagem De Funcionarios</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('CadastroFuncionario') }}"> Cadastrar Novo Funcionario</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Empresa</th>
            <th width="280px">Ação </th>
        </tr>
        @foreach ($funcionarios as $funcionario)
        <tr>
            <td>{{ $funcionario->nome }}</td>
            <td>{{ $funcionario->sobrenome }}</td>
            <td>{{ $funcionario->email }}</td>
            <td>{{ $funcionario->telefone }}</td>
             <td>{{ $funcionario->empresanome }}</td>


             <td>
                <form action="{{ route('DeletaFuncionario',$funcionario->cd_funcionario) }}" method="POST">

   
                    <a class="btn btn-primary" href="{{ route('EditaFuncionario',$funcionario->cd_funcionario) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
            
          
          
        </tr>
        @endforeach
    </table>
  
    {!! $funcionarios->links() !!}
      
@endsection