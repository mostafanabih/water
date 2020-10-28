<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> صفحه الدخول</title>

    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/bootstrap.rtl.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">

    <style>
        .loginscreen.middle-box{
            width:auto;
        }
    </style>
</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div>
        <div>

            <h3 class="logo-name"> قطره ماء</h3>

        </div>
        <h3>اهلا بكم في قطره ماء</h3>

        <p> سجل الدخول الي حسابك   </p>
        <form class="m-t" role="form" action="<?php echo e(route('post-login')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group clearfix">
                <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__(' البريد الالكتروني  ')); ?></label>

                <div class="col-md-8">
                    <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                    <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>
                
            </div>

            <div class="clearfix"></div>
            <div class="form-group  clearfix">
                <div class="col-md-4">
                <label for="password" class="col-form-label text-md-right"><?php echo e(__('كلمه المرور ')); ?></label>
                </div>
                <div class="col-md-8">
                    <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="current-password">

                    <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>
                
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b"><h3> <?php echo e(__('تسجيل الدخول')); ?></h3> </button>

            
            
            
            
        </form>
    </div>
</div>
<div class="modal inmodal" id="phone" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="delet modal-content animated bounceInRight" style=" direction:rtl;padding: 1em">
            <form>
                <label> ادخل رقم الجوال وانتظر الكود الخاص بك </label>
                <input type="text" style="direction: rtl" placeholder="ادخل رقم الجوال  " class="form-control" >
                <button class="btn btn-info  text-center" style=" margin-top: 1em"> <a href=""  style="color:inherit; "><a href="password.html" style="color: inherit"> حفظ</a></button>
        </div>
    </div>
</div>
<!-- Mainly scripts -->
<script src="<?php echo e(asset('assets/js/jquery-3.1.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>

</body>

</html><?php /**PATH G:\coding\xampp\htdocs\water\resources\views/admins/login.blade.php ENDPATH**/ ?>