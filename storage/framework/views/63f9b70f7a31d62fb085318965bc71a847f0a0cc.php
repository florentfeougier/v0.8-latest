<?php $__env->startSection('template_title'); ?>
  <?php echo trans('pagesmanagement.showing-page', ['name' => $page->name]); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white <?php if($page->activated == 1): ?> bg-success <?php else: ?> bg-danger <?php endif; ?>">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <?php echo trans('pagesmanagement.showing-page-title', ['name' => $page->name]); ?>

              <div class="float-right">
                <a href="<?php echo e(route('manager.pages')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('pagesmanagement.tooltips.back-pages')); ?>">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  <?php echo trans('pagesmanagement.buttons.back-to-pages'); ?>

                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-sm-4 offset-sm-2 col-md-2 offset-md-3">
                
              </div>
              <div class="col-sm-4 col-md-6">
                <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                  <?php echo e($page->name); ?>

                </h4>
                <p class="text-center text-left-tablet">
                  <strong>
                    <?php echo e($page->first_name); ?> <?php echo e($page->last_name); ?>

                  </strong>
                  <?php if($page->email): ?>
                    <br />
                    <span class="text-center" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('pagesmanagement.tooltips.email-page', ['page' => $page->email])); ?>">
                      <?php echo e(Html::mailto($page->email, $page->email)); ?>

                    </span>
                  <?php endif; ?>
                </p>
                <?php if($page->profile): ?>
                  <div class="text-center text-left-tablet mb-4">
                    <a href="<?php echo e(url('/profile/'.$page->name)); ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('pagesmanagement.viewProfile')); ?>">
                      <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> <?php echo e(trans('pagesmanagement.viewProfile')); ?></span>
                    </a>
                    <a href="/pages/<?php echo e($page->id); ?>/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('pagesmanagement.editUser')); ?>">
                      <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> <?php echo e(trans('pagesmanagement.editUser')); ?> </span>
                    </a>
                    <?php echo Form::open(array('url' => 'pages/' . $page->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('pagesmanagement.deleteUser'))); ?>

                      <?php echo Form::hidden('_method', 'DELETE'); ?>

                      <?php echo Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('pagesmanagement.deleteUser') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this page?')); ?>

                    <?php echo Form::close(); ?>

                  </div>
                <?php endif; ?>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php if($page->name): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('pagesmanagement.labelUserName')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($page->name); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($page->email): ?>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('pagesmanagement.labelEmail')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
              <span data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('pagesmanagement.tooltips.email-page', ['page' => $page->email])); ?>">
                <?php echo e(HTML::mailto($page->email, $page->email)); ?>

              </span>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($page->first_name): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('pagesmanagement.labelFirstName')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($page->first_name); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($page->last_name): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('pagesmanagement.labelLastName')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($page->last_name); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('pagesmanagement.labelRole')); ?>

              </strong>
            </div>

            <div class="col-sm-7">

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('pagesmanagement.labelStatus')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
              <?php if($page->activated == 1): ?>
                <span class="badge badge-success">
                  Activated
                </span>
              <?php else: ?>
                <span class="badge badge-danger">
                  Not-Activated
                </span>
              <?php endif; ?>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('pagesmanagement.labelAccessLevel')); ?> :
              </strong>
            </div>

            <div class="col-sm-7">



            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('pagesmanagement.labelPermissions')); ?>

              </strong>
            </div>

            <div class="col-sm-7">

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php if($page->created_at): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('pagesmanagement.labelCreatedAt')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($page->created_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($page->updated_at): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('pagesmanagement.labelUpdatedAt')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($page->updated_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($page->signup_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('pagesmanagement.labelIpEmail')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($page->signup_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($page->signup_confirmation_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('pagesmanagement.labelIpConfirm')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($page->signup_confirmation_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($page->signup_sm_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('pagesmanagement.labelIpSocial')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($page->signup_sm_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($page->admin_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('pagesmanagement.labelIpAdmin')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($page->admin_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($page->updated_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('pagesmanagement.labelIpUpdate')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($page->updated_ip_address); ?>

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
  <?php if(config('pagesmanagement.tooltipsEnabled')): ?>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/pagesmanagement/show-page.blade.php ENDPATH**/ ?>