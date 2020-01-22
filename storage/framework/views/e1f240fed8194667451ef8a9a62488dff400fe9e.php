<?php $__env->startSection('template_title'); ?>
    <?php echo trans('usersmanagement.create-new-user'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ajouter un produit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/dashboard")); ?>">Accueil</a></li>
              <li class="breadcrumb-item active">Produits</li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="content">
    

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Ajouter un nouveau produit
                            <div class="pull-right">
                                <a href="<?php echo e(route('manager.products')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour à la liste des produits
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php echo Form::open(array('route' => 'manager.products', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')); ?>


                            <?php echo csrf_field(); ?>


                            <div class="form-group has-feedback row <?php echo e($errors->has('sku') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('sku', trans('forms.create_product_label_sku'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('sku', NULL, array('id' => 'sku', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_sku'))); ?>

                                        <div class="input-group-append">
                                            <label for="sku" class="input-group-text">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_product_icon_sku')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('sku')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('sku')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

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

                            <div class="form-group has-feedback row <?php echo e($errors->has('description') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('description', trans('forms.create_product_label_description'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('description', NULL, array('id' => 'description', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_description'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="description">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_product_icon_description')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('description')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('description')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


<hr>

                            <div class="form-group has-feedback row <?php echo e($errors->has('price') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('price', trans('forms.create_product_label_price'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::number('price', NULL, array('id' => 'price', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_price'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="price">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_product_icon_price')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('price')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('price')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('tax') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('tax', trans('forms.create_product_label_tax'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::number('tax', NULL, array('id' => 'tax', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_tax'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="tax">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_product_icon_tax')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('tax')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('tax')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('stock') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('stock', trans('forms.create_product_label_stock'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::number('stock', NULL, array('id' => 'stock', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_stock'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="stock">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_product_icon_stock')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('stock')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('stock')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>





                            <div class="form-group has-feedback row <?php echo e($errors->has('productlabel') ? ' has-error ' : ''); ?>">

                                <?php echo Form::label('productlabel', trans('forms.create_product_label_productlabel'), array('class' => 'col-md-3 control-label'));; ?>


                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="productlabel" id="productlabel">
                                            <option value=""><?php echo e(trans('forms.create_product_ph_productlabel')); ?></option>
                                            <?php if($productlabels): ?>
                                                <?php $__currentLoopData = $productlabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productlabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($productlabel->id); ?>" ><?php echo e($productlabel->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="productlabel">
                                                <i class="<?php echo e(trans('forms.create_product_icon_productlabel')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('productcategorie')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('productcategorie')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group has-feedback row <?php echo e($errors->has('productcategorie') ? ' has-error ' : ''); ?>">

                                <?php echo Form::label('productcategorie', trans('forms.create_product_label_productcategorie'), array('class' => 'col-md-3 control-label'));; ?>


                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="productcategorie" id="productcategorie">
                                            <option value=""><?php echo e(trans('forms.create_product_ph_productcategorie')); ?></option>
                                            <?php if($productcategories): ?>
                                                <?php $__currentLoopData = $productcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productcategorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($productcategorie->id); ?>" ><?php echo e($productcategorie->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="productcategorie">
                                                <i class="<?php echo e(trans('forms.create_product_icon_productcategorie')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('productcategorie')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('productcategorie')); ?></strong>
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
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/productsmanagement/create-product.blade.php ENDPATH**/ ?>