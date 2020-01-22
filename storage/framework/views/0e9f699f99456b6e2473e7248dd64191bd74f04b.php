<?php $__env->startSection('template_title'); ?>
  <?php echo e($page->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?>
  <?php echo e($page->description); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="py-4">
  <div class="container">
    <?php echo $page->content; ?>

  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/pages/show.blade.php ENDPATH**/ ?>