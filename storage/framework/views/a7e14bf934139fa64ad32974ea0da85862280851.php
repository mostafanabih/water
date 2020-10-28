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
                            <div class="col-sm-4">
                                <h3>المدن</h3>
                            </div>
                            <form class="form-inline" action="">
                                <div class="col-lg-2">
                                    <input type="text" value="<?php echo e(request('search') ?? ''); ?>" placeholder="ابحث عن مدينة ..." class="form-control" name="search">
                                </div>
                                <div class="col-lg-1">
                                    <button type="submit" class="btn btn-sm btn-white"
                                            style="float: left; font-size: 15px ; margin-left:-12px">بحث
                                    </button>
                                </div>
                            </form>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#add">اضف
                                    جديد
                                </button>
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
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <table class="table table-bordered" id="datatable">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم المدينة</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($city->name); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('city.edit', $city->id)); ?>" target="_blank" class="btn btn-success">تعديل</a>

                                                    <form onsubmit="return confirm('هل تريد الحذف بالفعل ؟');" action="<?php echo e(url('admin/city/'.$city->id)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr class="text-center">
                                                <td colspan="3">لا يوجد مدن حتى الأن</td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 text-center">
                            <?php echo e($cities->onEachSide(1)->appends(Request::capture()->except('page'))->render()); ?>

                        </div>

                    </div>
                </div>
                <!--end-table-->

                <!--start-up-add-->
                <div class="modal inmodal" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="ibox-content modal-content animated bounceInRight" >
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="text-center"> اضافه مدينة جديدة</h4>

                                    <form action="<?php echo e(route('city.store')); ?>" method="post" class="form-horizontal">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="form-group">
                                            <label class="col-sm-12 pull-right">الاسم :</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="name" class="form-control" required placeholder="اسم المدينة هنا ...">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="text-center mt-5">
                                                <button type="submit" class="btn btn-success" >حفظ </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end-up-add-->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\water\resources\views/admins/cities/index.blade.php ENDPATH**/ ?>