<?php $__env->startSection('template_title'); ?>
    <?php echo e(substr($post->name,0,40)); ?> - <?php echo e($post->postcategorie->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_description'); ?>
    <?php echo e($post->name); ?> - Astuces et Conseils pour vos plantes d'intérieur
<?php $__env->stopSection(); ?>

<?php $__env->startSection('og'); ?>
<meta name="og:title" property="og:title" content="<?php echo e($post->name); ?> - Blog">
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo e($post->description); ?>" />
<meta property="og:url" content="<?php echo e(url("blog/$post->slug")); ?>" />
<meta property="og:image" content="<?php echo e(asset("storages/posts/$post->thumbnail")); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


          <section class='pt-2 pb-4'>
          <div class='container'>

          <div class='row featurette'>
           <div class='col-md-7 order-md-2'>
             <h4 class='font-3 fontsize-6 py-4'>Astuce</h4>
             <h2 class='featurette-heading font-uppercase fontsize-8 font-2b'><?php echo e($post->name); ?> <span class='text-muted fontsize-4'></span></h2>
             <hr>

             <!-- Shipping -->
          <section class='shipping bgwhite'>
          <div class='flex-w py-2 px-1'>
           <div class='flex-col-c w-size50 py-4 respon1'>


      <img src='/storage/icons/icon-time.svg' height='60px' alt='Durée'>


             <h4 class='t-center py-2 font-2b' style='text-transform:uppercase;'>
                Durée
             </h4>

             <span class='s-text11 t-center px-1  fontsize-2'>
          <?php echo e($post->duration); ?> minutes
           </span>
           </div>

           <div class='flex-col-c w-size50 py-4  respon2'>
            <img src='/storage/icons/cactus.svg' height='60px' alt=''>
             <h4 class='m-text12 t-center py-2 font-2b' style='text-transform:uppercase;'>
               Difficulté
             </h4>

             <span class='s-text11 t-center  fontsize-2'>

               <?php if($post->difficulty == 1): ?>
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star.svg')); ?>" height="15px" alt="Star 1">

               <?php elseif($post->difficulty == 2): ?>
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star.svg')); ?>" height="15px" alt="Star 1">

               <?php elseif($post->difficulty == 3): ?>
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star.svg')); ?>" height="15px" alt="Star 1">

               <?php elseif($post->difficulty == 4): ?>
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star.svg')); ?>" height="15px" alt="Star 1">

               <?php else: ?>
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">
                 <img src="<?php echo e(asset('storage/icons/star-black.svg')); ?>" height="15px" alt="Star 1">

              <?php endif; ?>

             </span>
           </div>


          </div>
          </section>

           </div>
           <div class='col-md-5 order-md-1'>
             <img class='featurette-image  rounded img-fluid mx-auto' src='<?php echo e(asset("$post->image")); ?>' alt='<?php echo e($post->name); ?>'>
           </div>
          </div>

          </div>
          </section>

          <section>
            <?php echo $post->content; ?>

          </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
	<script type="text/javascript">
	$(function () {
	$('[data-toggle="tooltip"]').tooltip()
	})
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/posts/template-astuce.blade.php ENDPATH**/ ?>