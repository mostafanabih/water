<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>المدن</title>

    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/bootstrap.rtl.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/new-stylel.css')); ?>" rel="stylesheet">

</head>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content2'); ?>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <!--start-title-->
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>
                                    <span>تعديل مدينة</span>&nbsp;
                                    <span class="text-danger"><?php echo e($city->name); ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end-title-->

                <!--start-table-->
                <div class="ibox-content">
                    <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="<?php echo e(route('city.update', $city->id)); ?>" method="post" class="form-horizontal">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('PUT')); ?>

                                <div class="form-group">
                                    <label class="col-sm-12 pull-right">الاسم :</label>
                                    <div class="col-sm-12">
                                        <input type="text" value="<?php echo e($city->name); ?>" name="name" class="form-control" required placeholder="اسم المدينة هنا ...">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-success" >تعديل</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end-table-->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\water\resources\views/admins/cities/edit.blade.php ENDPATH**/ ?>