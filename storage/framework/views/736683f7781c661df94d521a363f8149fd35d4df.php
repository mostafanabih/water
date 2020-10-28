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
                                <h5 style="font-size: 30px"> تقرير طلبات المندوبين     </h5>
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
                                <th>رقم الطلب </th>
                                <th>اسم المندوب </th>
                                <th>اسم العميل   </th>
                                <th>الاجمالي   </th>
                                <th>طريقه السداد  </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($order->id); ?> </td>
                                <td><?php echo e($order->Representative->name); ?> </td>
                                <td><?php echo e($order->Client->name); ?> </td>
                                <td><?php echo e($order->net); ?></td>
                                <td><?php echo e(($order->payment_way == 'visa') ? 'فيزا' : 'عند التسليم'); ?></td>

                            </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center col-xs-12">
                        <?php echo e($orders->onEachSide(1)->appends(Request::capture()->except('page'))->render()); ?>

                    </div>
                </div>
                <!--start-end-->
                <!--end-end-->
                <div class="ibox-content">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-cc-mastercard"></i> اجمالي العمليات المسدده بالفيزا
                                    </div>
                                    <div class="panel-body">
                                        <p> اجمالي العمليات المسدده بالفيزا<span style="font-weight: bold"><?php echo e(DB::table("orders")->where('status', '!=', 'cancel')->where('company_id', auth()->guard('company')->user()->company_id)->where('payment_way','visa')->get()->count()); ?> </span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-handshake-o"></i>اجمالي العمليات المسدده يدويا
                                    </div>
                                    <div class="panel-body">
                                        <p> اجمالي العمليات المسدده يدويا<span style="font-weight: bold"> <?php echo e(DB::table("orders")->where('status', '!=', 'cancel')->where('company_id', auth()->guard('company')->user()->company_id)->where('payment_way', '!=' ,'visa')->get()->count()); ?> </span> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <i class="fa fa-money"></i> صافى الربح
                                    </div>
                                    <div class="panel-body">
                                        <p>  صافى الربح    <span style="font-weight: bold"><?php echo e(DB::table("orders")->where('status', '!=', 'cancel')->where('company_id', auth()->guard('company')->user()->company_id)->where('representative_id','!=', 'null')->get()->sum('net')); ?></span> </p>
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
<?php echo $__env->make('company.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\water\resources\views/company/representatives/reports.blade.php ENDPATH**/ ?>