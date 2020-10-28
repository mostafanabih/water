
<?php $__env->startSection('title'); ?>
    Main Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content">
        <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 style="font-size: 30px"> الرئيسيه </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        المنتجات
                                    </div>
                                    <div class="panel-body">
                                        <p><i class="fa fa-database"></i> عدد المنتجات <span
                                                    style="font-weight: bold"> <?php echo e($countProduct); ?> </span></p>
                                    </div>
                                    <div class="panel-footer">
                                        <button class=" btn btn-success"><a href="<?php echo e(url('company/products')); ?>"
                                                                            style="color: inherit">المنتجات </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">المندوبين</div>
                                    <div class="panel-body">
                                        <p><i class="fa fa-share"></i> عدد المندوبين<span
                                                    style="font-weight: bold"> <?php echo e($countRepresentative); ?> </span></p>
                                    </div>
                                    <div class="panel-footer">
                                        <button class=" btn btn-danger"><a href="<?php echo e(url('company/representative')); ?>"
                                                                           style="color: inherit">المندوبين </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ibox float-e-margins">

            <div class="ibox-title">
                <h4>عرض الطلبات اليوم </h4>

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
                        <th> اسم العميل</th>
                        <th>الكميه</th>
                        <th> العنوان الواقع علي الخريطه</th>
                        <th> طريقه الدفع</th>
                        <th> معاد التسليم</th>
                        <th> حاله الطلب</th>
                        <th> العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $currentorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currentorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($currentorder->id); ?></td>
                            <td><?php echo e($currentorder->Client->name); ?></td>
                            <td><?php echo e($currentorder->Product->sum('quantity')); ?></td>
                            <td><?php echo e($currentorder->location); ?></td>
                            <td><?php echo e($currentorder->payment_way); ?></td>
                            <td><?php echo e($currentorder->done_time ??'لا يوجد ميعاد محدد'); ?></td>
                            <td><?php echo e($currentorder->status); ?></td>
                            <td>
                                <?php if($currentorder->status == 'wait'): ?>
                                    <button type="button" class="btn btn-success select" data-my_id="<?php echo e($currentorder->id); ?>">
                                        تحويل الي المندوب
                                    </button>
                                <?php endif; ?>
                                <button type="button" class="btn btn-warning"><a
                                            href="<?php echo e(url('company/orders/'.$currentorder->id)); ?>" style="color: inherit">
                                        تفاصيل الطلب </a></button>
                                <?php if(!in_array($currentorder->status, ['cancel', 'done'])): ?>
                                    <button type="button" class="btn btn-danger cancel"
                                            data-my_id="<?php echo e($currentorder->id); ?>">
                                        الغاء الطلب
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal inmodal" id="confirmRepModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="ibox-content modal-content animated bounceInRight">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="ibox float-e-margins">
                                <form action="" method="post" class="form-horizontal" id="confirmrepform">
                                    <div class="col-sm-12">
                                        <h4 class="text-center"> تحويل الي المندوب </h4>
                                        <?php echo csrf_field(); ?>
                                        <?php echo e(method_field('PUT')); ?>

                                        <div class="form-group"><label class="col-sm-4 control-label"> اسم
                                                المندوب </label>

                                            <div class="col-sm-8">
                                                <select name="representative" id="my_representative"
                                                        class="form-control" required>
                                                    <option value="">اختر مندوب ...</option>
                                                    <?php $__currentLoopData = $Representatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $representative): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($representative->id); ?>"><?php echo e($representative->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success">حفظ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal inmodal" id="cancelModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="ibox-content modal-content animated bounceInRight">
                    <div class="row">
                        <form action="" method="post" id="cancelform">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('PUT')); ?>

                            <div class="col-lg-9">
                                <div class="ibox float-e-margins">

                                    <div class="col-sm-12">
                                        <label class="col-sm-4 control-label"> الغاء الطلب </label>

                                        <textarea style="margin-top: 1em;" name="cancelreason" id="" cols="47"
                                                  rows="5" placeholder="سبب الالغاء"></textarea>
                                        <button class="btn-danger btn text-center" type="submit"> الغاء الطلب
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $__env->stopSection(); ?>


        <?php $__env->startSection('script'); ?>

            <script>
                $(document).ready(function () {
                    ///////////////////cancel/////////////////////////

                    $(".cancel").click(function () {
                        /* get data from button */
                        var id = $(this).data("my_id");
                        /* set action attribute to new url */
                        $('#cancelform').attr('action', '<?php echo e(url("/company/cancelorder")); ?>' + '/' + id);
                        /* open the modal */
                        $('#cancelModal').modal('show');
                    });

                    $(".select").click(function () {
                        /* get data from button */
                        var id = $(this).data("my_id");
                        /* set action attribute to new url */
                        $('#confirmrepform').attr('action', '<?php echo e(url("/company/confirmRep")); ?>' + '/' + id);
                        /* open the modal */
                        $('#confirmRepModal').modal('show');
                    });
                });
            </script>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('company.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/is2host/public_html/water/resources/views/company/home.blade.php ENDPATH**/ ?>