<?php $__env->startSection('site-title'); ?>
<?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php
$statistics = [
['title' => 'Total Admin','value' => $total_admin, 'icon' => 'user-secret'],
['title' => 'Total User','value' => $total_user, 'icon' => 'user'],
['title' => 'Total Product','value' => $total_product, 'icon' => 'shopping-cart'],
['title' => 'Total Products View','value' => $total_product_view, 'icon' => 'eye']
];
?>
<div class="main-content-inner">
    <div class="row">
        <!-- seo fact area start -->
        <div class="col-lg-12">
            <div class="row">
                <?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mt-5 mb-3">
                    <div class="card card-hover">
                        <div class="dash-box text-white">
                            <h1 class="dash-icon">
                                <i class="fas fa-<?php echo e($data['icon']); ?> mb-1 font-16"></i>
                            </h1>
                            <div class="dash-content">
                                <h5 class="mb-0 mt-1"><?php echo e($data['value']); ?></h5>
                                <small class="font-light"><?php echo e(__($data['title'])); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pw919\Code\Emad\Fatora\@core\resources\views/backend/admin-home.blade.php ENDPATH**/ ?>