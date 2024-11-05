
<?php $__env->startSection('site-title'); ?>
<?php echo e(__('Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-lg-12 col-ml-12 padding-bottom-30">
      <div class="row">
            <div class="col-12 mt-5">
                  <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.success','data' => []]); ?>
<?php $component->withName('msg.success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                  <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.error','data' => []]); ?>
<?php $component->withName('msg.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                  <div class="card">
                        <div class="card-body">
                              <h4 class="header-title"><?php echo e(__("Settings")); ?></h4>
                              <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>

                                    <!-- Site Settings -->
                                    <div class="form-group">
                                          <label for="domain"><?php echo e(__('Domain')); ?></label>
                                          <input type="url" name="domain" class="form-control"
                                                value="<?php echo e($settings->domain); ?>" id="domain">
                                    </div>
                                    <div class="form-group">
                                          <label for="email"><?php echo e(__('Email')); ?></label>
                                          <input type="email" name="email" class="form-control"
                                                value="<?php echo e($settings->email); ?>" id="email">
                                    </div>
                                    <div class="form-group">
                                          <label for="phone"><?php echo e(__('Phone')); ?></label>
                                          <input type="text" name="phone" class="form-control"
                                                value="<?php echo e($settings->phone); ?>" id="phone">
                                    </div>
                                    <div class="form-group">
                                          <label for="address"><?php echo e(__('Address')); ?></label>
                                          <input type="text" name="address" class="form-control"
                                                value="<?php echo e($settings->address); ?>" id="address">
                                    </div>

                                    <!-- Social Media Links -->
                                    <h5 class="mt-4"><?php echo e(__('Social Media Links')); ?></h5>
                                    <div class="form-group">
                                          <label for="facebook"><?php echo e(__('Facebook')); ?></label>
                                          <input type="url" name="facebook" class="form-control"
                                                value="<?php echo e($settings->facebook); ?>" id="facebook">
                                    </div>
                                    <div class="form-group">
                                          <label for="twitter"><?php echo e(__('Twitter')); ?></label>
                                          <input type="url" name="twitter" class="form-control"
                                                value="<?php echo e($settings->twitter); ?>" id="twitter">
                                    </div>
                                    <div class="form-group">
                                          <label for="instagram"><?php echo e(__('Instagram')); ?></label>
                                          <input type="url" name="instagram" class="form-control"
                                                value="<?php echo e($settings->instagram); ?>" id="instagram">
                                    </div>
                                    <div class="form-group">
                                          <label for="linkedin"><?php echo e(__('LinkedIn')); ?></label>
                                          <input type="url" name="linkedin" class="form-control"
                                                value="<?php echo e($settings->linkedin); ?>" id="linkedin">
                                    </div>
                                    <div class="form-group">
                                          <label for="whatsapp"><?php echo e(__('WhatsApp')); ?></label>
                                          <input type="url" name="whatsapp" class="form-control"
                                                value="<?php echo e($settings->whatsapp); ?>" id="whatsapp">
                                    </div>

                                    <!-- Text Areas for Additional Information -->
                                    <h5 class="mt-4"><?php echo e(__('Additional Information')); ?></h5>
                                    <div class="form-group">
                                          <label for="about_us"><?php echo e(__('About Us')); ?></label>
                                          <textarea name="about_us" class="form-control" rows="4"
                                                id="about_us"><?php echo e($settings->about_us); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                          <label for="terms_and_conditions"><?php echo e(__('Terms and Conditions')); ?></label>
                                          <textarea name="terms_and_conditions" class="form-control" rows="4"
                                                id="terms_and_conditions"><?php echo e($settings->terms_and_conditions); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                          <label for="privacy_policy"><?php echo e(__('Privacy Policy')); ?></label>
                                          <textarea name="privacy_policy" class="form-control" rows="4"
                                                id="privacy_policy"><?php echo e($settings->privacy_policy); ?></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4"><?php echo e(__('Save Settings')); ?></button>
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pw919\Code\Emad\Fatora\@core\resources\views/backend/settings/index.blade.php ENDPATH**/ ?>