<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> الكوبونات </title>

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
                            <div class="col-lg-4">
                                <h5 style="font-size: 30px"> كوبونات   </h5>
                            </div>
                            <form class="form-inline" action="">
                                <div class="col-lg-2">

                                    <input value="<?php echo e(request('search')); ?>" type="text" placeholder="ابحث عن كوبون  " class="form-control" name="search">

                                </div>
                                <div class="col-lg-1">
                                    <button type="submit" class="btn btn-sm btn-white" style="float: left; font-size: 15px ; margin-left:-12px" >بحث</button>
                                </div>
                            </form>
                            <div class="col-lg-4 text-left">
                                <button type="submit" class="btn  btn-success" data-toggle="modal" data-target="#add" >اضافه كوبون </button>
                            </div>
                        </div>
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
                                            <th>كود  الكوبون</th>
                                            <th> اسم الشركه    </th>
                                            <th>نسبه الخصم  </th>
                                            <th>من </th>
                                            <th>الى </th>
                                            <th>العمليات  </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $coupones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($coupone->code); ?></td>
                                            <td><?php echo e(($coupone->company)? $coupone->company->name:"--"); ?> </td>
                                            <td> <?php echo e($coupone->percentage); ?></td>
                                            <td> <?php echo e($coupone->date_from); ?></td>
                                            <td> <?php echo e($coupone->date_to); ?></td>
                                            <td>
                                                <button class="btn btn-info edit"
                                                        data-my_id="<?php echo e($coupone->id); ?>"
                                                        data-code="<?php echo e($coupone->code); ?>"
                                                        data-percentage="<?php echo e($coupone->percentage); ?>"
                                                        data-date_from="<?php echo e($coupone->date_from); ?>"
                                                        data-date_to="<?php echo e($coupone->date_to); ?>"
                                                        data-company_id="<?php echo e($coupone->company_id); ?>">تعديل </button>
                                                <button type="button" class="btn btn-danger delete" data-my_id="<?php echo e($coupone->id); ?>">حذف</button>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal inmodal" id="add" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="ibox-content modal-content animated bounceInRight" >
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="ibox float-e-margins">
                                <div class="col-sm-12">
                                    <h4 class="text-center"> اضافه كوبون</h4>
                                    <form action="<?php echo e(route('coupon.store')); ?>" method="post" class="form-horizontal">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="form-group"><label class="col-sm-4 control-label">رقم الكوبون </label>
                                            <div class="col-sm-8"><input type="text" name="code" id ="" class="form-control"></div>
                                        </div>

                                        <div class="form-group"><label class="col-sm-4 control-label">اسم الشركه  </label>
                                            <div class="col-sm-8">
                                                <select name="company_id" id="" class="form-control">
                                                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-4 control-label">نسبه الخصم  </label>
                                            <div class="col-sm-8"><input type="text" name="percentage" id ="" class="form-control"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-4 control-label">من  </label>
                                            <div class="col-sm-8"><input type="date" name="date_from" id ="" class="form-control"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-4 control-label">الي  </label>
                                            <div class="col-sm-8"><input type="date" name="date_to" id ="" class="form-control"></div>
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

        <div class="modal inmodal" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="ibox-content modal-content animated bounceInRight" >
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="ibox float-e-margins">
                                <div class="col-sm-12">
                                    <h4 class="text-center"> تعديل   كوبون</h4>
                                    <form action="" method="post" class="form-horizontal" id="editform">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('PUT')); ?>

                                        <div class="form-group"><label class="col-sm-4 control-label">كود الكوبون </label>
                                            <div class="col-sm-8"><input type="text" name="code" id ="code" class="form-control"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-4 control-label">اسم الشركه  </label>
                                            <div class="col-sm-8">
                                                <select name="company_id" id="my_company_id" class="form-control">
                                                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-4 control-label">نسبه الخصم  </label>
                                            <div class="col-sm-8"><input type="text" name="percentage" id ="percentage" class="form-control"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-4 control-label"> من   </label>
                                            <div class="col-sm-8"><input type="text" name="date_from" id ="date_from" class="form-control"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-4 control-label"> الي    </label>
                                            <div class="col-sm-8"><input type="text" name="date_to" id ="date_to" class="form-control"></div>
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
        <div class="ibox float-e-margins">
            <div class="ibox-title text-center ">
                <?php echo e($coupones->onEachSide(1)->appends(Request::capture()->except('page'))->render()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            //////////////////edit///////////////////
            $(".edit").click(function () {
                /* get data from button */
                var id = $(this).data("my_id")
                var code = $(this).data("code")
                var percentage = $(this).data("percentage")
                var date_from = $(this).data("date_from");
                var date_to = $(this).data("date_to");

                var company_id = $(this).data("company_id");

                /* set data to inputs of modal */

                $("#code").val(code);
                $("#percentage").val(percentage);
                $("#date_from").val(date_from);
                $("#date_to").val(date_to);

                $("#my_company_id").val(company_id);

                /* set action attribute to new url */
                $('#editform').attr('action', '<?php echo e(url("/admin/coupon")); ?>'+'/'+id);

                /* open the modal */
                $('#editModal').modal('show');
            });
            ///////////////////delete/////////////////////////

            $(".delete").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                /* set action attribute to new url */
                $('#deleteform').attr('action', '<?php echo e(url("/admin/coupon")); ?>' + '/' + id);
                /* open the modal */
                $('#deleteModal').modal('show');
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\water\resources\views/admins/coupones.blade.php ENDPATH**/ ?>