<?php $__env->startSection('template_title'); ?>
  Label produit <?php echo e($productlabel->name); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white " style="background: <?php echo e($productlabel->color_code); ?>;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
               Label: <?php echo e($productlabel->name); ?>

              <div class="float-right">

                <a href="<?php echo e(url('manager/products/labels')); ?>" class="btn btn-light btn-sm float-right" data-placement="left" title="<?php echo e(trans('productsmanagement.tooltips.back-products')); ?>">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Retour aux labels
                </a>

                <a href="<?php echo e(url("manager/products/labels/$productlabel->id/edit")); ?>" class=" mx-1 btn btn-light btn-sm float-right"  data-placement="left" title="Modifier">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Modifier ce label
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">




                <div class="col-lg-12">

<div class="text-center">
  <h2 class="text-muted margin-top-sm-1 text-center text-left-tablet">
    <?php echo e($productlabel->name); ?>



  </h2>


</div>
                </div>


            </div>

            <div class="row">

              <div class="col-sm-4 col-md-6">

                <p class="text-center text-left-tablet">
                  <strong>
                    <?php echo e($productlabel->first_name); ?> <?php echo e($productlabel->last_name); ?>

                  </strong>

                </p>

              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php if($productlabel->description): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Description
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productlabel->description); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productlabel->specs): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Spécifications
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productlabel->specs); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productlabel->weight): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Poids (g)
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productlabel->weight); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productlabel->height): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Taille (hauteur en cm)
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productlabel->height); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>


                        <?php if($productlabel->meta_title): ?>

                          <div class="col-sm-5 col-6 text-larger">
                            <strong>
                              Titre meta
                            </strong>
                          </div>

                          <div class="col-sm-7">
                            <?php echo e($productlabel->meta_title); ?>

                          </div>

                          <div class="clearfix"></div>
                          <div class="border-bottom"></div>

                        <?php endif; ?>
                        <?php if($productlabel->meta_desc): ?>

                          <div class="col-sm-5 col-6 text-larger">
                            <strong>
                              Titre description
                            </strong>
                          </div>

                          <div class="col-sm-7">
                            <?php echo e($productlabel->meta_desc); ?>

                          </div>

                          <div class="clearfix"></div>
                          <div class="border-bottom"></div>

                        <?php endif; ?>

            <?php if($productlabel->color_code): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Code couleur
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productlabel->color_code); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productlabel->weight): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Description
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productlabel->weight); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productlabel->price): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Prix
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productlabel->price); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productlabel->tax): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Taux TVA
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productlabel->tax); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productlabel->old_price): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Ancien prix
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productlabel->old_price); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>


                <div class="col-lg-12 text-larger py-2">
                  <strong>
                    Produits associés à ce label (<?php echo e(count($productlabel->products)); ?>)
                  </strong>
                </div>

                <div class="col-sm-12">
                  <?php $__currentLoopData = $productlabel->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(url("manager/products/" . $product->id)); ?>" class="btn btn-outline-secondary mb-2"><?php echo e($product->name); ?></a>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="clearfix"></div>
                <div class="border-bottom"></div>


            <?php if($productlabel->created_at): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Crée le
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productlabel->created_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productlabel->updated_at): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Modifié le
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($productlabel->updated_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productlabel->signup_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('productsmanagement.labelIpEmail')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($productlabel->signup_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productlabel->signup_confirmation_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('productsmanagement.labelIpConfirm')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($productlabel->signup_confirmation_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productlabel->signup_sm_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('productsmanagement.labelIpSocial')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($productlabel->signup_sm_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productlabel->admin_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('productsmanagement.labelIpAdmin')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($productlabel->admin_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($productlabel->updated_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('productsmanagement.labelIpUpdate')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($productlabel->updated_ip_address); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/productlabelsmanagement/show-productlabel.blade.php ENDPATH**/ ?>