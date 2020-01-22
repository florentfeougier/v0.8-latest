<?php $__env->startSection('template_title'); ?>
    Toutes les boites
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Gérer vos boites</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/dashboard")); ?>">Accueil</a></li>
              <li class="breadcrumb-item active">boites</li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Toutes vos boites</h3>
                <a href="<?php echo e(url("manager/boites/create")); ?>" class="mx-2 text-dark float-right"><i class="fa fa-trash"></i></a>
              <a href="<?php echo e(url("manager/boites/create")); ?>" title="Ajouter une nouvelle boite" class="text-dark float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Contenu</th>
                  <th>Produit(s)</th>
                  <th>Commandes</th>
                  <th>Stock</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $boites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $boite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td>
                   <?php echo e($boite->name); ?>

                  </td>
                  <td><small><?php echo e($boite->product_quantity); ?> plantes</small>
                  
                 

                  </td>
                  
                  <td><small><?php echo e(count($boite->products)); ?> actifs</small></td>
                  
                  <td><small><?php echo e(count(\App\Models\Order::where("cart", $boite->slug)->where('payment_status', true)->get())); ?> validées</small></td>
                  
                  <td>
                    <?php 
                    $boiteRevenue = 0;
                    foreach(\App\Models\Order::where("cart", $boite->slug)->where('payment_status', true)->get() as $boiteOrder){
                      $boiteRevenue += $boiteOrder->amount;
                    }
                    ?>
                    <small><?php echo e($boite->stock); ?></small>
                  </td>
                  <td>
                    <?php if($boite->status == "active"): ?>
                    <small>En cours</small>
                    <?php elseif($boite->status == "closed"): ?>
                    <small>Terminé</small>
                    <?php endif; ?>
                  </td>
                  <td>
                     <a target="_blank" class="btn btn-sm btn-outline-secondary " href="<?php echo e(URL::to('manager/box/' . $boite->id . "/edit")); ?>" data-toggle="tooltip" title="Modifier cette boite">
                                                   <i class="fa fa-edit"></i>
                                                </a>
                     <a target="_blank" class="btn btn-sm btn-outline-secondary " href="<?php echo e(URL::to('manager/boites/' . $boite->id)); ?>" data-toggle="tooltip" title="Voir les détails">
                                                  Voir <i class="fa fa-eye"></i>
                                                </a>
                    
                    

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                 
                </tbody>
                <tfoot>
                <tr>
                  <th>Nom</th>
                  <th>Contenu</th>
                  <th>Disponibles</th>
                  <th>Produit(s)</th>
                  <th>Commandes</th>
                  <th>Stock</th>
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
  
<script>
  $(function () {
  
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "responsive": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantes-addict/webapp/development/v0.8-latest/resources/views/boitesmanagement/show-boites.blade.php ENDPATH**/ ?>