<?php $__env->startSection('template_title'); ?>
  Commande N° <?php echo e($order->order_id); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Commande N°<?php echo e($order->order_id); ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/dashboard")); ?>">Accueil</a></li>
              <li class="breadcrumb-item "><a href="<?php echo e(url("manager/orders")); ?>">Commandes</a></li>
              <li class="breadcrumb-item active"><?php echo e($order->id); ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<section class="content">



  <?php if($order->payment_status == false && $order->payment_id == null): ?>

  <div class="alert alert-warning" role="alert">

    Cette commande n'a pas encore été payé. <a href="<?php echo e(url("manager/orders/" . $order->id . "/unpaidNotificationCheck")); ?>" class="text-dark"> <b>Relancer par email <i class="fa fa-envelope"></i> </b> </a>
  </div>
<?php else: ?>
  <?php if($order->closed != true): ?>
  
    <?php if($order->cart == "shop"): ?>
    <div class="alert alert-secondary" role="alert">
    Cette commande n'a pas encore été expédié
  </div>
    <?php else: ?>
    <div class="alert alert-secondary" role="alert">
    Le client n'est pas encore venu chercher sa commande.
  </div>
    <?php endif; ?>
  

<?php endif; ?>
  <div class="alert alert-success" role="alert">
    Cette commande a été payé et a pour référence de paiement <?php echo e($order->payment_id); ?>

  </div>
<?php endif; ?>

  <div class="row">
    
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">Détails de la commande

            <small class="float-right">

              <a data-toggle='tooltip' title="Modifier cette commande" class="text-dark" href="<?php echo e(url("manager/orders/" . $order->id . "/edit")); ?>"><i class="fa fa-edit"></i></a>
              
              <?php if($order->payment_status == true): ?>

              <a target="_blank" data-toggle="tooltip" title="Imprimer une facture" class="text-dark ml-2" href="<?php echo e(url("manager/orders/" . $order->id . "/receipt")); ?>"><i class="fa fa-file"></i></a></a>
              <?php endif; ?>

            </small></div>
          <div class="card-body">
            <div>
              <small class="float-right">Crée: <?php echo e($order->created_at); ?> par <?php echo e($order->user->email); ?></small>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Quantitée</th>
                    <th scope="col">TVA</th>
                    <th scope="col">Prix</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<td>                          <img src="<?php echo e(url("$product->thumbnail")); ?>" class="rounded" alt="<?php echo e($order->name); ?>" height="100px" alt="">
</td>

<td>                        <a class="text-dark" href="<?php echo e(url("manager/product/" . $product->id)); ?>"><?php echo e($product->name); ?> </a>
</td>
<td><?php echo e($product->pivot->quantity); ?></td>
<td>                        <?php echo e($product->tax); ?>% TVA
</td>
                      <td>  <?php echo e($product->pivot->price * $product->pivot->quantity); ?>€</td>



</tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
              </table>
            </div>


<div class="row">
  <div class="col-sm-7">

  </div>
  <div class="col-sm-2">
    <p class="btn btn-outline-secondary">TVA 10%</p>
  </div>
  <div class="col-sm-3">
    <?php if($order->payment_status == true && $order->payment_id != null): ?>
    <p class="btn btn-success">TOTAL <?php echo e($order->amount); ?>€</p>
  <?php else: ?>
    <p class="btn btn-danger" date-toggle="tooltip" title="Cette commande n'a pas été payé pour le moment">TOTAL <?php echo e($order->amount); ?>€</p>

  <?php endif; ?>
  </div>
</div>


      </div>


        </div>

<?php if($order->payment_status == true && $order->payment_id != null): ?>
  <div class="card">
  <div class="card-header">
    <?php if($order->cart == "shop"): ?>
    Livraison de la commande 
    <?php else: ?>
    Traitement de la commande 
    <?php endif; ?>

    <?php if($order->closed): ?> <span class="float-right badge badge-success">Terminé</span> <?php else: ?>
    <?php if($order->payment_status == true): ?>


    <?php if($order->status ==  "doing"): ?>
        <span class="float-right badge badge-secondary">Colis en préparation</span> 
    <?php elseif($order->status ==  "done"): ?>
        <span class="float-right badge badge-secondary">Colis préparé</span> 

    <?php else: ?>
        <span class="float-right badge badge-secondary">
          <?php if($order->status == "paiement validé"): ?>
          <?php if($order->cart == "shop"): ?>
          A préparer...
          <?php else: ?>
          En cours...
          <?php endif; ?>
          <?php else: ?>
          <?php if($order->status == 'todo'): ?>
          A préparer
          <?php else: ?>
          <?php echo e($order->status); ?>

          <?php endif; ?>
          
          <?php endif; ?>
        </span> 

    <?php endif; ?>
    
    <?php endif; ?>
    <?php endif; ?>
  

  </div>

  <div class="card-body">
    
 <?php if($order->cart == "shop"): ?>


    <p class="text-muted">
      Cette commande doit être livré au point relais: 

       <span class="text-dark">

        <span class="badge badge-secondary"><?php echo e($order->deliverie->pickup_id ?? "Identifiant inconnu"); ?></span>

        <?php echo e($order->deliverie->pickup_name); ?> <?php echo e($order->deliverie->pickup_address); ?> - <?php echo e($order->deliverie->pickup_postalcode); ?> <?php echo e($order->deliverie->pickup_city); ?></p>
    </span> 

    <div class="row">
      <div class="col-lg-6">
         <h6 class="text-uppercase"><b>Détails du colis</b></h6>


          <div>
            <span>Numéro de colis:</span>
            <span><?php echo e($deliverie->tracking_id ?? "Pas encore généré."); ?></span>
          </div>
          <div>
            <span>Valeur du colis:</span>
            <span><?php echo e($deliverie->order->amount ?? "25€ (défaut)"); ?></span>
          </div>
          <div>
            <span>Poids:</span>
            <span>2000g</span>
          </div>
         


      </div>

      <div class="col-lg-6">
        <h6 class="text-uppercase"><b>Expédition</b></h6>

        <a target="_blank" href="<?php echo e(url("manager/deliveries/")); ?>/<?php echo e($order->deliverie->id ?? "deleted"); ?>" class="btn btn-sm btn-primary">Gérer la livraison</a>
          <?php if($order->deliverie->status == "todo" or $order->deliverie->status == "a préparer"): ?>
          
          <?php elseif($order->deliverie->status == "sent"): ?>
          <p class="text-muted">Votre colis a été expédié</p> <a class="btn btn-sm btn-outline-danger" href="">Annuler</a>
          <?php elseif($order->deliverie->status == "sent"): ?>
          Colis expédié
          <?php else: ?>

          <?php if($order->deliverie->tracking_id != null && $order->deliverie->shipment_sticker_url != null): ?>
          <p class="text-muted">
            Votre colis est prêt, vous pouvez donc passer son statut en 'expédié' en cliquant ci-dessous:
          </p>
          <a href="<?php echo e(url("manager/deliveries/" . $order->deliverie->id . '/sent')); ?>" class="btn btn-sm btn-primary" title="Cliquer ici si vous venez d'expedier votre colis pour changer le status en: expédié" href="">Expédier ce colis <i class="fa fa-rocket ml-1"></i></a>
          <?php else: ?>
                    <p class="text-muted">
            Vous n'avez plus qu'à imprimer l'étiquette et à cliquer  ci-dessous:
          </p>
          <a href="<?php echo e(url("manager/deliveries/" . $order->deliverie->id . '/sent')); ?>" class="btn btn-sm btn-outline-primary" title="Cliquer ici si vous venez d'expedier votre colis pour changer le status en: expédié" href="">Expédier ce colis <i class="fa fa-rocket ml-1"></i></a>
          <?php endif; ?>
          <?php endif; ?>
      </div>
      <div class="col-lg-6"></div>
    </div>

<?php else: ?>

    <?php if($order->closed): ?>
     <p class="text-muted">
   Le client est venu récupérer sa commande lors de la vente de <?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->name); ?> du <?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->date); ?> à l'adresse: <?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->location_address); ?> <?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->location_postalcode); ?>

 </p>
<p>
  Commande réceptionné par le client

    <a class="btn btn-sm  btn-outline-secondary" href="<?php echo e(url("manager/orders/" . $order->id . "/close")); ?>">Annuler <i class="fa fa-times"></i></a>
  <?php else: ?>
   <p class="text-muted">
   Le client viendra récupérer sa commande lors de la vente de <?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->name); ?> du <?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->date); ?> à l'adresse: <?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->location_address); ?> <?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->location_postalcode); ?>

 </p>
<p>
  La commande n'a pas encore été réceptionné par le client.

  <a class="btn btn-sm btn-outline-success" href="<?php echo e(url("manager/orders/" . $order->id . "/close")); ?>">Remettre la commande au client <i class="fa fa-check"></i></a>

  <?php endif; ?>
</p>
<?php endif; ?>


 

  </div>
</div>

<?php endif; ?>
      </div>

      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">Information</a></div>
          <div class="card-body">
            

  <div class="my-2">
    <i class="text-muted  mr-1 fa fa-user"> </i>
      <span class="text-muted">Crée par:</span> <a data-toggle="tooltip" title="<?php echo e($order->user->email); ?> " class="text-dark" target="_blank" href="<?php echo e(url("manager/users/" . $order->user->id)); ?>"><?php echo e($order->user->first_name); ?> <?php echo e($order->user->last_name); ?> (ID: <?php echo e($order->user->id); ?>)</a>
   
  </div>
    <div class="my-2">
                <i class="text-muted  mr-1 fa fa-euro-sign"></i>
                <span class="text-muted">Montant:</span> <?php echo e($order->amount); ?>€
              </div>
              <div class="my-2">
                <i class="text-muted  mr-1 fa fa-shopping-cart"></i>
                <span class="text-muted">Panier:</span>   <?php if(\App\Models\Vente::where('slug', $order->cart)->first() == null): ?>
      <a class="text-muted" href="<?php echo e(url("manager/orders/filters/shop")); ?>">shop</a>
    <?php else: ?>
      Vente à <b><?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->name ?? ''); ?></b> du <?php echo e(date('d/m/Y', strtotime(\App\Models\Vente::where('slug', $order->cart)->first()->date ?? ''))); ?>

    <?php endif; ?>

              </div>

              <div class="my-2">
                <?php if($order->cart == "shop"): ?>
                  <i class="text-muted  mr-1 fa fa-rocket"></i>
                <span class="text-muted">Livraison:</span> 
                <a class="text-dark" href="<?php echo e(url("manager/deliveries/" . $order->deliverie->id)); ?>"><?php echo e($order->deliverie->deliverie_id ?? "Supprimée"); ?></a>

                <?php endif; ?>
               

              </div>

          
            
              <div class="my-2">
                <i class="text-muted  mr-1 fa fa-map-marker"></i>
                <span class="text-muted">Adresse de facturation:</span> <?php echo e($order->user->profile->location_address ?? "Adresse non renseignée."); ?> - <?php echo e($order->user->profile->location_postalcode ?? "00000"); ?> <?php echo e($order->user->profile->location_city ?? "Ville inconnue"); ?></div>
              <div class="my-2">

                <i class="text-muted  mr-1 fa fa-phone"></i><span class="text-muted"> Téléphone: </span><?php echo e($order->user->profile->phone_number ?? "Non renseigné."); ?></div>
            
          </div>
      </div>

<div class="card">
          <div class="card-header">Paiement 
<?php if($order->payment_status == "false" && $order->payment_id == null): ?>
               <span class="float-right badge badge-warning">en attente...</span>
               <?php else: ?>
                              <span class="float-right badge badge-success"> validé</span>

               <?php endif; ?>
          </div>
          <div class="card-body">
            <p>
                <?php if(!is_null($order->payment_id)): ?>

     <div class="my-2">
                <i class="text-muted  mr-1 fa fa-clock"></i>
                <span class="text-muted">Enregistré le:</span> <?php echo e(\App\Models\Payment::where('ref_id', $order->payment_id)->first()->created_at); ?></div>
 
   <div class="my-2">
                <i class="text-muted  mr-1 fa fa-file-invoice-dollar"></i>
                <span class="text-muted">Numéro de paiement:</span> <a   class="text-dark" href="<?php echo e(url("manager/payments/$order->payment_id")); ?>"class=""><?php echo e($order->payment_id); ?></a></div>

   <div class="my-2">
                <i class="text-muted  mr-1 fa fa-handshake"></i>
                <span class="text-muted">Numéro de transaction:</span> <a  class="text-dark" href="<?php echo e(url("manager/payments/$order->payment_id")); ?>"class=""><?php echo e($order->transaction_id); ?></a></div>
   <div class="my-2">
                <i class="text-muted  mr-1 fa fa-cash-register"></i>
                <span class="text-muted">Méthode de paiement:</span> <a class="text-dark"  href="<?php echo e(url("manager/payments/$order->payment_id")); ?>"class=""><?php echo e($order->payment_method); ?></a></div>


  <?php else: ?>
    <p>Aucune transaction enregistrée pour le moment.</p>

  <?php endif; ?>
 
            </p>
            
          </div>
      </div>


  </div>
  <div class="col-lg-12">
     <?php echo Form::open(array('url' => 'manager/orders/' . $order->id, 'class' => '', 'data-toggle' => '', 'title' => 'Supprimer')); ?>

                    <?php echo Form::hidden('_method', 'DELETE'); ?>

                    <?php echo Form::button("Supprimer cette commande <i class='ml-1 fa fa-trash'></i>", array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Supprimer cette commande', 'data-message' => 'Etes vous sur de vouloir supprimer cette commande ? Si une livraison est associée, elle sera également supprimée!')); ?>

                <?php echo Form::close(); ?>

  </div>
</section>





  <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/ordersmanagement/show-order.blade.php ENDPATH**/ ?>