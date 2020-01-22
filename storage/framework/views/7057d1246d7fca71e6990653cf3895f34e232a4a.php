<?php $__env->startSection('template_title'); ?>
    Créer un paiement
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Créer un paiement manuellement
                            <div class="pull-right">
                                <a href="<?php echo e(route('users')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux paiements
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php echo Form::open(array('route' => 'payments.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')); ?>


                            <?php echo csrf_field(); ?>


                            <div class="form-group has-feedback row <?php echo e($errors->has('ref_id') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('ref_id', "Référence de paiement", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('ref_id', NULL, array('id' => 'ref_id', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_ref_id'))); ?>

                                        <div class="input-group-append">
                                            <label for="ref_id" class="input-group-text">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_ref_id')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('ref_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('ref_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('amount') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('amount', "Montant", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::number('amount', NULL, array('id' => 'amount', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="amount">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_firstname')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('amount')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('amount')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('transaction_number') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('transaction_number', "Numéro de transaction", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('transaction_number', NULL, array('id' => 'transaction_number', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="transaction_number">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_firstname')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('transaction_number')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('transaction_number')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('auth_number') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('auth_number', "Numéro d'authentification", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('auth_number', NULL, array('id' => 'auth_number', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="auth_number">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_firstname')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('auth_number')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('auth_number')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('response_code') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('response_code', "Code de réponse", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('response_code', NULL, array('id' => 'response_code', 'class' => 'form-control', 'placeholder' => "00000")); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="response_code">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_lastname')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('response_code')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('response_code')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group has-feedback row <?php echo e($errors->has('call_number') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('call_number', "Numéro d'appel", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('call_number', NULL, array('id' => 'call_number', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="call_number">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_lastname')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('call_number')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('call_number')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('status') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('status', "Status", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('status', NULL, array('id' => 'status', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="status">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_lastname')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('status')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('status')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group has-feedback row <?php echo e($errors->has('user_id') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('user_id', "Utilisateur", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="user_id" id="user_id">
                                            <option value=""><?php echo e(trans('forms.create_user_ph_user_id')); ?></option>

                                                <?php $__currentLoopData = \App\Models\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->email); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="user_id">
                                                <i class="<?php echo e(trans('forms.create_user_icon_user_id')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('user_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('user_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('order_id') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('order_id', "Commande associée", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="order_id" id="order_id">
                                            <option value=""><?php echo e(trans('forms.create_user_ph_order_id')); ?></option>

                                                <?php $__currentLoopData = \App\Models\Order::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($order->id); ?>"><?php echo e($order->order_id); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="order_id">
                                                <i class="<?php echo e(trans('forms.create_user_icon_order_id')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('order_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('order_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php echo Form::button("Ajouter ce paiement", array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )); ?>

                        <?php echo Form::close(); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/paymentsmanagement/create-payment.blade.php ENDPATH**/ ?>