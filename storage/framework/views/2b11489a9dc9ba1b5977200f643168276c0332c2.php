<?php $__env->startSection('title'); ?>
    Main Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="wrapper wrapper-content">
        <form action="<?php echo e(url('company/mydata/'.$company->id)); ?>" method="post" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 style="font-size: 30px"> تعديل بياناتي</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="img text-center" >
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="ibox float-e-margins">
                                            <input class="hidden" name="company_id" value="<?php echo e(auth()->guard('company')->user()->company_id); ?>">
                                            <div class="col-sm-12">
                                                <div class="form-group"><label class="col-sm-4 control-label">الاسم </label>
                                                    <div class="col-sm-8"><input type="text" name="name" class="form-control" value="<?php echo e($company->name); ?>" style="margin-bottom: 1em"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group"><label class="col-sm-4 control-label">الجوال</label>
                                                    <div class="col-sm-8"><input type="text" name="mobile" value="<?php echo e($company->mobile); ?>" class="form-control"style="margin-bottom: 1em"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group"><label class="col-sm-4 control-label">كلمه المرور</label>
                                                    <div class="col-sm-8"><input type="password" name="password" class="form-control"style="margin-bottom: 1em"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group"><label class="col-sm-4 control-label">تاكيد كلمه المرور</label>
                                                    <div class="col-sm-8"><input type="password" name="password_confirmation" class="form-control"style="margin-bottom: 1em"></div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">

                            <div class="form-group col-sm-2">
                                <label class=" control-label">  ايام العمل </label>
                            </div>

                            <div class="form-group col-sm-3">
                                <div>  <label><input type="checkbox" name="days[]" value="saturday" <?php if(in_array('saturday', $comp_days)): ?> <?php echo e('checked'); ?> <?php endif; ?>> السبت</label></div>
                                <div>  <label><input type="checkbox" name="days[]" value="sunday" <?php if(in_array('sunday', $comp_days)): ?> <?php echo e('checked'); ?> <?php endif; ?>> الاحد</label></div>
                                <div>  <label><input type="checkbox" name="days[]" value="monday" <?php if(in_array('monday', $comp_days)): ?> <?php echo e('checked'); ?> <?php endif; ?> > الاثنين </label></div>
                                <div>  <label><input type="checkbox" name="days[]" value="tuesday" <?php if(in_array('tuesday', $comp_days)): ?> <?php echo e('checked'); ?> <?php endif; ?> > الثلاثاء</label></div>
                                <div>  <label><input type="checkbox" name="days[]" value="wednesday" <?php if(in_array('wednesday', $comp_days)): ?> <?php echo e('checked'); ?> <?php endif; ?> > الاربعاء</label></div>
                                <div>  <label><input type="checkbox" name="days[]" value="thursday" <?php if(in_array('thursday', $comp_days)): ?> <?php echo e('checked'); ?> <?php endif; ?>> الخميس </label></div>
                                <div>  <label><input type="checkbox" name="days[]" value="friday" <?php if(in_array('friday', $comp_days)): ?> <?php echo e('checked'); ?> <?php endif; ?> > الجمعه  </label></div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label class=" control-label">فتره العمل  </label>
                            </div>
                            <div class="form-group col-sm-2">
                                <label> من <input type="time" name="from_time" value="<?php echo e($from_time); ?>"> </label>
                            </div>
                            <div class="form-group col-sm-3">
                                <label> الي <input type="time" name="to_time" value="<?php echo e($to_time); ?>">  </label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title text-center ">
                        <button type="submit" class="btn btn-warning" >حفظ</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#stop">الغاء </button>
                    </div>
                </div>
            </div>
        </div>
    
        
            
                
                
                
            
        

    
        </form>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('company.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\coding\xampp\htdocs\water\resources\views/company/myinformation/index.blade.php ENDPATH**/ ?>