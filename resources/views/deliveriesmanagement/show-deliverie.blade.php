@extends('layouts.manager')

@section('template_title')
  Livraison: {{ $deliverie->deliverie_id }}
@endsection

@section('breadcrumb')
<div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0 text-dark">Livraison N°{{ $deliverie->deliverie_id }} 

            @if($deliverie->tracking_id != null && $deliverie->shipment_sticker_url != null)
            <a target="_blank" href="{{ $deliverie->shipment_tracking_url ?? "" }}" class="badge badge-success">Colis {{ $deliverie->tracking_id }}</a>

          @endif</h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url("manager/dashboard") }}">Accueil</a></li>
              <li class="breadcrumb-item"><a href="{{ url("manager/deliveries") }}">Livraisons</a></li>
              <li class="breadcrumb-item active">{{ $deliverie->deliverie_id }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection


@section('content')

<section class="content">
  


  @if($deliverie->status == "sent")
  <div class="alert alert-success" role="alert">
    Livraison expédié! 
  </div>
  @elseif($deliverie->status == "done")
    <div class="alert alert-info" role="alert">
    Le colis est prêt mais pas encore expédié.
    @if($deliverie->shipment_sticker_url != null)
    <a href="{{ $deliverie->shipment_sticker_url }}" class=" mx-1 btn btn-primary btn-sm float-right"  data-placement="left" title="{{ trans('deliveriesmanagement.tooltips.back-deliveries') }}">
                  <i class="fa fa-rocket" aria-hidden="true"></i>
                  Imprimer le bon de livraison
                </a>
    @else
    Générer le bon
    @endif
  </div>

  @elseif($deliverie->status == "doing")
    <div class="alert alert-info" role="alert">
    Cette livraison est en cours de préparation. 
    <a href="{{ url("manager/deliveries/$deliverie->id/doing") }}" class=" mx-1 btn btn-primary btn-sm float-right"  data-placement="left" title="{{ trans('deliveriesmanagement.tooltips.back-deliveries') }}">
                  <i class="fa fa-rocket" aria-hidden="true"></i>
                  Imprimer le bon de livraison
                </a>
  </div>
@else
  <div class="alert alert-secondary" role="alert">
    Cette livraison n'a pas encore été préparé. 
    <a href="{{ url("manager/deliveries/$deliverie->id/doing") }}" class=" mx-1 btn btn-primary btn-sm float-right"  data-placement="left" title="{{ trans('deliveriesmanagement.tooltips.back-deliveries') }}">
                  <i class="fa fa-rocket" aria-hidden="true"></i>
                  Imprimer le bon de livraison
                </a>
  </div>
@endif
    <div class="row">


      <div class="col-lg-7">

        <div class="card">
          <div class="card-header">Préparation du colis

    @if($deliverie->status == "sent")
            <span class="float-right badge badge-success">Expédiée</span> 
    @elseif($deliverie->status == "done")
            <span class="float-right badge badge-primary">Colis préparé</span> 

           

    @elseif($deliverie->status == "doing")
            <span class="float-right badge badge-info">En préparation...</span> 

    @elseif($deliverie->status == "todo" or $deliverie->status == "a préparer")
            <span class="float-right badge badge-secondary">A préparer</span> 


    @elseif($deliverie->status == "received")
            <span class="float-right badge badge-success">Reçu par le client</span> 
    @endif

          </div>
          <div class="card-body">

            @if($deliverie->status == "sent")
            <p class="text-muted">Votre colis a été expédié vers le point relais <span class="badge" title="{{ $deliverie->pickup_name }} | {{ $deliverie->pickup_address }} {{ $deliverie->pickup_postalcode }} {{ $deliverie->pickup_city }}" data-toggle="tooltip">{{ $deliverie->pickup_id }}</span> avec le numéro de colis <span class="badge">{{ $deliverie->tracking_id }}</span></p>

             <a href="{{ url("manager/deliveries/" . $deliverie->id . "/unsend") }}" data-toggle='tooltip' class="btn btn-sm btn-outline-danger" title="Repasser la livraison en préparé">Annuler l'envoi <i class="fa fa-times"></i></a>

            <a target='_blank' href="{{ $deliverie->shipment_tracking_url ?? url("manager/deliveries") }}" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="Voir la page de tracking de la livraison">Suivre le colis <i class="fa fa-eye"></i></a>
            <a class="btn btn-sm btn-primary" data-toggle="tooltip" title="Ce colis a été réceptionné par le client. La commande sera également passé en terminé." href="{{ $deliverie->shipment_tracking_url }}">Colis réceptionné par le client</a>
            @elseif($deliverie->status == "done")
            <p class="text-muted">Votre colis <span class="badge">{{ $deliverie->tracking_id }}</span> est prêt mais pas encore expédié.</p>
            <a class="btn btn-outline-danger btn-sm" href="{{ url("manager/deliveries/" . $deliverie->id . "/undo") }}" data-toggle="tooltip" title="Repasse la livraison et la commande en 'a préparer'. Si vous avez généré une étiquette, celle-ci est conservé.">Annuler la préparation <i class="fa fa-times"></i></a>
            <a class="btn btn-primary btn-sm" href="{{ url("manager/deliveries/" . $deliverie->id . "/send") }}">Mon colis a été expédié <i class="fa fa-rocket"></i></a>

            @elseif($deliverie->status == "doing")

            <a class="btn btn-outline-danger btn-sm" href="{{ url("manager/deliveries/" . $deliverie->id . "/undoing") }}" data-toggle="tooltip" title="Repasse la livraison et la commande en 'a préparer'. Si vous avez généré une étiquette, celle-ci est conservé.">Annuler la préparation en cours <i class="fa fa-times"></i></a>
            <a class="btn btn-primary btn-sm" href="{{ url("manager/deliveries/" . $deliverie->id . "/done") }}" data-toggle="tooltip" title="Votre colis est prêt à être expédié">Mon colis est prêt <i class="fa fa-arrow-right"></i></a>
            @elseif($deliverie->status == "todo" or $deliverie->status == "a préparer")

            <p class="text-muted">
              Vous n'avez pas encore commencé à traiter cette livraison.
            </p>

            <a class="btn btn-primary btn-sm" href="{{ url("manager/deliveries/" . $deliverie->id . "/doing") }}" title="Débuter la préparation de votre livraison, vous allez pouvoir générer une étiquette de livraison." data-toggle="tooltip">Préparer ma commande <i class="fa fa-arrow-right"></i></a>


            @else

            <p class="text-muted">
              Vous n'avez pas encore commencé à traiter cette livraison.
            </p>

            <a class="btn btn-primary btn-sm" href="{{ url("manager/deliveries/" . $deliverie->id . "/doing") }}">Préparer ma commande</a>

             
            @endif
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            Contenu du colis

            <span class="float-right badge badge-secondary"><?php $totalWeight = 0; ?>
          @foreach($deliverie->order->products as $product)
            @if($product->weight != null)
            <?php  $totalWeight += $product->weight; ?>
            @endif
          @endforeach Poids total: {{ $totalWeight }}g</span>
          </div>
          <div class="card-body">
            <small class="float-right">Crée: {{$deliverie->created_at}} par {{$deliverie->order->user->email}}</small>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Quantitée</th>
                    <th scope="col">TVA</th>
                    <th scope="col">Prix</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  @foreach($deliverie->order->products as $product)


<td>                          <img src="{{url("$product->thumbnail")}}" class="rounded" alt="{{$deliverie->name}}" height="100px" alt="">
</td>

<td>                        <a class="text-dark" href="{{ url("manager/product/" . $product->id) }}">{{$product->name}} </a>
</td>
<td><small>{{$product->pivot->quantity}}</small></td>
<td>                        <small>{{$product->tax}}%</small>
</td>
                      <td>  {{$product->pivot->price * $product->pivot->quantity}}€</td>



</tr>
                  @endforeach


                </tbody>
              </table>
            
          </div>

          <p>
      <div class="row">
        <div class="col-lg-6"></div>
        <div class="col-lg-6">

        <div>
          <span>Numéro de colis:</span>
                <span class="badge badge-secondary">{{ $deliverie->tracking_id ?? "Pas encore généré" }}</span>

        </div>
        <div>
          <span>Type de colis:</span>
                <span class="badge badge-secondary">{{ $deliverie->packet_type ?? "24R" }}</span>

        </div>
 <div>
          <span>Valeur:</span>
                <span class="badge badge-secondary">{{ $deliverie->order->amount ?? "25" }}€</span>

        </div>

</div>
      </div>
        
          </p>
        </div>

        
      </div>

      <div class="col-lg-5">


        <div class="card">
          <div class="card-header">Commande

          <a class="float-right badge badge-secondary" href="{{ url("manager/orders/" . $deliverie->order->order_id) }}" target="_blank">{{ $deliverie->order->order_id ?? "Supprimée" }}</a>
          </div>
          <div class="card-body">

              <div class="my-2">
                <i class="text-muted  mr-1 fa fa-euro-sign"></i>
                <span class="text-muted">Montant:</span> {{$deliverie->order->amount}}€
              </div>
              
              <div class="my-2">
                <i class="text-muted  mr-1 fa fa-circle"></i>
                <span class="text-muted">Identifiant client:</span>  {{$deliverie->order->user->id}}
              </div>

              <div class="my-2">
                <i class="text-muted  mr-1 fa fa-user"></i>
                <span class="text-muted">Nom:</span> {{$deliverie->order->user->first_name}} {{$deliverie->order->user->lastname_name}}
              </div>

              <div class="my-2">
                <i class="text-muted  mr-1 fa fa-user"></i>
                <span class="text-muted">Contact:</span> {{$deliverie->order->user->email}} {{$deliverie->order->user->profile->phone_number ?? ""}} 
              </div>

              <div class="my-2">
                <i class="text-muted  mr-1 fa fa-map-marker"></i>
                <span class="text-muted">Adresse:</span> {{$deliverie->order->user->profile->location_address ?? "Non renseignée"}} {{$deliverie->order->user->profile->location_postalcode ?? ""}} {{$deliverie->order->user->profile->location_city ?? ""}}
              </div>

         
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            Destination  
          </div>
          <div class="card-body">
            
            <p class="text-muted">
              Cette livraison est à envoyer en point relais Mondial Relay
            
            </p>
             <div class="alert alert-info" role="alert">
            <p>Point relais: {{ $deliverie->pickup_id }}</p>
            <p>
              {{ $deliverie->pickup_name }}
            {{ $deliverie->pickup_address }} -
            {{ $deliverie->pickup_postalcode }}
            {{ $deliverie->pickup_city }}
            </p>
            
            
            </div>
          </div>
        </div>


        
        
      </div>
      
    </div>

  <a href="{{ url("manager/deliveries/" . $deliverie->id . '/edit') }}" class="mb-2 btn btn-sm btn-secondary" style="width:100%;">Modifier les détails de cette livraison <i class='ml-1 fa fa-edit'></i></a>
      {!! Form::open(array('url' => 'manager/deliveries/' . $deliverie->id, 'class' => '', 'data-toggle' => '', 'title' => 'Supprimer')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::button("Supprimer cette livraison <i class='ml-1 fa fa-trash'></i>", array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Supprimer cette commande', 'data-message' => 'Etes vous sur de vouloir supprimer cette commande ? Si une livraison est associée, elle sera également supprimée!')) !!}
                {!! Form::close() !!}
  </div>



</section>

  @include('modals.modal-delete')

@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')
  @if(config('deliveriesmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection

