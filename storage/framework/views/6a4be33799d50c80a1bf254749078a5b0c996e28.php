<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> الاعدادات</title>
    <link href="<?php echo e(asset('assets/css/summernote/summernote.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/summernote/summernote-bs3.css')); ?>" rel="stylesheet">
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
                            <div class="col-lg-12">
                                <h5 style="font-size: 30px"> الاعدادات  </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="ibox-content" id="">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="col-sm-6">
                                    <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <form action="<?php echo e(route('setting.update', ['id'=>1])); ?>" method="post" class="form-horizontal">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('PUT')); ?>

                                            <div class="form-group"><label class="col-sm-4 control-label">العنوان</label>
                                                <div class="col-sm-8"><input type="text" id ="userID" name="address" class="form-control" value="<?php echo e($setting->address); ?>"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label" > الجوال </label>
                                                <div class="col-sm-8"><input type="text"  class="form-control" name="mobile" value="<?php echo e($setting->mobile); ?>"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">  الفاكس</label>
                                                <div class="col-sm-8"><input type="text"  class="form-control" name="fax" value="<?php echo e($setting->fax); ?>"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label"> البريد الالكتروني  </label>
                                                <div class="col-sm-8"><input type="email"  type="text"  class="form-control" name="email" value="<?php echo e($setting->email); ?>" required></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">  فيس بوك </label>
                                                <div class="col-sm-8"><input type="text"  type="text"  class="form-control" name="facebook" value="<?php echo e($setting->facebook); ?>"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">تويتر </label>
                                                <div class="col-sm-8"><input type="text"  type="text"  class="form-control" name="twitter" value="<?php echo e($setting->twitter); ?>"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">انستجرام </label>
                                                <div class="col-sm-8"><input type="text"  type="text"  class="form-control" name="instagram" value="<?php echo e($setting->instagram); ?>"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">واتساب </label>
                                                <div class="col-sm-8"><input type="text"  type="text"  class="form-control" name="whatsapp" value="<?php echo e($setting->whatsapp); ?>"></div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-danger" onclick="myChange()"> تعديل</button>
                                            </div>
                                        </form>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\coding\xampp\htdocs\water\resources\views/admins/settings.blade.php ENDPATH**/ ?>