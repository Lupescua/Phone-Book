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

    <?php if(isset($person)): ?>
        <?php echo Form::model($person, array( 'route' => $route)); ?>

        <?php echo e(Form::hidden('id', null, ['value' => $person->id])); ?>

    <?php else: ?>
        <?php echo Form::open( array( 'route' => $route)); ?>

    <?php endif; ?>

    <div class="form-group row">
        <?php echo e(Form::label('Name', null, ['class' => 'col-md-2 col-form-label'])); ?>

        <div class="col-md-10">  
            <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

        </div>
    </div>

    <div class="form-group row">
        <div class="col">
        <?php echo e(Form::label('Phone Number', null, ['class' => 'row col-md-2'])); ?>

        <?php echo e(Form::label('Example: 07********', null, ['class' => 'row col-md-2'])); ?>

        </div>
        <div class="col-md-10">  
            <?php echo e(Form::text('phone_nr', null, ['class' => 'form-control'])); ?>

        </div>
    </div>

    <?php echo e(Form::submit('Save', ['class' => 'btn btn-lg btn-primary pull-right','id'=>'save'])); ?>

    <?php echo e(Form::close()); ?>

    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>