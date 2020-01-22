<?php $__env->startSection('template_title'); ?>
    Ajouter une box
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ajouter une box</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/dashboard")); ?>">Accueil</a></li>
              <li class="breadcrumb-item active">Box</li>
             
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
                            Ajouter une nouvelle box
                            <div class="pull-right">
                                <a href="<?php echo e(route('manager.boites')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour à la liste des produits
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php echo Form::open(array('route' => 'box.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')); ?>


                            <?php echo csrf_field(); ?>


                            <div class="form-group has-feedback row <?php echo e($errors->has('sku') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('sku', "SKU", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('sku', NULL, array('id' => 'sku', 'class' => 'form-control', 'placeholder' => "Ex: B001")); ?>

                                        <div class="input-group-append">
                                            <label for="sku" class="input-group-text">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_boite_icon_sku')); ?>" aria-hidden="true"></i>
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
                                <?php echo Form::label('slug', "Slug (URL)", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('slug', NULL, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => "Ex: ma-box-surprise-printemps")); ?>

                                        <div class="input-group-append">
                                            <label for="slug" class="input-group-text">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_boite_icon_slug')); ?>" aria-hidden="true"></i>
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
                                <?php echo Form::label('name', "Nom", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => "Ma box surprise du printemps")); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_boite_icon_name')); ?>" aria-hidden="true"></i>
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
                                <?php echo Form::label('description', "Description", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('description', NULL, array('id' => 'description', 'class' => 'form-control', 'placeholder' => "Description rapide de votre box")); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="description">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_boite_icon_description')); ?>" aria-hidden="true"></i>
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
                                <?php echo Form::label('price', "Contenu", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::number('price', NULL, array('id' => 'price', 'class' => 'form-control', 'placeholder' => "Longue description et info")); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="price">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_boite_icon_price')); ?>" aria-hidden="true"></i>
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



                            <div class="form-group has-feedback row <?php echo e($errors->has('price') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('price', "Prix (€)", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::number('price', 24.99, array('id' => 'price', 'class' => 'form-control', 'placeholder' => "24.99")); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="price">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_boite_icon_price')); ?>" aria-hidden="true"></i>
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
                                <?php echo Form::label('tax', "Taux de TVA (%)", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::number('tax', NULL, array('id' => 'tax', 'class' => 'form-control', 'placeholder' => trans('forms.create_boite_ph_tax'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="tax">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_boite_icon_tax')); ?>" aria-hidden="true"></i>
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
                                <?php echo Form::label('stock', "Stock", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::number('stock', NULL, array('id' => 'stock', 'class' => 'form-control', 'placeholder' => "50")); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="stock">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_boite_icon_stock')); ?>" aria-hidden="true"></i>
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


<hr>
                            <div class="form-group has-feedback row <?php echo e($errors->has('required_product_quantity') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('required_product_quantity', "Nombre de plantes", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::number('required_product_quantity', NULL, array('id' => 'required_product_quantity', 'class' => 'form-control', 'placeholder' => "6")); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="required_product_quantity">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_boite_icon_required_product_quantity')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('required_product_quantity')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('required_product_quantity')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

<hr>

<div>
    image
</div>

 <div class="form-group has-feedback row <?php echo e($errors->has('products') ? ' has-error ' : ''); ?>">
        <?php echo Form::label('products', "En vente", array('class' => 'col-md-3 control-label'));; ?>

        <div class="col-md-9">
            <div class="input-group">
                       <select class="custom-select form-control selectpicker"  name="products[]" multiple>
        <option value="" selected>Sélectionner des plantes...</option>

<?php $__currentLoopData = \App\Models\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <option value="<?php echo e($product->id); ?>" ><?php echo e($product->name); ?></option>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</select>
                <div class="input-group-append">
                    <label class="input-group-text" for="products">
                        <i class="fa fa-cubes" aria-hidden="true"></i>
                    </label>
                </div>
            </div>
            <?php if($errors->has('products')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('products')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

                          
                            <?php echo Form::button(trans('forms.create_boite_button_text'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )); ?>

                        <?php echo Form::close(); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
  $.fn.selectpicker.Constructor.BootstrapVersion = '4';   
  $('.selectpicker').selectpicker();

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantes-addict/webapp/development/v0.8-latest/resources/views/boitesmanagement/create-boite.blade.php ENDPATH**/ ?>