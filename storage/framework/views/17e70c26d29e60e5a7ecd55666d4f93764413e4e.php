<?php $__env->startSection('template_title'); ?>
Fiche produit <?php echo e($product->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Fiche produit: <?php echo e($product->name); ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/dashboard")); ?>">Accueil</a></li>
              <li class="breadcrumb-item "><a href="<?php echo e(url("manager/products")); ?>">Produits</a></li>
              <li class="breadcrumb-item active"><?php echo e($product->slug); ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content">
   <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h2 class="d-inline-block d-sm-none"><?php echo e($product->name); ?> </h2>
              <div class="col-12">
                <img src="<?php echo e(url("$product->thumbnail")); ?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                
                <?php if($product->picture_one != null): ?>
                <div class="product-image-thumb" ><img src="<?php echo e(url("$product->picture_one")); ?>" alt="Product Image"></div>
                <?php endif; ?>
                <?php if($product->picture_two != null): ?>
                <div class="product-image-thumb" ><img src="<?php echo e(url("$product->picture_two")); ?>" alt="Product Image"></div>
                <?php endif; ?>
                <?php if($product->video != null): ?>
                <div class="product-image-thumb" ><a target="_blank" href="<?php echo e(url("$product->video")); ?>" title="Vidéo du produit">
                  <img src="<?php echo e(url("storage/images/play-button.png")); ?>" alt="Product Image">
                </a></div>
                <?php endif; ?>
                
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h2 class="my-3"><?php echo e($product->name); ?> <span data-toggle="tooltip" title="Label associé" class="badge " style="background:<?php echo e($product->color_code); ?>;"><?php echo e($product->productlabel->name ?? ""); ?></span></h2>
              <p><?php echo e($product->description); ?></p>

              <hr>
              <h4>Actuellement disponible dans:</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <?php if($product->store_enabled == true): ?>
                <label data-toggle="tooltip" title="Ce produit est en vente dans le shop" class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                  Shop
                  <br>
                  <i class="fas fa-check fa-2x text-green"></i>
                </label>
                <?php else: ?>
                  <label data-toggle="tooltip" title="Ce produit n'est pas en vente dans le shop" class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                  Shop
                  <br>
                  <i class="fas fa-times fa-2x text-danger"></i>
                </label>
                <?php endif; ?>

                <?php if(count($product->ventes) > 0): ?>
                <?php $__currentLoopData = $product->ventes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <label class="btn btn-default text-center active" data-toggle="tooltip" title="Vente de <?php echo e($vente->name); ?> du <?php echo e($vente->date); ?>">
                  
                  <?php echo e($vente->name); ?>

                  <br>
                  <i class="fas fa-check fa-2x text-green"></i>
                </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>


              </div>

             

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Prix: <?php echo e($product->price); ?>€
                </h2>
                <h4 class="mt-0">
                  <small>Tax: <?php echo e($product->tax); ?>% </small>
                </h4>
              </div>

              <div class="mt-4">
                <a href="<?php echo e(url("manager/products/" . $product->id)); ?>" class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-chart-line fa-lg mr-2"></i> 
                  <?php echo e($product->stock); ?> en stock
                </a>

                <a href="<?php echo e(url("manager/products/" . $product->id . '/edit')); ?>" class="btn btn-default btn-lg btn-flat">
                  <i class="fa fa-edit fa-lg mr-2"></i> 
                  Modifier le produit
                </div>
              </a>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Disponibilitées</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Gestion du stock</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
              <p>Description: <?php echo e($product->description); ?></p>
              <p>Spécifications: <?php echo e($product->specs); ?></p>
              <p>Poids: <?php echo e($product->weight); ?></p>
              <p>Taille: <?php echo e($product->height); ?></p>
               </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
  <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if(config('productsmanagement.tooltipsEnabled')): ?>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/productsmanagement/show-product.blade.php ENDPATH**/ ?>