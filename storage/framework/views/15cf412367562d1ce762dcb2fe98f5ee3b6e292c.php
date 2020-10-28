<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> الطلبات</title>

    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/bootstrap.rtl.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/new-stylel.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/new-stylel.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content2'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title ">
                    <div class="row">
                        <div class="col-lg-4">
                            <h5 style="font-size: 30px"> الطلبات </h5>
                        </div>

                    </div>
                </div>
            </div>
            <div class="ibox-title ">
                <div style="padding:1em;border: 2px solid #66afe9; margin-bottom: 1em ; ">
                    <form>
                        <div class="ibox float-e-margins">

                            <div class="row">

                                <div class="col-lg-4">
                                    <label class="col-sm-5 control-label"> رقم الطلب </label>
                                    <input type="text" name="id" class="col-sm-7 form-control"
                                           value="<?php if(request('id')): ?><?php echo e(request('id')); ?><?php endif; ?>"
                                           placeholder="اكتب رقم الطلب">
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-sm-4 control-label"> من </label>
                                    <input type="text" name="from" class="col-sm-8 datepicker form-control" autocomplete="off"
                                           value="<?php if(request('from')): ?><?php echo e(request('from')); ?><?php endif; ?>"
                                           placeholder="الفتره من">
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-sm-4 control-label"> الى </label>
                                    <input type="text" name="to" class="col-sm-8 datepicker form-control" autocomplete="off"
                                           value="<?php if(request('to')): ?><?php echo e(request('to')); ?><?php endif; ?>" placeholder="الفتره الي">
                                </div>
                            </div>
                        </div>

                        <div class="ibox float-e-margins">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="col-sm-5 control-label"> حاله الطلب </label>
                                    <select name="status" class="col-sm-7 form-control">
                                        <option value="">كل الحالات</option>
                                        <option value="wait" <?php if(request('status') == 'wait'): ?><?php echo e('selected'); ?><?php endif; ?>>قيد
                                            لانتظار
                                        </option>
                                        <option value="process" <?php if(request('status') == 'process'): ?><?php echo e('selected'); ?><?php endif; ?>>
                                            جارى التنفيذ
                                        </option>
                                        <option value="done" <?php if(request('status') == 'done'): ?><?php echo e('selected'); ?><?php endif; ?>>تم
                                            الاستلام
                                        </option>
                                        <option value="cancel" <?php if(request('status') == 'cancel'): ?><?php echo e('selected'); ?><?php endif; ?>>
                                            ملغى
                                        </option>
                                        
                                        
                                        
                                    </select>
                                </div>

                                <div class="col-lg-4">
                                    <label class="col-sm-4 control-label"> طريقه الدفع </label>
                                    <select name="payment_way" class="col-sm-8 form-control">
                                        <option value="">كل الطرق</option>
                                        <option value="visa" <?php if(request('payment_way') == 'visa'): ?><?php echo e('selected'); ?><?php endif; ?>>
                                            فيزا كارت
                                        </option>
                                        <option value="on_deliver" <?php if(request('payment_way') == 'on_deliver'): ?><?php echo e('selected'); ?><?php endif; ?>>
                                            عند الوصول
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-sm-5 control-label"> حاله سداد العموله </label>
                                    <select name="commission_payment" class="col-sm-7 form-control">
                                        <option value=""> حالات السداد</option>
                                        <option value="e_payment" <?php if(request('commission_payment') == 'e_payment'): ?><?php echo e('selected'); ?><?php endif; ?>>
                                            الكتروني
                                        </option>
                                        <option value="bank" <?php if(request('bank') == 'bank'): ?><?php echo e('selected'); ?><?php endif; ?>>تحويل
                                            بنكي
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="row">

                                <div class="col-lg-6">
                                    <label class="col-sm-4 control-label"> العميل </label>
                                    <select name="client_id" class="col-sm-8 form-control">
                                        <option value=""> كل العملاء</option>
                                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($client->id); ?>" <?php if(request('client_id') == $client->id): ?><?php echo e('selected'); ?><?php endif; ?>> <?php echo e($client->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                                <div class="col-lg-6">
                                    <label class="col-sm-4 control-label"> الشركه </label>

                                    <select name="company_id" class="col-sm-8 form-control">
                                        <option value=""> كل الشركات</option>
                                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($company->id); ?>" <?php if(request('company_id') == $company->id): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($company->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>

                            </div>
                        </div>
                        <div class="row">

                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            

                            
                            <div class="row">
                                <div class="col-lg-12 text-center " style="margin-top: 2em">
                                    <button type="submit" class="btn btn-info" style="font-size: 20px">بحث</button>
                                </div>

                            </div>
                    </form>
                </div>
            </div>
            <div class="ibox-content">
                <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>كميه</th>
                                        <th> سعر</th>
                                        <th>عموله الموقع</th>
                                        <th> عمليات</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($order->id); ?></td>
                                            <td><?php echo e($order->OrderProducts->sum('quantity')); ?></td>
                                            <td> <?php echo e($order->net); ?> </td>
                                            <td><?php echo e($order->commission_money); ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success"><a
                                                            href="<?php echo e(url('admin/order/'.$order->id)); ?>"
                                                            style="color: inherit;">عرض</a></button>
                                                <?php if($order->status == 'wait'): ?>
                                                    <button type="button" class="btn btn-danger"
                                                            data-my_id="<?php echo e($order->id); ?>">حذف
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <div class="modal inmodal" id="deleteModal" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="delet modal-content animated bounceInRight" style="padding: 1em">
                                            <form action="" method="post" id="deleteform">
                                                <?php echo csrf_field(); ?>
                                                <?php echo e(method_field('DELETE')); ?>

                                                <p>هل انت متاكد من الحذف</p>
                                                <button type="submit" class="btn btn-danger">نعم</button>
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                    الغاء
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ibox float-e-margins">
                <div class="ibox-title text-center ">
                    <?php echo e($orders->onEachSide(1)->appends(Request::capture()->except('page'))->render()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $(".datepicker").datepicker({
            dateFormat: 'dd-mm-yy'
        });
    });
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
<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\water\resources\views/admins/orders.blade.php ENDPATH**/ ?>