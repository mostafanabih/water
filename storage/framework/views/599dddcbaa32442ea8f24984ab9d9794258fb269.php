<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>قطرة ماء</title>

    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/bootstrap.rtl.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">

    <style>
        .loginscreen.middle-box{
            width:auto;
        }
        img{
            -webkit-box-shadow: 0px 10px 5px 1px rgba(0,0,0,0.15);
            -moz-box-shadow: 0px 10px 5px 1px rgba(0,0,0,0.15);
            box-shadow: 0px 10px 5px 1px rgba(0,0,0,0.15);
        }
    </style>
</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h3 class="logo-name"> قطره ماء</h3>
        </div>
        <h3>اهلا بكم في قطره ماء</h3>

        <a href="<?php echo e(url('/company/login')); ?>">
            <img src="<?php echo e(asset('public/logo.PNG')); ?>" class="img-responsive img-circle" alt="قطرة ماء">
        </a>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo e(asset('assets/js/jquery-3.1.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
</body>
</html><?php /**PATH G:\coding\xampp\htdocs\water\resources\views/index.blade.php ENDPATH**/ ?>