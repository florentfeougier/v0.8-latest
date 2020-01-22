<?php $__env->startSection('template_title'); ?>
<?php echo trans('ventesmanagement.editing-vente', ['name' => $boite->name]); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Modifier la vente de <?php echo e($boite->name); ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/dashboard")); ?>">Accueil</a></li>
              <li class="breadcrumb-item "><a href="<?php echo e(url("manager/ventes")); ?>">Ventes</a></li>
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/ventes/" . $boite->id)); ?>"><?php echo e($boite->name); ?></a></li>
              <li class="breadcrumb-item active">Modifier</li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('template_linked_css'); ?>
<style type="text/css">



            /*
    Colorbox Core Style:
    The following CSS is consistent between example themes and should not be altered.
    */
    #colorbox, #cboxOverlay, #cboxWrapper{position:absolute; top:0; left:0; z-index:9999; overflow:hidden; -webkit-transform: translate3d(0,0,0);}
    #cboxWrapper {max-width:none;}
    #cboxOverlay{position:fixed; width:100%; height:100%;}
    #cboxMiddleLeft, #cboxBottomLeft{clear:left;}
    #cboxContent{position:relative;}
    #cboxLoadedContent{overflow:auto; -webkit-overflow-scrolling: touch;}
    #cboxTitle{margin:0;}
    #cboxLoadingOverlay, #cboxLoadingGraphic{position:absolute; top:0; left:0; width:100%; height:100%;}
    #cboxPrevious, #cboxNext, #cboxClose, #cboxSlideshow{cursor:pointer;}
    .cboxPhoto{float:left; margin:auto; border:0; display:block; max-width:none; -ms-interpolation-mode:bicubic;}
    .cboxIframe{width:100%; height:100%; display:block; border:0; padding:0; margin:0;}
    #colorbox, #cboxContent, #cboxLoadedContent{box-sizing:content-box; -moz-box-sizing:content-box; -webkit-box-sizing:content-box;}

/* 
    User Style:
    Change the following styles to modify the appearance of Colorbox.  They are
    ordered & tabbed in a way that represents the nesting of the generated HTML.
    */
    #cboxOverlay{background:#fff; opacity: 0.9; filter: alpha(opacity = 90);}
    #colorbox{outline:0;}
    #cboxTopLeft{width:25px; height:25px; background:url(images/border1.png) no-repeat 0 0;}
    #cboxTopCenter{height:25px; background:url(images/border1.png) repeat-x 0 -50px;}
    #cboxTopRight{width:25px; height:25px; background:url(images/border1.png) no-repeat -25px 0;}
    #cboxBottomLeft{width:25px; height:25px; background:url(images/border1.png) no-repeat 0 -25px;}
    #cboxBottomCenter{height:25px; background:url(images/border1.png) repeat-x 0 -75px;}
    #cboxBottomRight{width:25px; height:25px; background:url(images/border1.png) no-repeat -25px -25px;}
    #cboxMiddleLeft{width:25px; background:url(images/border2.png) repeat-y 0 0;}
    #cboxMiddleRight{width:25px; background:url(images/border2.png) repeat-y -25px 0;}
    #cboxContent{background:#fff; overflow:hidden;}
    .cboxIframe{background:#fff;}
    #cboxError{padding:50px; border:1px solid #ccc;}
    #cboxLoadedContent{margin-bottom:20px;}
    #cboxTitle{position:absolute; bottom:0px; left:0; text-align:center; width:100%; color:#999;}
    #cboxCurrent{position:absolute; bottom:0px; left:100px; color:#999;}
    #cboxLoadingOverlay{background:#fff url(images/loading.gif) no-repeat 5px 5px;}

    /* these elements are buttons, and may need to have additional styles reset to avoid unwanted base styles */
    #cboxPrevious, #cboxNext, #cboxSlideshow, #cboxClose {border:0; padding:0; margin:0; overflow:visible; width:auto; background:none; }

    /* avoid outlines on :active (mouseclick), but preserve outlines on :focus (tabbed navigating) */
    #cboxPrevious:active, #cboxNext:active, #cboxSlideshow:active, #cboxClose:active {outline:0;}

    #cboxSlideshow{position:absolute; bottom:0px; right:42px; color:#444;}
    #cboxPrevious{position:absolute; bottom:0px; left:0; color:#444;}
    #cboxNext{position:absolute; bottom:0px; left:63px; color:#444;}
    #cboxClose{position:absolute; bottom:0; right:0; display:block; color:#444;}

/*
  The following fixes a problem where IE7 and IE8 replace a PNG's alpha transparency with a black fill
  when an alpha filter (opacity change) is set on the element or ancestor element.  This style is not applied to or needed in IE9.
  See: http://jacklmoore.com/notes/ie-transparency-problems/
  */
  .cboxIE #cboxTopLeft,
  .cboxIE #cboxTopCenter,
  .cboxIE #cboxTopRight,
  .cboxIE #cboxBottomLeft,
  .cboxIE #cboxBottomCenter,
  .cboxIE #cboxBottomRight,
  .cboxIE #cboxMiddleLeft,
  .cboxIE #cboxMiddleRight {
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#00FFFFFF,endColorstr=#00FFFFFF);
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="content">

     <?php echo Form::open(array('route' => ['manager.boites.update', $boite->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')); ?>


                    <?php echo csrf_field(); ?>


    
    <div class="row">

        <div class="col-lg-8">

            <div class="card">
                <div class="card-header">Information</div>
                <div class="card-body">
                    
                    <!-- Vente name -->
                    <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
                            <?php echo Form::label('name', trans('forms.create_vente_label_name'), array('class' => 'col-md-3 control-label'));; ?>

                            <div class="col-md-9">
                                <div class="input-group">
                                    <?php echo Form::text('name', $boite->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.create_vente_ph_ventename'))); ?>

                                    <div class="input-group-append">
                                        <label class="input-group-text" for="name">
                                            <i class="fa fa-file" aria-hidden="true"></i>
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

                         <!-- Vente slug -->
                        <div class="form-group has-feedback row <?php echo e($errors->has('slug') ? ' has-error ' : ''); ?>">
                            <?php echo Form::label('slug', trans('forms.create_vente_label_slug'), array('class' => 'col-md-3 control-label'));; ?>

                            <div class="col-md-9">
                                <div class="input-group">
                                    <?php echo Form::text('slug', $boite->slug, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => trans('forms.create_vente_ph_venteslug'))); ?>

                                    <div class="input-group-append">
                                        <label data-toggle="tooltip" title="Permet de définir votre url pour le seo, ex: /ventes/votre-slug" class="input-group-text" for="slug">
                                            <i class="fa fa-link" aria-hidden="true"></i>
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

                         <!-- Vente description -->
                        <div class="form-group has-feedback row <?php echo e($errors->has('description') ? ' has-error ' : ''); ?>">
                            <?php echo Form::label('description', trans('forms.create_vente_label_description'), array('class' => 'col-md-3 control-label'));; ?>

                            <div class="col-md-9">
                                <div class="input-group">
                                    <?php echo Form::text('description', $boite->description, array('id' => 'description', 'class' => 'form-control', 'placeholder' => trans('forms.create_vente_ph_ventedescription'))); ?>

                                    <div class="input-group-append">
                                        <label class="input-group-text" for="description">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
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
                                            
                        <div class="form-group has-feedback row <?php echo e($errors->has('product_quantity') ? ' has-error ' : ''); ?>">
                            <?php echo Form::label('product_quantity', trans('forms.create_vente_label_product_quantity'), array('class' => 'col-md-3 control-label'));; ?>

                            <div class="col-md-9">
                                <div class="input-group">
                                    <?php echo Form::number('product_quantity', $boite->product_quantity, array('id' => 'product_quantity', 'class' => 'form-control', 'placeholder' => trans('forms.create_vente_ph_firstname'))); ?>

                                    <div class="input-group-append">
                                        <label class="input-group-text" for="product_quantity">
                                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                                <?php if($errors->has('product_quantity')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('product_quantity')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                
    <div class="form-group has-feedback row <?php echo e($errors->has('stock') ? ' has-error ' : ''); ?>">
                            <?php echo Form::label('stock', trans('forms.create_vente_label_stock'), array('class' => 'col-md-3 control-label'));; ?>

                            <div class="col-md-9">
                                <div class="input-group">
                                    <?php echo Form::number('stock', $boite->stock, array('id' => 'stock', 'class' => 'form-control', 'placeholder' => trans('forms.create_vente_ph_firstname'))); ?>

                                    <div class="input-group-append">
                                        <label class="input-group-text" for="stock">
                                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
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

                


                    <div class="form-group has-feedback row <?php echo e($errors->has('horaires') ? ' has-error ' : ''); ?>">
                        <?php echo Form::label('horaires', trans('forms.create_vente_label_horaires'), array('class' => 'col-md-3 control-label'));; ?>

                        <div class="col-md-9">
                            <div class="input-group">
                                <?php echo Form::text('horaires', $boite->horaires, array('id' => 'horaires', 'class' => 'form-control', 'placeholder' => trans('forms.create_vente_ph_horaires'))); ?>

                                <div class="input-group-append">
                                    <label class="input-group-text" for="horaires">
                                        <i class="fa fa-clock" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            <?php if($errors->has('horaires')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('horaires')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>


                </div> <!-- end body card-->
            </div>
            
        </div>

        <!-- status  -->
        <div class="col-lg-4">

            <div class="card">
                <div class="card-header">Produits associés (<?php echo e(count($boite->products)); ?>)</div>
                <div class="card-body">
                    
                        
    <div class="form-group has-feedback row <?php echo e($errors->has('products') ? ' has-error ' : ''); ?>">
        <?php echo Form::label('products', "En vente", array('class' => 'col-md-3 control-label'));; ?>

        <div class="col-md-9">
            <div class="input-group">
                       <select class="custom-select form-control selectpicker"  name="products[]" multiple>
<?php $__currentLoopData = \App\Models\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if($boite->products->contains($product->id)): ?>
  <option value="<?php echo e($product->id); ?>" selected><?php echo e($product->name); ?></option>
<?php else: ?>
  <option value="<?php echo e($product->id); ?>" ><?php echo e($product->name); ?></option>

<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <option>Ketchup</option>
  <option>Relish</option>
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



  


                </div>
            </div>
            
            <div class="card">
                <div class="card-header">Permissions</div>
                <div class="card-body">
                     <div class="form-group has-feedback row <?php echo e($errors->has('status') ? ' has-error ' : ''); ?>">

                      <?php echo Form::label('store_enabled', 'Status', array('class' => 'col-md-4 control-label'));; ?>


                      <div class="col-md-8">
                          <div class="input-group">

                            <select class="custom-select form-control" name="status" id="x">
                               
                                <?php if($boite->status == "closed"): ?>
                                <option value='closed' selected> Terminé</option>
                                <option value='active' > En cours</option>
                                <?php elseif($boite->status == "active"): ?>
                                <option value='active' selected> En cours</option>
                                
                                <option value='closed' > Terminé</option>
                                <?php else: ?>
                                <option value='active'> Sélectionner...</option>
                                <option value='active'> En cours</option>
                                
                                <option value='closed' > Terminé</option>
                                <?php endif; ?>
                            </select>
                            <div class="input-group-append">
                              <label data-toggle="tooltip" title="Etat de votre vente: en cours (active) ou terminé (plus aucune commande n'est autorisée)" class="input-group-text" for="status">
                                  <i class="fa fa-hourglass-end" aria-hidden="true"></i>
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



              <!--  IS_PUBLIC SELECT -->

              <div class="form-group has-feedback row <?php echo e($errors->has('is_public') ? ' has-error ' : ''); ?>">

                <?php echo Form::label('store_enabled', 'Afficher', array('class' => 'col-md-4 control-label'));; ?>


                <div class="col-md-8">
                    <div class="input-group">

                        <select class="custom-select form-control" name="is_public" id="is_public">
                            <?php if($boite->is_public == true): ?>
                            <option value=0> Privée</option>
                            <option value=1 selected> Publique</option>
                            <?php else: ?>
                            <option value=0 selected> Privée</option>
                            <option value=1> Publique</option>

                            <?php endif; ?>
                        </select>
                        <div class="input-group-append">
                            <label data-toggle="tooltip" title="Qui peut commander dans cette vente: publique (tout le monde) ou privée (vous devez ajouter des utilisateurs autorisés)" class="input-group-text" for="is_public">
                                <?php if($boite->is_public == true): ?>
                                   <i class="text-success fa fa-circle" aria-hidden="true"></i>

                                <?php else: ?>
                                    <i  class="text-danger fa fa-circle" aria-hidden="true"></i>

                                <?php endif; ?>
                            </label>
                        </div>
                    </div>
                    <?php if($errors->has('is_public')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('store_enabled')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
            </div>


            <!-- SHOW DATE SELECT -->
           


            </div>
                </div>
            </div>
        </div>













        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        Meta & SEO
                       
                    </div>
                </div>
                <div class="card-body">
                   

                    <div class="row">
                      <div class="col-lg-7">

                        




                </div>

                <!-- Settings & permissions -->
                <div class="col-lg-5">



                    <!-- STATUS SELECT -->

           
        </div>
    </div>














<div class="form-group has-feedback row <?php echo e($errors->has('color_code') ? ' has-error ' : ''); ?>">
    <?php echo Form::label('color_code', trans('forms.create_vente_label_color_code'), array('class' => 'col-md-3 control-label'));; ?>

    <div class="col-md-9">
        <div class="input-group">
            <?php echo Form::text('color_code', $boite->color_code, array('id' => 'color_code', 'class' => 'form-control', 'placeholder' => trans('forms.create_vente_ph_color_code'))); ?>

            <div class="input-group-append">
                <label class="input-group-text" for="color_code">
                    <i style="color: <?php echo e($boite->color_code); ?>" class="fa fa-circle" aria-hidden="true"></i>
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
<div class="form-group has-feedback row <?php echo e($errors->has('fb_event_url') ? ' has-error ' : ''); ?>">
    <?php echo Form::label('fb_event_url', trans('forms.create_vente_label_fb_event_url'), array('class' => 'col-md-3 control-label'));; ?>

    <div class="col-md-9">
        <div class="input-group">
            <?php echo Form::text('fb_event_url', $boite->fb_event_url, array('id' => 'fb_event_url', 'class' => 'form-control', 'placeholder' => trans('forms.create_vente_ph_fb_event_url'))); ?>

            <div class="input-group-append">
                <label for="fb_event_url" class="input-group-text">
                    <i class="fa fa-facebook" ></i>
                </label>
            </div>
        </div>
        <?php if($errors->has('fb_event_url')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('fb_event_url')); ?></strong>
        </span>
        <?php endif; ?>
    </div>
</div>

<div class="form-group has-feedback row <?php echo e($errors->has('meta_title') ? ' has-error ' : ''); ?>">
    <?php echo Form::label('meta_title', trans('forms.create_vente_label_meta_title'), array('class' => 'col-md-3 control-label'));; ?>

    <div class="col-md-9">
        <div class="input-group">
            <?php echo Form::text('meta_title', $boite->meta_title, array('id' => 'meta_title', 'class' => 'form-control', 'placeholder' => trans('forms.create_vente_ph_meta_title'))); ?>

            <div class="input-group-append">
                <label for="meta_title" class="input-group-text">
                    <i class="fa fa-info-circle <?php echo e(trans('forms.create_vente_icon_meta_title')); ?>" aria-hidden="true"></i>
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
    <?php echo Form::label('meta_desc', trans('forms.create_vente_label_meta_desc'), array('class' => 'col-md-3 control-label'));; ?>

    <div class="col-md-9">
        <div class="input-group">
            <?php echo Form::text('meta_desc', $boite->meta_desc, array('id' => 'meta_desc', 'class' => 'form-control', 'placeholder' => trans('forms.create_vente_ph_meta_desc'))); ?>

            <div class="input-group-append">
                <label for="meta_desc" class="input-group-text">
                    <i class="fa fa-info-circle <?php echo e(trans('forms.create_vente_icon_meta_desc')); ?>" aria-hidden="true"></i>
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
        <input type="text" name="thumbnail" class="form-control" id="feature_thumbnail" name="feature_thumbnail" value="<?php echo e($boite->thumbnail); ?>">

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


</div>

</div>

<?php echo Form::button("Enregistrer mes changements <i class='fa fa-save ml-1'></i>", array('class' => 'btn btn-success btn-block margin-bottom-1 mt-3 mb-2 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => 'Enregistrer', 'data-message' => 'Enregistrer mes changements')); ?>


<?php echo Form::close(); ?>

</div>
</div>
</div>
</section>
<?php echo $__env->make('modals.modal-save', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<script type="text/javascript">



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

</script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
  $.fn.selectpicker.Constructor.BootstrapVersion = '4';   
  $('.selectpicker').selectpicker();

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantes-addict/webapp/development/v0.8-latest/resources/views/boitesmanagement/edit-boite.blade.php ENDPATH**/ ?>