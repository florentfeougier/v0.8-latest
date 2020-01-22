<?php $__env->startSection('template_title'); ?>
  Vos paniers
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <?php $count = 0;
  foreach($carts as $cart){
    $count = $count + Cart::instance($cart)->count();
  }
  ?>


<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url( <?php echo e(asset("storage/images/bg-pots.jpg")); ?> );  background-repeat: no-repeat; background-position: center;">
		<h2 class="fontsize-9 text-white font-2b my-2 t-center">
			VOS PANIER
		</h2>
    <h3 class="text-white fontsize-7 font-3">Vous avez <?php echo e($count); ?> articles dans <?php echo e(count($carts)); ?> paniers</h3>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite py-4 ">
		<div class="container">
<div class="row">


	<?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-lg-6">
  <main role="main" class="container">
  <div class="jumbotron mb-3">
    <h2>

      <?php if($cart == "shop"): ?>
      shop
      <?php else: ?>
        <?php if(\App\Models\Vente::where('slug', $cart)->first() != null && \App\Models\Vente::where('slug', $cart)->first()->name != null): ?>
        Vente de <?php echo e(\App\Models\Vente::where('slug', $cart)->first()->name); ?> le <?php echo e(date('d/m/Y', strtotime(\App\Models\Vente::where('slug', $cart)->first()->date))); ?>

        <?php else: ?>
        <?php echo e($cart); ?>

        <?php endif; ?>
      <?php endif; ?>
    </h2>
    <p class="lead"><?php echo e(Cart::instance($cart)->count()); ?> articles dans ce panier</p>
    <p class="lead mb-2">Total: <?php echo e(Cart::instance($cart)->total()); ?>€</p>
    <a href="<?php echo e(url("panier/$cart")); ?>" class="btn btn-secondary mt-2 bo-rad-23">Voir les détails</a>
    <a href="<?php echo e(url("panier/$cart/checkout")); ?>" class="btn btn-danger mt-2 bo-rad-23">Valider ma commande</a>

  </div>
</main>
</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>

		</div>
	</section>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<script>
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/carts/index.blade.php ENDPATH**/ ?>