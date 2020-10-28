<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> تقرير القيمه المضافة </title>

    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/bootstrap.rtl.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/new-stylel.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content2'); ?>

    <div class="wrapper wrapper-content">
        <div class="row">
            <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 style="font-size: 30px">  تقرير القيمه المضافة  </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="img text-center" >
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="ibox float-e-margins">
                                            <form>
                                                <div class="ibox float-e-margins">


                                                    <div class="col-lg-5">
                                                        <label class="col-sm-4 control-label">  من  </label>
                                                        <input type="text" name="from" class="col-sm-8 datepicker form-control" value="<?php if(request('from')): ?><?php echo e(request('from')); ?><?php endif; ?>" placeholder="الفتره من">
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <label class="col-sm-4 control-label">  الى  </label>
                                                        <input type="text" name="to" class="col-sm-8 datepicker form-control" value="<?php if(request('to')): ?><?php echo e(request('to')); ?><?php endif; ?>" placeholder="الفتره الي">
                                                    </div>
                                                    <div class="col-lg-2 text-center ">
                                                        <button type="submit" class="btn btn-info" style="font-size: 20px">بحث</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>رقم الطلب</th>
                                            <th>الاجمالى ما قبل القيمة المضافة</th>
                                            <th>القيمه المضافة</th>
                                            <th>الصافى بعد القيمة المضافة</th>
                                            <th>التاريخ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($order->id); ?></td>
                                            <td><?php echo e($order->total); ?> </td>
                                            <td><?php echo e($order->add_value); ?> </td>
                                            <td><?php echo e($order->add_value + $order->total); ?></td>
                                            <td><?php echo e(date('Y-m-d', strtotime($order->created_at))); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( ".datepicker" ).datepicker({
                dateFormat: 'yy-mm-dd'
            });
        } );
    </script>
    <script>
        $(document).ready(function () {
            ///////////////////delete/////////////////////////

            $(".delete").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                /* set action attribute to new url */
                $('#deleteform').attr('action', '<?php echo e(url("/admin/order")); ?>' + '/' + id);
                /* open the modal */
                $('#deleteModal').modal('show');
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\coding\xampp\htdocs\water\resources\views/admins/reportValueAdded.blade.php ENDPATH**/ ?>