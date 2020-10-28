<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo e($model->title); ?></title>

    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/summernote/summernote.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/summernote/summernote-bs3.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/bootstrap.rtl.min.css')); ?>" rel="stylesheet">
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
                                <h3> تعديل صفحه
                                <span class="text-danger"><?php echo e($model->title); ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <form action="<?php echo e(url('admin/page/'.$model->id)); ?>" method="post" class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PUT')); ?>

                    <div class="ibox float-e-margins">
                        <div class="ibox-title ">
                            <div class="row">
                                <div class="col-lg-3">
                                    <p> عنوان الصفحه </p>
                                </div>
                                <div class="col-lg-9 ">
                                    <input type="text" name="title" class="form-control" value="<?php echo e($model->title); ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mail-text h-200">
                        <h3>محتوى الصفحه </h3>
                        <textarea id="summernote" name="body" required><?php echo e($model->body); ?></textarea>
                    </div>

                    <div class="ibox float-e-margins">
                        <div class="ibox-title ">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-success">تعديل</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/plugins/summernote/summernote.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {

            $('#summernote').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true,                // set focus to editable area after initializing summernote
                lang: 'ar-AR'
            });

        });

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\coding\xampp\htdocs\water\resources\views/admins/page/edit.blade.php ENDPATH**/ ?>