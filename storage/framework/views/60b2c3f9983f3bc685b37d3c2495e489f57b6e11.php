<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> المستخدمين</title>

    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/bootstrap.rtl.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/new-stylel.css')); ?>" rel="stylesheet">

</head>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content2'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title ">
                    <div class="row">
                        <div class="col-lg-4">
                            <h5 style="font-size: 30px"> المستخدمين  </h5>
                        </div>
                        <form class="form-inline" action="">
                            <div class="col-lg-2">

                                <input type="text" placeholder="ابحث عن مستخدم  " class="form-control" name="search">

                            </div>
                            <div class="col-lg-1">
                                <button type="submit" class="btn btn-sm btn-white" style="float: left; font-size: 15px ; margin-left:-12px" >بحث</button>
                            </div>
                        </form>
                        <div class="col-lg-5 text-center">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">اضافه </button>
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
                                        <th>#</th>
                                        <th> الاسم  </th>
                                        <th>البريد الالكتروني  </th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td> <?php echo e($user->email); ?></td>
                                        <td>
                                            <button type="button" class="btn btn-info edit" data-my_id="<?php echo e($user->id); ?>" data-name="<?php echo e($user->name); ?>" data-email="<?php echo e($user->email); ?>" data-mobile="<?php echo e($user->mobile); ?>">تعديل</button>
                                            <button type="button" class="btn btn-success change" data-my_id="<?php echo e($user->id); ?>">تغيير كلمه المرور</button>
                                            <?php if(auth()->guard('admin')->user()->role_id == 1 and $user->id != auth()->guard('admin')->id()): ?>
                                                <button type="button" class="btn btn-danger delete" data-my_id="<?php echo e($user->id); ?>">حذف</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <div class="modal inmodal" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="delet modal-content animated bounceInRight" style="padding: 1em">
                                            <p>هل انت متاكد من الحذف</p>
                                            <form action="" method="post" id="deleteform">
                                                <?php echo csrf_field(); ?>
                                                <?php echo e(method_field('DELETE')); ?>

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
                <div class="modal inmodal" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="img text-center modal-content animated bounceInRight"   >
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="ibox float-e-margins  ">
                                        <div class="col-sm-12">
                                            <form action="<?php echo e(route('user.store')); ?>" method="post">
                                                <?php echo csrf_field(); ?>

                                            <h3>اضافه</h3>
                                            <div class="form-group"><label class="col-sm-4 control-label">الاسم  </label>
                                                <div class="col-sm-8"style="margin-bottom: 1em"><input name="name" type="text" value="<?php echo e(old('name')); ?>" class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label" > البريد الالكتروني   </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input name="email" type="text" value="<?php echo e(old('email')); ?>" class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label" >الهاتف</label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input name="mobile" type="tel" value="<?php echo e(old('mobile')); ?>" class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">  كلمه المرور  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input name="password" type="password"  class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">  تاكيد كلمه المرور  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input name="password_confirmation" type="password"  class="form-control"></div>
                                            </div>
                                            <div class="text-center" style="margin-right: 1em">
                                                <button type="submit" class="btn btn-success">حفظ</button>
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
                        <div class="img text-center modal-content animated bounceInRight"   >
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="ibox float-e-margins  ">
                                        <div class="col-sm-12">
                                            <form action=""  method="post" class="form-horizontal" id="editform">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('PUT')); ?>

                                            <h3>تعديل </h3>
                                            <div class="form-group"><label class="col-sm-4 control-label">الاسم  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" name="name" id="name"  class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label" > البريد الالكتروني   </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" name="email" id="email"  class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label" >الهاتف</label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="tel" name="mobile" id="mobile"  class="form-control"></div>
                                            </div>

                                            <div class="text-center" style="margin-right: 1em">
                                                <button type="submit" class="btn btn-success">حفظ</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal inmodal" id="changeModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="img text-center modal-content animated bounceInRight" >
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="ibox float-e-margins">
                                        <div class="col-sm-12">
                                            <form action=""  method="post" class="form-horizontal" id="changeform">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('PUT')); ?>

                                            <h3>تغير كلمه المرور</h3>
                                            <div class="form-group"><label class="col-sm-4 control-label">  كلمه المرور  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input name="password" type="password"  class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">  تاكيد كلمه المرور  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input name="password_confirmation" type="password"  class="form-control"></div>
                                            </div>
                                            <div class="text-center" style="margin-right: 1em">
                                                <button type="submit" class="btn btn-success">حفظ</button>
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
            <div class="ibox float-e-margins">
                <div class="ibox-title text-center ">
                    <?php echo e($users->onEachSide(1)->appends(Request::capture()->except('page'))->render()); ?>

                </div>
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
                var id = $(this).data("my_id");
                var name = $(this).data("name");
                var email = $(this).data("email");
                var mobile = $(this).data("mobile");



                /* set data to inputs of modal */

                $("#name").val(name);
                $("#email").val(email);
                $("#mobile").val(mobile);


                /* set action attribute to new url */
                $('#editform').attr('action', '<?php echo e(url("/admin/user")); ?>' + '/' + id);

                /* open the modal */
                $('#editModal').modal('show');
            });
            ///////////////////delete/////////////////////////

            $(".delete").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                /* set action attribute to new url */
                $('#deleteform').attr('action', '<?php echo e(url("/admin/user")); ?>' + '/' + id);
                /* open the modal */
                $('#deleteModal').modal('show');
            });

            //////////////////changepassword//////////////////
            $(".change").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                /* set action attribute to new url */
                $('#changeform').attr('action', '<?php echo e(url("/admin/user-change-password")); ?>' + '/' + id);
                /* open the modal */
                $('#changeModal').modal('show');
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\water\resources\views/admins/users.blade.php ENDPATH**/ ?>