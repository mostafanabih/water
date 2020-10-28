<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> العموله </title>

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
                                <h5 style="font-size: 30px"> عمليات سداد العموله   </h5>
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
                        <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الشركه</th>
                                <th>رقم الطلب</th>
                                <th>عموله</th>
                                <th>طريقة الدفع</th>
                                <th>صورة التحويل</th>
                                <th>تاكيد</th>
                                <th>اسم المستخدم</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $commissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e(($commission->company) ? $commission->company->name : "-----"); ?> </td>
                                <td><?php echo e($commission->id); ?></td>
                                <td><?php echo e($commission->commission_money); ?></td>
                                <td><?php echo e($commission->get_commission_payment_way()); ?></td>
                                <td>
                                    <?php if($commission->commission_payment == 'bank'): ?>
                                        <img src="<?php echo e($commission->getConvertImageDisplay()); ?>" class="img-responsive img-preview-sm" alt="commission bank convert image">
                                        <?php else: ?> <?php echo e('-----'); ?>

                                    <?php endif; ?>
                                </td>
                                <td><button class="btn btn-success confirm" data-my_id="<?php echo e($commission->id); ?>" data-state="<?php if($commission->admin_commission_agree=='agree'): ?><?php echo e('not_agree'); ?><?php else: ?><?php echo e('agree'); ?><?php endif; ?>"><?php if($commission->admin_commission_agree=='agree'): ?><?php echo e("غير مؤكد"); ?><?php else: ?><?php echo e("تاكيد"); ?> <?php endif; ?></button> </td>
                                <td><?php echo e(($commission->admin_agree_by) ? $commission->Admin->name : '-----'); ?></td>
                            </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="modal inmodal" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="delet modal-content animated bounceInRight" style="padding: 1em">
                                <form action=""  method="post" class="form-horizontal" id="confirmform">
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field('PUT')); ?>

                                    <p id="my_text"></p>
                                    <input type="hidden" name="status" id="my_status">
                                    <button type="submit" class="btn btn-danger">نعم</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>
                                </form>
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
    <script>
        $(document).ready(function () {

            ///////////////////delete/////////////////////////

            $(".confirm").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                var status = $(this).data("state");
                /* set action attribute to new url */
                $('#confirmform').attr('action', '<?php echo e(url("/admin/confirmcommission")); ?>' + '/' + id);
                $('#my_status').val(status);
                if (status == 'agree'){
                    $('#my_text').empty().text('هل انت متاكد من الموافقه');
                }else {
                    $('#my_text').empty().text('هل انت متاكد من  عدم الموافقه');
                }
                /* open the modal */
                $('#confirmModal').modal('show');

            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\coding\xampp\htdocs\water\resources\views/admins/commission.blade.php ENDPATH**/ ?>