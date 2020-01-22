<?php $__env->startSection('template_title'); ?>
    Ajouter un nouveau label
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
                            Ajouter un nouveau label
                            <div class="pull-right">
                                <a href="<?php echo e(url('manager/products/labels')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux labels
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php echo Form::open(array('route' => 'manager.labels', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')); ?>


                            <?php echo csrf_field(); ?>



                            <div class="form-group has-feedback row <?php echo e($errors->has('slug') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('slug', trans('forms.create_product_label_slug'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('slug', NULL, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_slug'))); ?>

                                        <div class="input-group-append">
                                            <label for="slug" class="input-group-text">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_product_icon_slug')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('slug')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('slug')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('name', trans('forms.create_product_label_name'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_name'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_product_icon_name')); ?>" aria-hidden="true"></i>
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

                            <div class="form-group has-feedback row <?php echo e($errors->has('color_code') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('color_code', trans('forms.create_product_label_color_code'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('color_code', NULL, array('id' => 'color_code', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_color_code'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="color_code">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_product_icon_color_code')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('color_code')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('color_code')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>




                            <?php echo Form::button(trans('forms.create_product_button_text'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )); ?>

                        <?php echo Form::close(); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/productlabelsmanagement/create-productlabel.blade.php ENDPATH**/ ?>