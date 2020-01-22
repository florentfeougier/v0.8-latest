@extends('layouts.admin')

@section('template_title')
  {!! trans('usersmanagement.showing-user', ['name' => $vente->name]) !!}
@endsection

<?php
  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
?>

@section('content')
  <?php     $sold = []; ?>
@foreach(\App\Models\Order::where('cart', $vente->slug)->where('payment_status', true)->get() as $order)
  <p>
    <?php

    foreach($order->products as $product){


      if($product->slug == "Croton-plantes"){
        echo($order->order_id);
      }
      if(array_key_exists("$product->slug", $sold)){
        $sold["$product->slug"] += $product->pivot->quantity;

      }else {
        $sold["$product->slug"] = $product->pivot->quantity;

      }
    }


    ?>

 </p>
@endforeach

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white @if ($vente->is_public == 1) bg-success @else bg-danger @endif">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <span>Détails la vente de <b>{{$vente->name}}</b> </span>
              <div class="float-right">
                <a href="{{ route('manager.ventes') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Retour aux ventes
                </a>

                <a href="{{ URL::to('manager/ventes/' . $vente->id . '/edit') }}" class="mx-1 btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                  <i class="fa fa-edit" aria-hidden="true"></i>
                  Modifier cette vente
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-lg-6">
                <img height="200px" class="rounded" src="{{asset("storage/" . $vente->thumbnail)}}" alt="">
              </div>
              <div class="col-lg-6 text-center">
                <h1> <b>{{$vente->name}}</b>


                </h1>                <small class="badge badge-secondary">{{ strftime("%A %d %B ", strtotime(date('Y/m/d', strtotime($vente->date)))) }}</small>

                <h4>
                  <?php $revenue = 0;
                  foreach($vente->orders->where('payment_status', true)->unique('order_id') as $order){
                    $revenue += $order->amount;
                  }
                  ?>
                  <small>Revenue total: {{$revenue}}€</small>
                </h4>
                <small>@if($vente->is_public && $vente->status == "active") <span class="badge badge-success" data-toggle="tooltip" title="Cette vente est en cours">Public</span> @else <span class="badge badge-danger">Privée</span> @endif</small>
                <small>@if($vente->show_date) <span class="badge badge-success">Date publique</span> @else <span class="badge badge-danger">Date non affichée</span> @endif</small>
                <small>@if($vente->show_location) <span class="badge badge-success" data-toggle="tooltip" title="L'adresse est affiché publiquement">Adresse publique</span> @else <span class="badge badge-danger" data-toggle="tooltip" title="L'adresse n'est pas affiché et partagé seulement aprés le paiement">Adresse privée</span> @endif</small>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 offset-sm-2 col-md-2 offset-md-3">
              </div>
              <div class="col-sm-4 col-md-6">

                <p class="text-center text-left-tablet">
                  <strong>
                    {{ $vente->first_name }} {{ $vente->last_name }}
                  </strong>
                  @if($vente->email)
                    <br />
                    <span class="text-center" data-toggle="tooltip" data-placement="top" title="{{ trans('usersmanagement.tooltips.email-user', ['user' => $vente->email]) }}">
                      {{ Html::mailto($vente->email, $vente->email) }}
                    </span>
                  @endif
                </p>
                @if ($vente->profile)
                  <div class="text-center text-left-tablet mb-4">
                    <a href="{{ url('/profile/'.$vente->name) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.viewProfile') }}">
                      <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('usersmanagement.viewProfile') }}</span>
                    </a>
                    <a href="/users/{{$vente->id}}/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="{{ trans('usersmanagement.editUser') }}">
                      <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('usersmanagement.editUser') }} </span>
                    </a>
                    {!! Form::open(array('url' => 'users/' . $vente->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('usersmanagement.deleteUser'))) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('usersmanagement.deleteUser') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user?')) !!}
                    {!! Form::close() !!}
                  </div>
                @endif
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($vente->name)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Nom (lieu)
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $vente->name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif
            @if ($vente->slug)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Slug (URL)
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $vente->slug }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif
            @if ($vente->description)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Description
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $vente->description }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif
            @if ($vente->content)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Contenu
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $vente->content }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif
            @if ($vente->date)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Date
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $vente->date }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif
            @if ($vente->horaires)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Horaires
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $vente->location_address }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif
            @if ($vente->location_address_info)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Adresse
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $vente->location_address_info }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif
            @if ($vente->location_postalcode)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Code postal
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $vente->location_postalcode }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif
            @if ($vente->location_state)

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Région
              </strong>
            </div>

            <div class="col-sm-7">
              <span data-toggle="tooltip" data-placement="top" title="{{ trans('usersmanagement.tooltips.location_state-user', ['user' => $vente->location_state]) }}">
                {{ HTML::mailto($vente->location_state, $vente->email) }}
              </span>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @endif

            @if ($vente->location_country)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Pays
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $vente->location_country }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($vente->description)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelLastName') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $vente->description }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif





            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('usersmanagement.labelStatus') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @if ($vente->is_public == 1)
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

            @if ($vente->created_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelCreatedAt') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $vente->created_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($vente->updated_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelUpdatedAt') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $vente->updated_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($vente->signup_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpEmail') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $vente->signup_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($vente->signup_confirmation_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpConfirm') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $vente->signup_confirmation_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($vente->signup_sm_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpSocial') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $vente->signup_sm_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($vente->admin_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpAdmin') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $vente->admin_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($vente->updated_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpUpdate') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $vente->updated_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif



                          <div class="col-sm-5 mb-2 col-6 text-larger">
                            <h4 class="py-4">
                              Produits en vente ({{count($vente->products)}})
                            </h4>
                          </div>

                          <div class="col-sm-12">
                            @if (count($vente->products) > 0)
                            @foreach($vente->products as $product)
                              @if($product->stock < 5)

                                <a href="{{url("manager/products/$product->id")}}" class="mb-1 btn btn-warning" data-toggle="tooltip" title="{{$product->stock}} en stock - {{$product->price}}€">{{$product->name}}
                                  @foreach($sold as $item => $qty)
                                    @if($item == $product->slug)
                                      - {{$qty ?? '0'}} vendues

                                    @endif
                                  @endforeach</a>
                            @else

                              <a href="{{url("manager/products/$product->id")}}" class="mb-1 btn btn-success" data-toggle="tooltip" title="{{$product->stock}} en stock - {{$product->price}}€">{{$product->name}}
                                @foreach($sold as $item => $qty)
                                  @if($item == $product->slug)
                                    <span class="badge badge-secondary">{{$qty}} vendues</span>
                                  @endif
                                @endforeach</a>

                            @endif
                            @endforeach
                          @else
                            <p>Aucun produit n'est en vente.</p>
                          @endif

                          </div>

                          <div class="clearfix"></div>
                          <div class="border-bottom"></div>


              <div class="col-sm-5 col-6 text-larger">
                <h4 class="py-3">
                  Commandes ({{count($vente->orders->where('payment_status', true)->unique('order_id'))}})
                </h4>
              </div>

              <div class="col-sm-12">
                @if (count($vente->orders->where('payment_status', true)) > 0)
                @foreach($vente->orders->where('payment_status', true)->unique('order_id') as $order)
                  @if($order->payment_status == true)
                  <a href="{{url("manager/orders/$order->order_id")}}" class="mb-1 btn btn-success" data-toggle="tooltip" title="{{$order->user->email}} a payé {{$order->amount}}€">{{$order->user->email}}</a>
                @else
                  <a href="{{url("manager/orders/$order->order_id")}}" class="mb-1 btn btn-warning" data-toggle="tooltip" title="{{$order->user->email}} (Pas encore payé {{$order->amount}}€)">{{$order->order_id}}</a>

                @endif
                @endforeach
              @else
                <p>Aucune commande pour cette vente n'a été enregistré pour le moment.</p>
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
  @if(config('usersmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection
