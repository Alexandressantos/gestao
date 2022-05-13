
 
<?php $__env->startSection('content'); ?>

<?php if(\Session::has('message')): ?>
<p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Listagem De Funcionarios</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('CadastroFuncionario')); ?>"> Cadastrar Novo Funcionario</a>
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
        <?php $__currentLoopData = $funcionarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $funcionario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($funcionario->nome); ?></td>
            <td><?php echo e($funcionario->sobrenome); ?></td>
            <td><?php echo e($funcionario->email); ?></td>
            <td><?php echo e($funcionario->telefone); ?></td>
             <td><?php echo e($funcionario->empresanome); ?></td>


             <td>
                <form action="<?php echo e(route('DeletaFuncionario',$funcionario->cd_funcionario)); ?>" method="POST">

   
                    <a class="btn btn-primary" href="<?php echo e(route('EditaFuncionario',$funcionario->cd_funcionario)); ?>">Editar</a>
   
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
      
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
            
          
          
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  
    <?php echo $funcionarios->links(); ?>

      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\a.santos.admin\Documents\code\gestao\resources\views/funcionario.blade.php ENDPATH**/ ?>