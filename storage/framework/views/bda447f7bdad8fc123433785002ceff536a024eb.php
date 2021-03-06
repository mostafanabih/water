<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> صفحه الدخول</title>

    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">

</head>
<body class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>

        <h3>اهلا بكم في قطره ماء</h3>
        <h3> اضافه شركه جديده </h3>
        <form class="m-t" role="form" action="<?php echo e(url('/company/register')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo e(method_field('POST')); ?>

            <div class="form-group">
                <input type="text" name="name" class="form-control"style="direction: rtl" placeholder="اسم الشركه  " required="">
            </div>
            <div class="form-group ">
                <input type="text" name="mobile" class="form-control" style="direction: rtl" placeholder="رقم الجوال" required="">
            </div>
            <div class="form-group ">
                <input type="text" name="name2" class="form-control" style="direction: rtl" placeholder="اسم المسئول" required="">
            </div>
            <div class="form-group ">
                <input type="text" name="user_name" class="form-control" style="direction: rtl" placeholder="اسم المستخدم" required="">
            </div>
            <div class="form-group ">
                <input type="email" name="email" class="form-control" style="direction: rtl" placeholder="البريد الالكتروني" required="">
            </div>
            <div class="form-group ">
                <input type="password" name="password" class="form-control" style="direction: rtl" placeholder="كلمه المرور" required="">
            </div>
            <div class="form-group ">
                <input type="password" name="password_confirmation" class="form-control" style="direction: rtl" placeholder=" تاكيد كلمه المرور" required="">
            </div>
            <div class="form-group ">
                <label>صوره السجل التجارى </label>
                <input type="file" name="pic2" class="form-control" style="direction: rtl" placeholder="صوره السجل التجارى للشركه " required="">
            </div>
            <div class="form-group ">
                <label>صوره الشركه </label>
                <input  type="file" name="pic1" class="form-control " style="direction: rtl" placeholder="صوره الشركه " required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b"> <h3>انشاء حساب جديد </h3></a> </button>
        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo e(asset('assets/js/jquery-3.1.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>

</body>

</html>
<?php /**PATH G:\coding\xampp\htdocs\water\resources\views/company/register.blade.php ENDPATH**/ ?>