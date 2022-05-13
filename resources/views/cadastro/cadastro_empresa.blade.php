<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Empresas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>


@if (session('success'))

 <div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>

 @endif

    <div class="cadastro-form">
        <form method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="nome" name="nome" placeholder="Nome"  value = "{{ old('nome') }}" autocomplete="off">
                @if($errors -> has('nome'))
                  <font color="red">  {{ $errors-> first('nome') }} </font>
                @endif
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="email" name="email" placeholder="Email" value = "{{ old('email') }}" autocomplete="off">
                @if($errors -> has('email'))
                   <font color="red"> {{ $errors-> first('email') }} </font>
                @endif
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="site" name="site" placeholder="Site" value = "{{ old('site') }}" autocomplete="off">
                @if($errors -> has('site'))
                  <font color="red">  {{ $errors-> first('site') }} </font>
                @endif
            </div>
            <div class="form-group">
                <label for="logo" class="form-label">Selecione uma logo (100x100)</label>
                <input class="form-control item" id="logo" name="logo" type="file">
                @if($errors -> has('logo'))
                  <font color="red">  {{ $errors-> first('logo') }} </font>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block criar-conta">Cadastrar Empresa</button>
            </div>

              <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('ListaEmpresa') }}"> Voltar</a>
             </div>

        </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>
