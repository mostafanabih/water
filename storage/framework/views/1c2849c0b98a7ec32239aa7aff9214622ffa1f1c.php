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
                                <h5 style="font-size: 30px"> كشف حساب الشركات   </h5>
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
                                <th>#</th>
                                <th>اسم الشركه  </th>
                                <th>عدد الطلبات  </th>
                                <th>اجمالي قيمه الطبات  </th>
                                <th>اجمالي عموله الموقع   </th>
                                <th>كشف حساب الشركه </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($company->name); ?></td>
                                <td><?php echo e($company->OrderWithoutCancel->count()); ?></td>
                                
                                <td><?php echo e($company->OrderWithoutCancel->sum('net')); ?></td>
                                <td><?php echo e($company->OrderWithoutCancel->sum('commission_money')); ?></td>
                                <td><button class="btn btn-info"><a href="<?php echo e(url('admin/companyaccount/'.$company->id)); ?>"style="color: inherit">كشف حساب الشركه </a> </button> </td>
                            </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        اجمالي الطلبات
                                    </div>
                                    <div class="panel-body">
                                        <p><i class="fa fa-database"></i>  اجمالي عدد الطلبات    <span style="font-weight: bold">
<?php echo e(DB::table("orders")->where('status', '!=', 'cancel')->get()->count()); ?></span> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        اجمالي قيمه الطلبات
                                    </div>
                                    <div class="panel-body">
                                        <p><i class="fa fa-money"></i> اجمالي قيمه الطلبات<span style="font-weight: bold"> <?php echo e(DB::table("orders")->where('status', '!=', 'cancel')->get()->sum('net')); ?> </span> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        اجمالي عموله الموقع
                                    </div>
                                    <div class="panel-body">
                                        <p> <i class="fa fa-desktop"></i> اجمالي عموله الموقع    <span style="font-weight: bold"><?php echo e(DB::table("orders")->where('status', '!=', 'cancel')->get()->sum('commission_money')); ?></span> </p>
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
<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\water\resources\views/admins/companiesAccount.blade.php ENDPATH**/ ?>