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
                            <div class="col-lg-5">
                                <h5 style="font-size: 30px"> شاشه حساب الموقع </h5>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <form>
                                <div class="col-lg-2">
                                    <h3> الفتره </h3>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-sm-4 control-label"> من </label>
                                    <input required type="date" name="from" class="col-sm-8 form-control"
                                           value="<?php if(request('from')): ?><?php echo e(request('from')); ?><?php endif; ?>"
                                           placeholder="الفتره من">
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-sm-4 control-label"> الى </label>
                                    <input required type="date" name="to" class="col-sm-8 form-control"
                                           value="<?php if(request('to')): ?><?php echo e(request('to')); ?><?php endif; ?>" placeholder="الفتره الي">
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn  btn-success" style="float: left">بحث</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <?php if(request('from') and request('to')): ?>
                            <h4>
                                <span>الطلبات من الفترة</span>&nbsp;
                                <span class="text-danger"><?php echo e(request('from')); ?></span>&nbsp;
                                <span>الى الفترة</span>&nbsp;
                                <span class="text-danger"><?php echo e(request('to')); ?></span>
                            </h4>
                        <?php else: ?>
                            <h4>طلبات اليوم </h4>
                        <?php endif; ?>
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
                                <th> التاريخ</th>
                                <th>اسم المندوب</th>
                                <th>اسم العميل</th>
                                <th>اسم المنتج</th>
                                <th>الكميه</th>
                                <th>الاجمالى</th>
                                <th> المبلغ المطلوب</th>
                                <th>العموله</th>
                                <th>حاله سداد العموله</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $orderstoday; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ordertoday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($ordertoday->id); ?> </td>
                                    <td><?php echo e($ordertoday->created_at); ?> </td>
                                    <td><?php echo e($ordertoday->Representative->name ?? 'لا يوجد مندوب'); ?></td>
                                    <td><?php echo e($ordertoday->Client->name); ?></td>
                                    <td><?php echo e($ordertoday->OrderProducts->first()->Product->name); ?> </td>
                                    <td><?php echo e($ordertoday->OrderProducts->sum('quantity')); ?></td>
                                    <td><?php echo e($ordertoday->total); ?></td>
                                    <td><?php echo e($ordertoday->net); ?></td>
                                    <td><?php echo e($ordertoday->commission_money); ?></td>
                                    <td><?php if($ordertoday->admin_commission_agree == 'agree'): ?>  <?php echo e('تم السداد'); ?> <?php else: ?>
                                            <a href="<?php echo e(url('/company/commission')); ?>" class="btn-info btn"> <?php echo e('سداد العموله'); ?> </a> <?php endif; ?>
                                    </td>
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
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        اجمالي المبلغ
                                    </div>
                                    <div class="panel-body">
                                        <p><i class="fa fa-money"></i> اجمالي المبلغ <span
                                                    style="font-weight: bold"> <?php echo e(DB::table("orders")->where('company_id', auth()->guard('company')->user()->company_id)->get()->sum('total')); ?> </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-cc-mastercard"></i> اجمالي العمليات المسدده بالفيزا
                                    </div>
                                    <div class="panel-body">
                                        <p> اجمالي العمليات المسدده بالفيزا<span
                                                    style="font-weight: bold"><?php echo e(DB::table("orders")->where('company_id', auth()->guard('company')->user()->company_id)->where('payment_way','visa')->get()->count()); ?> </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-handshake-o"></i>اجمالي العمليات المسدده يدويا
                                    </div>
                                    <div class="panel-body">
                                        <p> اجمالي العمليات المسدده يدويا<span
                                                    style="font-weight: bold"> <?php echo e(DB::table("orders")->where('company_id', auth()->guard('company')->user()->company_id)->where('payment_way','on_deliver')->get()->count()); ?> </span>
                                        </p>
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
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            
                
                
                
                
                
                
            
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('company.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\water\resources\views/company/siteaccount/index.blade.php ENDPATH**/ ?>