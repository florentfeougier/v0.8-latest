<?php $__env->startSection('template_title'); ?>
    Toutes les livraisons
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Livraisons</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">livraisons</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <!-- Main content -->
    <section class="content">

       
        <!-- /.row -->
      <div class="row">


        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Toutes les livraisons (<?php echo e(count(\App\Models\Deliverie::all())); ?>)</h3>
                 <a href="<?php echo e(url("manager/products/create")); ?>" class="mx-2 text-dark float-right"><i class="fa fa-trash"></i></a>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Commande</th>
                  <th>Crée le</th>
                  <th>Utilisateur</th>
                  <th>Destination</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $deliveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliverie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($deliverie->order != null && $deliverie->order->payment_status == true && $deliverie->order->payment_id != null): ?>
                <tr>
                  <td>
                    <?php echo e($deliverie->deliverie_id); ?>

                  </td>
                  <td>
                    <small>

                    
            <?php if($deliverie->order != null && $deliverie->order->payment_status == true): ?>
                      <a class="text-dark" target="_blank" href="<?php echo e(url("manager/orders/")); ?>/<?php echo e($deliverie->order->order_id ?? "deleted"); ?>"><?php echo e($deliverie->order->order_id ?? "Supprimée"); ?>

                        </a>
                    <?php else: ?>
                    <p>Non payée</p>
                    <?php endif; ?>
                    

                    </small>
                  </td>
                    <td>
                        <small><?php echo e($deliverie->created_at->format("Y/m/d")); ?></small>
                    </td>
                  
                    <td><small>
                      <a data-toggle="tooltip" title="" target="_blank" href="<?php echo e(url("manager/users/")); ?>/<?php echo e($deliverie->order->user->id ?? "deleted"); ?>" class="text-dark"><?php echo e($deliverie->order->user->email ?? "Inconnu"); ?>


                   
                   <?php if(!empty($deliverie->order->user->profile->phone_number)): ?>
                   
                   <i class="fa fa-phone text-success" data-toggle="tooltip" title="<?php echo e($deliverie->order->user->profile->phone_number ?? "00000"); ?>"></i>
                   <?php else: ?>
                   <i class="fa fa-phone text-danger"></i>
                   <?php endif; ?>
                  
                   
                   <?php if(!empty($deliverie->order->user->profile->location_address)): ?>
                   
                   <i class="fa fa-map-marker text-success" data-toggle="tooltip" title="<?php echo e($deliverie->order->user->profile->location_address ?? "00000"); ?>"></i>
                   <?php else: ?>
                   <i class="fa fa-map-marker text-danger"></i>
                   <?php endif; ?>

                      </a></small></td>
                  <td>
                    <small >

                      <a data-toggle="tooltip" title="Identifiant du point relais" href="" class="badge badge-secondary"><?php echo e($deliverie->pickup_id); ?></a> 
                    <span data-toggle="tooltip" title="<?php echo e($deliverie->pickup_name); ?> | <?php echo e($deliverie->pickup_address); ?> - <?php echo e($deliverie->pickup_postalcode); ?>, <?php echo e($deliverie->pickup_city); ?>">
                        <?php echo e($deliverie->pickup_postalcode); ?> <?php echo e($deliverie->pickup_city); ?>

                      
                    </span>

                    

                    </small>
                  </td>
                  <td>
                    <?php if($deliverie->order != null && $deliverie->order->payment_status == true): ?>
                    <?php if($deliverie->completed == true): ?>

                      <a href="<?php echo e($deliverie->shipment_tracking_url ?? url("manager/deliveries/" . $deliverie->id)); ?>" target="_blank" title="Suivre le colis <?php echo e($deliverie->tracking_id ?? "#000"); ?>" data-toggle="tooltip" class="badge badge-success">Colis <?php echo e($deliverie->tracking_id ?? "#000"); ?> expédié </a>
                      <?php elseif($deliverie->status == "doing"): ?>
                      <span class="badge badge-info">Colis en préparation...</span>
                      <?php else: ?>
                      <span class="badge badge-secondary">A traiter</span>
                      <?php endif; ?>
                      <?php else: ?>
                      <span class="badge badge-danger">Non payé</span>
                      <?php endif; ?>

                  </td>
                  
                                 
                  <td>
                   
                     <a target="_blank" class="btn btn-sm btn-outline-secondary btn-block" href="<?php echo e(URL::to('manager/deliveries/')); ?>/<?php echo e($deliverie->id); ?>" data-toggle="tooltip" title="Voir les détails">
                                                  Voir <i class="fa fa-eye"></i>
                                                </a>
                    
                    

                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                 
                </tbody>
                <tfoot>
                <tr>
                   <th>#</th>
                  <th>Commande</th>
                  <th>Ajoutée le</th>
                  <th>Utilisateur</th>
                  <th>Destination</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
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
  });
</script>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantes-addict/webapp/development/v0.8-latest/resources/views/deliveriesmanagement/show-deliveries.blade.php ENDPATH**/ ?>