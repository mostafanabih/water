<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> الصفحات الثابته</title>

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
                <!--start-title-->
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-sm-8">
                                <h5 style="font-size: 30px"> الصفحات الثابته  </h5>
                            </div>    <div class="col-sm-4">
                                <button type="button" class="btn btn-success" ><a href="<?php echo e(url('admin/page/create')); ?>" style="color:inherit;"> اضافه</a> </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end-title-->
                <!--start-table-->
                <div class="ibox-content">
                    <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> اسم المستخدم   </th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td> <?php echo e($rule->title); ?> </td>
                                            <td>
                                                <button type="button" class="btn btn-info" ><a href="<?php echo e(url('admin/page/'.$rule->id)); ?>"  style="color: inherit"> عرض</a></button>
                                                <button type="button" class="btn btn-success" ><a href="<?php echo e(url('admin/page/'.$rule->id.'/edit')); ?>" style="color: inherit"> تعديل </a> </button>
                                                <button type="button" class="btn btn-danger delete" data-my_id="<?php echo e($rule->id); ?>">حذف</button>
                                            </td>
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <div class="modal inmodal" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="delet modal-content animated bounceInRight" style="padding: 1em">
                                                <form action="" method="post" id="deleteform">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo e(method_field('DELETE')); ?>

                                                <p>هل انت متاكد من الحذف</p>
                                                <button type="submit" class="btn btn-danger">نعم</button>
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end-table-->
                                    <!--start-end-->
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title text-center ">
                                            <?php echo e($rules->links()); ?>

                                        </div>
                                    </div>
                                    <!--end-end-->
                                </div>
                            </div>
                        </div>
<?php $__env->stopSection(); ?>
                        <?php $__env->startPush('scripts'); ?>
                            <script>
                                $(document).ready(function () {
                                    $(".delete").click(function () {
                                        /* get data from button */
                                        var id = $(this).data("my_id");
                                        /* set action attribute to new url */
                                        $('#deleteform').attr('action', '<?php echo e(url("/admin/page")); ?>' + '/' + id);
                                        /* open the modal */
                                        $('#deleteModal').modal('show');
                                    });
                                });
                            </script>
                        <?php $__env->stopPush(); ?>

<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\water\resources\views/admins/page/index.blade.php ENDPATH**/ ?>