@extends('layouts.manager')

@section('template_title')
    Modifier l'article {{$post->name}}
@endsection

@section('breadcrumb')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$post->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url("manager/dashboard") }}">Accueil</a></li>
              <li class="breadcrumb-item"><a href="{{ url("manager/posts") }}">Articles</a></li>
              <li class="breadcrumb-item active">{{ $post->slug }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection

@section('template_linked_css')
    <style type="text/css">
        .btn-save,
        .pw-change-container {
            display: none;
        }
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
@endsection

@section('content')

<section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          Modifier l'article: {{$post->name}}
                            <div class="pull-right">
                                <a href="{{ route('manager.posts') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="top" title="{{ trans('postsmanagement.tooltips.back-posts') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux articles
                                </a>
                                <a href="{{ url('manager/posts/' . $post->id) }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('postsmanagement.tooltips.back-posts') }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    Voir cet article
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('route' => ['posts.update', $post->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation', 'files' => true, 'enctype'=>'multipart/form-data')) !!}

                            {!! csrf_field() !!}



                            <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                                {!! Form::label('name', trans('forms.create_post_label_name'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('name', $post->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.create_post_ph_postname'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-file-signature" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('slug') ? ' has-error ' : '' }}">
                                {!! Form::label('slug', trans('forms.create_post_label_slug'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('slug', $post->slug, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => trans('forms.create_post_ph_postslug'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="slug">
                                                <i class="fa fa-link" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('slug'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('slug') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('description') ? ' has-error ' : '' }}">
                                {!! Form::label('description', trans('forms.create_post_label_description'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('description', $post->description, array('id' => 'description', 'class' => 'form-control', 'placeholder' => trans('forms.create_post_ph_postdescription'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="description">
                                                <i class="fa fa-pen" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('content') ? ' has-error ' : '' }}">
                                {!! Form::label('content', trans('forms.create_post_label_content'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-12">
                                    <div class="input-group">
                                        {!! Form::textarea('content', $post->content, array('id' => 'content', 'class' => 'summernote form-control', 'placeholder' => trans('forms.create_post_ph_postcontent'))) !!}
                                       
                                    </div>
                                    @if($errors->has('content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                                                        <div class="form-group has-feedback row {{ $errors->has('duration') ? ' has-error ' : '' }}">
                                                            {!! Form::label('duration', "Durée (en mn)", array('class' => 'col-md-3 control-label')); !!}
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    {!! Form::text('duration', $post->duration, array('id' => 'duration', 'class' => 'form-control', 'placeholder' => trans('forms.create_post_ph_duration'))) !!}
                                                                    <div class="input-group-append">
                                                                        <label for="duration" class="input-group-text">
                                                                            <i class="fa fa-fw {{ trans('forms.create_post_icon_duration') }}" aria-hidden="true"></i>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has('duration'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('duration') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>



                                                                                    <div class="form-group has-feedback row {{ $errors->has('difficulty') ? ' has-error ' : '' }}">
                                                                                        {!! Form::label('difficulty', "Difficulté (sur 5)", array('class' => 'col-md-3 control-label')); !!}
                                                                                        <div class="col-md-9">
                                                                                            <div class="input-group">
                                                                                                {!! Form::text('difficulty', $post->difficulty, array('id' => 'difficulty', 'class' => 'form-control', 'placeholder' => 2)) !!}
                                                                                                <div class="input-group-append">
                                                                                                    <label for="difficulty" class="input-group-text">
                                                                                                        <i class="fa fa-fw {{ trans('forms.create_post_icon_difficulty') }}" aria-hidden="true"></i>
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                            @if ($errors->has('difficulty'))
                                                                                                <span class="help-block">
                                                                                                    <strong>{{ $errors->first('difficulty') }}</strong>
                                                                                                </span>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>



                            <div class="form-group has-feedback row {{ $errors->has('meta_title') ? ' has-error ' : '' }}">
                                {!! Form::label('meta_title', trans('forms.create_post_label_meta_title'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('meta_title', $post->meta_title, array('id' => 'meta_title', 'class' => 'form-control', 'placeholder' => trans('forms.create_post_ph_meta_title'))) !!}
                                        <div class="input-group-append">
                                            <label for="meta_title" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_post_icon_meta_title') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('meta_title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('meta_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group has-feedback row {{ $errors->has('meta_desc') ? ' has-error ' : '' }}">
                                {!! Form::label('meta_desc', trans('forms.create_post_label_meta_desc'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('meta_desc', $post->meta_desc, array('id' => 'meta_desc', 'class' => 'form-control', 'placeholder' => trans('forms.create_post_ph_meta_desc'))) !!}
                                        <div class="input-group-append">
                                            <label for="meta_desc" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_post_icon_meta_desc') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('meta_desc'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('meta_desc') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>




<div class="form-group has-feedback row {{ $errors->has('postcategorie') ? ' has-error ' : '' }}">

    {!! Form::label('postcategorie', "Catégorie", array('class' => 'col-md-3 control-label')); !!}

    <div class="col-md-9">
        <div class="input-group">

            <select class="custom-select form-control" name="postcategorie_id" id="postcategorie">
                <option value="">Sélectionner une catégorie</option>
                @if ($postcategories)
                    @foreach($postcategories as $postcategorie)
                        <option value="{{ $postcategorie->id }}" {{ $post->postcategorie_id == $postcategorie->id ? 'selected="selected"' : '' }}>{{ $postcategorie->name }}</option>
                    @endforeach
                @endif
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="postcategorie">
                    <i class="fa fa-list" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        @if ($errors->has('postcategorie'))
            <span class="help-block">
                <strong>{{ $errors->first('postcategorie') }}</strong>
            </span>
        @endif
    </div>
</div>


                  
 <div class="form-group has-feedback row {{ $errors->has('thumbnail') ? ' has-error ' : '' }}">
                                {!! Form::label('thumbnail', "Image de miniature", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                          <div class="input-group-prepend">
                                            <label class="input-group-text" for="thumbnail">
                                                https://www.plantesaddict.fr/
                                            </label>
                                        </div>

<label for="feature_thumbnail"></label>
<input type="text" name="thumbnail" class="form-control" id="feature_thumbnail" name="feature_thumbnail" value="{{ $post->thumbnail }}">
                                       
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="thumbnail">
                                                <a href="" class=" popup_selector" data-inputid="feature_thumbnail"> <i class="fa fa-image"></i> </a>

                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('thumbnail'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('thumbnail') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>







                            {!! Form::button('Enregistrer mes changements', array('class' => 'btn btn-success btn-block margin-bottom-1 mt-3 mb-2 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => 'Enregistrer', 'data-message' => 'Enregistrer mes changements')) !!}

                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </section>

    @include('modals.modal-save')
    @include('modals.modal-delete')

@endsection

@section('footer_scripts')



  @include('scripts.delete-modal-script')
  @include('scripts.save-modal-script')

 


  <!-- jQuery and jQuery UI (REQUIRED) -->
        <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
       
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js"></script>
        <!-- elFinder CSS (REQUIRED) -->
                <script src="{{ url("packages/barryvdh/elfinder/js/elfinder.full.js") }}"></script>

        <script type="text/javascript" src="{{ asset("packages/barryvdh/elfinder/js/standalonepopup.min.js") }}"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
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

  $.fn.selectpicker.Constructor.BootstrapVersion = '4';   

    $('.ventes').selectpicker();
    $('.fiches').selectpicker();

</script>

<script>
  $(document).ready(function() {
  //$('#summernote').summernote('focus');
  $('.summernote').summernote({
       height: 400,
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
@endsection


