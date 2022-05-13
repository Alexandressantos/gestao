<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Funcionarios</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>
<body>

<?php if(session('success')): ?>

 <div class="alert alert-success" role="alert">
  <?php echo e(session('success')); ?>

</div>

 <?php endif; ?>

    <div class="cadastro-form">
        <form method="POST" action="<?php echo e(route('AlteraFuncionario',$FuncionarioEdita->cd_funcionario)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="nome" name="nome" placeholder="Nome"  value="<?php echo e($FuncionarioEdita->nome); ?>"  autocomplete="off">
                <?php if($errors -> has('nome')): ?>
                  <font color="red">  <?php echo e($errors-> first('nome')); ?> </font>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="sobrenome" name="sobrenome" placeholder="Sobrenome" value="<?php echo e($FuncionarioEdita->sobrenome); ?>" autocomplete="off">
                <?php if($errors -> has('sobrenome')): ?>
                   <font color="red"> <?php echo e($errors-> first('sobrenome')); ?> </font>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="email" name="email" placeholder="email" value="<?php echo e($FuncionarioEdita->email); ?>" autocomplete="off">
                <?php if($errors -> has('email')): ?>
                  <font color="red">  <?php echo e($errors-> first('email')); ?> </font>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="telefone" name="telefone" placeholder="telefone" value="<?php echo e($FuncionarioEdita->telefone); ?>" autocomplete="off">
                <?php if($errors -> has('telefone')): ?>
                  <font color="red">  <?php echo e($errors-> first('telefone')); ?> </font>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block criar-conta">Alterar Funcionario</button>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="<?php echo e(route('ListaFuncionario')); ?>"> Voltar</a>
             </div>
        </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\a.santos.admin\Documents\code\gestao\resources\views/cadastro/edita_funcionario.blade.php ENDPATH**/ ?>