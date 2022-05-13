@extends('layouts.app')
 
@section('content')
@if(\Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Listagem De Empresas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('CadastroEmpresa') }}"> Cadastrar Nova Empresa</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Site</th>
            <th width="280px">Ação </th>
        </tr>
        @foreach ($empresas as $empresa)
        <tr>
            <td>{{ $empresa->nome }}</td>
            <td>{{ $empresa->email }}</td>
            <td>{{ $empresa->site }}</td>


             <td>
                <form action="{{ route('DeletaEmpresa',$empresa->cd_emp) }}" method="POST">

   
                    <a class="btn btn-primary" href="{{ route('EditaEmpresa',$empresa->cd_emp) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
            
          
          
        </tr>
        @endforeach
    </table>
  
    {!! $empresas->links() !!}
      
@endsection