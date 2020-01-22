<?php $__env->startSection('template_title'); ?>
    Ajouter un article
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Ajouter un article
                            <div class="pull-right">
                                <a href="<?php echo e(url('manager/posts')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux articles
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php echo Form::open(array('route' => 'posts.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')); ?>


                            <?php echo csrf_field(); ?>


                           
                            <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('name', "Titre de l'article", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => "Ex: Protéger vos plantes de vos chats")); ?>

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
                                <?php echo Form::label('slug', "Slug (URL)", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('slug', NULL, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => "mon-article")); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="slug">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_firstname')); ?>" aria-hidden="true"></i>
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

                            <div class="form-group has-feedback row <?php echo e($errors->has('last_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('description', "Description", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('description', NULL, array('id' => 'description', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="description">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_lastname')); ?>" aria-hidden="true"></i>
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

                            <div class="form-group has-feedback row <?php echo e($errors->has('role') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('productcategorie_id', "Catégorie", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="productcategorie_id" id="productcategorie_id">
                                            <option value="">Sélectionner une catégorie</option>
                                            <?php if($productcategorie_ids ?? ''): ?>
                                                <?php $__currentLoopData = $productcategories ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productcategorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($productcategorie_id->id); ?>"><?php echo e($productcategorie_id->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="productcategorie_id">
                                                <i class="<?php echo e(trans('forms.create_user_icon_productcategorie_id')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('productcategorie_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('productcategorie_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

  <div class="form-group has-feedback row <?php echo e($errors->has('last_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('description', "contenu", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::textarea('content', NULL, array('id' => 'contenu', 'class' => 'form-control', 'placeholder' => "Votre contenu...")); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="contenu">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_lastname')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('contenu')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('contenu')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group has-feedback row <?php echo e($errors->has('last_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('meta_title', "Meta titre", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('meta_title', NULL, array('id' => 'meta_title', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="meta_title">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_lastname')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('meta_title')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('meta_title')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group has-feedback row <?php echo e($errors->has('last_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('meta_desc', "Meta description", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('meta_desc', NULL, array('id' => 'meta_desc', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="meta_desc">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_lastname')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('meta_desc')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('meta_desc')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <?php echo Form::button("Ajouter votre article", array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )); ?>

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


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/postsmanagement/create-post.blade.php ENDPATH**/ ?>