<?php $__env->startSection('template_title'); ?>
Modifier la livraison <?php echo e($deliverie->deliverie_id); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
    <style type="text/css">
  
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Modifier la livraison <?php echo e($deliverie->deliverie_id); ?>

                            <div class="pull-right">
                                <a href="<?php echo e(route('users')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    <?php echo trans('usersmanagement.buttons.back-to-users'); ?>

                                </a>
                                <a href="<?php echo e(url('/users/' . $deliverie->id)); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
                                    <i class="fa fa-fw fa-reply" aria-hidden="true"></i>
                                    <?php echo trans('usersmanagement.buttons.back-to-user'); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo Form::open(array('route' => ['deliveries.update', $deliverie->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')); ?>


                            <?php echo csrf_field(); ?>


                            <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('name', "Numéro de livraison", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('name', $deliverie->deliverie_id, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_username'))); ?>

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

<hr>
                            <div class="form-group has-feedback row <?php echo e($errors->has('first_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('first_name', "Identifiant du point relais", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('pickup_id', $deliverie->pickup_id, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))); ?>

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

                            <div class="form-group has-feedback row <?php echo e($errors->has('first_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('first_name', "Nom du point relais", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('pickup_name', $deliverie->pickup_name, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))); ?>

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

                            <div class="form-group has-feedback row <?php echo e($errors->has('first_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('first_name', "Adresse du point relais", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('pickup_address', $deliverie->pickup_address, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))); ?>

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

                            <div class="form-group has-feedback row <?php echo e($errors->has('first_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('first_name', "Code postal du point relais", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('pickup_postalcode', $deliverie->pickup_postalcode, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))); ?>

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
                          

                            <div class="form-group has-feedback row <?php echo e($errors->has('first_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('first_name', "Ville du point relais", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('pickup_city', $deliverie->pickup_city, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))); ?>

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


                            <hr>

                            <div class="form-group has-feedback row <?php echo e($errors->has('last_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('tracking_id', "Numéro de colis", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('tracking_id', $deliverie->tracking_id, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => "Numéro généré par Mondial Relay (Ex:488")); ?>

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


      <div class="form-group has-feedback row <?php echo e($errors->has('last_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('last_name', "URL de l'étiquette", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('shipment_sticker_url', $deliverie->shipment_sticker_url, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => "https://...")); ?>

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
                            <div class="form-group has-feedback row <?php echo e($errors->has('last_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('last_name', "URL de tracking", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('shipment_tracking_url', $deliverie->shipment_tracking_url, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => "https://...")); ?>

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



                            <div class="form-group has-feedback row <?php echo e($errors->has('role') ? ' has-error ' : ''); ?>">

                                <?php echo Form::label('role', "Commande associée", array('class' => 'col-md-3 control-label'));; ?>


                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="role" id="role">
                                            <option value="<?php echo e($deliverie->order->id); ?>"><?php echo e($deliverie->order->order_id); ?></option>

                                            <?php $__currentLoopData = \App\Models\Order::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($order->id); ?>"><?php echo e($order->order_id); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            

                                            
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


                         

                            <div class="form-group has-feedback row <?php echo e($errors->has('role') ? ' has-error ' : ''); ?>">

                                <?php echo Form::label('status', "Statut", array('class' => 'col-md-3 control-label'));; ?>


                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="role" id="role">
                                            <option value="0">A préparer</option>
                                            <option value="1">Colis en préparation</option>
                                            <option value="2">Colis prêt à envoyer</option>
                                            <option value="3">Expédié</option>
                                            <option value="4">Réceptionné</option>


                                            
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

                       
                            <div class="row">
                                <div class="col-12 col-sm-6 mb-2">
                                    <a href="#" class="btn btn-outline-secondary btn-block btn-change-pw mt-3" title="<?php echo e(trans('forms.change-pw')); ?> ">
                                        <i class="fa fa-fw fa-lock" aria-hidden="true"></i>
                                        <span></span> <?php echo trans('forms.change-pw'); ?>

                                    </a>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <?php echo Form::button(trans('forms.save-changes'), array('class' => 'btn btn-success btn-block margin-bottom-1 mt-3 mb-2 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => trans('modals.edit_user__modal_text_confirm_title'), 'data-message' => trans('modals.edit_user__modal_text_confirm_message'))); ?>

                                </div>
                            </div>
                        <?php echo Form::close(); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('modals.modal-save', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('scripts.save-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/deliveriesmanagement/edit-deliverie.blade.php ENDPATH**/ ?>