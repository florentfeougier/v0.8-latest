<?php $__env->startSection('template_title'); ?>
  Catégorie <?php echo e($productcategorie->name); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white bg-success">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              Catégorie <?php echo e($productcategorie->name); ?>

              <div class="float-right">

                <a href="<?php echo e(url('manager/products/categories')); ?>" class="mb-1 btn btn-light btn-sm float-right"  data-placement="left" title="<?php echo e(trans('productsmanagement.tooltips.back-products')); ?>">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Retour aux catégories
                </a>

                <a href="<?php echo e(url("manager/products/categories/$productcategorie->id/edit")); ?>" class=" mx-1 btn btn-light btn-sm float-right"  data-placement="left" title="<?php echo e(trans('productsmanagement.tooltips.back-products')); ?>">
                  <i class="fa fa-edit" aria-hidden="true"></i>
                  Modifier cette catégorie
                </a>
              </div>
            </div>
          </div>

<div class="card-body">

    <div class="row">


      <div class="col-lg-12">

          <div class="text-center">
            <h2 class="text-muted margin-top-sm-1 text-center text-left-tablet">
              Catégorie: <?php echo e($productcategorie->name); ?>



            </h2>


          </div>
        </div>


    </div>


    <div class="col-lg-12 text-larger">
      <strong>
        Produits dans cette catégorie (<?php echo e(count($productcategorie->products)); ?>)
      </strong>
    </div>

    <div class="col-sm-12">
      <?php $__currentLoopData = $productcategorie->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(url("manager/products/" . $product->id)); ?>" class="btn btn-outline-secondary mb-2"><?php echo e($product->name); ?></a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php if($productcategorie->description): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Description
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productcategorie->description); ?>

              </div>



            <?php endif; ?>





            <?php if($productcategorie->meta_title): ?>

                          <div class="col-sm-5 col-6 text-larger">
                            <strong>
                              Titre meta
                            </strong>
                          </div>

                          <div class="col-sm-7">
                            <?php echo e($productcategorie->meta_title); ?>

                          </div>

                          <div class="clearfix"></div>
                          <div class="border-bottom"></div>

          <?php endif; ?>
          <?php if($productcategorie->meta_desc): ?>

                          <div class="col-sm-5 col-6 text-larger">
                            <strong>
                              Titre description
                            </strong>
                          </div>

                          <div class="col-sm-7">
                            <?php echo e($productcategorie->meta_desc); ?>

                          </div>

                          <div class="clearfix"></div>
                          <div class="border-bottom"></div>

          <?php endif; ?>

            <?php if($productcategorie->color_code): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Code couleur
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productcategorie->color_code); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>






            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php if($productcategorie->created_at): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Crée le
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productcategorie->created_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productcategorie->updated_at): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Modifié le
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productcategorie->updated_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productcategorie->signup_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('productsmanagement.labelIpEmail')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($productcategorie->signup_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productcategorie->signup_confirmation_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('productsmanagement.labelIpConfirm')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($productcategorie->signup_confirmation_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productcategorie->signup_sm_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('productsmanagement.labelIpSocial')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($productcategorie->signup_sm_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productcategorie->admin_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('productsmanagement.labelIpAdmin')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($productcategorie->admin_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productcategorie->updated_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('productsmanagement.labelIpUpdate')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($productcategorie->updated_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

          </div>

        </div>
      </div>
    </div>
  </div>

  <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if(config('productsmanagement.tooltipsEnabled')): ?>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/productcategoriesmanagement/show-productcategorie.blade.php ENDPATH**/ ?>