<?php $__env->startSection('template_title'); ?>
  Compte utilisateur de <?php echo e($user->email); ?>

<?php $__env->stopSection(); ?>

<?php
  $levelAmount = trans('usersmanagement.labelUserLevel');
  if ($user->level() >= 2) {
    $levelAmount = trans('usersmanagement.labelUserLevels');
  }
?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Compte de <?php echo e($user->email); ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/dashboard")); ?>">Accueil</a></li>
              <li class="breadcrumb-item "><a href="<?php echo e(url("manager/users")); ?>">Utilisateurs</a></li>
              <li class="breadcrumb-item active"><?php echo e($user->id); ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php if($user->profile && $user->profile->avatar_status == 1): ?> <?php echo e($user->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get($user->email)); ?> <?php endif; ?>" alt="<?php echo e($user->name); ?>"
                       alt="User profile picture">

                </div>

                <h3 class="profile-username text-center"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h3>

                <p class="text-muted text-center"><?php echo e($user->email); ?></p>

                <ul class="list-group list-group-unbordered mb-3">

                  <li class="list-group-item">
                    <b>Role</b> <a class="float-right">  <?php echo e($user->roles->first()->name); ?></a>
                  </li>
                 <li class="list-group-item">
                    <b>Commandes</b> <a class="float-right"><?php echo e(count($user->orders)); ?></a>
                  </li>
                  
                </ul>

                <a href="mailto:<?php echo e($user->email); ?>" class="btn btn-secondary btn-block"><b>Contacter <i class="fa fa-envelope"></i></b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">A propos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Téléphone</strong>

                <p class="text-muted">
                  <?php echo e($user->profile->phone_number ?? "Téléphone non renseigné"); ?>

                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Adresse</strong>

                <p class="text-muted"><?php echo e($user->profile->location_address ?? "Adresse non renseigné"); ?> - <?php echo e($user->profile->location_postalcode ?? "Code postal non renseigné"); ?> <?php echo e($user->profile->location_city ?? "Ville non renseignée"); ?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted"><?php echo e($user->profile->bio ?? " "); ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activités</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Commandes (<?php echo e(count($user->orders)); ?>)</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Information client</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    
                    <!-- /.post -->

                    <!-- Post -->
                    
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php if($user->profile && $user->profile->avatar_status == 1): ?> <?php echo e($user->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get($user->email)); ?> <?php endif; ?>" alt="User Image">
                        <span class="username">
                          <a href="#"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Modification du profil - <?php echo e($user->profile->updated_at ?? "Compte non modifié"); ?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <?php echo e($user->first_name); ?> a modifié son profile:
                        <ul>
                          <li style="list-style-type: none;"><i class="mr-2 fa fa-phone"></i><?php echo e($user->profile->phone_number ?? "Téléphone non renseigné"); ?></li>
                          <li style="list-style-type: none;"><i class="mr-2 fa fa-map-marker"></i><?php echo e($user->profile->location_address ?? "Adresse non renseigné"); ?> - <?php echo e($user->profile->postalcode ?? "00000"); ?> <?php echo e($user->profile->location_city ?? "Ville non renseignée"); ?></li>
                        </ul>
                      </p>

                      
                    </div>
         
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php if($user->profile && $user->profile->avatar_status == 1): ?> <?php echo e($user->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get($user->email)); ?> <?php endif; ?>" alt="User Image">
                        <span class="username">
                          <a href="#"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Inscription - <?php echo e($user->created_at); ?></span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-12">
                           <p>Inscription avec l'adresse mail <?php echo e($user->email); ?> via l'adresse IP <?php echo e($user->signup_ip_address); ?></p>
                        </div>
                        <!-- /.col -->
                      
                      
                           
                     
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                     
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      
                      
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      
                     

                      <?php $__currentLoopData = $user->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <div class="time-label">
                        <span class="bg-success">
                          <?php echo e($order->created_at); ?>

                        </span>
                      </div>

                      <div>
                        <i class="fas  <?php if($order->payment_status == true): ?>fa-check bg-success <?php else: ?> fa-times bg-warning <?php endif; ?>"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#"><?php echo e($user->name); ?></a> a validée une commande (<a target="_blank" href="<?php echo e(url("manager/orders/" . $order->id)); ?>"><?php echo e($order->order_id); ?></a>)</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                          <div>
                                                        <span>Montant: <?php echo e($order->amount); ?>€</span>

                          </div>
                        </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <!-- timeline time label -->
                    
                     
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">

                       <?php echo Form::open(array('route' => ['users.update', $user->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')); ?>


                            <?php echo csrf_field(); ?>


                            <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('name', trans('forms.create_user_label_username'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('name', $user->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_username'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_username')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('first_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('first_name', trans('forms.create_user_label_firstname'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('first_name', $user->first_name, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="first_name">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_firstname')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('first_name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('first_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('last_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('last_name', trans('forms.create_user_label_lastname'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('last_name', $user->last_name, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="last_name">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_lastname')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('last_name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('last_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('email') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('email', trans('forms.create_user_label_email'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('email', $user->email, array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_email'))); ?>

                                        <div class="input-group-append">
                                            <label for="email" class="input-group-text">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_email')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('role') ? ' has-error ' : ''); ?>">

                                <?php echo Form::label('role', trans('forms.create_user_label_role'), array('class' => 'col-md-3 control-label'));; ?>


                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="role" id="role">
                                            <option value=""><?php echo e(trans('forms.create_user_ph_role')); ?></option>
                                            <?php if(!empty($roles)): ?>
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($role->id); ?>" <?php echo e($currentRole->id == $role->id ? 'selected="selected"' : ''); ?>><?php echo e($role->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="role">
                                                <i class="<?php echo e(trans('forms.create_user_icon_role')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('role')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('role')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="pw-change-container">
                                <div class="form-group has-feedback row <?php echo e($errors->has('password') ? ' has-error ' : ''); ?>">

                                    <?php echo Form::label('password', trans('forms.create_user_label_password'), array('class' => 'col-md-3 control-label'));; ?>


                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <?php echo Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => trans('forms.create_user_ph_password'))); ?>

                                            <div class="input-group-append">
                                                <label class="input-group-text" for="password">
                                                    <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_password')); ?>" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row <?php echo e($errors->has('password_confirmation') ? ' has-error ' : ''); ?>">

                                    <?php echo Form::label('password_confirmation', trans('forms.create_user_label_pw_confirmation'), array('class' => 'col-md-3 control-label'));; ?>


                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <?php echo Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_pw_confirmation'))); ?>

                                            <div class="input-group-append">
                                                <label class="input-group-text" for="password_confirmation">
                                                    <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_pw_confirmation')); ?>" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <?php if($errors->has('password_confirmation')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 mb-2">
                                    <a href="#" class="btn btn-outline-secondary btn-block btn-change-pw mt-3" title="<?php echo e(trans('forms.change-pw')); ?> ">
                                        <i class="fa fa-fw fa-lock" aria-hidden="true"></i>
                                        <span></span> <?php echo trans('forms.change-pw'); ?>

                                    </a>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <?php echo Form::button("Enregistrer", array('class' => 'btn btn-success btn-block margin-bottom-1 mt-3 mb-2 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => trans('modals.edit_user__modal_text_confirm_title'), 'data-message' => trans('modals.edit_user__modal_text_confirm_message'))); ?>

                                </div>
                            </div>
                        <?php echo Form::close(); ?>

                   


                     
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 <?php echo $__env->make('modals.modal-save', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->make('scripts.save-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/usersmanagement/show-user.blade.php ENDPATH**/ ?>