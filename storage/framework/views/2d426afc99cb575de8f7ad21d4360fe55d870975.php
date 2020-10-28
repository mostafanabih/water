<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-right  " style="margin-right: 1em">
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i> <span class="label label-primary">2</span>
                </a>
                <ul class="dropdown-menu dropdown-alerts notify_scrollable" style="">
                    <?php $__empty_1 = true; $__currentLoopData = auth()->guard('company')->user()->Company->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="custom_notify">
                            <div>
                                <span class="pull-right text-muted small"><?php echo e(\Carbon\Carbon::parse($notify->created_at)->diffForHumans()); ?></span><br>
                                <i class="fa fa-lightbulb-o"></i>&nbsp;<?php echo e($notify->data['text']); ?>

                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li>
                            <div>
                                <span class="text-center">لا يوجد اشعارت حتى الأن</span>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-left">
            <li>
                <a href="<?php echo e(url('/company/logout')); ?>">
                    <i class="fa fa-sign-out"></i>خروج
                </a>
            </li>

        </ul>
    </nav>
</div><?php /**PATH E:\Xampp\htdocs\water\resources\views/company/layouts/navTop.blade.php ENDPATH**/ ?>