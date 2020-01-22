<?php $__env->startSection('template_title'); ?>
    Tous les articles de blog
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
   <style>
       
   </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Articles de blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Blog</li>
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
              <h3 class="card-title">Tous les articles (<?php echo e(count(\App\Models\Post::all())); ?>)</h3>
                 <a href="<?php echo e(url("manager/posts/create")); ?>" class="mx-2 text-dark float-right"><i class="fa fa-trash"></i></a>
              <a href="<?php echo e(url("manager/posts/categories")); ?>" title="Gérer les catégories" class="mx-2 text-dark float-right"><i class="fa fa-list"></i></a>
              <a href="<?php echo e(url("manager/posts/create")); ?>" title="Ajouter un article" class="text-dark float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Titre</th>
                  <th>Catégorie</th>
                  <th>Modifié le</th>
                 
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td style="width:50%;">
                    <?php echo e($post->name); ?>

                  </td>
                  <td style="width:15%;">
                      <small><?php echo e($post->postcategorie->name ?? "Aucune catégorie"); ?></small>
                  </td>
                    <td style="width:15%;">
                        <small><?php echo e($post->created_at->format("Y/m/d H:i:s")); ?></small>
                    </td>
                    
                 
                  
                                 
                  <td style="width:25%;">
                     <a href="<?php echo e(url("manager/posts/" . $post->id . "/clone")); ?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Cloner cette post"><i class="fa fa-clone" title="Cloner cet article"></i></a>
                     <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(URL::to('manager/posts/' . $post->id ."/edit")); ?>" data-toggle="tooltip" title="Voir les détails">
                                                  Modifier <i class="fa fa-edit"></i>
                                                </a>
                     <a target="_blank" class="btn btn-sm btn-outline-secondary" href="<?php echo e(URL::to('manager/posts/' . $post->id)); ?>" data-toggle="tooltip" title="Voir les détails">
                                                  Voir <i class="fa fa-eye"></i>
                                                </a>
                    

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                 
                </tbody>
                <tfoot>
                <tr>
                 <th>Titre</th>
                  <th>Catégorie</th>
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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/postsmanagement/show-posts.blade.php ENDPATH**/ ?>