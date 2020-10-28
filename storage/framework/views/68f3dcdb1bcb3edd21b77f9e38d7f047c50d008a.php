<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> كشف حساب الشركات </title>

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
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 style="font-size: 30px"> تقرير طلبات المندوبين    </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>اسم المندوب</th>
                                <th>عدد الطلبات   </th>
                                <th>الاجمالي   </th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $reps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($rep->name); ?></td>
                                <td><?php echo e($rep->OrderWithoutCancel->count()); ?> </td>
                                <td><?php echo e($rep->OrderWithoutCancel->sum('net')); ?></td>
                            </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                        <?php echo e($reps->links()); ?>

                    </div>
                </div>
                <div class="ibox-content">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-cc-mastercard"></i> اجمالي العمليات المسدده بالفيزا
                                    </div>
                                    <div class="panel-body">
                                        <p> اجمالي العمليات المسدده بالفيزا<span style="font-weight: bold"> <?php echo e(DB::table("orders")->where('status', '!=', 'cancel')->where('payment_way','visa')->get()->count()); ?> </span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-handshake-o"></i>اجمالي العمليات المسدده يدويا
                                    </div>
                                    <div class="panel-body">
                                        <p> اجمالي العمليات المسدده يدويا<span style="font-weight: bold"> <?php echo e(DB::table("orders")->where('status', '!=', 'cancel')->where('payment_way', '!=' ,'visa')->get()->count()); ?> </span> </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\coding\xampp\htdocs\water\resources\views/admins/representativeAccount.blade.php ENDPATH**/ ?>