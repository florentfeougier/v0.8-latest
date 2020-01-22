<?php $__env->startSection('template_title'); ?>
    Toutes les paiements
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Paiements</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Paiements</li>
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
              <h3 class="card-title">Tous les paiements (<?php echo e(count(\App\Models\Payment::where('response_code', "00000")->get())); ?> acceptés sur <?php echo e(count(\App\Models\Payment::all())); ?>)</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Commande</th>
                  <th>Utilisateur</th>
                  <th>Montant</th>
                  <th>Transaction</th>
                  <th>Méthode</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td>
                    <?php echo e($payment->ref_id); ?>

                  </td>
                    <td>
                        <small><?php echo e($payment->created_at->format("Y/m/d H:i:s")); ?></small>
                    </td>
                    <td><small>
                      <a href="<?php echo e(url("manager/orders/")); ?>/<?php echo e($payment->order->order_id ?? "deleted"); ?>"><?php echo e($payment->order->order_id ?? "Commande supprimée"); ?></a>
                    </small></td>
                    <td><small ><a href="<?php echo e(url("manager/users/")); ?>/<?php echo e($payment->order->user->id ?? "deleted"); ?>" target="_blank" class="text-dark"><?php echo e($payment->user->email ?? "Inconnu"); ?></a></small></td>
                  <td>
                    <small><?php echo e($payment->amount); ?>€
                      

                    </small>
                  </td>
                  <td>
                    <?php if($payment->response_code == "00000"): ?>
                      <span class="badge badge-success"><?php echo e($payment->transaction_number ?? "Aucun"); ?></span>
                      
                    <?php elseif($payment->response_code == "00151"): ?>
                      
                      <span class="badge badge-danger">Refusé</span>
                    <?php else: ?>
                      <span class="badge badge-warning">En attente...</span>
                  <?php endif; ?>
                  </td>

                  <td>
                    <small><?php echo e($payment->payment_method ?? "Aucune"); ?></small>
                  </td>
                  
                                 
                  <td>
                      <a target="_blank" class="btn btn-sm btn-outline-secondary btn-block" href="<?php echo e(URL::to('manager/payments/' . $payment->id)); ?>" data-toggle="tooltip" title="Voir les détails">
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
      "order": [],
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


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/paymentsmanagement/show-payments.blade.php ENDPATH**/ ?>