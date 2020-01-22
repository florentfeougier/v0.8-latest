@extends('layouts.manager')

@section('template_title')
    Ajouter un article
@endsection

@section('template_fastload_css')
@endsection

@section('content')

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Ajouter un article
                            <div class="pull-right">
                                <a href="{{ url('manager/posts') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux articles
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(array('route' => 'posts.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}

                           
                            <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                                {!! Form::label('name', "Titre de l'article", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => "Ex: Protéger vos plantes de vos chats")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-fw {{ trans('forms.create_user_icon_username') }}" aria-hidden="true"></i>
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

                            <div class="form-group has-feedback row {{ $errors->has('first_name') ? ' has-error ' : '' }}">
                                {!! Form::label('slug', "Slug (URL)", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('slug', NULL, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => "mon-article")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="slug">
                                                <i class="fa fa-fw {{ trans('forms.create_user_icon_firstname') }}" aria-hidden="true"></i>
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

                            <div class="form-group has-feedback row {{ $errors->has('last_name') ? ' has-error ' : '' }}">
                                {!! Form::label('description', "Description", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('description', NULL, array('id' => 'description', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="description">
                                                <i class="fa fa-fw {{ trans('forms.create_user_icon_lastname') }}" aria-hidden="true"></i>
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

                            <div class="form-group has-feedback row {{ $errors->has('role') ? ' has-error ' : '' }}">
                                {!! Form::label('productcategorie_id', "Catégorie", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="productcategorie_id" id="productcategorie_id">
                                            <option value="">Sélectionner une catégorie</option>
                                            @if ($productcategorie_ids ?? '')
                                                @foreach($productcategories ?? '' as $productcategorie)
                                                    <option value="{{ $productcategorie_id->id }}">{{ $productcategorie_id->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="productcategorie_id">
                                                <i class="{{ trans('forms.create_user_icon_productcategorie_id') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('productcategorie_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('productcategorie_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

  <div class="form-group has-feedback row {{ $errors->has('last_name') ? ' has-error ' : '' }}">
                                {!! Form::label('description', "contenu", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::textarea('content', NULL, array('id' => 'contenu', 'class' => 'form-control', 'placeholder' => "Votre contenu...")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="contenu">
                                                <i class="fa fa-fw {{ trans('forms.create_user_icon_lastname') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('contenu'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contenu') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group has-feedback row {{ $errors->has('last_name') ? ' has-error ' : '' }}">
                                {!! Form::label('meta_title', "Meta titre", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('meta_title', NULL, array('id' => 'meta_title', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="meta_title">
                                                <i class="fa fa-fw {{ trans('forms.create_user_icon_lastname') }}" aria-hidden="true"></i>
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


                            <div class="form-group has-feedback row {{ $errors->has('last_name') ? ' has-error ' : '' }}">
                                {!! Form::label('meta_desc', "Meta description", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('meta_desc', NULL, array('id' => 'meta_desc', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="meta_desc">
                                                <i class="fa fa-fw {{ trans('forms.create_user_icon_lastname') }}" aria-hidden="true"></i>
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


                            {!! Form::button("Ajouter votre article", array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
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

