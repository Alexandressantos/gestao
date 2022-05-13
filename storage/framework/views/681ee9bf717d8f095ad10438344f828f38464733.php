<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Empresas</title>
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
        <form method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="nome" name="nome" placeholder="Nome"  value = "<?php echo e(old('nome')); ?>" autocomplete="off">
                <?php if($errors -> has('nome')): ?>
                  <font color="red">  <?php echo e($errors-> first('nome')); ?> </font>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="email" name="email" placeholder="Email" value = "<?php echo e(old('email')); ?>" autocomplete="off">
                <?php if($errors -> has('email')): ?>
                   <font color="red"> <?php echo e($errors-> first('email')); ?> </font>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="site" name="site" placeholder="Site" value = "<?php echo e(old('site')); ?>" autocomplete="off">
                <?php if($errors -> has('site')): ?>
                  <font color="red">  <?php echo e($errors-> first('site')); ?> </font>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="logo" class="form-label">Selecione uma logo (100x100)</label>
                <input class="form-control item" id="logo" name="logo" type="file">
                <?php if($errors -> has('logo')): ?>
                  <font color="red">  <?php echo e($errors-> first('logo')); ?> </font>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block criar-conta">Cadastrar Empresa</button>
            </div>

              <div class="pull-right">
                <a class="btn btn-secondary" href="<?php echo e(route('ListaEmpresa')); ?>"> Voltar</a>
             </div>

        </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\a.santos.admin\Documents\code\gestao\resources\views/cadastro/cadastro_empresa.blade.php ENDPATH**/ ?>