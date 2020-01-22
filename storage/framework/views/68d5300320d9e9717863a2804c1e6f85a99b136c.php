<?php $__env->startSection('template_title'); ?>
  Fiche d'entretien: <?php echo e($fiche->name); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white bg-success">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <?php echo trans('fichesmanagement.showing-fiche-title', ['name' => $fiche->name]); ?>

              <div class="float-right">

                <a href="<?php echo e(route('manager.fiches')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('fichesmanagement.tooltips.back-fiches')); ?>">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Retour aux fiches
                </a>

                <a href="<?php echo e(url("manager/fiches/$fiche->id/edit")); ?>" class=" mx-1 btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('fichesmanagement.tooltips.back-fiches')); ?>">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Modifier cette fiche
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">



                <div class="col-lg-2 offset-sm-1">
                  <div class="text-center float-center">
                    <img src="<?php echo e(asset($fiche->thumbnail)); ?>" alt="" height="200px">

                  </div>
                </div>
                <div class="col-lg-9">

<div class="text-center">
  <h1 class="text-muted margin-top-sm-1 text-center text-left-tablet"><?php echo e($fiche->name); ?> <span class="badge badge-secondary"><?php echo e($fiche->price); ?>€</span> </h1>
  <?php if($fiche->stock <= 10): ?> <span class="badge badge-warning text-center text-left-tablet"><?php echo e($fiche->stock); ?> en stock</span> <?php elseif($fiche->stock < 5): ?> <span class="badge badge-danger text-center text-left-tablet"><?php echo e($fiche->stock); ?> en stock</span> <?php else: ?> <span class="badge badge-danger text-center text-left-tablet"><?php echo e($fiche->stock); ?> en stock</span> <?php endif; ?>
  <?php if($fiche->sold > 1): ?> <span class="badge badge-success text-center text-left-tablet"><?php echo e($fiche->sold); ?> vendus</span> <?php else: ?> <span class="badge badge-danger text-center text-left-tablet"><?php echo e($fiche->sold); ?> vendus</span> <?php endif; ?>
  <?php if($fiche->store_enabled == true): ?> <span class="badge badge-success">Article en vente dans le shop</span> <?php else: ?> <span class="badge badge-danger">Article en vente dans le shop</span> <?php endif; ?>
</div>
                </div>


            </div>

            <div class="row">

              <div class="col-sm-4 col-md-6">

                <p class="text-center text-left-tablet">
                  <strong>
                    <?php echo e($fiche->first_name); ?> <?php echo e($fiche->last_name); ?>

                  </strong>

                </p>

              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php if($fiche->description): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Description
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($fiche->description); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>







            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Spécifications
              </strong>
            </div>

            <div class="col-sm-7">
            <?php echo e($fiche->specs); ?>

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('fichesmanagement.labelStatus')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
              <?php if($fiche->is_public == 1): ?>
                <span class="badge badge-success">
                  Public
                </span>
              <?php else: ?>
                <span class="badge badge-danger">
                  Non affichée
                </span>
              <?php endif; ?>
            </div>





            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php if($fiche->created_at): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Crée le
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($fiche->created_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($fiche->updated_at): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Modifié le
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($fiche->updated_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($fiche->signup_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('fichesmanagement.labelIpEmail')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($fiche->signup_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($fiche->signup_confirmation_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('fichesmanagement.labelIpConfirm')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($fiche->signup_confirmation_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($fiche->signup_sm_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('fichesmanagement.labelIpSocial')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($fiche->signup_sm_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($fiche->admin_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('fichesmanagement.labelIpAdmin')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($fiche->admin_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($fiche->updated_ip_address): ?>


            <?php endif; ?>


            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Produits associés
              </strong>
            </div>

            <div class="col-sm-7">
              <?php if(count($fiche->products) > 0): ?>
                <?php $__currentLoopData = $fiche->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <a href="<?php echo e(route('manager.products', $product->id)); ?>" class="badge badge-success"><?php echo e($product->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
                <p>Aucun produit n'est associé à cette fiche d'entretien.</p>
              <?php endif; ?>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>



          </div>

        </div>
      </div>
    </div>
  </div>



  <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if(config('fichesmanagement.tooltipsEnabled')): ?>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/fichesmanagement/show-fiche.blade.php ENDPATH**/ ?>