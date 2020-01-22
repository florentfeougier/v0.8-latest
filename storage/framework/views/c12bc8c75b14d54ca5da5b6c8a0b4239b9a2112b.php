<?php $__env->startSection('template_fastload_css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


  	

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<div class="main-content">
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
<div class="container-fluid">
<!-- Brand -->
<a class="h5 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="<?php echo e(url("profile/" . Auth::user()->name)); ?>" >Compte client <span class="d-lg-inline-block text-white mx-2 ">></span></a>

<a class="h5 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="<?php echo e(url("profile/" . Auth::user()->name . '/commandes')); ?>" >Commandes <span class="d-lg-inline-block text-white mx-2 ">></span></a>
<a class="h5 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="<?php echo e(url("profile/" . Auth::user()->name . "/commandes/" . $order->order_id)); ?>" ><?php echo e($order->order_id); ?></a>

<!-- Form -->
<div class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">

</div>

</div>
</nav>
<!-- Header -->
<div class="header d-flex align-items-center" style="min-height: 400px; background-image: url(https://images.pexels.com/photos/1078058/pexels-photo-1078058.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260); background-size: cover; background-position: center top;">
<!-- Mask -->
<span class="mask bg-gradient-default opacity-8"></span>
<!-- Header container -->
<div class="container-fluid d-flex align-items-center">
<div class="row">
<div class="col-lg-12">
<h1 class=" text-white"><?php if($order->payment_status == true): ?> Votre commande a été validé <?php else: ?> Payer votre commande <?php endif; ?></h1>
<p class="text-white ">
<?php if($order->payment_status == true): ?>

  Votre commande a été payé le <?php echo e($order->updated_at); ?>


<?php else: ?>
  Vous n'avez pas encore payé votre commande d'un montant de <?php echo e($order->amount); ?>€

<?php endif; ?>
</p>
<p class="text-white ">
<?php if($order->cart == "shop"): ?>
  Cette commande sera livré au point relais suivant:
<?php else: ?>
 Vos articles sont à récupérer lors de la vente de <?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->name); ?> du <?php echo e(date('d/m/Y', strtotime(\App\Models\Vente::where('slug', $order->cart)->first()->date))); ?> à l'adresse:

 <?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->location_address); ?>

 <?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->location_postalcode); ?> -
 <?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->location_city); ?>

<?php endif; ?>
</p>


<?php if($order->payment_status == true): ?>
  <span class="badge badge-success">Référence de paiement: <?php echo e($order->payment_id); ?></span>
  <span class="badge badge-secondary">Numéro de transaction: <?php echo e($order->transaction_id); ?></span>
<?php else: ?>

  <p class="text-white"> <small>Si vous venez de procéder au paiement, celle-ci sera validée d'ici quelques secondes, autrement cliquez sur le lien ci-dessous pour être redirigé vers la page de paiement:</small></p>

  <form method="GET" action="<?php echo e(url("payment/pay/$order->order_id")); ?>">
      <?php echo e(csrf_field()); ?>

      <input type="hidden" name="total" value="<?php echo e($order->amount); ?>">
      <input type="hidden" name="customer" value="flofgr@pm.me">
      <input type="hidden" name="cart" value="<?php echo e($order->cart); ?>">
      <button class="text-center btn btn-success  text-white bo-rad-23 hov1  trans-0-4" type="submit" name="button">Payer ma commande (<?php echo e($order->amount); ?>€)</button>

    </form>
    <form method="GET" action="<?php echo e(url("profile/" . Auth::user()->name . "/commandes/" . $order->order_id . '/delete')); ?>">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">


      </form>
<?php endif; ?>

<?php if(count($order->payments) > 1): ?>
<a href="<?php echo e(url('profile/' . Auth::user()->name . '/paiements')); ?>" class="btn btn-secondary">Historique de paiements</a>
<?php endif; ?>
</div>
</div>
</div>
</div>
<?php echo $__env->make('pages.user.profile-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
</div>
</div>
<div class="col-xl-8 order-xl-1">
<div class="card shadow">
<div class="card-header bg-white border-0">
<div class="row align-items-center">
<div class="col-8">
<h3 class="mb-0">Détails de votre commande</h3>
</div>
<div class="col-4 text-right">
  <?php if($order->payment_status == true): ?>
<a href="<?php echo e(url("profile/" . Auth::user()->name . "/commandes/" . $order->order_id . "/receipt")); ?>" class="btn btn-sm btn-secondary">Télécharger une facture</a>
<?php else: ?>
  <form method="GET" action="<?php echo e(url("profile/" . Auth::user()->name . "/commandes/" . $order->order_id . '/delete')); ?>">
      <?php echo e(csrf_field()); ?>

      <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
      <button class="text-center btn-sm btn btn-warning my-1  text-white bo-rad-23 hov1  trans-0-4" data-toggle="tooltip" title="Cette commande n'est pas encore payé, vous pouvez donc la supprimer. Si vous venez de procéder au paiment, merci de rafraichir la page." type="submit" name="button">Supprimer cette commande</button>


    </form>

<?php endif; ?>
</div>
</div>
</div>
<div class="card-body">

<h6 class="heading-small text-muted mb-4">Voici le résumé de votre commande enregistré le <?php echo e($order->created_at); ?></h6>

<div class="table-responsive">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Quantité</th>
      <th scope="col">Montant</th>
      <th scope="col">Fiche d'entretien</th>
    </tr>
  </thead>
  <tbody>

    <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"> <a href="<?php echo e(url("profile/" . Auth::user()->name . "/commandes/" . $product->order_id )); ?>">
        <img src="<?php echo e(asset("$product->thumbnail")); ?>" height="100" alt="">
      </a> </th>
      <td><?php echo e($product->name); ?></td>
      <td><?php echo e($product->pivot->quantity); ?></td>
      <td><?php echo e($product->price); ?>€</td>
      <td>

        <?php $__currentLoopData = $product->fiches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(url("compte/paiements/$product->payment_id")); ?>" class="badge badge-pill badge-success"><?php echo e($fiche->name); ?></a> </td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



  </tbody>
</table>
</div>
<div class="row">
  <div class="col-6">
    Transaction: <span class="badge badge-secondary"><?php echo e($order->transaction_id); ?></span>
  </div>
  <div class="col-3">
    TVA <?php echo e($order->tax); ?>€
  </div>
  <div class="col-3">
    <span class="btn btn-success">TOTAL: <?php echo e($order->amount); ?>€</span>
  </div>
</div>
<hr class="my-4">

<!-- Address -->
<?php if($order->payment_status == false): ?>
  <h6 class="heading-small text-muted mb-4">

  <?php if($order->cart == "shop"): ?>
    Livraison
  <?php else: ?>
    Récupérer votre commande
  <?php endif; ?>
    </h6>

    <div class="">
      <p> <strong>Adresse</strong> : <small><?php echo e($order->pickup_location); ?></small> </p>
      <p> <strong>Date</strong>: <small><?php echo e($order->pickup_date); ?></small> </p>
    </div>

<?php endif; ?>



</div>
</div>
</div>
</div>
</div>
<footer class="footer">
<div class="row align-items-center justify-content-xl-between">
<div class="col-xl-6 m-auto text-center">
<div class="copyright">
  <p>Si vous rencontrez un problème ou avez des questions, contactez-nous en <a href="mailto:contact@plantesaddict.fr" target="_blank">cliquant-ici</p>
</div>
</div>
</div>
</footer>






<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/pages/user/order.blade.php ENDPATH**/ ?>