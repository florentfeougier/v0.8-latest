<?php $__env->startSection('template_title'); ?>
    Nous écrire
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_description'); ?>
    Nous écrire - Des questions ou un problème ?
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if( count( $errors ) > 0 ): ?>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <div style="z-index:9999;" class="mx-3 mt-4 position-absolute alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo e($error); ?>

          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(https://images.pexels.com/photos/1470168/pexels-photo-1470168.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=1920);">
		<h2 class="l-text2 t-center font-2b fontisize-6 font-bold">
			COMMENT NOUS CONTACTER ?
		</h2>
    <p>
      <a href="#"> <i class="fa fa-facebook fa-lg"></i> </a>
      <a href="#"> <i class="fa fa-twitter fa-lg"></i> </a>
      <a href="#"> <i class="fa fa-pinterest fa-lg"></i> </a>
    </p>
	</section>

	<!-- Page content -->
	<section class="bgwhite py-2">
		<div class="container">
			<div class="row">


				<div class="col-md-12 pb-2">
					<h3 class="m-text26 py-4 text-center font-2b">
						Des questions ?
					</h3>

					<form action="<?php echo e(url('contact/store')); ?>" method="POST" class="leave-comment">

						<?php echo e(csrf_field()); ?>


            <div class="row">
              <div class="col-lg-6">

                <!-- Nom -->
    						<div class="bo4 of-hidden size15 mb-4">
    							<input class="sizefull s-text7 p-2" type="text" name="name" placeholder="Nom" required>
    						</div>

              </div> <!-- End col -->

              <div class="col-lg-6">

                <!-- Email -->
                <div class="bo4 of-hidden size15 mb-4">
                  <input class="sizefull s-text7 p-2" type="email" name="email" placeholder="Addresse mail" required>
                </div>

              </div> <!-- End col -->
            </div> <!-- End row -->


						<!-- Subject -->
						<div class="bo4 of-hidden size15 mb-4">
							<input class="sizefull s-text7 p-2" type="text" name="subject" placeholder="Sujet" required>
						</div>

						<!-- Message -->
						<textarea class="dis-block s-text7 size20 bo4 mt-4 p-2 col-xs-12" rows="7" style="width:100%;" name="content" placeholder="Message" required></textarea>


						<div class="w-size25 my-4 px-2">
							<!-- Button -->
              <?php if(config('settings.reCaptchStatus')): ?>
                  <div class="row form-group text-center">
                    <div class="col-lg-4">

                    </div>
                      <div class="col-lg-6 ">
                          <div class="g-recaptcha" data-sitekey="<?php echo e(config('settings.reCaptchSite')); ?>"></div>
                      </div>
                  </div>
              <?php endif; ?>
							<button class="flex-c-m size2 btn btn-danger bo-rad-23 hov1 m-text3 trans-0-4">
								Envoyer <i class="fa fa-envelope ml-2"></i>
							</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
    <?php if(config('settings.reCaptchStatus')): ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantes-addict/webapp/development/v0.8-latest/resources/views/pages/contact.blade.php ENDPATH**/ ?>