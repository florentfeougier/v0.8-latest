<?php $__env->startSection('template_title'); ?>
  Livraison: <?php echo e($deliverie->deliverie_id); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0 text-dark">Livraison N°<?php echo e($deliverie->deliverie_id); ?> 

            <?php if($deliverie->tracking_id != null && $deliverie->shipment_sticker_url != null): ?>
            <a target="_blank" href="<?php echo e($deliverie->shipment_tracking_url ?? ""); ?>" class="badge badge-success">Colis <?php echo e($deliverie->tracking_id); ?></a>

          <?php endif; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/dashboard")); ?>">Accueil</a></li>
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/deliveries")); ?>">Livraisons</a></li>
              <li class="breadcrumb-item active"><?php echo e($deliverie->deliverie_id); ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<section class="content">
  


  <?php if($deliverie->status == "sent"): ?>
  <div class="alert alert-success" role="alert">
    Livraison expédié! 
  </div>
  <?php elseif($deliverie->status == "done"): ?>
    <div class="alert alert-info" role="alert">
    Le colis est prêt mais pas encore expédié.
    <?php if($deliverie->shipment_sticker_url != null): ?>
    <a href="<?php echo e($deliverie->shipment_sticker_url); ?>" class=" mx-1 btn btn-primary btn-sm float-right"  data-placement="left" title="<?php echo e(trans('deliveriesmanagement.tooltips.back-deliveries')); ?>">
                  <i class="fa fa-rocket" aria-hidden="true"></i>
                  Imprimer le bon de livraison
                </a>
    <?php else: ?>
    Générer le bon
    <?php endif; ?>
  </div>

  <?php elseif($deliverie->status == "doing"): ?>
    <div class="alert alert-info" role="alert">
    Cette livraison est en cours de préparation. 
    <a href="<?php echo e(url("manager/deliveries/$deliverie->id/doing")); ?>" class=" mx-1 btn btn-primary btn-sm float-right"  data-placement="left" title="<?php echo e(trans('deliveriesmanagement.tooltips.back-deliveries')); ?>">
                  <i class="fa fa-rocket" aria-hidden="true"></i>
                  Imprimer le bon de livraison
                </a>
  </div>
<?php else: ?>
  <div class="alert alert-secondary" role="alert">
    Cette livraison n'a pas encore été préparé. 
    <a href="<?php echo e(url("manager/deliveries/$deliverie->id/doing")); ?>" class=" mx-1 btn btn-primary btn-sm float-right"  data-placement="left" title="<?php echo e(trans('deliveriesmanagement.tooltips.back-deliveries')); ?>">
                  <i class="fa fa-rocket" aria-hidden="true"></i>
                  Imprimer le bon de livraison
                </a>
  </div>
<?php endif; ?>
    <div class="row">


      <div class="col-lg-7">

        <div class="card">
          <div class="card-header">Préparation du colis

    <?php if($deliverie->status == "sent"): ?>
            <span class="float-right badge badge-success">Expédiée</span> 
    <?php elseif($deliverie->status == "done"): ?>
            <span class="float-right badge badge-primary">Colis préparé</span> 

           

    <?php elseif($deliverie->status == "doing"): ?>
            <span class="float-right badge badge-info">En préparation...</span> 

    <?php elseif($deliverie->status == "todo" or $deliverie->status == "a préparer"): ?>
            <span class="float-right badge badge-secondary">A préparer</span> 


    <?php elseif($deliverie->status == "received"): ?>
            <span class="float-right badge badge-success">Reçu par le client</span> 
    <?php endif; ?>

          </div>
          <div class="card-body">

            <?php if($deliverie->status == "sent"): ?>
            <p class="text-muted">Votre colis a été expédié vers le point relais <span class="badge" title="<?php echo e($deliverie->pickup_name); ?> | <?php echo e($deliverie->pickup_address); ?> <?php echo e($deliverie->pickup_postalcode); ?> <?php echo e($deliverie->pickup_city); ?>" data-toggle="tooltip"><?php echo e($deliverie->pickup_id); ?></span> avec le numéro de colis <span class="badge"><?php echo e($deliverie->tracking_id); ?></span></p>

             <a href="<?php echo e(url("manager/deliveries/" . $deliverie->id . "/unsend")); ?>" data-toggle='tooltip' class="btn btn-sm btn-outline-danger" title="Repasser la livraison en préparé">Annuler l'envoi <i class="fa fa-times"></i></a>

            <a target='_blank' href="<?php echo e($deliverie->shipment_tracking_url ?? url("manager/deliveries")); ?>" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="Voir la page de tracking de la livraison">Suivre le colis <i class="fa fa-eye"></i></a>
            <a class="btn btn-sm btn-primary" data-toggle="tooltip" title="Ce colis a été réceptionné par le client. La commande sera également passé en terminé." href="<?php echo e($deliverie->shipment_tracking_url); ?>">Colis réceptionné par le client</a>
            <?php elseif($deliverie->status == "done"): ?>
            <p class="text-muted">Votre colis <span class="badge"><?php echo e($deliverie->tracking_id); ?></span> est prêt mais pas encore expédié.</p>
            <a class="btn btn-outline-danger btn-sm" href="<?php echo e(url("manager/deliveries/" . $deliverie->id . "/undo")); ?>" data-toggle="tooltip" title="Repasse la livraison et la commande en 'a préparer'. Si vous avez généré une étiquette, celle-ci est conservé.">Annuler la préparation <i class="fa fa-times"></i></a>
            <a class="btn btn-primary btn-sm" href="<?php echo e(url("manager/deliveries/" . $deliverie->id . "/send")); ?>">Mon colis a été expédié <i class="fa fa-rocket"></i></a>

            <?php elseif($deliverie->status == "doing"): ?>

            <a class="btn btn-outline-danger btn-sm" href="<?php echo e(url("manager/deliveries/" . $deliverie->id . "/undoing")); ?>" data-toggle="tooltip" title="Repasse la livraison et la commande en 'a préparer'. Si vous avez généré une étiquette, celle-ci est conservé.">Annuler la préparation en cours <i class="fa fa-times"></i></a>
            <a class="btn btn-primary btn-sm" href="<?php echo e(url("manager/deliveries/" . $deliverie->id . "/done")); ?>" data-toggle="tooltip" title="Votre colis est prêt à être expédié">Mon colis est prêt <i class="fa fa-arrow-right"></i></a>
            <?php elseif($deliverie->status == "todo" or $deliverie->status == "a préparer"): ?>

            <p class="text-muted">
              Vous n'avez pas encore commencé à traiter cette livraison.
            </p>

            <a class="btn btn-primary btn-sm" href="<?php echo e(url("manager/deliveries/" . $deliverie->id . "/doing")); ?>" title="Débuter la préparation de votre livraison, vous allez pouvoir générer une étiquette de livraison." data-toggle="tooltip">Préparer ma commande <i class="fa fa-arrow-right"></i></a>


            <?php else: ?>

            <p class="text-muted">
              Vous n'avez pas encore commencé à traiter cette livraison.
            </p>

            <a class="btn btn-primary btn-sm" href="<?php echo e(url("manager/deliveries/" . $deliverie->id . "/doing")); ?>">Préparer ma commande</a>

             
            <?php endif; ?>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            Contenu du colis

            <span class="float-right badge badge-secondary"><?php $totalWeight = 0; ?>
          <?php $__currentLoopData = $deliverie->order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($product->weight != null): ?>
            <?php  $totalWeight += $product->weight; ?>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> Poids total: <?php echo e($totalWeight); ?>g</span>
          </div>
          <div class="card-body">
            <small class="float-right">Crée: <?php echo e($deliverie->created_at); ?> par <?php echo e($deliverie->order->user->email); ?></small>
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
                  <?php $__currentLoopData = $deliverie->order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<td>                          <img src="<?php echo e(url("$product->thumbnail")); ?>" class="rounded" alt="<?php echo e($deliverie->name); ?>" height="100px" alt="">
</td>

<td>                        <a class="text-dark" href="<?php echo e(url("manager/product/" . $product->id)); ?>"><?php echo e($product->name); ?> </a>
</td>
<td><small><?php echo e($product->pivot->quantity); ?></small></td>
<td>                        <small><?php echo e($product->tax); ?>%</small>
</td>
                      <td>  <?php echo e($product->pivot->price * $product->pivot->quantity); ?>€</td>



</tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
              </table>
            
          </div>

          <p>
      <div class="row">
        <div class="col-lg-6"></div>
        <div class="col-lg-6">

        <div>
          <span>Numéro de colis:</span>
                <span class="badge badge-secondary"><?php echo e($deliverie->tracking_id ?? "Pas encore généré"); ?></span>

        </div>
        <div>
          <span>Type de colis:</span>
                <span class="badge badge-secondary"><?php echo e($deliverie->packet_type ?? "24R"); ?></span>

        </div>
 <div>
          <span>Valeur:</span>
                <span class="badge badge-secondary"><?php echo e($deliverie->order->amount ?? "25"); ?>€</span>

        </div>

</div>
      </div>
        
          </p>
        </div>

        
      </div>

      <div class="col-lg-5">


        <div class="card">
          <div class="card-header">Commande

          <a class="float-right badge badge-secondary" href="<?php echo e(url("manager/orders/" . $deliverie->order->order_id)); ?>" target="_blank"><?php echo e($deliverie->order->order_id ?? "Supprimée"); ?></a>
          </div>
          <div class="card-body">

              <div class="my-2">
                <i class="text-muted  mr-1 fa fa-euro-sign"></i>
                <span class="text-muted">Montant:</span> <?php echo e($deliverie->order->amount); ?>€
              </div>
              
              <div class="my-2">
                <i class="text-muted  mr-1 fa fa-circle"></i>
                <span class="text-muted">Identifiant client:</span>  <?php echo e($deliverie->order->user->id); ?>

              </div>

              <div class="my-2">
                <i class="text-muted  mr-1 fa fa-user"></i>
                <span class="text-muted">Nom:</span> <?php echo e($deliverie->order->user->first_name); ?> <?php echo e($deliverie->order->user->lastname_name); ?>

              </div>

              <div class="my-2">
                <i class="text-muted  mr-1 fa fa-user"></i>
                <span class="text-muted">Contact:</span> <?php echo e($deliverie->order->user->email); ?> <?php echo e($deliverie->order->user->profile->phone_number ?? ""); ?> 
              </div>

              <div class="my-2">
                <i class="text-muted  mr-1 fa fa-map-marker"></i>
                <span class="text-muted">Adresse:</span> <?php echo e($deliverie->order->user->profile->location_address ?? "Non renseignée"); ?> <?php echo e($deliverie->order->user->profile->location_postalcode ?? ""); ?> <?php echo e($deliverie->order->user->profile->location_city ?? ""); ?>

              </div>

         
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            Destination  
          </div>
          <div class="card-body">
            
            <p class="text-muted">
              Cette livraison est à envoyer en point relais Mondial Relay
            
            </p>
             <div class="alert alert-info" role="alert">
            <p>Point relais: <?php echo e($deliverie->pickup_id); ?></p>
            <p>
              <?php echo e($deliverie->pickup_name); ?>

            <?php echo e($deliverie->pickup_address); ?> -
            <?php echo e($deliverie->pickup_postalcode); ?>

            <?php echo e($deliverie->pickup_city); ?>

            </p>
            
            
            </div>
          </div>
        </div>


        
        
      </div>
      
    </div>

  <a href="<?php echo e(url("manager/deliveries/" . $deliverie->id . '/edit')); ?>" class="mb-2 btn btn-sm btn-secondary" style="width:100%;">Modifier les détails de cette livraison <i class='ml-1 fa fa-edit'></i></a>
      <?php echo Form::open(array('url' => 'manager/deliveries/' . $deliverie->id, 'class' => '', 'data-toggle' => '', 'title' => 'Supprimer')); ?>

                    <?php echo Form::hidden('_method', 'DELETE'); ?>

                    <?php echo Form::button("Supprimer cette livraison <i class='ml-1 fa fa-trash'></i>", array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Supprimer cette commande', 'data-message' => 'Etes vous sur de vouloir supprimer cette commande ? Si une livraison est associée, elle sera également supprimée!')); ?>

                <?php echo Form::close(); ?>

  </div>



</section>

  <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if(config('deliveriesmanagement.tooltipsEnabled')): ?>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/deliveriesmanagement/show-deliverie.blade.php ENDPATH**/ ?>