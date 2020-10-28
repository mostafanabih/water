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
                            <div class="col-lg-4">
                                <h5 style="font-size: 30px"> الطلبات  </h5>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="ibox-title ">
                    <div  style="padding:1em;border: 2px solid #66afe9; margin-bottom: 1em ; " >
                        <form >
                        <div class="ibox float-e-margins">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="col-sm-5 control-label">  رقم الطلب  </label>
                                    <input type="text" class="col-sm-7 form-control" placeholder="اكتب رقم الطلب" name="id" />
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-sm-4 control-label">  من  </label>
                                    <input type="date" class="col-sm-8 form-control" placeholder="1-1-2019" name="from" />
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-sm-4 control-label">  الى  </label>
                                    <input type="date" class="col-sm-8 form-control" placeholder="20-1-2020" name="to">
                                </div>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="col-sm-4 control-label">  طريقه الدفع    </label>
                                    <select class="col-sm-8 form-control" name="payment">
                                        <option value="">كل الطرق</option>
                                        <option value="visa" <?php if(request('payment') == 'visa'): ?><?php echo e('selected'); ?><?php endif; ?>>فيزا كارت</option>
                                        <option value="on_deliver" <?php if(request('payment') == 'on_deliver'): ?><?php echo e('selected'); ?><?php endif; ?>>عند الوصول  </option>
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <label class="col-sm-4 control-label">  العميل  </label>
                                    <select class="col-sm-8 form-control" name="client_id">
                                        <option value=""> كل العملاء</option>
                                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($client->id); ?>">  <?php echo e($client->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="ibox float-e-margins">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="col-sm-4 control-label">  حاله الطلب  </label>
                                    <select class="col-sm-8 form-control" name="status">
                                        <option value="">كل الحالات</option>
                                        <option value="wait" <?php if(request('status') == 'wait'): ?><?php echo e('selected'); ?><?php endif; ?>>قيد لانتظار</option>
                                        <option value="process" <?php if(request('status') == 'process'): ?><?php echo e('selected'); ?><?php endif; ?>>جارى التنفيذ</option>
                                        <option value="done"  <?php if(request('status') == 'done'): ?><?php echo e('selected'); ?><?php endif; ?>>تم الاستلام </option>
                                        <option value="cancel"  <?php if(request('status') == 'cancel'): ?><?php echo e('selected'); ?><?php endif; ?>>ملغى</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                            

                                
                                    
                                    
                                        
                                        
                                        
                                    
                                
                                
                                    
                                    
                                
                            
                        
                        

                                
                                    
                                    
                                        
                                        
                                        
                                    
                                


                        
                        <div class="row">
                            <div class="col-lg-12 text-center " style="margin-top: 2em">
                                <button type="submit" class="btn btn-info" style="font-size: 20px">بحث</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h4>عرض الطلبات الحاليه   </h4>
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
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th> اسم العميل  </th>
                                <th>الكميه  </th>
                                <th>  طريقه الدفع    </th>
                                <th>  معاد التسليم     </th>
                                <th> حاله الطلب    </th>
                                <th>  العمليات     </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currentorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($currentorder->id); ?></td>
                                <td><?php echo e($currentorder->Client->name); ?>  </td>
                                <td><?php echo e($currentorder->Product->sum('quantity')); ?></td>
                                <td><?php echo e($currentorder->payment_way); ?> </td>
                                <td><?php echo e($currentorder->done_time ??'لا يوجد ميعاد محدد'); ?></td>
                                <td><?php echo e($currentorder->status); ?></td>

                                <td>
                                    <button type="button" class="btn btn-warning" ><a href="<?php echo e(url('company/orders/'.$currentorder->id)); ?>" style="color: inherit"> تفاصيل الطلب </a></button>
                                    
                                    
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('company.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\water\resources\views/company/orders/index.blade.php ENDPATH**/ ?>