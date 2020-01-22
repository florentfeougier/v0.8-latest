<?php $__env->startSection('template_title'); ?>
  Vente de <?php echo e($vente->name); ?>

<?php $__env->stopSection(); ?>

<?php
  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
?>
  <?php     $sold = []; ?>


<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vente de <?php echo e($vente->name); ?> du <?php echo e(date('d/m/Y', strtotime($vente->date))); ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/dashboard")); ?>">Accueil</a></li>
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/ventes")); ?>">Ventes</a></li>
              <li class="breadcrumb-item active"><?php echo e($vente->slug); ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__currentLoopData = \App\Models\Order::where('cart', $vente->slug)->where('payment_status', true)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
    <?php

    foreach($order->products as $product){

      if(array_key_exists("$product->slug", $sold)){
        $sold["$product->slug"] += $product->pivot->quantity;

      }else {
        $sold["$product->slug"] = $product->pivot->quantity;

      }
    }


    ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->startSection('content'); ?>

<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Détails</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Ouvrir">
              <i class="fas fa-minus"></i></button>
           
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Commandes</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo e(count(\App\Models\Order::where('cart', $vente->slug)->where('payment_status', true)->get())); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Revenues total</span>
                      <span class="info-box-number text-center text-muted mb-0">
                         <?php $revenue = 0;
                  foreach(\App\Models\Order::where('cart',$vente->slug)->where('payment_status', true)->get() as $order){

                    $revenue += $order->amount;
                  }
                  ?>
     <?php echo e($revenue); ?>€


                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Produits en vente</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo e(count($vente->products)); ?> <span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Produit(s) disponible</h4>
                    

                    <div class="post">
                      <div class="user-block">
                        
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <?php if(count($vente->products) > 0): ?>
                        <?php $__currentLoopData = $vente->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a data-toggle="tooltip" title="

                        <?php $__currentLoopData = $sold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($a == $product->slug): ?>
                              <?php echo e($s ?? "0"); ?> vendues
                              <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                         " href="" class="mx-2 badge text-secondary" target="_blank"><?php echo e($product->name); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <p>Aucun produit n'est associé à cette vente.</p>
                        <?php endif; ?>
                      </p>

                      <p>
                        <a href="#sold-products" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Liste des produits vendues</a>
                      </p>
                       <h5 class="mt-5 text-muted">Export des données</h5>
              <ul class="list-unstyled">
                
                <li>
                  <a target="_blank" href="<?php echo e(url("manager/ventes/" . $vente->id . "/export-orders")); ?>" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> Liste des commandes (texte)</a>
                </li>
                <li>
                  <a target="_blank" href="<?php echo e(url("manager/ventes/" . $vente->id . "/export-orders-mailing-list")); ?>" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Liste des emails clients</a>
                </li>
                
                <li>
                  <a href="#sold-products" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Liste des produits vendues




                  </a>
                </li>
              </ul>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <img height="140px" src="<?php echo e(url("$vente->thumbnail")); ?>" class="img-fluid mb-2 rounded" alt="">
              <h4 class="text-secondary"><i class="fa fa-map-marker"></i> <?php echo e($vente->location_address); ?> <?php echo e($vente->city); ?></h4>
              <h4 class="text-secondary"><i class="fa fa-calendar"></i> <?php echo e($vente->date); ?></h4>
              <p class="text-muted"><?php echo e($vente->description); ?></p>
             
              
             
              <div class="text-center mt-5 mb-3">
                <a href="<?php echo e(url("manager/ventes/$vente->id/edit")); ?>" class="btn btn-sm btn-secondary">Modifier cette vente</a>
                
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


<!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Commandes (<?php echo e(count(\App\Models\Order::where('cart', $vente->slug)->where('payment_status', true)->get())); ?> payées sur <?php echo e(count(\App\Models\Order::where('cart', $vente->slug)->get())); ?> )</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Ouvrir">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Panier</th>
                  <th>Utilisateur</th>
                  <th>Montant</th>
                  <th>Paiement</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = \App\Models\Order::where('cart', $vente->slug)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td>
                    <?php echo e($order->order_id); ?>

                  </td>
                    <td>
                        <small><?php echo e($order->created_at->format("Y/m/d H:i:s")); ?></small>
                    </td>
                    <td><small>
                      <?php if($order->cart == "shop"): ?>
                      shop
                      <?php else: ?>
                      <a  target="_blank" class="text-dark" href="<?php echo e(url("manager/ventes/" . \App\Models\Vente::where('slug', $order->cart)->first()->slug)); ?>"><?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->name); ?> le <?php echo e(date('d/m/Y', strtotime($vente->date))); ?></a>
                      <?php endif; ?>
                    </small></td>
                    <td><small ><a data-toggle="tooltip" title="<?php echo e($order->user->first_name); ?> <?php echo e($order->user->last_name); ?>" href="<?php echo e(url("manager/users/" . $order->user->id)); ?>" target="_blank" class="text-dark"><?php echo e($order->user->email); ?></a>

                        <?php if(!empty($order->user->profile->phone_number)): ?>
                   
                   <i class="fa fa-phone text-success" data-toggle="tooltip" title="<?php echo e($order->user->profile->phone_number ?? "00000"); ?>"></i>
                   <?php else: ?>
                   <i class="fa fa-phone text-danger"></i>
                   <?php endif; ?>
                  
                   
                   <?php if(!empty($deliverie->order->user->profile->location_address)): ?>
                   
                   <i class="fa fa-map-marker text-success" data-toggle="tooltip" title="<?php echo e($deliverie->order->user->profile->location_address ?? "00000"); ?>"></i>
                   <?php else: ?>
                   
                   <?php endif; ?>

                    </small></td>
                  <td>
                    <small><?php echo e($order->amount); ?>€
                      

                    </small>
                  </td>
                  <td>
                    <?php if($order->payment_status == true): ?>
                      <a href="<?php echo e(url("manager/payments/" . $order->payment_id ?? "deleted")); ?>" target="_blank" class="badge badge-success">Payé via <?php echo e($order->payment_method ?? "CB"); ?></a>
                      <?php else: ?>
                      <span class="badge badge-warning">En attente de paiement</span>
                      <?php endif; ?>
                  </td>
                  
                        <td>
                          <span class="badge badge-secondary">En cours...</span>
                        </td>         
                  <td>
                     <a target="_blank" class="btn btn-sm btn-outline-secondary btn-block" href="<?php echo e(URL::to('manager/orders/' . $order->id)); ?>" data-toggle="tooltip" title="Voir les détails">
                                                  Voir <i class="fa fa-eye"></i>
                                                </a>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                 
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Panier</th>
                  <th>Utilisateur</th>
                  <th>Montant</th>
                  <th>Paiement</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->




<!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 id="sold-products" class="card-title">Liste des produits vendus
   <?php
$totalItemsSold = 0;

foreach($sold as $a => $s){
  $totalItemsSold += $s;
}
        ?>
        (<?php echo e($totalItemsSold); ?>)
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Ouvrir">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Produit</th>
                  <th>Stock</th>
                  <th>Quantité vendue</th>
                  
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  
                    <?php $__currentLoopData = $sold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td style="width:90%">
                        <?php echo e(\App\Models\Product::where('slug', $a)->first()->name); ?>

                      </td>
                      <td style="width:20%"><small><?php echo e(\App\Models\Product::where('slug', $a)->first()->stock); ?></small></td>
                      <td><small><?php echo e($s); ?> vendues</small></td>
                      <td>
                        <a data-toggle="tooltip" title="Modifier ce produit" href="<?php echo e(url("manager/products/")); ?>" class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                   
                              
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
               

                
                 
                </tbody>
                <tfoot>
                <tr>
                  <th>Produit</th>
                  <th>Stock</th>
                  <th>Quantité vendue</th>
                  
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if(config('usersmanagement.tooltipsEnabled')): ?>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

  <script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script>

    
  $(function () {
  
    $('#example1').DataTable({
      "paging": true,
      "pageLength": 50,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "responsive": true,
      "info": true,
      "autoWidth": true,
      "dom": 'Bfrtip',
        "buttons": [
            'excel',
            'pdf',
            'copy'
        ]
    });

   $('#example2').DataTable({
      "paging": true,
      "pageLength": 50,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "responsive": true,
      "info": true,
      "autoWidth": true,
      "dom": 'Bfrtip',
        "buttons": [
            'excel',
            'pdf',
            'copy'
        ]
    });
  });
</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/ventesmanagement/show-vente.blade.php ENDPATH**/ ?>