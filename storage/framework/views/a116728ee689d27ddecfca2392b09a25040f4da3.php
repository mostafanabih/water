<nav class="navbar-default navbar-static-side" role="navigation" >
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <h4 class="font-bold"><?php echo e(auth()->guard('company')->user()->Company->name ?? 'لا يوجد'); ?></h4></span> </span> </a>
                </div>
                <div class="logo-element">قطره ماء</div>
            </li>
            <li <?php if(Request::path() == 'company/home'): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url('company/home')); ?>" > <i class="fa fa-th-large"></i> <span class="nav-label"> الرئيسيه</span></a>
            </li>
            <li <?php if(Request::path() == 'company/orders'): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url('company/orders')); ?>"> <i class="fa fa-cubes"></i> <span class="nav-label"> الطلبات</span></a>
            </li>
            <li <?php if(Request::path() == 'company/previous_order'): ?> class="active" <?php endif; ?> >
                <a href="<?php echo e(url('company/previous_order')); ?>"> <i class="fa fa-codepen"></i> <span class="nav-label"> الطلبات السابقه </span></a>
            </li>
            <li <?php if(Request::path() == 'company/products'): ?> class="active" <?php endif; ?> >
                <a href="<?php echo e(url('company/products')); ?>" ><i class="fa fa-database"></i> <span class="nav-label">المنتجات</span></a>
            </li>
            <li <?php if(Request::path() == 'company/site_account'): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url('company/site_account')); ?>"><i class="fa fa-desktop"></i> <span class="nav-label"> شاشه حساب الموقع  </span> </a>
            </li>
            <li <?php if(Request::path() == 'company/representative' or Request::path() == 'company/representative_report'): ?> class="active" <?php endif; ?>>
                <a><i class="fa fa-group"></i><span class="nav-label"> المندوبين </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li <?php if(Request::path() == 'company/representative'): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('company/representative')); ?>">عرض المندوبين </a></li>
                    <li  <?php if(Request::path() == 'company/representative_report'): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('company/representative_report')); ?>">تقرير طلبات المندوبين  </a></li>
                </ul>
            </li>
            <li <?php if(Request::path() == 'company/commission'): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url('company/commission')); ?>"><i class="fa fa-calendar"></i> <span class="nav-label">طريقه سداد العموله  </span> </a>
            </li>
            <li <?php if(Request::path() == 'company/mydata'): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url('company/mydata')); ?>"><i class="fa fa-gear"></i><span class="nav-label">بياناتى</span> </a>
            </li>
        </ul>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\water\resources\views/company/layouts/nav.blade.php ENDPATH**/ ?>