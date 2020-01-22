<?php $__env->startSection('template_title'); ?>
    Toutes les fiches d'entretien
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Toutes vos fiches d'entretien</h3>
                <a href="<?php echo e(url("manager/fiches/create")); ?>" class="mx-2 text-dark float-right"><i class="fa fa-trash"></i></a>
              <a href="<?php echo e(url("manager/fiches/create")); ?>" title="Ajouter une nouvelle vente" class="text-dark float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Produit(s) associé(s)</th>
            
                  <th>Modifié le</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $fiches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td style="width:auto;">
                    <?php echo e($fiche->name); ?>

                  </td>
                  <td style="width:40%;">
                      <?php $__currentLoopData = $fiche->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <small><a class=" text-underline text-dark" href="<?php echo e(url("manager/products/" . $product->id)); ?>"><?php echo e($product->name); ?> </a>,</small> 

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </td>
                  <td style="width:15%;"><small><?php echo e($fiche->updated_at); ?></small></td>
                  
                  <td style="width:25%;">
                    <a href="<?php echo e(url("manager/fiches/" . $fiche->id . "/clone")); ?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Cloner cette fiche"><i class="fa fa-clone" title="Cloner cette fiche"></i></a>
                     <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(URL::to('manager/fiches/' . $fiche->id ."/edit")); ?>" data-toggle="tooltip" title="Voir les détails">
                                                  Modifier <i class="fa fa-edit"></i>
                                                </a>
                     <a target="_blank" class="btn btn-sm btn-outline-secondary" href="<?php echo e(URL::to('fiches-entretien/' . $fiche->slug)); ?>" data-toggle="tooltip" title="Voir cette fiche">
                                                  Voir <i class="fa fa-eye"></i>
                                                </a>
                    

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                 
                </tbody>
                <tfoot>
                <tr>
                  <th>Nom</th>
                  <th>Produit(s)</th>
                  <th>Modifié le</th>
                 
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
      "autoWidth": true
    });
  });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/fichesmanagement/show-fiches.blade.php ENDPATH**/ ?>