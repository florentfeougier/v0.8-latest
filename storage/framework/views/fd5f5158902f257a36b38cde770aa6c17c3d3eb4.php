<?php $__env->startSection('template_title'); ?>
    Tous les produits
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Gérer vos produits</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Produits</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
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
                

              <h3 class="card-title">Tous les produits (<?php echo e(count($products)); ?>)</h3>
            
              <a href="<?php echo e(url("manager/products/create")); ?>" class="mx-2 text-dark float-right"><i class="fa fa-trash"></i></a>
              <a href="<?php echo e(url("manager/products/categories")); ?>" title="Gérer les catégories" class="mx-2 text-dark float-right"><i class="fa fa-list"></i></a>
              <a href="<?php echo e(url("manager/products/labels")); ?>" title="Gérer les labels" class="mx-2 text-dark float-right"><i class="fa fa-tags"></i></a>
              <a href="<?php echo e(url("manager/products/create")); ?>" title="Ajouter un nouveau produit" class="text-dark float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Label</th>
                  <th>Disponibilité</th>
                  <th>Prix</th>
                  <th>TVA</th>
                  <th>Stock</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td>
                    <?php if($product->is_public): ?>
                     <span class=""><?php echo e($product->name); ?></span>
                    <?php else: ?>
                    <span class=""><?php echo e($product->name); ?></span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <span class=" text-white badge" style="color:#FFF;background: <?php echo e($product->productlabel->color_code ?? "#ECECEC"); ?>;">
                      <?php echo e($product->productlabel->name ?? "Aucun"); ?>

                    </span>
                  </td>
                    <td>
                        <?php if($product->store_enabled == true): ?>
                        <span class="badge badge-secondary">Shop</span>
                        <?php endif; ?>
                        <?php if(count($product->ventes) > 0): ?>
                        <?php $__currentLoopData = $product->ventes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge badge-secondary" data-toggle="tooltip" title="Vente de <?php echo e($vente->name); ?> du <?php echo e($vente->date); ?>"><?php echo e($vente->name); ?></span>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </td>
                  <td><small><?php echo e($product->price); ?>€</small></td>
                  <td><small><?php echo e($product->tax); ?>%</small></td>
                            <td>
                    <div style="height:15px;" class="progress progress-xs">
                         
                        
                    <?php if($product->stock < 4): ?>
                     <div class="progress-bar bg-danger" style="width: 5%"></div>
                    <span class="badge"><?php echo e($product->stock); ?></span>
                    <?php elseif($product->stock >= 4 && $product->stock < 10): ?>
                     <div class="progress-bar bg-warning" style="width: 20%"></div>
                    <span class="badge"><?php echo e($product->stock); ?></span>
                    <?php elseif($product->stock >= 10 && $product->stock <= 20): ?>
                     <div class="progress-bar bg-secondary" style="width: 50%"></div>
                    <span class=""><?php echo e($product->stock); ?></span>
                    <?php elseif($product->stock >= 50 && $product->stock < 60): ?>
                     <div class="progress-bar bg-info" style="width: 90%"></div>
                    <span class="badge"><?php echo e($product->stock); ?></span>
                    
                    <?php else: ?>
                     <div class="progress-bar bg-success" style="width: 100%"></div>
                    <span class="badge"><?php echo e($product->stock); ?></span>
                    <?php endif; ?>
                    </div>
                                
                            </td>      
                  <td>
                     <a target="" class="btn btn-sm btn-outline-secondary " href="<?php echo e(URL::to('manager/products/' . $product->id . '/edit')); ?>" data-toggle="tooltip" title="Modifier ce produit">
                                                   <i class="fa fa-edit"></i>
                                                </a>
                     <a target="_blank" class="btn btn-sm btn-outline-secondary " href="<?php echo e(URL::to('manager/products/' . $product->id)); ?>" data-toggle="tooltip" title="Voir les détails">
                                                  Voir <i class="fa fa-eye"></i>
                                                </a>
                    

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                 
                </tbody>
                <tfoot>
                <tr>
                  <th>Nom</th>
                  <th>Label</th>
                  <th>Disponibilité</th>
                  <th>Prix</th>
                  <th>TVA</th>
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
      "lengthChange": false,
      "pageLength": 50,
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


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/productsmanagement/show-products.blade.php ENDPATH**/ ?>