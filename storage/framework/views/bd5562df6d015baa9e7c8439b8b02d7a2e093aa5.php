
 
<?php $__env->startSection('content'); ?>
<?php if(\Session::has('message')): ?>
<p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Listagem De Empresas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('CadastroEmpresa')); ?>"> Cadastrar Nova Empresa</a>
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
        <?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($empresa->nome); ?></td>
            <td><?php echo e($empresa->email); ?></td>
            <td><?php echo e($empresa->site); ?></td>


             <td>
                <form action="<?php echo e(route('DeletaEmpresa',$empresa->cd_emp)); ?>" method="POST">

   
                    <a class="btn btn-primary" href="<?php echo e(route('EditaEmpresa',$empresa->cd_emp)); ?>">Editar</a>
   
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
      
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
            
          
          
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  
    <?php echo $empresas->links(); ?>

      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\a.santos.admin\Documents\code\gestao\resources\views/empresa.blade.php ENDPATH**/ ?>