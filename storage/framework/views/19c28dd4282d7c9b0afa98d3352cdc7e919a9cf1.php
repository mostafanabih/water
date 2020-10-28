<?php $__env->startSection('title'); ?>
    Main Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 style="font-size: 30px">  الطلبات السابقه  </h5>
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
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th> اسم العميل  </th>
                                <th>الكميه  </th>
                                <th>تقييم الطلب  </th>
                                <th> العنوان الواقع علي الخريطه   </th>
                                <th>  طريقه الدفع    </th>
                                <th>  معاد التسليم     </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($order->id); ?></td>
                                <td> <?php echo e($order->Client->name); ?> </td>
                                <td><?php echo e($order->OrderProducts->sum('quantity')); ?></td>
                                <td><?php if($order->rate == null): ?> <?php echo e('لا يوجد تقييم'); ?> <?php else: ?> <?php echo e($order->rate.' نجوم'); ?> <?php endif; ?></td>
                                <td><?php echo e($order->location); ?></td>
                                <td><?php echo e(($order->payment_way == 'visa') ? 'فيزا' : 'عند الاستلام'); ?></td>
                                <td><?php echo e($order->done_time ?? 'لا يوجد ميعاد محدد'); ?>  </td>
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
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        الطلبات  السابقه
                                    </div>
                                    <div class="panel-body">
                                        <p> <i class="fa fa-database"></i>  عدد الطلبات السابقه  <span style="font-weight: bold"><?php echo e($orders->count()); ?></span> </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal inmodal" id="change" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="ibox-content modal-content animated bounceInRight">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="ibox float-e-margins">
                                <div class="col-sm-12">
                                    <h4 class="text-center"> تحويل الطلب الي المندوب   </h4>
                                    <form method="get" class="form-horizontal">
                                        <div class="form-group"><label class="col-sm-4 control-label"> اسم المندوب </label>
                                            <div class="col-sm-8"><input type="text" id ="userID" class="form-control"></div>
                                        </div>

                                    </form>
                                </div>
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
<?php echo $__env->make('company.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\water\resources\views/company/orders/previous_orders.blade.php ENDPATH**/ ?>