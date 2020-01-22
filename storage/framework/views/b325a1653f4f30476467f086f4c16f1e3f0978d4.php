<?php $__env->startSection('template_title'); ?>
Astuces et actualités des Plantes Addict
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?>
Astuces et actualités des Plantes Addict
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
  <style >
  #svg {
width: 25px;
height: 25px;
margin-left:4px !important;
}

.svg-circle {
border-radius: 20px;
}
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('og'); ?>
<meta name="og:title" property="og:title" content="Nos articles de blog">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<section class="py-4">
  <div class="container animated fadeIn ">

    <div class="row">
      <div class="col-lg-2 mt-2">
        <h1 class="font-2b fontsize-6">BLOG</h1>
      </div>


      <div class="col-lg-7 mt-3">
        <?php $__currentLoopData = $postcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postcategorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(url("blog/$postcategorie->slug")); ?>" class="display-block text-center mt-3 mr-3 ">

            <span class="  px-1 rounded-circle" style="background-color: #<?php echo e($postcategorie->color_code); ?>;padding-top: 9px; padding-bottom:11px;" >
              <img class="m-0"  src="<?php echo e(asset("$postcategorie->icon")); ?>" id="svg" class="" alt="">

            </span>
            <span class="ml-2"><?php echo e($postcategorie->name); ?></span>

          </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <div class="col-lg-3  mt-3">
        <form method="GET" action="<?php echo e(url("blog")); ?>">
          <?php echo e(csrf_field()); ?>

          <div class="pos-relative bo11 of-hidden">
            <input class="s-text7 size16 py-2 px-3" type="text" name="q" placeholder="Cactus, Lyon...">

            <button class="flex-c-m size5 px-3 ab-r-m color1 color0-hov trans-0-4">
              <i class="fs-13 fa fa-search" aria-hidden="true"></i>
            </button>
          </div>
        </form>

      </div>

    <!-- End row -->
    </div>
  </div>

</section>

<section>

<div class="container ">
  <div class="row">


    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


         <div class="col-md-4 animated bounceInUp">
           <div class="card mb-4 box-shadow text-center">
  <a href="<?php echo e(url("blog/" . $post->postcategorie->slug . "/$post->slug")); ?>" style="overflow:hidden;height:240px;"> <img class="card-img-top" src="<?php echo e(asset("$post->thumbnail")); ?>" alt="<?php echo e($post->name); ?>" style="margin-top:-60px; background-cover:cover;">
   </a>
          <div class="card-body">
<p class="card-text text-center">
    <img class="p-2  bo-rad-23 shadow" src="<?php echo e($post->postcategorie->icon); ?>" style="background-color: #<?php echo e($post->postcategorie->color_code); ?>; margin-top:-90px !important;" height="50px" alt="">

</p>

              <h4 class="fontsize-2 mb-2 font-2b font-uppercase"><?php echo e($post->name); ?></h4>
               <p class="card-text text-center "><?php echo e($post->description); ?></p>
               <?php $__currentLoopData = $post->postcategorie(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php echo e($a); ?>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <div class="text-center mt-3">

               <a href="<?php echo e(url("blog/" . $post->postcategorie->slug . "/$post->slug")); ?>" class="color-1 text-center py-2" style="border-bottom: 2px solid #e65540; color: #e65540;">LIRE LA SUITE <i class="fa fa-arrow-right"></i> </a>
                </div>
             </div>
           </div>
         </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<div class="py-2">


</div>
</div>

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/posts/index.blade.php ENDPATH**/ ?>