@extends('layouts.admin')

@section('template_title')
    {!! trans('fichesmanagement.create-new-fiche') !!}
@endsection

@section('template_fastload_css')
<style>
    
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

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Toutes les fiches
                            <div class="pull-right">
                                <a href="{{ route('manager.fiches') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('fichesmanagement.tooltips.back-fiches') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux fiches
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(array('route' => 'fiches.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation', 'files' => true, 'enctype'=>'multipart/form-data')) !!}

                            {!! csrf_field() !!}


                            <div class="form-group has-feedback row {{ $errors->has('slug') ? ' has-error ' : '' }}">
                                {!! Form::label('slug', trans('forms.create_fiche_label_slug'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('slug', NULL, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_slug'))) !!}
                                        <div class="input-group-append">
                                            <label for="slug" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_fiche_icon_slug') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('slug'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('slug') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                                {!! Form::label('name', trans('forms.create_fiche_label_name'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'required' => 'required', 'placeholder' => trans('forms.create_fiche_ph_name'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-fw {{ trans('forms.create_fiche_icon_name') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('description') ? ' has-error ' : '' }}">
                                {!! Form::label('description', trans('forms.create_fiche_label_description'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('description', NULL, array('id' => 'description', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_description'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="description">
                                                <i class="fa fa-fw {{ trans('forms.create_fiche_icon_description') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('description_short') ? ' has-error ' : '' }}">
                                {!! Form::label('description_short', trans('forms.create_fiche_label_description_short'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('description_short', NULL, array('id' => 'description_short', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_description_short'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="description_short">
                                                <i class="fa fa-fw {{ trans('forms.create_fiche_icon_description_short') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('description_short'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_short') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('content') ? ' has-error ' : '' }}">
                                {!! Form::label('content', trans('forms.create_fiche_label_content'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-12">
                                    <div class="input-group">
                                        {!! Form::textarea('content', NULL, array('id' => 'content', 'class' => 'summernote form-control', 'placeholder' => trans('forms.create_fiche_ph_content'), 'autofocus' => 'autofocus')) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="content">
                                                <i class="fa fa-fw {{ trans('forms.create_fiche_icon_content') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('arrosage_info') ? ' has-error ' : '' }}">
                                {!! Form::label('arrosage_info', trans('forms.create_fiche_label_arrosage_info'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('arrosage_info', NULL, array('id' => 'arrosage_info', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_arrosage_info'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="arrosage_info">
                                                <i class="fa fa-fw {{ trans('forms.create_fiche_icon_arrosage_info') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('arrosage_info'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('arrosage_info') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('entretien_info') ? ' has-error ' : '' }}">
                                {!! Form::label('entretien_info', trans('forms.create_fiche_label_entretien_info'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('entretien_info', NULL, array('id' => 'entretien_info', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_entretien_info'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="entretien_info">
                                                <i class="fa fa-fw {{ trans('forms.create_fiche_icon_entretien_info') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('entretien_info'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('entretien_info') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('lumiere_info') ? ' has-error ' : '' }}">
                                {!! Form::label('lumiere_info', trans('forms.create_fiche_label_lumiere_info'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('lumiere_info', NULL, array('id' => 'lumiere_info', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_lumiere_info'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="lumiere_info">
                                                <i class="fa fa-fw {{ trans('forms.create_fiche_icon_lumiere_info') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('lumiere_info'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lumiere_info') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('meta_title') ? ' has-error ' : '' }}">
                                {!! Form::label('meta_title', trans('forms.create_fiche_label_meta_title'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('meta_title', NULL, array('id' => 'meta_title', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_meta_title'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="meta_title">
                                                <i class="fa fa-fw {{ trans('forms.create_fiche_icon_meta_title') }}" aria-hidden="true"></i>
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
                                {!! Form::label('meta_desc', trans('forms.create_fiche_label_meta_desc'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('meta_desc', NULL, array('id' => 'meta_desc', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_meta_desc'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="meta_desc">
                                                <i class="fa fa-fw {{ trans('forms.create_fiche_icon_meta_desc') }}" aria-hidden="true"></i>
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


                            <div class="form-group has-feedback row {{ $errors->has('meta_desc') ? ' has-error ' : '' }}">
                                {!! Form::label('color_code', trans('forms.create_fiche_label_color_code'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('color_code', NULL, array('id' => 'color_code', 'class' => 'form-control', 'placeholder' => trans('forms.create_fiche_ph_color_code'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="color_code">
                                                <i class="fa fa-fw {{ trans('forms.create_fiche_icon_color_code') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('color_code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('color_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Photo principale</span>
                              </div>
                              <div class="custom-file">
                                <input type="file" name="thumbnail" class="custom-file-input" id="inputGroupFile01"
                                  aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Sélectionner</label>
                              </div>
                            </div>

                            {!! Form::button(trans('forms.create_fiche_button_text'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
  $('.summernote').summernote();
  });
  </script>
@endsection
