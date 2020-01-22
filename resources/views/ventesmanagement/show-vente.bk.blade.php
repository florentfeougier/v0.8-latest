'layouts.admin')

@section('template_title')
  Vente de {{$vente->name}} du {{$vente->date}}
@endsection

<?php
  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
?>



@section('content')

  <?php     $sold = []; ?>
{{-- @foreach($vente->orders->where('payment_status', true)->unique('order_id') as $order) --}}
@foreach(\App\Models\Order::where('cart', $vente->slug)->where('payment_status', true)->get() as $order)
  <p>

    <?php

    foreach($order->products as $product){



      if(array_key_exists("$product->slug", $sold)){
        $sold["$product->slug"] += $product->pivot->quantity;

      }else {
        $sold["$product->slug"] = $product->pivot->quantity;

      }
    }


    ?>

 </p>
@endforeach


{{-- <a href="{{url("manager/ventes/$vente->id/export-orders")}}">Exporter les ventes</a> --}}

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        {{-- @if(count(\App\Models\Order::where('cart', $vente->slug)->where('payment_status', true)->get()) > 0)
          <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Aujourd'hui</strong> Vous abez.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

        @endif --}}

        <div class="card">

          <div class="card-header text-white @if ($vente->is_public == 1) bg-success @else bg-secondary @endif">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <span>Détails la vente de <b>{{$vente->name}}</b> </span>
              <div class="float-right">
                <a href="{{ route('manager.ventes') }}" class="btn btn-light btn-sm float-right"  data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Retour aux ventes
                </a>

                <a href="{{ URL::to('manager/ventes/' . $vente->id . '/edit') }}" class="mx-1 btn btn-light btn-sm float-right"  data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                  <i class="fa fa-edit" aria-hidden="true"></i>
                  Modifier cette vente
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">

              <div class="col-lg-12 text-center">
                <small>{{ date('d/m/Y', strtotime($vente->date)) }} de {{$vente->horaires}}</small></br>

                <h1> <b>{{$vente->name}}</b>




                </h1>


                {{count($vente->orders->where('payment_status', true)->unique('order_id'))}} commandes payées


                  <?php $revenue = 0;
                  foreach($vente->orders->where('payment_status', true)->unique('order_id') as $order){

                    $revenue += $order->amount;
                  }
                  ?>
              pour un revenue total de {{$revenue}}€


                <small>@if($vente->is_public && $vente->status == "active") <span class="badge badge-success" data-toggle="tooltip" title="Cette vente est en cours">En cours</span> @else <span class="badge badge-danger">Privée</span> @endif</small>
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

                </p>

              </div>
            </div>

<hr class="py-2">

            <div class="row">
              <div class="col-lg-8">
                @if ($vente->name)

                  <div class="col-sm-5 col-6 text-larger">
                    <strong>
                      Adresse @if($vente->show_location == true) <i class="fa fa-map-marker text-success"></i> @else <i class="fa fa-map-marker text-danger"></i> @endif

                    </strong>
                  </div>

                  <div class="col-sm-7">
                    {{ $vente->location_address }} {{ $vente->location_postalcode }} {{ $vente->name }} | {{ $vente->location_country }}
                  </div>

                  <div class="clearfix"></div>
                  <div class="border-bottom"></div>

                @endif

                @if ($vente->date)

                  <div class="col-sm-5 col-6 text-larger">
                    <strong>
                      Date @if($vente->show_date == true) <i class="fa fa-calendar text-success"></i> @else <i class="fa fa-calendar text-danger"></i> @endif
                    </strong>
                  </div>

                  <div class="col-sm-7">
                    {{ $vente->date }} - {{ $vente->horaires ?? "Aucun horaire défini." }}
                  </div>



                @endif


              </div>

              <div class="col-lg-4">
                <div class="col-lg-12">
                  <img height="130px" class="rounded" src="{{asset($vente->thumbnail)}}" alt="">
                </div>
              </div>

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>





            @if ($vente->description)

              <div class="col-sm-12 col-12 text-larger">
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





            <div class="col-sm-6 col-6 text-larger">
              <h4 class="py-3">
                Produits actuellement en vente ({{count($vente->products)}})
              </h4>
            </div>

            <div class="col-sm-12">

              @foreach($vente->products as $productForSale)
                <span class="btn mb-2 btn-outline-secondary">{{$productForSale->name}}</span>
              @endforeach
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

                          <div class="col-lg-12">
                            <h4 class="py-3">
                              Produits vendues
                              <p class="text-right float-right">
                                <a href="{{url("manager/ventes/" . $vente->id . "/export-sold-products")}}" data-toggle="tooltip" title="Exporter la liste des quantités de produits vendues pour cette vente"> <i class="fa fa-cloud-download"></i> </a>


                              </p>
                            </h4 class="py-3">
                          </div>

                          <div class="col-sm-12">

                            @foreach($sold as $a => $s)
                              <a href="{{url("manager/products/$a")}}" class="mb-2 btn btn-outline-success">
                                {{\App\Models\Product::where('slug', $a)->first()->name}} -
                               {{$s}} vendues</a>
                            @endforeach
                          </div>

                          <div class="clearfix"></div>
                          <div class="border-bottom"></div>


              <div class="col-sm-12 col-12 text-larger">
                <h4 class="py-2">
                  Commandes ({{count(\App\Models\Order::where('cart', $vente->slug)->where('payment_status', true)->get())}})
                  <p class="text-right float-right">
                    <a href="{{url("manager/ventes/" . $vente->id . "/export-orders")}}" data-toggle="tooltip" title="Exporter la liste des commandes pour cette vente"> <i class="fa fa-cloud-download"></i> </a>
                    <a href="{{url("manager/ventes/" . $vente->id . "/export-orders-mailing-list")}}" data-toggle="tooltip" title="Exporter la liste des adresses mail des commandes validées pour cette commande"> <i class="fa fa-users"></i> </a>

                    <a href="{{url("manager/ventes/" . $vente->id . "/export-vente-ordersEmails")}}"></a>

                  </p>
                </h4>

              </div>

              <div class="col-sm-12">
                @if (count($vente->orders->where('payment_status', true)) > 0)
                @foreach($vente->orders->where('payment_status', true)->unique('order_id') as $order)
                  @if($order->payment_status == true)
                  <a href="{{url("manager/orders/$order->order_id")}}" class="mb-1 btn btn-secondary" data-toggle="tooltip" title="{{$order->user->email}} a payé {{$order->amount}}€">{{$order->user->email ?? "Inconnu"}}</a>
                @else
                  <a href="{{url("manager/orders/$order->order_id")}}" class="mb-1 btn btn-warning" data-toggle="tooltip" title="{{$order->user->email}} (Pas encore payé {{$order->amount}}€)">{{$order->user->email ?? "Inconnu"}}</a>

                @endif
                @endforeach
              @else
                <p>Aucune commande pour cette vente n'a été enregistré pour le moment.</p>
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







