@extends('layouts.manager')

@section('template_title')
    Ajouter une vente
@endsection

@section('template_fastload_css')
@endsection

@section('breadcrumb')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ajouter une nouvelle vente</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url("manager/dashboard") }}">Accueil</a></li>
              <li class="breadcrumb-item "><a href="{{ url("manager/ventes") }}">Ventes</a></li>
              <li class="breadcrumb-item active">Ajouter</li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection
@section('content')

 <section class="content">
      

  <div class="alert alert-info" role="alert">
Votre vente sera par défaut privée afin de vous permettre la configurer après sa création (produits associés, permissions...)
  </div>




        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Ajouter une vente
                            <div class="pull-right">
                                <a href="{{ url("manager/ventes") }}" class="btn btn-light btn-sm float-right" data-toggle="" data-placement="left" title="Retour à la liste des ventes">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux ventes
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(array('route' => 'ventes.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}



                            <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                                {!! Form::label('name', 'Nom (lieu)', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => "Ex: Montpellier")) !!}
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

                            <div class="form-group has-feedback row {{ $errors->has('slug') ? ' has-error ' : '' }}">
                                {!! Form::label('slug', 'Slug (URL)', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('slug', NULL, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => "Ex: montpellier-avr2019")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="slug">
                                                <i class="fa fa-link" aria-hidden="true"></i>
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

                            <div class="form-group has-feedback row {{ $errors->has('description') ? ' has-error ' : '' }}">
                                {!! Form::label('description', 'Description', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('description', NULL, array('id' => 'description', 'class' => 'form-control', 'placeholder' => "Plantes Addict est de retour à...")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="description">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
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



        <div class="form-group has-feedback row {{ $errors->has('date') ? ' has-error ' : '' }}">
            {!! Form::label('date', 'Date', array('class' => 'col-md-3 control-label')); !!}
            <div class="col-md-9">
                <div class="input-group">
                    {!! Form::date('date', NULL, array('id' => 'date', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))) !!}
                    <div class="input-group-append">
                        <label class="input-group-text" for="date">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </label>
                    </div>
                </div>
                @if ($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group has-feedback row {{ $errors->has('horaires') ? ' has-error ' : '' }}">
            {!! Form::label('horaires', 'Horaires', array('class' => 'col-md-3 control-label')); !!}
            <div class="col-md-9">
                <div class="input-group">
                    {!! Form::text('horaires', NULL, array('id' => 'horaires', 'class' => 'form-control', 'placeholder' => "de 9h à 18h")) !!}
                    <div class="input-group-append">
                        <label class="input-group-text" for="horaires">
                            <i class="fa fa-clock" aria-hidden="true"></i>
                        </label>
                    </div>
                </div>
                @if ($errors->has('horaires'))
                <span class="help-block">
                    <strong>{{ $errors->first('horaires') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <hr>

          <div class="alert alert-secondary" role="alert">
L'adresse ne sera pas affichée par défaut. Vous pourrez modifier ce réglage une fois ce formulaire validé.
  </div>
        <div class="form-group has-feedback row {{ $errors->has('location_address') ? ' has-error ' : '' }}">
            {!! Form::label('location_address', 'Adresse', array('class' => 'col-md-3 control-label')); !!}
            <div class="col-md-9">
                <div class="input-group">
                    {!! Form::text('location_address', NULL, array('id' => 'location_address', 'class' => 'form-control', 'placeholder' => "1 rue de la mairie")) !!}
                    <div class="input-group-append">
                        <label class="input-group-text" for="location_address">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </label>
                    </div>
                </div>
                @if ($errors->has('location_address'))
                <span class="help-block">
                    <strong>{{ $errors->first('location_address') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group has-feedback row {{ $errors->has('location_postalcode') ? ' has-error ' : '' }}">
            {!! Form::label('location_postalcode', 'Code postal', array('class' => 'col-md-3 control-label')); !!}
            <div class="col-md-9">
                <div class="input-group">
                    {!! Form::text('location_postalcode', NULL, array('id' => 'location_postalcode', 'class' => 'form-control', 'placeholder' => "75000")) !!}
                    <div class="input-group-append">
                        <label class="input-group-text" for="location_postalcode">
                            <i class="fa fa-map-marked-alt" aria-hidden="true"></i>
                        </label>
                    </div>
                </div>
                @if ($errors->has('location_postalcode'))
                <span class="help-block">
                    <strong>{{ $errors->first('location_postalcode') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group has-feedback row {{ $errors->has('location_city') ? ' has-error ' : '' }}">
            {!! Form::label('location_city', 'Ville', array('class' => 'col-md-3 control-label')); !!}
            <div class="col-md-9">
                <div class="input-group">
                    {!! Form::text('location_city', NULL, array('id' => 'location_city', 'class' => 'form-control', 'placeholder' => "Montpellier")) !!}
                    <div class="input-group-append">
                        <label class="input-group-text" for="location_city">
                            <i class="fa fa-university" aria-hidden="true"></i>
                        </label>
                    </div>
                </div>
                @if ($errors->has('location_city'))
                <span class="help-block">
                    <strong>{{ $errors->first('location_city') }}</strong>
                </span>
                @endif
            </div>
        </div>
<hr>



   <div class="form-group has-feedback row {{ $errors->has('meta_title') ? ' has-error ' : '' }}">
                                {!! Form::label('meta_title', 'Titre meta (100 charactères)', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('meta_title', NULL, array('id' => 'meta_title', 'class' => 'form-control', 'placeholder' => "Ex: Vente éphémère à Montpellier le 01/01/2020 de petites et grandes plantes d'intérieur à partir de 1€")) !!}
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

   <div class="form-group has-feedback row {{ $errors->has('meta_desc') ? ' has-error ' : '' }}">
                                {!! Form::label('meta_desc', 'Description meta (200 charactères)', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('meta_desc', NULL, array('id' => 'meta_desc', 'class' => 'form-control', 'placeholder' => "Ex: Commander vos plantes en ligne et venez les récupérer lors de notre vente proche de chez vous, partout en France")) !!}
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



   <div class="form-group has-feedback row {{ $errors->has('fb_event_url') ? ' has-error ' : '' }}">
                                {!! Form::label('fb_event_url', 'Lien evenement Facebook', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('fb_event_url', NULL, array('id' => 'fb_event_url', 'class' => 'form-control', 'placeholder' => "https://www.facebook.com/events/4242877629")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="fb_event_url">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('fb_event_url'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fb_event_url') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
   <div class="form-group has-feedback row {{ $errors->has('color_code') ? ' has-error ' : '' }}">
                                {!! Form::label('color_code', 'Couleur', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('color_code', NULL, array('id' => 'color_code', 'class' => 'form-control my-colorpicker1', 'placeholder' => "Plantes Addict est de retour à...")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="color_code">
                                                <i class="fa fa-circle" aria-hidden="true"></i>
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

                            



                            
                           
                    </div>

                </div>

                 {!! Form::button('Ajouter cette vente et la configurer', array('class' => 'btn btn-block btn-success margin-bottom-1 mb-1','type' => 'submit' )) !!}
                        {!! Form::close() !!}
            </div>
        </div>
    </div>
 </section>
@endsection

@section('footer_scripts')
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="{{ url("plugins/inputmask/min/jquery.inputmask.bundle.min.js") }}"></script>
<script src="{{ url("plugins/daterangepicker/daterangepicker.js") }}"></script>
<!-- bootstrap color picker -->
<script src="{{ url("plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js") }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}"></script>
<script>
     $('.my-colorpicker1').colorpicker()
</script>
@endsection
