<div class="col-md-12 col-xs-12">
    
        
            
        
    
    <?php if(session('error')): ?>
        <div class="flash alert alert-danger" align="center" role="alert"><?php echo e(session('error')); ?></div>
    <?php endif; ?>
    <?php if(session('success')): ?>
        <div class="flash alert alert-success" align="center" role="alert"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    
        
            
                                              
                
        
    
    <?php if($errors->any()): ?>
        <div class="text-center alert alert-danger">
            <ul class="list-unstyled">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
</div><?php /**PATH E:\Xampp\htdocs\water\resources\views/alerts.blade.php ENDPATH**/ ?>