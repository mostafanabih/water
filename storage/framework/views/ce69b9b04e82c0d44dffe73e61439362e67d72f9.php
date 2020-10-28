<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> الاشعارات </title>

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
                                    <h5 style="font-size: 30px"> الاشعارات  </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                        <form action="<?php echo e(route('post-notices')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('POST')); ?>

                        <div class="col-lg-12">
                            <div class="col-sm-10">
                                <div>
                                    <h3>الاشعارات </h3>
                                    <div ><label> <input type="radio" checked="" value="1" id="optionsRadios1" name="optionsRadios"> ارسال اشعار لكل العملاء  </label></div>
                                    <div ><label class=col-sm-3> <input type="radio" value="2" id="optionsRadios2" name="optionsRadios"> ارسال اشعار لعميل معين  </label>
                                        <?php $client = app('App\Client'); ?>
                                        <select class="col-sm-6" name="client_id" style="margin-bottom: 1em">
                                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($client->id); ?>"><?php echo e($client->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox float-e-margins">
                                <div class="ibox-title ">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <textarea  name="text" cols="100" rows="10" ></textarea>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button class="btn btn-info" > ارسال </button>
                                        </div>
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
<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\coding\xampp\htdocs\water\resources\views/admins/notifications.blade.php ENDPATH**/ ?>