<?php $__env->startSection('template_title'); ?>
  Votre panier: <?php echo e($cartName); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>

<style>

input{
  &::-webkit-inner-spin-button{
    opacity:1;
  }
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {

   opacity: 1 !important;

}
.cart-validate-btn:hover > img {
  margin-left:20px !important;
  transition-duration: 0.3s;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php

  $totalTax = 0;
?>
<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo e(asset('storage/images/bg-sale.jpg')); ?>);">
		<h1 class="fontsize-7 text-white font-2b my-2 t-center">
			VOTRE BOX
		</h2>
    <h3 class="text-white fontsize-9 font-3 fontsize-3"><?php echo e($cartDesc); ?></h3>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite py-4">
		<div class="container">
		<?php if($cart->count() > 0): ?>
		<!-- Cart item -->
		<div class="container-table-cart pos-relative">
			<div class="wrap-table-shopping-cart bgwhite">
				<table class="table-shopping-cart">
					<tr class="table-head">
						<th class="column-1"></th>
						<th class="column-2">Produit</th>
						<th class="column-3" style="width:220px;">Prix unitaire</th>
						<th class="column-4 ">Quantité</th>
						<th class="column-5">Total</th>
						<th class="column-5"></th>
					</tr>


					<?php $__currentLoopData = $cart->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php $totalTax = $totalTax + \App\Models\Product::find($item->id)->tax / 100 * $item->price * $item->qty; ?>

					<tr class="table-row">


						<td class="column-1">
							<div class="cart-img-product b-rad-4 o-f-hidden">
<a href="<?php echo e(url("ventes/$cartName/produits/$item->id")); ?>">
  	<img src="<?php echo e(url("products/$item->id/thumbnail")); ?>" alt="Produit: <?php echo e($item->name); ?>">
</a>
							</div>
						</td>
						<td class="column-2"><?php echo e($item->name); ?> <a href="<?php echo e(url("fiches-entretien/$item->id")); ?>" title="Voir la fiche d'entretien de ce produit" target="_blank" class="ml-2  py-1 px-2 bo-rad-23 badge badge-success">Fiche d'entretien</a> </td>
						<td class="column-3"><?php echo e($item->price); ?> € <small>(TVA: <?php echo e(\App\Models\Product::find($item->id)->tax); ?> %)</small> </td>
						<td class="column-4">

              							<form  action='<?php echo e(url("panier/$cartName/update")); ?>' method="post">
              								<?php echo e(csrf_field()); ?>

              							<input type="hidden" name="product" value="<?php echo e($item->id); ?>">
              							<input type="hidden" name="cart" value="<?php echo e($cartName); ?>">




              								<input type="hidden" class="size8 py-2 m-text18 t-center num-product" type="number" min='1' max="20" name="quantity" value="<?php echo e($item->qty - 1); ?>">



              							<button class="float-left" type="submit" name="button"> <img src="<?php echo e(asset("storage/icons/minus.svg")); ?>" class="mt-2" height="18px" alt="-1" title="Réduire la quantité"> </button>
              							</form>

              <div class="float-left mx-2 mt-1"><?php echo e($item->qty); ?></div>





              <form  class="" action='<?php echo e(url("panier/$cartName/update")); ?>' method="post">
                <?php echo e(csrf_field()); ?>

              <input type="hidden" name="product" value="<?php echo e($item->id); ?>">
              <input type="hidden" name="cart" value="<?php echo e($cartName); ?>">




                <input type="hidden" class="size8 py-2 m-text18 t-center num-product" type="number" min='1' max="20" name="quantity" value="<?php echo e($item->qty + 1); ?>">



              <button title="Augmenter la quantité" class="float-left" type="submit" name="button"> <img src="<?php echo e(asset("storage/icons/plus.svg")); ?>" class="mt-2" height="18px" alt="+1"> </button>
              </form>


						</td>
						<td class="column-5"><?php echo e($item->price * $item->qty); ?> € </td>
            <td>

              							<form class="" action="<?php echo e(url("panier/$cartName/remove")); ?>" method="post">
              								<?php echo e(csrf_field()); ?>

              							<input type="hidden" name="product" value="<?php echo e($item->id); ?>">
              							<input type="hidden" name="cart" value="<?php echo e($cartName); ?>">

              							<button title="Retirer de mon panier" class="float-left" type="submit" name="button"> <img src="<?php echo e(asset("storage/icons/delete.svg")); ?>" class="mt-2" height="16px" alt="Retirer l'article de mon panier"> </button>
              							</form></td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



				</table>
			</div>
		</div>

    <form action="<?php echo e(url("panier/$cartName/discount")); ?>" method="post">
      <?php echo e(csrf_field()); ?>

			<div class="flex-w flex-sb-m  bo8 py-3 pl-2">
				<div class="flex-w flex-m w-full-sm">

					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 bo-rad-23 p-2" type="text" name="code" placeholder="Coupon" required>
					</div>

					<div class="size12 trans-0-4 ml-2 ">
						<!-- Button -->
						<button class="flex-c-m px-4 btn btn-secondary  bo-rad-23  trans-0-4">
							Valider
						</button>
					</div>

				</div>
      </form>


			</div>

</div>

<div class="container">
<div class="row">
	<div class="col-lg-4">
		<div class="bo9 text-center ml-auto mr-auto p-4 my-4">
				<h5 class="m-text20 py-2">
					Information de facturation
				</h5>

				<?php if(auth()->guard()->guest()): ?>
				<p class="text-muted">Vous n'êtes pas connecté!</p>
				<div class="py-3">
					
				<a href="<?php echo e(url("login")); ?>" class="btn btn-outline-danger bo-rad23">Se connecter</a>
				
				<a href="<?php echo e(url("register")); ?>" class="btn btn-danger bo-rad23">Créer un compte</a>
				</div>
				<?php else: ?>
					<div class="flex-w flex-sb-m pt-4 pb-3">
					<span class="s-text18 w-size19 w-full-sm">
						Adresse:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
            adresse user
					</span>
				</div>
				<?php endif; ?>

				
</div>
	<!-- End user billing info col -->
	</div>

	<!-- Cart resume  col -->
	<div class="col-lg-8">

					<div class="bo9  text-center ml-auto mr-auto p-4 my-4">

		
		<h5 class="m-text20 py-2">
					Résumé de votre panier
				</h5>



				<div class="flex-w flex-sb-m pt-4 pb-3">
					<span class="s-text18 w-size19 w-full-sm">
						Sous total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
            <?php echo e(Cart::instance($cartName)->total() - $totalTax); ?> €
					</span>
				</div>

				<!-- Livraison -->
				<div class="flex-w flex-sb-m bo10 py-3">
					<span class="s-text18 w-size19 w-full-sm">
						Livraison:
					</span>

          <span class="m-text21 w-size20 w-full-sm">
            Articles à récupérer lors de la vente.
					</span>
				</div>

        <!-- Tax -->
				<div class="flex-w flex-sb-m bo10 py-3">
					<span class="s-text18 w-size19 w-full-sm">
						TVA
					</span>

          <span class="m-text21 w-size20 w-full-sm">
              <?php echo e(round($totalTax, 2)); ?> €
					</span>
				</div>

				<!-- Total -->
				<div class="flex-w flex-sb-m py-3">
					<span class="m-text22 w-size19 w-full-sm">
						Total (TTC):
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php echo e(Cart::instance($cartName)->total()); ?>€
					</span>
				</div>

				<div class="size15  trans-0-4 mb-2 mt-4">
					<!-- Button -->
					<a href="<?php echo e(url("panier/$cartName/checkout")); ?>" class="cart-validate-btn flex-c-m py-2 bg1 text-white bo-rad-23 hov1  trans-0-4">
						VALIDER MA SELECTION ET PAYER <img class="ml-2" src="<?php echo e(url("storage/icons/right-arrow.svg")); ?>" height="20px" alt="Cliquer ici">
					</a>
				</div>
			</div>
			<?php else: ?>

			<div class="">
				<h3>Votre panier est vide.</h3>
				<p>Voir <a href="<?php echo e(url("ventes")); ?>">les ventes</a> </p>
			</div>
			<?php endif; ?>

		</div>

	<!-- End cart resume  col -->
	</div>
</div>
</div>


			<!-- Total -->
			<div class="bo9 w-size20  text-center ml-auto mr-auto p-4 my-4">
				<h5 class="m-text20 py-2">
					Résumé de votre panier
				</h5>

				
		</div>
	</section>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantes-addict/webapp/development/v0.8-latest/resources/views/carts/show-box.blade.php ENDPATH**/ ?>