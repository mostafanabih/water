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
                                <h5 style="font-size: 30px"> المنتجات</h5>
                            </div>
                            <form class="form-inline" action="">
                                <div class="col-lg-2">

                                    <input value="<?php echo e(request('search') ?? ''); ?>" type="search" name="search"
                                           placeholder="ابحث عن منتج معين   "
                                           class="form-control">

                                </div>
                                <div class="col-lg-1">
                                    <button type="submit" class="btn btn-sm btn-white"
                                            style="float: left; font-size: 15px ; margin-left:-12px">بحث
                                    </button>
                                </div>
                            </form>
                            <div class="col-lg-4 text-left">
                                <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#add">اضف
                                    جديد
                                </button>
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
                                    <table class=" table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم المنتج</th>
                                            <th>الصوره</th>
                                            <th>السعر العادى</th>
                                            <th>سعر العروض</th>
                                            <th>سعر المساجد و الجمعيات الخيريه</th>
                                            <th> العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>1</td>
                                                <td> <?php echo e($product->name); ?> </td>
                                                <td><img src="<?php echo e($product->getImgDisplay()); ?>" width="100" height="100"/>
                                                </td>
                                                <td> <?php echo e(($product->normal_price > 0) ? $product->normal_price : '-----'); ?> </td>
                                                <td> <?php echo e(($product->mosque_price > 0) ? $product->mosque_price : '-----'); ?> </td>
                                                <td> <?php echo e(($product->offer_price > 0) ? $product->offer_price : '-----'); ?> </td>
                                                <td>
                                                    <button type="button" class="btn btn-success edit_btn"
                                                            data-image="<?php echo e($product->getImgDisplay()); ?>"
                                                            data-name="<?php echo e($product->name); ?>"
                                                            data-mosque-price="<?php echo e($product->mosque_price); ?>"
                                                            data-mosque="<?php echo e($product->mosque); ?>"
                                                            data-offer-price="<?php echo e($product->offer_price); ?>"
                                                            data-offer="<?php echo e($product->offer); ?>"
                                                            data-id="<?php echo e($product->id); ?>"

                                                            data-normal-price="<?php echo e($product->normal_price); ?>"
                                                            data-normal="<?php echo e($product->normal); ?>"

                                                            data-size="<?php echo e($product->size); ?>"
                                                            >تعديل
                                                    </button>
                                                    

                                                    <form action="<?php echo e(route('products.destroy', $product->id)); ?>"
                                                          method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        

                                                        
                                                        
                                                        
                                                        
                                                        <button type="submit"
                                                                onclick="return confirm(' هل تريد المسح ؟ ')"
                                                                class="no-btn btn btn-danger"> حذف
                                                        </button>
                                                    </form>
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
                    <div class="ibox-title">
                        <!--start-up-add-->
                        <div class="modal inmodal" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="ibox-content modal-content animated bounceInRight">
                                    <div class="ibox float-e-margins">
                                        <div class="col-sm-12">
                                            <h4 class="text-center">اضافه منتج</h4>

                                            <form method="post" action="<?php echo e(route('products.store')); ?>"
                                                  class="form-horizontal" enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">اسم المنتج</label>

                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="name"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">حجم المنتج</label>

                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="size"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">الصوره </label>

                                                    <div class="col-sm-8">
                                                        <input type="file" class="form-control" name="image"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label"> عادى </label>
                                                    <input type="checkbox" class="col-sm-2 control-label" name="normal"
                                                           value="1"/>

                                                    <div class="col-sm-6"><label
                                                                class="col-sm-4 control-label">السعر</label>
                                                        <input type="text" class="form-control col-sm-8"
                                                               placeholder="السعر " name="normal_price">
                                                    </div>
                                                </div>
                                                <div class="form-group"><label class="col-sm-4 control-label">
                                                        عروض</label>
                                                    <input type="checkbox" class="col-sm-2 control-label" name="offer"
                                                           value="1"/>

                                                    <div class="col-sm-6">
                                                        <label class="col-sm-4 control-label">السعر</label>
                                                        <input type="text" class="form-control col-sm-8"
                                                               placeholder="السعر " name="offer_price"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label"> مساجد و جمعيات خيريه </label>
                                                    <input type="checkbox" class="col-sm-2 control-label" name="mosque"
                                                           value="1"/>

                                                    <div class="col-sm-6">
                                                        <label class="col-sm-4 control-label">السعر</label>
                                                        <input type="text" class="form-control col-sm-8"
                                                               placeholder="السعر " name="mosque_price">
                                                    </div>
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
                        <div class="modal inmodal" id="update" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="ibox-content modal-content animated bounceInRight">
                                    <div class="ibox float-e-margins">
                                        <div class="col-sm-12">
                                            <h4 class="text-center"> تعديل منتج</h4>

                                            <form method="post" class="form-horizontal" id="editform"
                                                  enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('PUT')); ?>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">اسم المنتج</label>

                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="name" id="name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">حجم المنتج</label>

                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="size" id="size">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12 text-center" id="product_image"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">الصوره </label>

                                                    <div class="col-sm-8"><input type="file" class="form-control"
                                                                                 name="file" id="file"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">
                                                        عادى
                                                    </label>
                                                    <input type="checkbox" class="col-sm-2 control-label" id="normal"
                                                           name="normal"/>

                                                    <div class="col-sm-6">
                                                        <label class="col-sm-4 control-label">السعر</label>
                                                        <input type="text" class="form-control col-sm-8"
                                                               id="normal_price" name="normal_price"
                                                               placeholder="السعر ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">
                                                        عروض</label>
                                                    <input type="checkbox" class="col-sm-2 control-label" id="offer"/>

                                                    <div class="col-sm-6">
                                                        <label class="col-sm-4 control-label">السعر</label>
                                                        <input type="text" class="form-control col-sm-8"
                                                               name="offer_price" id="offer_price" placeholder="السعر ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">
                                                        مساجد و

                                                        جمعيات خيريه </label>
                                                    <input type="checkbox" name="mosque" class="col-sm-2 control-label"
                                                           id="mosque"/>

                                                    <div class="col-sm-6">
                                                        <label class="col-sm-4 control-label">السعر</label>
                                                        <input type="text" class="form-control col-sm-8"
                                                               placeholder="السعر " id="mosque_price"
                                                               name="mosque_price">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-success">
                                                        حفظ
                                                    </button>
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
                                <div class="ibox-content modal-content animated bounceInRight">
                                    <div class="col-sm-6 ">
                                        <h5 class="text-center">اكوافينا</h5>

                                        <form method="get" class="form-horizontal">
                                            <div class="form-group"><label class="col-sm-4 control-label">Normal</label>

                                                <div class="col-sm-6"><input type="text" class="form-control"></div>
                                                <strong class="col-sm-2">%</strong>
                                            </div>
                                        </form>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-warning text-center"> حفظ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end-up-change-->
                        <!--start-delet-->
                        <div class="modal inmodal" id="delet" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="delet modal-content animated bounceInRight" style="padding: 1em">
                                    <p>هل انت متاكد من الحذف</p>
                                    <button type="button" class="btn btn-danger">نعم</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>
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
                            <?php echo $products->links(); ?>

                        </div>
                    </div>
                    <!--end-end-->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(".edit_btn").click(function (e) {
//            alert("DFdfdf")
            e.preventDefault();
            let image = $(this).data('image'),
                    offerPrice = $(this).data('offer-price'),
                    offer = $(this).data('offer'),
                    normalPrice = $(this).data('normal-price'),
                    normal = $(this).data('normal'),
                    mosquePrice = $(this).data('mosque-price'),
                    mosque = $(this).data('mosque'),
                    id = $(this).data('id'),
                    name = $(this).data('name'),
                    size = $(this).data('size');


            $("#product_image").empty().append('<img src="' + image + '" class="center-block img-preview-sm img-responsive" >');

            $("#name").val(name);
            $("#size").val(size);
            $("#normal").val(normal);
            $("#offer").val(offer);
            $("#mosque").val(mosque);
            $("#normal_price").val(normalPrice);
            $("#mosque_price").val(mosquePrice);
            $("#offer_price").val(offerPrice);


            if (offer == 1) {
                $("#offer").prop("checked", true);
            } else {
                $("#offer").prop("checked", false);
            }
            if (normal == 1) {
                $("#normal").prop("checked", true);
            } else {
                $("#normal").prop("checked", false);
            }

            if (mosque == 1) {
                $("#mosque").prop("checked", true);
            } else {
                $("#mosque").prop("checked", false);
            }


            $('#editform').attr('action', '<?php echo e(url("company/products")); ?>' + '/' + id);


            $("#update").modal('show');

        })
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('company.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\water\resources\views/company/products/index.blade.php ENDPATH**/ ?>