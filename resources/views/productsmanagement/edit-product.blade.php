@extends('layouts.manager')

@section('template_title')
    Modifier le produit {{$product->name }}
@endsection

@section('template_linked_css')
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

@section('breadcrumb')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Modifier le produit: {{$product->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url("manager/dashboard") }}">Accueil</a></li>
              <li class="breadcrumb-item"><a href="{{ url("manager/products") }}">Produits</a></li>
              <li class="breadcrumb-item active">{{ $product->slug }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection

@section('content')
 <!-- Main content -->
<section class="content">

 <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          <span>Modifier le produit <b>{{$product->name}}</b> </span>
                            <div class="pull-right">
                                <a href="{{ route('manager.products') }}" class="btn btn-light btn-sm float-right"  data-placement="top" title="{{ trans('productsmanagement.tooltips.back-products') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux produits
                                </a>
                                <a href="{{ url('manager/products/' . $product->id) }}" class="btn btn-light btn-sm float-right"  data-placement="left" title="{{ trans('productsmanagement.tooltips.back-products') }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    Voir la fiche de ce produit
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('route' => ['products.update', $product->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation', 'files' => true, 'enctype'=>'multipart/form-data')) !!}

                            {!! csrf_field() !!}





                            <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                                {!! Form::label('name', trans('forms.create_product_label_name'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('name', $product->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_productname'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
                                {!! Form::label('slug', trans('forms.create_product_label_slug'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('slug', $product->slug, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_productslug'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="slug">
                                                <i class="fa fa-link" aria-hidden="true" data-toggle="tooltip" title="Permet de définir l'URL pour le SEO, ex: /mon-slug-produit"></i>
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



                                                        <div class="form-group has-feedback row {{ $errors->has('productcategorie') ? ' has-error ' : '' }}">

                                                            {!! Form::label('store_enabled', trans('forms.create_product_label_store_enabled'), array('class' => 'col-md-3 control-label')); !!}

                                                            <div class="col-md-9">
                                                                <div class="input-group">

                                                                    <select class="custom-select form-control" name="store_enabled" id="store_enabled">
                                                                        @if ($product->store_enabled == true)
                                                                                <option value="1" selected> Afficher</option>
                                                                                <option value="0"> Ne pas afficher</option>
                                                                        @else
                                                                          <option value=0 selected> Ne pas afficher</option>
                                                                          <option value=1 > Afficher</option>

                                                                        @endif
                                                                    </select>
                                                                    <div class="input-group-append">
                                                                        <label class="input-group-text" for="store_enabled">
                                                                            <i class="fa fa-shield" aria-hidden="true"></i>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has('store_enabled'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('store_enabled') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>


                            <div class="form-group has-feedback row {{ $errors->has('description') ? ' has-error ' : '' }}">
                                {!! Form::label('description', "Description", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('description', $product->description, array('id' => 'description', 'class' => 'form-control', 'placeholder' => "Courte description de votre produit")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="description">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
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

                            <div class="form-group has-feedback row {{ $errors->has('specs') ? ' has-error ' : '' }}">
                                {!! Form::label('specs', 'Information supplémentaire sur le produit', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('specs', $product->specs, array('id' => 'specs', 'class' => 'form-control', 'placeholder' => 'Ex: Taille de pot')) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="specs">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('specs'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('specs') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>




    <hr class="pt-3">

    <h4 class="mb-3">Tarification</h4>



                                <div class="form-group has-feedback row {{ $errors->has('price') ? ' has-error ' : '' }}">
                                    {!! Form::label('price',"Prix de l'article", array('class' => 'col-md-3 control-label')); !!}
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            {!! Form::text('price', $product->price, array('id' => 'price', 'class' => 'form-control', 'placeholder' => "24,99")) !!}
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="price">
                                                    <i class="fa fa-eur" aria-hidden="true" data-toggle="tooltip" title="Prix du produit (TTC)"></i>
                                                </label>
                                            </div>
                                        </div>
                                        @if($errors->has('price'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group has-feedback row {{ $errors->has('tax') ? ' has-error ' : '' }}">
                                    {!! Form::label('tax', "Taux TVA (%)", array('class' => 'col-md-3 control-label')); !!}
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            {!! Form::text('tax', $product->tax, array('id' => 'tax', 'class' => 'form-control', 'placeholder' => '10')) !!}
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="tax">
                                                    <i class="fa fa-percent" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        @if($errors->has('tax'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tax') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

    <div class="form-group has-feedback row {{ $errors->has('old_price') ? ' has-error ' : '' }}">
        {!! Form::label('old_price', "Ancien prix", array('class' => 'col-md-3 control-label')); !!}
        <div class="col-md-9">
            <div class="input-group">
                {!! Form::text('old_price', $product->old_price, array('id' => 'old_price', 'class' => 'form-control', 'placeholder' => '29,99')) !!}
                <div class="input-group-append">
                    <label class="input-group-text" for="old_price">
                      <i class="fa fa-eur" aria-hidden="true" data-toggle="tooltip" title="Si renseigner, l'ancien prix sera affiché barré et de couleur grise"></i>
                    </label>
                </div>
            </div>
            @if($errors->has('old_price'))
                <span class="help-block">
                    <strong>{{ $errors->first('old_price') }}</strong>
                </span>
            @endif
        </div>
    </div>

                            <div class="form-group has-feedback row {{ $errors->has('stock') ? ' has-error ' : '' }}">
                                {!! Form::label('stock', "Stock (restant):", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('stock', $product->stock, array('id' => 'stock', 'class' => 'form-control', 'placeholder' => '120')) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="stock">
                                                <i class="fa fa-line-chart" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('stock'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('stock') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                                <hr class="pt-3">

                                <h4 class="mb-3">Détails</h4>
                            <div class="form-group has-feedback row {{ $errors->has('weight') ? ' has-error ' : '' }}">
                                {!! Form::label('weight', "Poid de l'article (en g)", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('weight', $product->weight, array('id' => 'weight', 'class' => 'form-control', 'placeholder' => "1000")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="weight">
                                                <i class="fa fa-balance-scale" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('weight'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('weight') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('height') ? ' has-error ' : '' }}">
                                {!! Form::label('height', "Taille (cm)", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('height', $product->height, array('id' => 'height', 'class' => 'form-control', 'placeholder' => "110")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="height">
                                                <i class="fa fa-text-height" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('height'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('height') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('color_code') ? ' has-error ' : '' }}">
                                {!! Form::label('color_code', trans('forms.create_product_label_color_code'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('color_code', $product->color_code, array('id' => 'color_code', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_color_code'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="color_code">
                                                <i style="color: {{$product->color_code }};" class="fa fa-circle" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('color_code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('color_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <hr class="pt-3 ">

<h4 class="py-2">Ventes et fiches d'entretien</h4>



 <div class="form-group has-feedback row {{ $errors->has('ventes') ? ' has-error ' : '' }}">
        {!! Form::label('ventes', "Ventes associés", array('class' => 'col-md-3 control-label')); !!}
        <div class="col-md-9">
            <div class="input-group">
                <select style="width:600px;" class="form-control ventes" name="ventes[]" multiple>
          @foreach(\App\Models\Vente::all() as $vente)
          @if($product->ventes->contains($vente->id))
          <option value="{{$vente->id}}" selected>{{$vente->name}} ({{ date('d/m/Y', strtotime($vente->date))}})</option>
          @else
          <option value="{{$vente->id}}" >{{$vente->name}} ({{ date('d/m/Y', strtotime($vente->date))}})</option>

          @endif
          @endforeach

          </select>
                <div class="input-group-append">
                    <label class="input-group-text" for="ventes">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </label>
                </div>
            </div>
            @if($errors->has('ventes'))
                <span class="help-block">
                    <strong>{{ $errors->first('ventes') }}</strong>
                </span>
            @endif
        </div>
    </div>




 <div class="form-group has-feedback row {{ $errors->has('fiches') ? ' has-error ' : '' }}">
        {!! Form::label('fiches', "Fiches associés", array('class' => 'col-md-3 control-label')); !!}
        <div class="col-md-9">
            <div class="input-group">
                <select style="width:600px;" class="form-control fiches" name="fiches[]" multiple>
       

            @foreach (\App\Models\Fiche::all() as $fiche)

              <option value="{{$fiche->id}}"
                @if(in_array($fiche->id, $product->fiches->pluck('id')->toArray()))
                  selected='selected'
                @endif
                >
              {{$fiche->name}}
              </option>


            @endforeach

          </select>
                <div class="input-group-append">
                    <label class="input-group-text" for="fiches">
                        <i class="fa fa-file" aria-hidden="true"></i>
                    </label>
                </div>
            </div>
            @if($errors->has('fiches'))
                <span class="help-block">
                    <strong>{{ $errors->first('fiches') }}</strong>
                </span>
            @endif
        </div>
    </div>

<hr>

<div class="form-group has-feedback row {{ $errors->has('productcategorie') ? ' has-error ' : '' }}">

    {!! Form::label('productcategorie', "Catégorie ", array('class' => 'col-md-3 control-label')); !!}

    <div class="col-md-9">
        <div class="input-group">

            <select class="form-control custom-select form-control" name="productcategorie_id" id="productcategorie">
                <option value="">Sélectionner une catégorie</option>
                @if ($productcategories)
                    @foreach($productcategories as $productcategorie)
                        <option value="{{ $productcategorie->id }}" {{ $product->productcategorie_id == $productcategorie->id ? 'selected="selected"' : '' }}>{{ $productcategorie->name }}</option>
                    @endforeach
                @endif
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="productcategorie">
                  <a href="{{url("manager/products/categories")}}"> <i class="fa fa-list"></i> </a>

                </label>
            </div>
        </div>
        @if ($errors->has('productcategorie'))
            <span class="help-block">
                <strong>{{ $errors->first('productcategorie') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group has-feedback row {{ $errors->has('productlabel') ? ' has-error ' : '' }}">

    {!! Form::label('productlabel', trans('forms.create_product_label_productlabel'), array('class' => 'col-md-3 control-label')); !!}

    <div class="col-md-9">
        <div class="input-group">
            <select class="custom-select form-control" name="productlabel_id" id="productlabel">

              @if($product->productlabel_id == null)
                <option value=null>Aucun label</option>

                @foreach($productlabels as $productlabel)
                    <option value="{{ $productlabel->id }}">{{ $productlabel->name }}</option>
                @endforeach
              @else
                <option value="null">Aucun label</option>

                @foreach($productlabels as $productlabel)
                    <option value="{{ $productlabel->id }}" {{ $product->productlabel_id == $productlabel->id ? 'selected="selected"' : '' }}>{{ $productlabel->name }}</option>
                @endforeach
              @endif

                {{-- @if(count($product->productlabels) > 0)

                  <option value="{{ $product->productlabels->id }}" selected>{{ $product->productlabels->name }}</option>

                @else
                  <option value="10">Aucun label</option>

                  @foreach($productlabels as $productlabel)
                      <option value="{{ $productlabel->id }}" {{ $product->productlabel_id == $productlabel->id ? 'selected="selected"' : '' }}>{{ $productlabel->name }}</option>
                  @endforeach
                @endif --}}
                {{-- @if ($productlabels)
                    @foreach($productlabels as $productlabel)
                        <option value="{{ $productlabel->id }}" {{ $product->productlabel_id == $productlabel->id ? 'selected="selected"' : '' }}>{{ $productlabel->name }}</option>
                    @endforeach
                @endif --}}
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="productlabel">
                  <a href="{{url("manager/products/labels")}}"> <i class="fa fa-tags"></i> </a>
                </label>
            </div>
        </div>
        @if ($errors->has('productlabel'))
            <span class="help-block">
                <strong>{{ $errors->first('productlabel') }}</strong>
            </span>
        @endif
    </div>
</div>

<hr>

<h4 class="py-2">
Images & SEO
</h4>

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
<input type="text" name="thumbnail" class="form-control" id="feature_thumbnail" name="feature_thumbnail" value="{{ $product->thumbnail }}">
                                       
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



<div class="form-group has-feedback row {{ $errors->has('picture_one') ? ' has-error ' : '' }}">
                                {!! Form::label('picture_one', "Image secondaire", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                          <div class="input-group-prepend">
                                            <label class="input-group-text" for="picture_one">
                                                https://www.plantesaddict.fr/
                                            </label>
                                        </div>

<label for="feature_picture_one"></label>
<input type="text" name="picture_one" class="form-control" id="feature_picture_one" name="feature_picture_one" value="{{ $product->picture_one }}">
                                       
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="picture_one">
                                                <a href="" class=" popup_selector" data-inputid="feature_picture_one"> <i class="fa fa-image"></i> </a>

                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('picture_one'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('picture_one') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


<div class="form-group has-feedback row {{ $errors->has('video') ? ' has-error ' : '' }}">
                                {!! Form::label('video', "Vidéo", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                          <div class="input-group-prepend">
                                            <label class="input-group-text" for="video">
                                                https://www.plantesaddict.fr/
                                            </label>
                                        </div>

<label for="feature_video"></label>
<input type="text" name="video" class="form-control" id="feature_video" name="feature_video" value="{{ $product->video }}">
                                       
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="video">
                                                <a href="" class=" popup_selector" data-inputid="feature_video"> <i class="fa fa-image"></i> </a>

                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('video'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('video') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>




<hr>


                            <div class="form-group has-feedback row {{ $errors->has('meta_title') ? ' has-error ' : '' }}">
                                {!! Form::label('meta_title', trans('forms.create_product_label_meta_title'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('meta_title', $product->meta_title, array('id' => 'meta_title', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_meta_title'))) !!}
                                        <div class="input-group-append">
                                            <label for="meta_title" class="input-group-text">
                                                <i class="fa fa-commenting" aria-hidden="true"></i>
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
                                {!! Form::label('meta_desc', trans('forms.create_product_label_meta_desc'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('meta_desc', $product->meta_desc, array('id' => 'meta_desc', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_meta_desc'))) !!}
                                        <div class="input-group-append">
                                            <label for="meta_desc" class="input-group-text">
                                                <i class="fa fa-comment-o" aria-hidden="true"></i>
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




<hr>





                            {!! Form::button('Enregistrer mes changements  <i class="ml-1 fa fa-arrow-right"></i>', array('class' => 'btn btn-success btn-block margin-bottom-1 mt-3 mb-2 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => 'Enregistrer', 'data-message' => 'Enregistrer mes changements')) !!}

                        {!! Form::close() !!}
                    </div>

<div class="px-2 pb-2">
      {!! Form::open(array('url' => 'manager/products/' . $product->id, 'class' => '', 'data-toggle' => '', 'title' => 'Supprimer')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::button("Supprimer ce produit <i class='ml-1 fa fa-trash'></i>", array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Supprimer ce produit', 'data-message' => 'Etes vous sur de vouloir supprimer ce produit ?')) !!}
                {!! Form::close() !!}
</div>
                </div>
              
            </div>
        </div>

    @include('modals.modal-save')
    @include('modals.modal-delete')
</section>
@endsection



@section('footer_scripts')
 @include('scripts.delete-modal-script')
  @include('scripts.save-modal-script')



  <!-- jQuery and jQuery UI (REQUIRED) -->
        <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
       
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js"></script>
        <!-- elFinder CSS (REQUIRED) -->
                <script src="{{ url("packages/barryvdh/elfinder/js/elfinder.full.js") }}"></script>

        <script type="text/javascript" src="{{ asset("packages/barryvdh/elfinder/js/standalonepopup.min.js") }}"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <script type="text/javascript">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

  <script type="text/javascript">
 
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

    $('.ventes').selectpicker();
    $('.fiches').selectpicker();


  </script>

@endsection



