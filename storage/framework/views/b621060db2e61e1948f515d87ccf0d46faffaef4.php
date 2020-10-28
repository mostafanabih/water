<?php $__env->startSection('content1'); ?>
        <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> عرض الشركات </title>
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
                            <div class="col-lg-5">
                                <h3>
                                    <span>المنتجات</span>&nbsp;
                                    <?php if($comp): ?>
                                        <span style="color: red ;">لشركة (<?php echo e($comp->name); ?>)</span>
                                    <?php endif; ?>
                                </h3>
                            </div>

                            <form class="form-inline" action="">
                                <div class="col-lg-2">

                                    <input type="text" placeholder="ابحث عن منتج  " class="form-control" name="search">

                                </div>
                                <div class="col-lg-1">
                                    <button type="submit" class="btn btn-sm btn-white" style="float: left; font-size: 15px ; margin-left:-12px" >بحث</button>
                                </div>
                            </form>
                            <div class="col-lg-4 text-left">
                                
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
                                    <table class=" table table-bordered" >
                                        <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>اسم المنتج  </th>
                                            <th>الحجم</th>
                                            <th>السعر  العادى</th>
                                            <th>سعر العروض </th>
                                            <th>سعر المساجد و الجمعيات الخيريه </th>
                                            <th> العمليات </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($product->name); ?> </td>
                                            <td> <?php echo e($product->size); ?></td>
                                            <td><?php echo e($product->normal_price); ?></td>
                                            <td><?php echo e($product->offer_price); ?></td>
                                            <td><?php echo e($product->mosque_price); ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success edit"
                                                        data-my_id="<?php echo e($product->id); ?>"
                                                        data-name="<?php echo e($product->name); ?>"
                                                        data-size="<?php echo e($product->size); ?>"
                                                        data-offer="<?php echo e($product->offer); ?>"
                                                        data-normal="<?php echo e($product->normal); ?>"
                                                        data-mosque="<?php echo e($product->mosque); ?>"
                                                        data-normal_price="<?php echo e($product->normal_price); ?>"
                                                        data-offer_price="<?php echo e($product->offer_price); ?>"
                                                        data-mosque_price="<?php echo e($product->mosque_price); ?>">تعديل</button>
                                                <button type="button" class="btn btn-danger delete" data-my_id="<?php echo e($product->id); ?>">حذف</button>

                                            </td>
                                        </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end-table-->
                    <!--start-up-add-->
                    <div class="modal inmodal" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="ibox-content modal-content animated bounceInRight"  >
                                <div class="ibox float-e-margins">
                                    <div class="col-sm-12">
                                        <h5 class="text-center">اضافه  منتج</h5>
                                        <form action="<?php echo e(route('product.store')); ?>" method="post" class="form-horizontal">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="form-group"><label class="col-sm-4 control-label">اسم المنتج</label>
                                                <div class="col-sm-8"><input type="text" name="name" class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">الحجم</label>
                                                <div class="col-sm-8"><input type="text" name="size" class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">السعر</label>
                                                <div class="col-sm-8"><input type="text" name="normal_price" class="form-control col-sm-8" placeholder="السعر "></div>
                                            </div>

                                            <div class="form-group"> <label class="col-sm-3 control-label"> عروض</label> <input type="checkbox" name="offer" class="col-sm-3 control-label"></input>
                                                <div class="col-sm-6"><label class="col-sm-4 control-label">سعر العرض</label><input type="text" name="offer_price" class="form-control col-sm-8" placeholder="السعر "></div>
                                            </div>

                                            <div class="form-group"> <label class="col-sm-4 control-label"> مساجد و جمعيات خيريه </label> <input type="checkbox" name="mosque" class="col-sm-3 control-label"></input>
                                                <div class="col-sm-5"><label class="col-sm-4 control-label">السعر</label><input type="text" name="mosque_price" class="form-control col-sm-8" placeholder="السعر "></div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success">حفظ</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end-up-add-->
                    <!--start-up-update-->
                    <div class="modal inmodal" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="ibox-content modal-content animated bounceInRight"  >
                                <div class="ibox float-e-margins">
                                    <div class="col-sm-12">
                                        <h5 class="text-center"> تعديل منتج</h5>
                                        <form method="post" class="form-horizontal" id="editform">
                                            <?php echo csrf_field(); ?>
                                            <?php echo e(method_field('PUT')); ?>

                                            <div class="form-group"><label class="col-sm-4 control-label">اسم المنتج</label>
                                                <div class="col-sm-8"><input type="text" name="name" id="name" class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">الحجم</label>
                                                <div class="col-sm-8"><input type="text" name="size" id="size" class="form-control"></div>
                                            </div>
                                            <div class="form-group"> <label class="col-sm-3 control-label"> عادى </label> <input type="checkbox" id="normal" name="normal" value="1" class="col-sm-3 control-label"></input>
                                                <div class="col-sm-6"><label class="col-sm-4 control-label">السعر</label><input type="text" name="normal_price" id="normal_price" class="form-control col-sm-8" placeholder="السعر "></div>
                                            </div>
                                            <div class="form-group"> <label class="col-sm-3 control-label"> عروض</label>
                                                <input type="checkbox" class="col-sm-3 control-label" name="offer" value="1"  id="offer" />
                                                <div class="col-sm-6"><label class="col-sm-4 control-label">السعر</label>
                                                    <input type="text" name="offer_price" id="offer_price" class="form-control col-sm-8" placeholder="السعر "></div>
                                            </div>

                                            <div class="form-group"> <label class="col-sm-4 control-label"> مساجد و جمعيات خيريه </label> <input type="checkbox" name="mosque" value="1" id="mosque" class="col-sm-3 control-label"></input>
                                                <div class="col-sm-5"><label class="col-sm-4 control-label">السعر</label><input type="text" name="mosque_price" id="mosque_price" class="form-control col-sm-8" placeholder="السعر "></div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success">حفظ</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end-up-update-->
                    <!--start-up-change-->
                    <div class="modal inmodal" id="change" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="ibox-content modal-content animated bounceInRight"  >
                                <div class="col-sm-6 ">
                                    <h5 class="text-center">اكوافينا</h5>
                                    <form method="get" class="form-horizontal">
                                        <div class="form-group"><label class="col-sm-4 control-label">Normal</label>
                                            <div class="col-sm-6"><input type="text" class="form-control"></div><strong class="col-sm-2">%</strong>
                                        </div>
                                    </form>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-warning text-center"> ">حفظ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end-up-change-->
                    <!--start-delet-->
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
                    <!--end-delet-->
                    <!--start-stop-->
                    <div class="modal inmodal" id="stop" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="delet modal-content animated bounceInRight" style="padding: 1em">
                                <p>هل انت متاكد من الغاء العرض</p>
                                <button type="button" class="btn btn-danger">نعم</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>
                            </div>
                        </div>
                    </div>
                    <!--end-stop-->
                </div>
                <!--start-end-->
                <div class="ibox float-e-margins">
                    <div class="ibox-title text-center ">
                        <?php echo e($products->onEachSide(1)->appends(Request::capture()->except('page'))->render()); ?>

                    </div>
                </div>
                <!--end-end-->
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
                var id = $(this).data("my_id")
                var name = $(this).data("name")
                var size = $(this).data("size")
                var normal_price = $(this).data("normal_price");
                var offer_price = $(this).data("offer_price");
                var mosque_price = $(this).data("mosque_price");
                var offer = $(this).data("offer");
                var normal = $(this).data("normal");
                var mosque = $(this).data("mosque");

                /* set data to inputs of modal */

                $("#name").val(name);
                $("#size").val(size);
                $("#normal_price").val(normal_price);
                $("#offer_price").val(offer_price);

                if (offer == 1){
                    $("#offer").prop('checked',true);
                }
                else {
                    $("#offer").prop('checked',false);
                }
                if (normal == 1){
                    $("#normal").prop('checked',true);
                }
                else {
                    $("#normal").prop('checked',false);
                }
                if (mosque == 1){
                    $("#mosque").prop('checked',true);
                }
                else {
                    $("#mosque").prop('checked',false);
                }


                $("#mosque_price").val(mosque_price);


                /* set action attribute to new url */
                $('#editform').attr('action', '<?php echo e(url("/admin/product")); ?>' + '/' + id);

                /* open the modal */
                $('#editModal').modal('show');
            });
            ///////////////////delete/////////////////////////

            $(".delete").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                /* set action attribute to new url */
                $('#deleteform').attr('action', '<?php echo e(url("/admin/product")); ?>' + '/' + id);
                /* open the modal */
                $('#deleteModal').modal('show');
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admins.extends.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\coding\xampp\htdocs\water\resources\views/admins/products.blade.php ENDPATH**/ ?>