<?php $__env->startSection('template_title'); ?>
    Modifier la page <?php echo e($page->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
    <style type="text/css">
        .btn-save,
        .pw-change-container {
            display: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          Modifier la page <?php echo e($page->name); ?>

                            <div class="pull-right">
                                <a href="<?php echo e(route('manager.pages')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('pagesmanagement.tooltips.back-pages')); ?>">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux pages
                                </a>
                                <a target="_blank" href="<?php echo e(url($page->slug)); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('pagesmanagement.tooltips.back-pages')); ?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    Voir cette page
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo Form::open(array('route' => ['pages.update', $page->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation', 'files' => true, 'enctype'=>'multipart/form-data')); ?>


                            <?php echo csrf_field(); ?>




                            <div class="form-group has-feedback row <?php echo e($errors->has('is_public') ? ' has-error ' : ''); ?>">

                                <?php echo Form::label('is_public', 'Cacher cette page', array('class' => 'col-md-3 control-label'));; ?>


                                <div class="col-md-9">
                                    <div class="input-group">

                                        <select class="custom-select form-control" name="is_public" id="is_public">
                                            <?php if($page->is_public == true): ?>
                                                    <option value="1" selected> Afficher</option>
                                                    <option value="0"> Ne pas afficher</option>
                                            <?php else: ?>
                                              <option value=0 selected> Ne pas afficher</option>
                                              <option value=1 > Afficher</option>

                                            <?php endif; ?>
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="is_public">
                                                <i class="fa fa-shield" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('is_public')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('is_public')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>



                            <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('name', trans('forms.create_page_label_name'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('name', $page->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Ex: Mentions légales')); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_page_icon_pagename')); ?>" aria-hidden="true"></i>
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
                            <div class="form-group has-feedback row <?php echo e($errors->has('slug') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('slug', 'URL', array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('slug', $page->slug, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => trans('forms.create_page_ph_pageslug'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="slug">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_page_icon_pageslug')); ?>" aria-hidden="true"></i>
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
                            <div class="form-group has-feedback row <?php echo e($errors->has('description') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('description', trans('forms.create_page_label_description'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('description', $page->description, array('id' => 'description', 'class' => 'form-control', 'placeholder' => trans('forms.create_page_ph_pagedescription'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="description">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_page_icon_pagedescription')); ?>" aria-hidden="true"></i>
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

                            <div class="form-group has-feedback row <?php echo e($errors->has('content') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('content', 'Contenu de la page', array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <?php echo Form::textarea('content', $page->content, array('id' => 'content', 'id' => 'summernote','class' => 'summernote form-control', 'placeholder' => trans('forms.create_page_ph_pagecontent'))); ?>


                                    </div>
                                    <?php if($errors->has('content')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('content')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


<hr>

<h4 class="my-3">Meta & SEO</h4>

                            <div class="form-group has-feedback row <?php echo e($errors->has('meta_title') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('meta_title', "Titre (balise title)", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('meta_title', $page->meta_title, array('id' => 'meta_title', 'class' => 'form-control', 'placeholder' => "Titre qui résume votre page (60mots)")); ?>

                                        <div class="input-group-append">
                                            <label for="meta_title" class="input-group-text">
                                                <i class="fa fa-user" aria-hidden="true"></i>
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



                            <div class="form-group has-feedback row <?php echo e($errors->has('meta_desc') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('meta_desc', trans('forms.create_page_label_meta_desc'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('meta_desc', $page->meta_desc, array('id' => 'meta_desc', 'class' => 'form-control', 'placeholder' => 'Un court résumé de votre page (120mots)')); ?>

                                        <div class="input-group-append">
                                            <label for="meta_desc" class="input-group-text">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_page_icon_meta_desc')); ?>" aria-hidden="true"></i>
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


                                                        <div class="form-group has-feedback row <?php echo e($errors->has('thumbnail') ? ' has-error ' : ''); ?>">
                                                            <?php echo Form::label('thumbnail', trans('forms.create_page_label_thumbnail'), array('class' => 'col-md-3 control-label'));; ?>

                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <?php echo Form::text('thumbnail', $page->thumbnail, array('id' => 'thumbnail', 'class' => 'form-control', 'placeholder' => trans('forms.create_page_ph_thumbnail'))); ?>

                                                                    <div class="input-group-append">
                                                                        <label for="thumbnail" class="input-group-text">
                                                                            <i class="fa fa-fw <?php echo e(trans('forms.create_page_icon_thumbnail')); ?>" aria-hidden="true"></i>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <?php if($errors->has('thumbnail')): ?>
                                                                    <span class="help-block">
                                                                        <strong><?php echo e($errors->first('thumbnail')); ?></strong>
                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>




<!-- Thumbnail -->
<div class="form-group has-feedback row <?php echo e($errors->has('thumbnail') ? ' has-error ' : ''); ?>">

  <label for="thumbnail">Image principal</label>

    <div class="col-md-9">
        <div class="input-group">

          <div class="custom-file">
            <input type="file" name="thumbnail" value="<?php echo e($page->thumbnail); ?>" class="custom-file-input" id="inputGroupFile01"
              aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Sélectionner</label>
          </div>
            <div class="input-group-append">
                        <img src="<?php echo e(asset("storage/$page->thumbnail")); ?>" height="100px" alt="">

            </div>
        </div>
        <?php if($errors->has('thumbnail')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('thumbnail')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>








                            <?php echo Form::button('Enregistrer mes changements', array('class' => 'btn btn-success btn-block margin-bottom-1 mt-3 mb-2 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => 'Enregistrer', 'data-message' => 'Enregistrer mes changements')); ?>


                        <?php echo Form::close(); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('modals.modal-save', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

  <!-- include libraries(jQuery, bootstrap) -->

  <!-- include summernote css/js -->
  
  <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('scripts.save-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('scripts.check-changed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
  //$('#summernote').summernote('focus');
  $('#summernote').summernote({
       height: 300,
       popover: {
         image: [],
         link: [],
         air: []
       }
     });

  $('#summernote').trigger('focus');
  //$('.summernote').summernote('focus');
  });
  $('.btn-save').show();

  </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/pagesmanagement/edit-page.blade.php ENDPATH**/ ?>