<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>العملاء</title>

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
                <!--start-title-->
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="font-size: 30px"> العملاء</h5>
                            </div>
                            <form class="form-inline" action="">
                                <div class="col-lg-2">

                                    <input type="text" placeholder="ابحث عن عميل  " class="form-control" name="search">

                                </div>
                                <div class="col-lg-1">
                                    <button type="submit" class="btn btn-sm btn-white" style="float: left; font-size: 15px ; margin-left:-12px" >بحث</button>
                                </div>
                            </form>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">اضف جديد</button>
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
                                    <table class="table table-bordered" id="datatable">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم العميل </th>
                                            <th>رقم الجوال</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($client->name); ?></td>
                                            <td><?php echo e($client->mobile); ?></td>
                                            <td>
                                                
                                                <button type="button" class="btn btn-success edit"
                                                data-my_id="<?php echo e($client->id); ?>"
                                                data-my_name="<?php echo e($client->name); ?>" data-my_mobile="<?php echo e($client->mobile); ?>">تعديل</button>
                                                <button type="button" class="btn btn-warning stop" data-my_id="<?php echo e($client->id); ?>" data-status="<?php if($client->stop == 'stop'): ?><?php echo e('not_stop'); ?><?php else: ?><?php echo e('stop'); ?><?php endif; ?>"><?php if($client->stop == 'stop'): ?><?php echo e('عدم ايقاف'); ?><?php else: ?><?php echo e('ايقاف'); ?><?php endif; ?></button>
                                                <a href="<?php echo e(url('admin/order?client_id='.$client->id)); ?>" class="btn btn-info">الطلبات </a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo e($client->id); ?>">حذف</button>
                                                <div class="modal inmodal" id="<?php echo e($client->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="delet modal-content animated bounceInRight" style="padding: 1em" >

                                                            <form action="<?php echo e(url('admin/client/'.$client->id)); ?>" method="post">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo e(method_field('DELETE')); ?>

                                                                <p>هل انت متاكد من الحذف</p>
                                                            <button type="submit"class="btn btn-danger">نعم</button>
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end-table-->
                <!--start-up-add-->
                <div class="modal inmodal" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="ibox-content modal-content animated bounceInRight" >
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="ibox float-e-margins">
                                        <div class="col-sm-12">
                                            <h4 class="text-center"> اضافه عميل</h4>

                                            <form action="<?php echo e(route('client.store')); ?>" method="post" class="form-horizontal">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="form-group"><label class="col-sm-4 control-label">الاسم</label>
                                                    <div class="col-sm-8"><input type="text" name="name" id ="userID" class="form-control"></div>
                                                </div>
                                                <div class="form-group"><label class="col-sm-4 control-label" > الجوال </label>
                                                    <div class="col-sm-8"><input type="text" name="mobile"  class="form-control"></div>
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-success" >حفظ </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end-up-add-->
                <!--start-up-change-->
                <div class="modal inmodal" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="ibox-content modal-content animated bounceInRight">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="ibox float-e-margins">
                                        <div class="col-sm-12">
                                            <h4 class="text-center"> تعديل  عميل</h4>

                                            <form action="" method="post" class="form-horizontal" id="editform">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('PUT')); ?>

                                                <div class="form-group"><label class="col-sm-4 control-label">الاسم</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="name" id="name" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group"><label class="col-sm-4 control-label" > الجوال </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" value="" name="mobile" id="mobile"  class="form-control">
                                                    </div>
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-success" > تعديل </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end-up-change-->
                <!--start-up-stop-->
                <div class="modal inmodal" id="stopModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content  animated bounceInRight"  aria-hidden="true" style=" padding: 1em;">
                            <form action=""  method="post" class="form-horizontal" id="stopform">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('PUT')); ?>

                            <p id="my_text"></p>
                            <input type="hidden" name="status" id="my_status">
                            <button type="submit"class="btn btn-danger" id="stopSubmit">نعم</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end-up-stop-->
                <!--start-end-->
                <div class="ibox float-e-margins">
                    <div class="ibox-title text-center ">
                        <?php echo e($clients->onEachSide(1)->appends(Request::capture()->except('page'))->render()); ?>

                    </div>
                </div>
                <!--end-end-->
            </div>
        </div>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            $(".edit").click(function () {
                /* get data from button */
                var id = $(this).data("my_id")
                var name = $(this).data("my_name")
                var mobile = $(this).data("my_mobile");


                /* set data to inputs of modal */
                $("#name").val(name);
                $("#mobile").val(mobile);

                /* open the modal */
                $('#editModal').modal('show');
                /* set action attribute to new url */
                $('#editform').attr('action', '<?php echo e(url("/admin/client")); ?>'+'/'+id);


            });
            ///////////////////stop/////////////////////////

            $(".stop").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                var status = $(this).data("status");
                /* set action attribute to new url */
                $('#stopform').attr('action', '<?php echo e(url("admin/stopclient")); ?>' + '/' + id );
                $('#my_status').val(status);
                if (status == 'stop'){
                    $('#my_text').empty().text('هل انت متاكد من الايقاف');
                }else {
                    $('#my_text').empty().text('هل انت متاكد من عدم الايقاف');
                }

                /* open the modal */
                $('#stopModal').modal('show');
            });

            // $(document).on("click","#stopSubmit",function () {
            //     $('#stopform').submit()
            // })
        });
    </script>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\coding\xampp\htdocs\water\resources\views/admins/clients.blade.php ENDPATH**/ ?>