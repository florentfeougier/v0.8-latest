<?php $__env->startSection('template_title'); ?>
Article: <?php echo e($post->name); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white <?php if($post->activated == 1): ?> bg-success <?php else: ?> bg-danger <?php endif; ?>">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <?php echo trans('usersmanagement.showing-user-title', ['name' => $post->name]); ?>

              <div class="float-right">
                <a href="<?php echo e(route('users')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  <?php echo trans('usersmanagement.buttons.back-to-users'); ?>

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
                  <?php echo e($post->name); ?>

                </h4>
                <p class="text-center text-left-tablet">
                  <strong>
                    <?php echo e($post->first_name); ?> <?php echo e($post->last_name); ?>

                  </strong>
                  <?php if($post->email): ?>
                    <br />
                    <span class="text-center" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('usersmanagement.tooltips.email-user', ['user' => $post->email])); ?>">
                      <?php echo e(Html::mailto($post->email, $post->email)); ?>

                    </span>
                  <?php endif; ?>
                </p>
                <?php if($post->profile): ?>
                  <div class="text-center text-left-tablet mb-4">
                    <a href="<?php echo e(url('/profile/'.$post->name)); ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.viewProfile')); ?>">
                      <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> <?php echo e(trans('usersmanagement.viewProfile')); ?></span>
                    </a>
                    <a href="/users/<?php echo e($post->id); ?>/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('usersmanagement.editUser')); ?>">
                      <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> <?php echo e(trans('usersmanagement.editUser')); ?> </span>
                    </a>
                    <?php echo Form::open(array('url' => 'users/' . $post->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('usersmanagement.deleteUser'))); ?>

                      <?php echo Form::hidden('_method', 'DELETE'); ?>

                      <?php echo Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('usersmanagement.deleteUser') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user?')); ?>

                    <?php echo Form::close(); ?>

                  </div>
                <?php endif; ?>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php if($post->name): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelUserName')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($post->name); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($post->email): ?>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('usersmanagement.labelEmail')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
              <span data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('usersmanagement.tooltips.email-user', ['user' => $post->email])); ?>">
                <?php echo e(HTML::mailto($post->email, $post->email)); ?>

              </span>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($post->first_name): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelFirstName')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($post->first_name); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($post->last_name): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelLastName')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($post->last_name); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('usersmanagement.labelRole')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
             
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('usersmanagement.labelStatus')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
              <?php if($post->activated == 1): ?>
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
              
              </strong>
            </div>

            <div class="col-sm-7">

             

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('usersmanagement.labelPermissions')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
            
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php if($post->created_at): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelCreatedAt')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($post->created_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($post->updated_at): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelUpdatedAt')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($post->updated_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($post->signup_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpEmail')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($post->signup_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($post->signup_confirmation_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpConfirm')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($post->signup_confirmation_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($post->signup_sm_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpSocial')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($post->signup_sm_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($post->admin_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpAdmin')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($post->admin_ip_address); ?>

                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($post->updated_ip_address): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpUpdate')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  <?php echo e($post->updated_ip_address); ?>

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
  <?php if(config('usersmanagement.tooltipsEnabled')): ?>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/postsmanagement/show-post.blade.php ENDPATH**/ ?>