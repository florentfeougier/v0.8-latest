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


<?php if($post->postcategorie->slug=='astuces'): ?>
	<?php echo $post->content; ?>

<?php else: ?>

	<!-- article details -->
	<section class="bgwhite pt-2">
		<div class="container">
      <!-- breadcrumb -->
      	<div class="bread-crumb bgwhite flex-w py-2">
      		<a href="<?php echo e(url('/')); ?>" class="s-text16">
      			Accueil
      			<i class="fa fa-angle-right px-2" aria-hidden="true">></i>
      		</a>

      		<a href="<?php echo e(url('/blog')); ?>" class="s-text16">
      			Blog
      			<i class="fa fa-angle-right px-2" aria-hidden="true">></i>
      		</a>

      		<span class="s-text17">
      			<?php echo e($post->name); ?>

      		</span>
      	</div>
			<div class="row">
				<div class="col-md-8 col-lg-9 pb-4">
					<div class="">
						<div class="">


							<div class="blog-detail-txt py-1">
								<h1 class="mb-2 font-2b pb-1 fontsize-8">
									<?php echo e($post->name); ?>

								</h1>

								<div class=" flex-w flex-m pb-2">


									<span>
										Date: <?php echo e($post->created_at); ?>

										<span class="mx-2">|</span>
									</span>

									<span>
										Catégorie: <?php echo e($post->postcategorie->name); ?>

										<span class="mx-2"></span>
									</span>


								</div>
                <div class="blog-detail-img wrap-pic-w">
                  <img src="<?php echo e(asset("$post->thumbnail")); ?>" alt="<?php echo e($post->name); ?> - <?php echo e(substr($post->description,0,68)); ?>">
                </div>


								<p class="py-3 mt-4 pl-2 " style="border-left: 1px solid #ECECEC;">
                  <?php echo e($post->description); ?>

								</p>

								<p class="pt-3 pb-2">
                  <?php echo $post->content; ?>

								</p>
							</div>


						</div>


					</div>
				</div>

				<div class="col-md-4 col-lg-3 ">
					<div class="rightbar">
						<!-- Search -->
					<form method="GET" action="<?php echo e(url("/blog")); ?>">
						<?php echo e(csrf_field()); ?>

						<div class="pos-relative bo11 of-hidden">
							<input class="s-text7 size16 py-2 px-3" type="text" name="q" placeholder="Cactus, Lyon...">

							<button class="flex-c-m size5 px-3 ab-r-m color1 color0-hov trans-0-4">
								<i class="fs-13 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</form>

						<!-- Categories -->
						<h4 class="m-text23 py-4 mt-2">
							Fiches d'entretien
						</h4>

						<ul>
              <?php $__currentLoopData = $fiches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="py-2 bo6">
  								<a href="<?php echo e(url("fiches-entretien/$fiche->slug")); ?>" class="s-text13 p-t-5 p-b-5">
  									<?php echo e($fiche->name); ?>

  								</a>
  							</li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <li class="py-2 bo6">
                <a href="<?php echo e(url("fiches/")); ?>" class="s-text13 p-t-5 p-b-5">
                  Voir toutes (<?php echo e(count($fiches)); ?>)
                </a>
              </li>
						</ul>

						<!-- Featured Products -->
						<h4 class="m-text23 py-4 mt-2">
							Shop
						</h4>

						<ul class="bgwhite">

            <?php if(count($products) > 0): ?>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


              <li class="flex-w pb-2">
                <a href="<?php echo e(url("shop/products/$product->slug")); ?>" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
                  <img src="<?php echo e(asset("$product->thumbnail")); ?>" alt="<?php echo e($product->name); ?>">
                </a>

                <div class="w-size23 pt-2">
                  <a href="<?php echo e(url("shop/products/$product->slug")); ?>" class="s-text20">
                    <?php echo e($product->name); ?>

                  </a>

                  <span class=" badge badge-secondary s-text17 p-t-6">
                    <?php echo e($product->price); ?>€
                  </span>
                </div>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
              <p>Aucun produit en vente actuellement.</p>
            <?php endif; ?>


						</ul>



						<!-- Tags -->
						<h4 class="m-text23 py-4 mt-2">
							Nos Ventes
						</h4>

						<div class="wrap-tags flex-w">
              <?php $__currentLoopData = $ventes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              	<a href="<?php echo e(url("ventes/$vente->slug")); ?>" class="tag-item">
              		<?php echo e($vente->name); ?>

              	</a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
	<script type="text/javascript">
	$(function () {
	$('[data-toggle="tooltip"]').tooltip()
	})
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/posts/show.blade.php ENDPATH**/ ?>