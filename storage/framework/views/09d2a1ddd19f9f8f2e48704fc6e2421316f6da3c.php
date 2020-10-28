<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <title>  Water - Dashboard Company | <?php echo $__env->yieldContent('title'); ?> </title>

    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/bootstrap.rtl.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" rel="stylesheet">
    

    <?php echo $__env->yieldContent('style'); ?>
</head>

<body class="gray-bg">
    <div id="wrapper" style="background: #2f4050">
        <?php echo $__env->make('company.layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



        <div id="page-wrapper" class="gray-bg">
            <?php echo $__env->make('company.layouts.navTop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>



<!-- Mainly scripts -->
    <script src="<?php echo e(asset('assets/js/jquery-3.1.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/inspinia.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>



<?php echo $__env->yieldContent('script'); ?>
</body>

</html><?php /**PATH /home2/is2host/public_html/water/resources/views/company/template.blade.php ENDPATH**/ ?>