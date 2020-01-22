@extends('layouts.app')

@section('template_title')
  Fiche d'entretien: {{ $fiche->name }}
@endsection



@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white bg-success">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              {!! trans('fichesmanagement.showing-fiche-title', ['name' => $fiche->name]) !!}
              <div class="float-right">

                <a href="{{ route('manager.fiches') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('fichesmanagement.tooltips.back-fiches') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Retour aux fiches
                </a>

                <a href="{{ url("manager/fiches/$fiche->id/edit") }}" class=" mx-1 btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('fichesmanagement.tooltips.back-fiches') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Modifier cette fiche
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">



                <div class="col-lg-2 offset-sm-1">
                  <div class="text-center float-center">
                    <img src="{{asset($fiche->thumbnail)}}" alt="" height="200px">

                  </div>
                </div>
                <div class="col-lg-9">

<div class="text-center">
  <h1 class="text-muted margin-top-sm-1 text-center text-left-tablet">{{$fiche->name}} <span class="badge badge-secondary">{{$fiche->price}}€</span> </h1>
  @if($fiche->stock <= 10) <span class="badge badge-warning text-center text-left-tablet">{{$fiche->stock}} en stock</span> @elseif($fiche->stock < 5) <span class="badge badge-danger text-center text-left-tablet">{{$fiche->stock}} en stock</span> @else <span class="badge badge-danger text-center text-left-tablet">{{$fiche->stock}} en stock</span> @endif
  @if($fiche->sold > 1) <span class="badge badge-success text-center text-left-tablet">{{$fiche->sold}} vendus</span> @else <span class="badge badge-danger text-center text-left-tablet">{{$fiche->sold}} vendus</span> @endif
  @if($fiche->store_enabled == true) <span class="badge badge-success">Article en vente dans le shop</span> @else <span class="badge badge-danger">Article en vente dans le shop</span> @endif
</div>
                </div>


            </div>

            <div class="row">

              <div class="col-sm-4 col-md-6">

                <p class="text-center text-left-tablet">
                  <strong>
                    {{ $fiche->first_name }} {{ $fiche->last_name }}
                  </strong>

                </p>

              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($fiche->description)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Description
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $fiche->description }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif







            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Spécifications
              </strong>
            </div>

            <div class="col-sm-7">
            {{$fiche->specs}}
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('fichesmanagement.labelStatus') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @if ($fiche->is_public == 1)
                <span class="badge badge-success">
                  Public
                </span>
              @else
                <span class="badge badge-danger">
                  Non affichée
                </span>
              @endif
            </div>





            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($fiche->created_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Crée le
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $fiche->created_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($fiche->updated_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Modifié le
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $fiche->updated_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($fiche->signup_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('fichesmanagement.labelIpEmail') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $fiche->signup_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($fiche->signup_confirmation_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('fichesmanagement.labelIpConfirm') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $fiche->signup_confirmation_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($fiche->signup_sm_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('fichesmanagement.labelIpSocial') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $fiche->signup_sm_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($fiche->admin_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('fichesmanagement.labelIpAdmin') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $fiche->admin_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($fiche->updated_ip_address)


            @endif


            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Produits associés
              </strong>
            </div>

            <div class="col-sm-7">
              @if(count($fiche->products) > 0)
                @foreach($fiche->products as $product)
                  <a href="{{route('manager.products', $product->id)}}" class="badge badge-success">{{$product->name}}</a>
                @endforeach
              @else
                <p>Aucun produit n'est associé à cette fiche d'entretien.</p>
              @endif
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>



          </div>

        </div>
      </div>
    </div>
  </div>



  @include('modals.modal-delete')

@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')
  @if(config('fichesmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection
