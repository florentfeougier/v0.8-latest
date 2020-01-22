@extends('layouts.manager')

@section('template_title')
    Ajouter une box
@endsection

@section('template_fastload_css')
@endsection

@section('breadcrumb')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ajouter une box</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url("manager/dashboard") }}">Accueil</a></li>
              <li class="breadcrumb-item active">Box</li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection

@section('content')

<section class="content">
    

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Ajouter une nouvelle box
                            <div class="pull-right">
                                <a href="{{ route('manager.boites') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour à la liste des produits
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(array('route' => 'box.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}

                            <div class="form-group has-feedback row {{ $errors->has('sku') ? ' has-error ' : '' }}">
                                {!! Form::label('sku', "SKU", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('sku', NULL, array('id' => 'sku', 'class' => 'form-control', 'placeholder' => "Ex: B001")) !!}
                                        <div class="input-group-append">
                                            <label for="sku" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_boite_icon_sku') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('sku'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sku') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('slug') ? ' has-error ' : '' }}">
                                {!! Form::label('slug', "Slug (URL)", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('slug', NULL, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => "Ex: ma-box-surprise-printemps")) !!}
                                        <div class="input-group-append">
                                            <label for="slug" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_boite_icon_slug') }}" aria-hidden="true"></i>
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
                                {!! Form::label('name', "Nom", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => "Ma box surprise du printemps")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-fw {{ trans('forms.create_boite_icon_name') }}" aria-hidden="true"></i>
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
                                {!! Form::label('description', "Description", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('description', NULL, array('id' => 'description', 'class' => 'form-control', 'placeholder' => "Description rapide de votre box")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="description">
                                                <i class="fa fa-fw {{ trans('forms.create_boite_icon_description') }}" aria-hidden="true"></i>
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


<hr>

                            <div class="form-group has-feedback row {{ $errors->has('price') ? ' has-error ' : '' }}">
                                {!! Form::label('price', "Contenu", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::number('price', NULL, array('id' => 'price', 'class' => 'form-control', 'placeholder' => "Longue description et info")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="price">
                                                <i class="fa fa-fw {{ trans('forms.create_boite_icon_price') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group has-feedback row {{ $errors->has('price') ? ' has-error ' : '' }}">
                                {!! Form::label('price', "Prix (€)", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::number('price', 24.99, array('id' => 'price', 'class' => 'form-control', 'placeholder' => "24.99")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="price">
                                                <i class="fa fa-fw {{ trans('forms.create_boite_icon_price') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('tax') ? ' has-error ' : '' }}">
                                {!! Form::label('tax', "Taux de TVA (%)", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::number('tax', NULL, array('id' => 'tax', 'class' => 'form-control', 'placeholder' => trans('forms.create_boite_ph_tax'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="tax">
                                                <i class="fa fa-fw {{ trans('forms.create_boite_icon_tax') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('tax'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tax') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('stock') ? ' has-error ' : '' }}">
                                {!! Form::label('stock', "Stock", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::number('stock', NULL, array('id' => 'stock', 'class' => 'form-control', 'placeholder' => "50")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="stock">
                                                <i class="fa fa-fw {{ trans('forms.create_boite_icon_stock') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('stock'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('stock') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


<hr>
                            <div class="form-group has-feedback row {{ $errors->has('required_product_quantity') ? ' has-error ' : '' }}">
                                {!! Form::label('required_product_quantity', "Nombre de plantes", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::number('required_product_quantity', NULL, array('id' => 'required_product_quantity', 'class' => 'form-control', 'placeholder' => "6")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="required_product_quantity">
                                                <i class="fa fa-fw {{ trans('forms.create_boite_icon_required_product_quantity') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('required_product_quantity'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('required_product_quantity') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

<hr>

<div>
    image
</div>

 <div class="form-group has-feedback row {{ $errors->has('products') ? ' has-error ' : '' }}">
        {!! Form::label('products', "En vente", array('class' => 'col-md-3 control-label')); !!}
        <div class="col-md-9">
            <div class="input-group">
                       <select class="custom-select form-control selectpicker"  name="products[]" multiple>
        <option value="" selected>Sélectionner des plantes...</option>

@foreach(\App\Models\Product::all() as $product)

  <option value="{{$product->id}}" >{{$product->name}}</option>

@endforeach

</select>
                <div class="input-group-append">
                    <label class="input-group-text" for="products">
                        <i class="fa fa-cubes" aria-hidden="true"></i>
                    </label>
                </div>
            </div>
            @if($errors->has('products'))
                <span class="help-block">
                    <strong>{{ $errors->first('products') }}</strong>
                </span>
            @endif
        </div>
    </div>

                          
                            {!! Form::button(trans('forms.create_boite_button_text'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer_scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
  $.fn.selectpicker.Constructor.BootstrapVersion = '4';   
  $('.selectpicker').selectpicker();

</script>
@endsection
