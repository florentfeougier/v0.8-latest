
<!-- Instagram -->
<section class="instagram pt-4">
  <div class="sec-title pb-4 px-2">
    <h3 class="m-text5 t-center">
    <span>SUIVEZ-NOUS SUR</span>
    <a href="https://instagram.com/plantesaddict" class="text-black font-2b fontsize-6 ml-2">
      <i class="fa-2xl fa fa-instagram"></i>
      INSTAGRAM</a>
    </h3>
  </div>

  <div class="flex-w">
    <!-- Block4 -->


    <?php $__currentLoopData = $instagram; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="block4 wrap-pic-w">
      <img src="<?php echo e($post->images->low_resolution->url); ?>" alt="Nos derniers posts">

      <a href="<?php echo e($post->link); ?>" target="_blank" class="block4-overlay sizefull ab-t-l trans-0-4">
        <span class="block4-overlay-heart p-2 flex-m trans-0-4 p-l-40 p-t-25">
          <i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
          <span class="p-t-2 text-white"><?php echo e($post->likes->count); ?> 👍 </span>
        </span>

        <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
          <p class="p-3 m-b-15 h-size1 of-hidden">
              <?php echo e($post->caption->text); ?>

          </p>

          <span class="p-2 text-center text-white">
             <img src="<?php echo e(asset("storage/icons/instagram.svg")); ?>" height="20px" alt="Likes">
          </span>
        </div>
      </a>
    </div>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





  </div>
</section>
<?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/welcome/partials/instagram-feed.blade.php ENDPATH**/ ?>