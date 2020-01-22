@extends('layouts.manager')

@section('template_title')
    {!! trans('usersmanagement.create-new-user') !!}
@endsection

@section('template_fastload_css')
@endsection

@section('breadcrumb')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ajouter un produit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url("manager/dashboard") }}">Accueil</a></li>
              <li class="breadcrumb-item active">Produits</li>
             
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
                            Ajouter un nouveau produit
                            <div class="pull-right">
                                <a href="{{ route('manager.products') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour à la liste des produits
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(array('route' => 'manager.products', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}

                            <div class="form-group has-feedback row {{ $errors->has('sku') ? ' has-error ' : '' }}">
                                {!! Form::label('sku', trans('forms.create_product_label_sku'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('sku', NULL, array('id' => 'sku', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_sku'))) !!}
                                        <div class="input-group-append">
                                            <label for="sku" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_product_icon_sku') }}" aria-hidden="true"></i>
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
                                {!! Form::label('slug', trans('forms.create_product_label_slug'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('slug', NULL, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_slug'))) !!}
                                        <div class="input-group-append">
                                            <label for="slug" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_product_icon_slug') }}" aria-hidden="true"></i>
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
                                {!! Form::label('name', trans('forms.create_product_label_name'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_name'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-fw {{ trans('forms.create_product_icon_name') }}" aria-hidden="true"></i>
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
                                {!! Form::label('description', trans('forms.create_product_label_description'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('description', NULL, array('id' => 'description', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_description'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="description">
                                                <i class="fa fa-fw {{ trans('forms.create_product_icon_description') }}" aria-hidden="true"></i>
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
                                {!! Form::label('price', trans('forms.create_product_label_price'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::number('price', NULL, array('id' => 'price', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_price'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="price">
                                                <i class="fa fa-fw {{ trans('forms.create_product_icon_price') }}" aria-hidden="true"></i>
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
                                {!! Form::label('tax', trans('forms.create_product_label_tax'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::number('tax', NULL, array('id' => 'tax', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_tax'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="tax">
                                                <i class="fa fa-fw {{ trans('forms.create_product_icon_tax') }}" aria-hidden="true"></i>
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
                                {!! Form::label('stock', trans('forms.create_product_label_stock'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::number('stock', NULL, array('id' => 'stock', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_stock'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="stock">
                                                <i class="fa fa-fw {{ trans('forms.create_product_icon_stock') }}" aria-hidden="true"></i>
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





                            <div class="form-group has-feedback row {{ $errors->has('productlabel') ? ' has-error ' : '' }}">

                                {!! Form::label('productlabel', trans('forms.create_product_label_productlabel'), array('class' => 'col-md-3 control-label')); !!}

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="productlabel" id="productlabel">
                                            <option value="">{{ trans('forms.create_product_ph_productlabel') }}</option>
                                            @if ($productlabels)
                                                @foreach($productlabels as $productlabel)
                                                    <option value="{{ $productlabel->id }}" >{{ $productlabel->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="productlabel">
                                                <i class="{{ trans('forms.create_product_icon_productlabel') }}" aria-hidden="true"></i>
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


                            <div class="form-group has-feedback row {{ $errors->has('productcategorie') ? ' has-error ' : '' }}">

                                {!! Form::label('productcategorie', trans('forms.create_product_label_productcategorie'), array('class' => 'col-md-3 control-label')); !!}

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="productcategorie" id="productcategorie">
                                            <option value="">{{ trans('forms.create_product_ph_productcategorie') }}</option>
                                            @if ($productcategories)
                                                @foreach($productcategories as $productcategorie)
                                                    <option value="{{ $productcategorie->id }}" >{{ $productcategorie->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="productcategorie">
                                                <i class="{{ trans('forms.create_product_icon_productcategorie') }}" aria-hidden="true"></i>
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

                            {!! Form::button(trans('forms.create_product_button_text'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer_scripts')
@endsection
