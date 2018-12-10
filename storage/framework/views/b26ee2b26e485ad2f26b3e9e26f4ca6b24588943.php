<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <strong>Success!</strong> <?php echo e(session('message')); ?>

    </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <a href="create" type="button" class="btn btn-default" id="add">Add</a>
    <?php if(count($persons) <= 0): ?>
        <p>No data</p>
    <?php else: ?>
        <table class="table">

            <tr>
                <th>Name</th>    
                <th>Number</th>   
                <th></th> 
                <th></th>                           
            </tr>          
            <?php $__currentLoopData = $persons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($person->name); ?></td>
                    <td><?php echo e($person->phone_nr); ?></td>
                    <td>  <?php echo Form::open( array( 'method'=>'get','route' => ['edit',$person->id])); ?>

                            <?php echo e(Form::submit('Edit', ['class' => 'btn btn-default','id'=>'edit'])); ?>

                            <?php echo e(Form::close()); ?></td>
                    <td><?php echo Form::open( array( 'route' => ['destroy',$person->id])); ?>

                            <?php echo e(Form::submit('Delete', ['class' => 'btn btn-danger','id'=>'delete'])); ?>

                            <?php echo e(Form::close()); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>                        
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>