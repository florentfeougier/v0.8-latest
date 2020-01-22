<?php $__env->startSection('template_title'); ?>
    Fiches d'entretien <?php echo e($fiche->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Fiche <?php echo e($fiche->name); ?> > Modifier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/dashboard")); ?>">Accueil</a></li>
              <li class="breadcrumb-item "><a href="<?php echo e(url("manager/fiches")); ?>">Fiches</a></li>
              <li class="breadcrumb-item active"><?php echo e($fiche->name); ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <!-- Main content -->
<section class="content">
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          Modifier la fiche <?php echo e($fiche->name); ?>

                            <div class="pull-right">
                                <a href="<?php echo e(route('manager.fiches')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('fichesmanagement.tooltips.back-fiches')); ?>">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux fiches
                                </a>
                                <a target="_blank" href="<?php echo e(url('fiches-entretien/' . $fiche->slug)); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('fichesmanagement.tooltips.back-fiches')); ?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    Voir cette fiche
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo Form::open(array('route' => ['fiches.update', $fiche->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation', 'files' => true, 'enctype'=>'multipart/form-data')); ?>


                            <?php echo csrf_field(); ?>







                            <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('name', trans('forms.create_fiche_label_name'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('name', $fiche->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_fichename'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_fiche_icon_fichename')); ?>" aria-hidden="true"></i>
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
                                <?php echo Form::label('slug', trans('forms.create_fiche_label_slug'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('slug', $fiche->slug, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_ficheslug'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="slug">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_fiche_icon_ficheslug')); ?>" aria-hidden="true"></i>
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
                                <?php echo Form::label('description', trans('forms.create_fiche_label_description'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('description', $fiche->description, array('id' => 'description', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_fichedescription'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="description">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_fiche_icon_fichedescription')); ?>" aria-hidden="true"></i>
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

                            <div class="form-group has-feedback row <?php echo e($errors->has('description_short') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('description_short', trans('forms.create_fiche_label_description_short'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('description_short', $fiche->description_short, array('id' => 'description_short', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_fichedescription_short'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="description_short">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_fiche_icon_fichedescription_short')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('description_short')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('description_short')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('content') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('content', 'Contenu', array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <?php echo Form::textarea('content', $fiche->content, array('id' => 'content', 'class' => 'summernote form-control', 'placeholder' => trans('forms.create_fiche_ph_old_content'))); ?>

                                       
                                    </div>
                                    <?php if($errors->has('content')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('content')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group has-feedback row <?php echo e($errors->has('arrosage_info') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('arrosage_info', trans('forms.create_fiche_label_arrosage_info'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('arrosage_info', $fiche->arrosage_info, array('id' => 'arrosage_info', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_arrosage_info'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="arrosage_info">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_fiche_icon_arrosage_info')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('arrosage_info')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('arrosage_info')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group has-feedback row <?php echo e($errors->has('entretien_info') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('entretien_info', trans('forms.create_fiche_label_entretien_info'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('entretien_info', $fiche->entretien_info, array('id' => 'entretien_info', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_firstname'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="entretien_info">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_fiche_icon_entretien_info')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('entretien_info')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('entretien_info')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group has-feedback row <?php echo e($errors->has('lumiere_info') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('lumiere_info', trans('forms.create_fiche_label_lumiere_info'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('lumiere_info', $fiche->lumiere_info, array('id' => 'lumiere_info', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_firstname'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="lumiere_info">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_fiche_icon_lumiere_info')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('lumiere_info')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('lumiere_info')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>




 <div class="form-group has-feedback row <?php echo e($errors->has('products') ? ' has-error ' : ''); ?>">
        <?php echo Form::label('products', "Produits associés", array('class' => 'col-md-3 control-label'));; ?>

        <div class="col-md-9">
            <div class="input-group">
                <select style="width:600px;" class="form-control products" name="products[]" multiple>
          <?php $__currentLoopData = \App\Models\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($fiche->products->contains($product->id)): ?>
          <option value="<?php echo e($product->id); ?>" selected><?php echo e($product->name); ?> </option>
          <?php else: ?>
          <option value="<?php echo e($product->id); ?>" ><?php echo e($product->name); ?> </option>

          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </select>
                <div class="input-group-append">
                    <label class="input-group-text" for="products">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
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



                          

                            <div class="form-group has-feedback row <?php echo e($errors->has('color_code') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('color_code', trans('forms.create_fiche_label_color_code'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('color_code', $fiche->color_code, array('id' => 'color_code', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_color_code'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="color_code">
                                                <i style="color: <?php echo e($fiche->color_code); ?>"class="fa fa-circle"></i>
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

                            <div class="form-group has-feedback row <?php echo e($errors->has('meta_title') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('meta_title', trans('forms.create_fiche_label_meta_title'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('meta_title', $fiche->meta_title, array('id' => 'meta_title', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_meta_title'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="meta_title">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_fiche_icon_meta_title')); ?>" aria-hidden="true"></i>
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
                                <?php echo Form::label('meta_desc', trans('forms.create_fiche_label_meta_desc'), array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('meta_desc', $fiche->meta_desc, array('id' => 'meta_desc', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_meta_desc'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="meta_desc">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_fiche_icon_meta_desc')); ?>" aria-hidden="true"></i>
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
                                <?php echo Form::label('thumbnail', "Image de miniature", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                          <div class="input-group-prepend">
                                            <label class="input-group-text" for="thumbnail">
                                                https://www.plantesaddict.fr/
                                            </label>
                                        </div>

<label for="feature_thumbnail"></label>
<input type="text" name="thumbnail" class="form-control" id="feature_thumbnail"  value="<?php echo e($fiche->thumbnail); ?>">
                                       
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="thumbnail">
                                                <a href="" class=" popup_selector" data-inputid="feature_thumbnail"> <i class="fa fa-image"></i> </a>

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


                            <?php echo Form::button("Enregistrer mes changements <i class='fa fa-save'></i>
", array('class' => 'btn btn-success btn-block margin-bottom-1 mt-3 mb-2 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => 'Enregistrer', 'data-message' => 'Enregistrer mes changements')); ?>


                        <?php echo Form::close(); ?>

                    </div>
                    <?php echo Form::open(array('url' => 'manager/fiches/' . $fiche->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Supprimer')); ?>

                        <?php echo Form::hidden('_method', 'DELETE'); ?>

                        <?php echo Form::button("Supprimer <i class='fa fa-trash'></i>", array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Supprimer cette fiche', 'data-message' => 'Etes vous sur de vouloir supprimer cette fiche ?')); ?>

                    <?php echo Form::close(); ?>

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



  <!-- jQuery and jQuery UI (REQUIRED) -->
        <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
       
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js"></script>
        <!-- elFinder CSS (REQUIRED) -->
                <script src="<?php echo e(url("packages/barryvdh/elfinder/js/elfinder.full.js")); ?>"></script>

        <script type="text/javascript" src="<?php echo e(asset("packages/barryvdh/elfinder/js/standalonepopup.min.js")); ?>"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <script type="text/javascript">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
  //$('#summernote').summernote('focus');
  $('.summernote').summernote({
       height: 300,
       popover: {
         image: [],
         link: [],
         air: []
       }
     });

  $('.summernote').trigger('focus');
  //$('.summernote').summernote('focus');
  });
  $('.btn-save').show();




$( document ).ready(function() {
    window.input_id = '';
    window.openElFinder = function (event, input_id) {
        event.preventDefault();
        window.single = true;
        window.old = false;
        window.input_id = input_id;
        window.open('/elfinder/popup?input_id='+input_id, '_blank', 'menubar=no,status=no,toolbar=no,scrollbars=yes');
      
        return false;
    };
    // function to update the file selected by elfinder
    window.processSelectedFile = function (filePath, requestingField) {
        $('#' + requestingField).val(filePath).trigger('change');
    }
});


   $().ready(function () {
                var elf = $('#elfinder').elfinder({
                    // set your elFinder options here
                    lang: 'fr', // locale
                    url: '/elfinder/connector',  // connector URL
                  
    resizable: true,
                    dialog: {modal: true, title: 'Sélectionner un'},
                    commandsOptions: {
                        getfile: {
                            oncomplete: 'destroy'
                        }
                    },
                    getFileCallback: function (file, elf) {
                        // the magic is here, use function from "main.html" for update input value
                        window.parent.opener.processSelectedFile(file.path, 'example.jpg');
                        window.close();
                    },
                    // toolbar configuration
                    uiOptions : {
                        // toolbar configuration
                        toolbar : [
                            ['home', 'back', 'forward', 'up', 'reload'],
                            ['mkdir', 'mkfile', 'upload'],
                            ['open', 'download', 'getfile'],
                            ['undo', 'redo'],
                            ['copy', 'cut', 'paste', 'rm', 'empty'],
                            ['duplicate', 'rename', 'edit', 'resize', 'chmod'],
                            ['selectall', 'selectnone', 'selectinvert'],
                            ['quicklook', 'info'],
                            ['extract', 'archive'],
                            // ['search'],
                            ['view', 'sort'],
                            ['help'], //'preference',
                            ['fullscreen']
                        ],
                        // toolbar extra options
                        toolbarExtra : {
                            // also displays the text label on the button (true / false)
                            displayTextLabel: false,
                            // Exclude `displayTextLabel` setting UA type
                            labelExcludeUA: ['Mobile'],
                            // auto hide on initial open
                            autoHideUA: ['Mobile'],
                            // Initial setting value of hide button in toolbar setting
                            defaultHides: [],
                            // show Preference button ('none', 'auto', 'always')
                            // If you do not include 'preference' in the context menu you should specify 'auto' or 'always'
                            showPreferenceButton: 'none'
                        },
                    },
                  
                }).elfinder('instance');
            });

  $.fn.selectpicker.Constructor.BootstrapVersion = '4';   

    $('.products').selectpicker();
    $('.fiches').selectpicker();


  </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/fichesmanagement/edit-fiche.blade.php ENDPATH**/ ?>