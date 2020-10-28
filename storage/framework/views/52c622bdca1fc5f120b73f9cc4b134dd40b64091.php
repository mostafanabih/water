<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> الشركات</title>


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
                            <div class="col-lg-5">
                                <h5 style="font-size: 30px"> الشركات   </h5>
                            </div>
                            <form class="form-inline" action="">
                                <div class="col-lg-2">

                                    <input type="text" placeholder="ابحث عن شركه  " class="form-control" name="search">

                                </div>
                                <div class="col-lg-1">
                                    <button type="submit" class="btn btn-sm btn-white" style="float: left; font-size: 15px ; margin-left:-12px" >بحث</button>
                                </div>
                            </form>
                            <div class="col-lg-4 text-left">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">اضف</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end-title-->
                <div class="ibox-content">
                <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--start-table-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم الشركه</th>
                                            <th>صورة الشركة</th>
                                            <th>مدن الشركة</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td> <?php echo e($company->name); ?></td>
                                            <td><img src="<?php echo e($company->getImgDisplay()); ?>" alt="company" style="width: 200px;"></td>
                                            <td>
                                                <?php if($company->Cities->count() > 0): ?>
                                                    <ul>
                                                        <?php $__currentLoopData = $company->Cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><?php echo e($city->City->name ?? '-----'); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                <?php else: ?>
                                                    <?php echo e('لا يوجد حتى الأن'); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning update" data-company_id="<?php echo e($company->id); ?>"  data-name="<?php echo e($company->name); ?>" data-mobile="<?php echo e($company->mobile); ?>" data-commercial_register_image="<?php echo e($company->commercial_register_image); ?>" data-image="<?php echo e($company->image); ?>" data-email="<?php echo e(($company->responsible)?$company->responsible->email : "--"); ?>" data-mobile2="<?php echo e(($company->responsible) ? $company->responsible->mobile:"--"); ?>" data-user_name="<?php echo e(($company->responsible)?$company->responsible->user_name:"--"); ?>" data-name2="<?php echo e(($company->responsible)?$company->responsible->name:"--"); ?>"  >تعديل</button>
                                                <button type="button" class="btn btn-success change" data-my_id="<?php echo e($company->id); ?>">تغيير كلمه المرور </button>
                                                <a class="btn btn-info" href="<?php echo e(url('admin/order?company_id='.$company->id)); ?>">الطلبات </a>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" ><a href="<?php echo e(url('admin/product/'.$company->id)); ?>" style="color: inherit">المنتجات  </a></button>
                                                <button type="button" class="btn " ><a href="<?php echo e(url('admin/representative/'.$company->id)); ?>" style="color: inherit"> المندوبين</a></button>
                                                <button type="button" class="btn btn-danger stop" data-my_id="<?php echo e($company->id); ?>" data-status="<?php if($company->active == 'not_active'): ?><?php echo e('active'); ?><?php else: ?><?php echo e('not_active'); ?><?php endif; ?>"><?php if($company->active == 'not_active'): ?><?php echo e('تفعيل'); ?><?php else: ?><?php echo e('ايقاف'); ?><?php endif; ?></button>
                                                <button type="button" class="btn btn-danger delete" data-my_id="<?php echo e($company->id); ?>">حذف</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <div class="modal inmodal" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="delet modal-content animated bounceInRight" style="padding:1em;">
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
                                    <div class="modal inmodal" id="stopModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="delet modal-content animated bounceInRight" style="padding:1em;">
                                                <form action=""  method="post" class="form-horizontal" id="stopform">
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

                    <!--end-table-->
                    <div class="modal inmodal" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="img text-center  modal-content animated bounceInRight" >
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ibox float-e-margins">
                                            <div class="col-sm-12">
                                                <h3>اضافه</h3>
                                                <form action="<?php echo e(route('company.store')); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                    <?php echo e(csrf_field()); ?>

                                                    <h4 class="">بيانات الشركه</h4>
                                                    <div class="form-group"><label class="col-sm-4 control-label">  اسم الشركه </label>
                                                    <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control"></div>
                                                </div>
                                                <div class="form-group"><label class="col-sm-4 control-label">  رقم الجوال  </label>
                                                    <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" name="mobile" value="<?php echo e(old('mobile')); ?>" class="form-control"></div>
                                                </div>

                                                <div class="form-group"><label class="col-sm-6 control-label">  صوره السجل التجارى للشركه  </label>
                                                    <div class="col-sm-6" style="margin-bottom: 1em"><input type="file" name="commercial_register_image"  class="form-control"></div>
                                                </div>
                                                <div class="form-group"><label class="col-sm-6 control-label">  صوره الشركه  </label>
                                                    <div class="col-sm-6" style="margin-bottom: 1em"><input type="file" name="image"  class="form-control"></div>
                                                </div>
                                                    <h4>بيانات المسؤل</h4>
                                                    <div class="form-group"><label class="col-sm-4 control-label">  اسم المسؤل </label>
                                                        <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" name="name2" value="<?php echo e(old('name2')); ?>" class="form-control"></div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-4 control-label">  اسم المستخدم </label>
                                                        <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" name="user_name" value="<?php echo e(old('user_name')); ?>" class="form-control"></div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-4 control-label">  رقم التليفون </label>
                                                        <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" name="mobile" value="<?php echo e(old('mobile')); ?>" class="form-control"></div>
                                                    </div>

                                                    <div class="form-group"><label class="col-sm-4 control-label">  البريد الالكتروني  </label>
                                                        <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" name="email" value="<?php echo e(old('email')); ?>" class="form-control"></div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-4 control-label">  كلمه المرور </label>
                                                        <div class="col-sm-8" style="margin-bottom: 1em"><input type="password" name="password"  class="form-control"></div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-4 control-label">  تاكيد كلمه المرور </label>
                                                        <div class="col-sm-8" style="margin-bottom: 1em"><input type="password" name="password_confirmation"  class="form-control"></div>
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
                <div class="modal inmodal" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="img text-center modal-content animated bounceInRight">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="ibox float-e-margins">
                                        <div class="col-sm-12">
                                            <form action="" method="post" class="form-horizontal" id="editform" enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('PUT')); ?>

                                            <h3>تعديل</h3>
                                                <h4>بيانات الشركه</h4>
                                                <input type="text" id="" name="company_id"  class="hidden">
                                            <div class="form-group"><label class="col-sm-4 control-label">  اسم الشركه </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" id="name" name="name"  class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">  رقم الجوال  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" id="mobile" name="mobile"  class="form-control"></div>
                                            </div>
                                                <div class="form-group"><label class="col-sm-6 control-label">  صوره السجل التجارى للشركه  </label>
                                                    <div class="col-sm-6" style="margin-bottom: 1em"><input type="file" id="commercial_register_image" name="commercial_register_image"  class="form-control"></div>
                                                </div>
                                                <div class="form-group"><label class="col-sm-6 control-label">  صوره الشركه  </label>
                                                    <div class="col-sm-6" style="margin-bottom: 1em"><input type="file" id="image" name="image"  class="form-control"></div>
                                                </div>
                                                <h4>بيانات المسؤل</h4>
                                                <div class="form-group"><label class="col-sm-4 control-label">  اسم المسؤل </label>
                                                    <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" name="name2" id="name2"  class="form-control"></div>
                                                </div>
                                                <div class="form-group"><label class="col-sm-4 control-label">  اسم المستخدم </label>
                                                    <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" id="user_name" name="user_name"  class="form-control"></div>
                                                </div>

                                            <div class="form-group"><label class="col-sm-4 control-label">  البريد الالكتروني  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" name="email" id="email"  class="form-control"></div>
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
                                            <div class="form-group"><label class="col-sm-4 control-label">  كلمه المرور الحاليه   </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="password"  name="old_password" class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">  كلمه المرور الجديده  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="password" name="password"  class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label"> تاكيد كلمه المرور الجديده  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="password" name="password_confirmation"  class="form-control"></div>
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
                <!--start-end-->
                <div class="ibox float-e-margins">
                    <div class="ibox-title text-center ">
                        <?php echo e($companies->onEachSide(1)->appends(Request::capture()->except('page'))->render()); ?>

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
            //////////////////edit///////////////////
            $(".update").click(function () {
                /* get data from button */

                var name = $(this).data("name")
                var mobile = $(this).data("mobile")
                var commercial_register_image = $(this).data("commercial_register_image");
                var image = $(this).data("image");
                var name2 = $(this).data("name2");
                var user_name = $(this).data("user_name");
                var email = $(this).data("email");

                var company_id = $(this).data("company_id");

                /* set data to inputs of modal */

                $("#name").val(name);
                $("#mobile").val(mobile);
                 // $("#commercial_register_image").val(commercial_register_image);
                 // $("#image").val(image);
                $("#name2").val(name2);
                $("#user_name").val(user_name);
                $("#email").val(email);

                $("#company_id").val(company_id);

                /* set action attribute to new url */
                $('#editform').attr('action', '<?php echo e(url("/admin/company")); ?>'+'/'+company_id);


                /* open the modal */
                $('#editModal').modal('show');
            });
            ///////////////////delete/////////////////////////

            $(".delete").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                /* set action attribute to new url */
                $('#deleteform').attr('action', '<?php echo e(url("/admin/company")); ?>' + '/' + id);
                /* open the modal */
                $('#deleteModal').modal('show');
            });
            ////////////////changepassword///////////////////////
            $(".change").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                /* set action attribute to new url */
                $('#changeform').attr('action', '<?php echo e(url("/admin/company-change-password")); ?>' + '/' + id);
                /* open the modal */
                $('#changeModal').modal('show');
            });
            //////////////////////stop////////////////////////
            $(".stop").click(function(){
                /* get data from button */
                var id = $(this).data("my_id");
                var status = $(this).data("status");
                /* set action attribute to new url */
                $('#stopform').attr('action', '<?php echo e(url("admin/stopcompany")); ?>' + '/' + id );
                $('#my_status').val(status);
                if (status == 'not_active'){
                    $('#my_text').empty().text('هل انت متاكد من الايقاف');
                }else {
                    $('#my_text').empty().text('هل انت متاكد من التفعيل');
                }
                /* open the modal */
                $('#stopModal').modal('show');
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\water\resources\views/admins/companies.blade.php ENDPATH**/ ?>