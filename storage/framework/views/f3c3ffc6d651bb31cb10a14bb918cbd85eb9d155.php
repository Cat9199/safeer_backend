<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo e('tourism'); ?> - <?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $site_favicon = get_attachment_image_by_id(get_static_option('site_favicon'), 'full', false);
    ?>
    <?php if(!empty($site_favicon)): ?>
    <link rel="icon" href="<?php echo e($site_favicon['img_url']); ?>" type="image/png">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/common/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/common/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/common/css/themify-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/common/css/toastr.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/metisMenu.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/slicknav.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/typography.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/default-css.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/styles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/fontawesome-iconpicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/custom-style.css')); ?>">
    <script src="<?php echo e(asset('assets/common/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/common/js/jquery-migrate-3.3.2.min.js')); ?>"></script>
    <?php echo $__env->yieldContent('style'); ?>
    <?php if(get_static_option('site_admin_dark_mode') == 'on'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dark-mode.css')); ?>">
    <?php endif; ?>
    <?php if(get_default_language_direction() === 'rtl' && !empty(get_static_option('admin_panel_rtl_status'))): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/rtl.css')); ?>">
    <?php endif; ?>
</head>

<body>
    <!-- preloader area start -->
    <?php if(!empty(get_static_option('admin_loader_animation'))): ?>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <?php endif; ?>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php echo $__env->make('backend/partials/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li>
                                <label class="switch yes">
                                    <input id="darkmode" type="checkbox">
                                    <span class="slider-color-mode onff"></span>
                                </label>
                            </li>
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li>
                                <a class="btn <?php if(get_static_option('site_admin_dark_mode') == 'off'): ?> btn-primary <?php else: ?> btn-dark <?php endif; ?>"
                                    target="_blank" href="<?php echo e(url('/')); ?>">
                                    <i class="fas fa-external-link-alt mr-1"></i>
                                    <?php echo e(__('View Site')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left"><?php echo $__env->yieldContent('site-title'); ?></h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo e(route('admin.home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li><span><?php echo $__env->yieldContent('site-title'); ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <?php if(auth()->guard('admin')->check()): ?> 
                            <?php
                            $user = auth()->guard('admin')->user();
                            ?>
                            <?php echo render_image_markup_by_attachment_id($user->image, 'avatar user-thumb'); ?>

                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                                <?php echo e($user->name); ?> <i class="fa fa-angle-down"></i>
                            </h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo e(route('admin.profile.update')); ?>"><?php echo e(__('Edit
                                    Profile')); ?></a>
                                <a class="dropdown-item" href="<?php echo e(route('admin.password.change')); ?>"><?php echo e(__('Password
                                    Change')); ?></a>
                                <a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>"><?php echo e(__('Logout')); ?></a>
                            </div>
                            <?php else: ?>
                            <p>User not logged in</p> 
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <!-- footer area start -->
        <footer>
            <div class="footer-area footer-wrap">
                <p><?php echo render_footer_copyright_text(); ?></p>
                <p class="version">V-<?php echo e(get_static_option('site_script_version')); ?></p>
            </div>
        </footer>
        <!-- footer area end -->
    </div>
    <!-- Scripts -->
    <script src="<?php echo e(asset('assets/common/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/metisMenu.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/jquery.slimscroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/jquery.slicknav.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/fontawesome-iconpicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/common/js/toastr.min.js')); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/plugins.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/sweetalert2@11.js')); ?>"></script>
    <script>
        (function($) {
            "use strict";
            $('#reload').on('click', function() {
                location.reload();
            });
            $('#darkmode').on('click', function() {
                var el = $(this);
                var mode = el.data('mode');
                $.ajax({
                    type: 'GET',
                    url: '<?php echo e(route('admin.dark.mode.toggle')); ?>',
                    data: { mode: mode },
                    success: function() {
                        location.reload();
                    },
                    error: function() {}
                });
            });
            $(document).on('click', '.swal_delete_button', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '<?php echo e(__('Are you sure?')); ?>',
                    text: '<?php echo e(__('You would not be able to revert this item!')); ?>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).next().find('.swal_form_submit_btn').trigger('click');
                    }
                });
            });
            $(document).on('click', '.swal_alert_delete_button', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: $(this).data('msg'),
                    text: $(this).data('desc'),
                    icon: $(this).data('alerttype'),
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: $(this).data('alertbtntext')
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).next().find('.swal_alert_form_submit_btn').trigger('click');
                    }
                });
            });
        })(jQuery);
    </script>
</body>

</html><?php /**PATH C:\Users\pw919\Code\Emad\Fatora\@core\resources\views/backend/admin-master.blade.php ENDPATH**/ ?>