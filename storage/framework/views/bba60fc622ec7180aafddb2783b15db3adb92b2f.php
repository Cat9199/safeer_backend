<div class="sidebar-menu">
    <div class="sidebar-header" style="background: #666">
        <div class="logo">
            <a href="/admin-home">
                <?php if(get_static_option('site_admin_dark_mode') == 'on'): ?>
                <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                <?php else: ?>
                <?php echo render_image_markup_by_attachment_id(get_static_option('site_white_logo')); ?>

                <?php endif; ?>
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <!-- Dashboard -->
                    <li class="<?php echo e(active_menu('admin-home')); ?>">
                        <a href="/admin-home" aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span><?php echo app('translator')->get('Dashboard'); ?></span>
                        </a>
                    </li>
                    <li class="main_dropdown <?php if(request()->is('admin-home/product-management/*')): ?> active <?php endif; ?>">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-package"></i>
                            <span><?php echo e(__('Product Management')); ?></span>
                        </a>
                        <ul class="collapse">
                            <li class="<?php echo e(active_menu('admin-home/product-management/edit')); ?>">
                                <a href="<?php echo e(route('admin.products.all')); ?>"><?php echo e(__('All Products')); ?></a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/product-management/new')); ?>"><a
                                    href="<?php echo e(route('admin.products.new')); ?>"><?php echo e(__('Add New
                                    Product')); ?></a></li>
                            
                            <li class="<?php echo e(active_menu('admin-home/product-management/category')); ?>"><a
                                    href="<?php echo e(route('admin.products.category.all')); ?>"><?php echo e(__('Product
                                    Category')); ?></a></li>

                        </ul>
                    </li>
                    
                    <li class="main_dropdown <?php if(request()->is('admin-home/admin-management/*')): ?> active <?php endif; ?>">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-user"></i>
                            <span><?php echo e(__('Admin Management')); ?></span>
                        </a>
                        <ul class="collapse">
                            <li class="<?php echo e(active_menu('admin-home/admin-management/all')); ?>"><a
                                    href="/admin-home/all-user"><?php echo e(__('All Admins')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/admin-management/new')); ?>"><a
                                    href="/admin-home/new-user"><?php echo e(__('Add New
                                    Admin')); ?></a></li>

                        </ul>
                        <!-- Settings -->
                    <li class="main_dropdown <?php if(request()->is('admin-home/settings/*')): ?> active <?php endif; ?>">
                        <a href="/admin-home/g/settings" aria-expanded="true">
                            <i class="ti-settings"></i>
                            <span><?php echo e(__('Store Settings')); ?></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div><?php /**PATH C:\Users\pw919\Code\Emad\Fatora\@core\resources\views/backend/partials/sidebar.blade.php ENDPATH**/ ?>