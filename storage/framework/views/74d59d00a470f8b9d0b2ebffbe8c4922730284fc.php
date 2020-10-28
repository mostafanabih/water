<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> تفاصيل الطلب </title>

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
            <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 style="font-size: 30px"> تفاصيل الطلب رقم <?php echo e($order->id); ?></h5>
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
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4>اسم العميل </h4></div>
                                                <div class="col-sm-8"><p><?php echo e($order->Client->name); ?> </p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4> رقم الجوال </h4></div>
                                                <div class="col-sm-8"><p><?php echo e($order->Client->mobile); ?></p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4>العنوان    </h4></div>
                                                <div class="col-sm-8"><p><?php echo e($order->Client->location); ?></p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4> الشركه </h4></div>
                                                <div class="col-sm-8"><p><?php echo e($order->Company->name); ?></p></div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4> حاله الطلب  </h4></div>
                                                <div class="col-sm-8"><p><?php echo e($order->status); ?></p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4> وقت الطلب  </h4></div>
                                                <div class="col-sm-8"><p><?php echo e($order->done_time); ?></p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4> طريقه الدفع  </h4></div>
                                                <div class="col-sm-8"><p><?php echo e($order->payment_way); ?></p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4>نسبه العموله</h4></div>
                                                <div class="col-sm-8"><p><?php echo e($order->commission_percentage); ?></p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4> القيمه المضافه </h4></div>
                                                <div class="col-sm-8"><p><?php echo e($order->add_value); ?></p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4>  المبلغ المطلوب </h4></div>
                                                <div class="col-sm-8"><p><?php echo e($order->net); ?></p></div>
                                            </div>
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
                                            <th>#</th>
                                            <th>المنتج </th>
                                            <th> الحجم   </th>
                                            <th> السعر  </th>
                                            <th>الكميه </th>
                                            <th> الاجمالي </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $order->OrderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($product->Product->name); ?> </td>
                                            <td> <?php echo e($product->Product->size); ?> </td>
                                            <td><?php echo e($product->price); ?></td>
                                            <td><?php echo e($product->quantity); ?></td>
                                            <td><?php echo e($product->after_discount); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title text-center ">
                        <?php if($order->status == 'wait'): ?>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#confirm">تاكيد الطلب</button>
                        <?php endif; ?>
                        <?php if($order->status == 'wait' or $order->status == 'process'): ?>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#stop">الغاء الطلب</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    </div>
    </div>
    <div class="modal inmodal" id="stop" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content  animated bounceInRight"  aria-hidden="true" style=" padding: 1em;">
                <form action="<?php echo e(url('admin/cancelorder/'.$order->id)); ?>"  method="post" class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PUT')); ?>

                    <div>
                    <div class="form-group"><label>سبب الغاء الطلب</label></div>
                        <div ><textarea name="cancelreason" class="form-control"></textarea></div>
                    </div>
                <button type="submit"class="btn btn-danger">نعم</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="confirm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content  animated bounceInRight"  aria-hidden="true" style=" padding: 1em;">
                <form action="<?php echo e(url('admin/confirmorder/'.$order->id)); ?>" method="post" class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PUT')); ?>

                    <div class="form-group"><label class="col-sm-4 control-label" > المندوب </label>
                        <div class="col-sm-8">
                            <select name="representative" id="my_representative" class="form-control">
                                <?php $__currentLoopData = $order->Company->Representative; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $representative): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($representative->id); ?>"><?php echo e($representative->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">حفظ </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\water\resources\views/admins/orderdetails.blade.php ENDPATH**/ ?>