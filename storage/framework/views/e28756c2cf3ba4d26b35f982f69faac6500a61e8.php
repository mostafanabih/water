<?php echo $__env->yieldContent('content1'); ?>
<?php echo $__env->make('admins.extends.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('content2'); ?>
<?php echo $__env->make('admins.extends.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH E:\Xampp\htdocs\water\resources\views/admins/extends/master.blade.php ENDPATH**/ ?>