@extends('layouts.admin')

@section('template_title')
Modifier le label {{$productlabel->name}}
@endsection

@section('template_linked_css')
    <style type="text/css">
        .btn-save,
        .pw-change-container {
            display: none;
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
                          Modifier le label "{{$productlabel->name}}"
                            <div class="pull-right">
                                <a href="{{url("manager/products/labels")}}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="top" title="{{ trans('productsmanagement.tooltips.back-products') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux labels
                                </a>
                                <a href="{{url("manager/products/labels/" . $productlabel->id)}}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="top" title="{{ trans('productsmanagement.tooltips.back-products') }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    Voir ce label
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('route' => ['labels.update', $productlabel->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation', 'files' => true, 'enctype'=>'multipart/form-data')) !!}

                            {!! csrf_field() !!}




                            <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                                {!! Form::label('name', trans('forms.create_product_label_name'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('name', $productlabel->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_productname'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-fw {{ trans('forms.create_product_icon_productname') }}" aria-hidden="true"></i>
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
                                        {!! Form::text('slug', $productlabel->slug, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_productslug'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="slug">
                                                <i class="fa fa-fw {{ trans('forms.create_product_icon_productslug') }}" aria-hidden="true"></i>
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
                            <div class="form-group has-feedback row {{ $errors->has('color_code') ? ' has-error ' : '' }}">
                                {!! Form::label('color_code', trans('forms.create_product_label_color_code'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('color_code', $productlabel->color_code, array('id' => 'color_code', 'class' => 'form-control', 'placeholder' => trans('forms.create_product_ph_productcolor_code'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="color_code">
                                                <i class="fa fa-fw {{ trans('forms.create_product_icon_productcolor_code') }}" aria-hidden="true"></i>
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






                            {!! Form::button('Enregistrer mes changements', array('class' => 'btn btn-success btn-block margin-bottom-1 mt-3 mb-2 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => 'Enregistrer', 'data-message' => 'Enregistrer mes changements')) !!}

                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-save')
    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')
  @include('scripts.save-modal-script')
  @include('scripts.check-changed')
@endsection

