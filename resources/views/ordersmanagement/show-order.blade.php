@extends('layouts.manager')

@section('template_title')
  Commande N° {{$order->order_id}}
@endsection


@section('breadcrumb')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Commande N°{{ $order->order_id }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url("manager/dashboard") }}">Accueil</a></li>
              <li class="breadcrumb-item "><a href="{{ url("manager/orders") }}">Commandes</a></li>
              <li class="breadcrumb-item active">{{ $order->id }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection


@section('content')

<section class="content">



  @if($order->payment_status == false && $order->payment_id == null)

  <div class="alert alert-warning" role="alert">

    Cette commande n'a pas encore été payé. <a href="{{url("manager/orders/" . $order->id . "/unpaidNotificationCheck")}}" class="text-dark"> <b>Relancer par email <i class="fa fa-envelope"></i> </b> </a>
  </div>
@else
  @if($order->closed != true)
  
    @if($order->cart == "shop")
    <div class="alert alert-secondary" role="alert">
    Cette commande n'a pas encore été expédié
  </div>
    @else
    <div class="alert alert-secondary" role="alert">
    Le client n'est pas encore venu chercher sa commande.
  </div>
    @endif
  

@endif
  <div class="alert alert-success" role="alert">
    Cette commande a été payé et a pour référence de paiement {{$order->payment_id}}
  </div>
@endif

  <div class="row">
    
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">Détails de la commande

            <small class="float-right">

              <a data-toggle='tooltip' title="Modifier cette commande" class="text-dark" href="{{ url("manager/orders/" . $order->id . "/edit") }}"><i class="fa fa-edit"></i></a>
              
              @if($order->payment_status == true)

              <a target="_blank" data-toggle="tooltip" title="Imprimer une facture" class="text-dark ml-2" href="{{ url("manager/orders/" . $order->id . "/receipt") }}"><i class="fa fa-file"></i></a></a>
              @endif

            </small></div>
          <div class="card-body">
            <div>
              <small class="float-right">Crée: {{$order->created_at}} par {{$order->user->email}}</small>
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
                  @foreach($order->products as $product)


<td>                          <img src="{{url("$product->thumbnail")}}" class="rounded" alt="{{$order->name}}" height="100px" alt="">
</td>

<td>                        <a class="text-dark" href="{{ url("manager/product/" . $product->id) }}">{{$product->name}} </a>
</td>
<td>{{$product->pivot->quantity}}</td>
<td>                        {{$product->tax}}% TVA
</td>
                      <td>  {{$product->pivot->price * $product->pivot->quantity}}€</td>



</tr>
                  @endforeach


                </tbody>
              </table>
            </div>


<div class="row">
  <div class="col-sm-7">

  </div>
  <div class="col-sm-2">
    <p class="btn btn-outline-secondary">TVA 10%</p>
  </div>
  <div class="col-sm-3">
    @if($order->payment_status == true && $order->payment_id != null)
    <p class="btn btn-success">TOTAL {{$order->amount}}€</p>
  @else
    <p class="btn btn-danger" date-toggle="tooltip" title="Cette commande n'a pas été payé pour le moment">TOTAL {{$order->amount}}€</p>

  @endif
  </div>
</div>


      </div>


        </div>

@if($order->payment_status == true && $order->payment_id != null)
  <div class="card">
  <div class="card-header">
    @if($order->cart == "shop")
    Livraison de la commande 
    @else
    Traitement de la commande 
    @endif

    @if($order->closed) <span class="float-right badge badge-success">Terminé</span> @else
    @if($order->payment_status == true)


    @if($order->status ==  "doing")
        <span class="float-right badge badge-secondary">Colis en préparation</span> 
    @elseif($order->status ==  "done")
        <span class="float-right badge badge-secondary">Colis préparé</span> 

    @else
        <span class="float-right badge badge-secondary">
          @if($order->status == "paiement validé")
          @if($order->cart == "shop")
          A préparer...
          @else
          En cours...
          @endif
          @else
          @if($order->status == 'todo')
          A préparer
          @else
          {{ $order->status }}
          @endif
          
          @endif
        </span> 

    @endif
    
    @endif
    @endif
  

  </div>

  <div class="card-body">
    
 @if($order->cart == "shop")


    <p class="text-muted">
      Cette commande doit être livré au point relais: 

       <span class="text-dark">

        <span class="badge badge-secondary">{{ $order->deliverie->pickup_id ?? "Identifiant inconnu" }}</span>

        {{ $order->deliverie->pickup_name }} {{ $order->deliverie->pickup_address }} - {{ $order->deliverie->pickup_postalcode }} {{ $order->deliverie->pickup_city }}</p>
    </span> 

    <div class="row">
      <div class="col-lg-6">
         <h6 class="text-uppercase"><b>Détails du colis</b></h6>


          <div>
            <span>Numéro de colis:</span>
            <span>{{ $deliverie->tracking_id ?? "Pas encore généré." }}</span>
          </div>
          <div>
            <span>Valeur du colis:</span>
            <span>{{ $deliverie->order->amount ?? "25€ (défaut)" }}</span>
          </div>
          <div>
            <span>Poids:</span>
            <span>2000g</span>
          </div>
         


      </div>

      <div class="col-lg-6">
        <h6 class="text-uppercase"><b>Expédition</b></h6>

        <a target="_blank" href="{{ url("manager/deliveries/") }}/{{ $order->deliverie->id ?? "deleted" }}" class="btn btn-sm btn-primary">Gérer la livraison</a>
          @if($order->deliverie->status == "todo" or $order->deliverie->status == "a préparer")
          
          @elseif($order->deliverie->status == "sent")
          <p class="text-muted">Votre colis a été expédié</p> <a class="btn btn-sm btn-outline-danger" href="">Annuler</a>
          @elseif($order->deliverie->status == "sent")
          Colis expédié
          @else

          @if($order->deliverie->tracking_id != null && $order->deliverie->shipment_sticker_url != null)
          <p class="text-muted">
            Votre colis est prêt, vous pouvez donc passer son statut en 'expédié' en cliquant ci-dessous:
          </p>
          <a href="{{ url("manager/deliveries/" . $order->deliverie->id . '/sent') }}" class="btn btn-sm btn-primary" title="Cliquer ici si vous venez d'expedier votre colis pour changer le status en: expédié" href="">Expédier ce colis <i class="fa fa-rocket ml-1"></i></a>
          @else
                    <p class="text-muted">
            Vous n'avez plus qu'à imprimer l'étiquette et à cliquer  ci-dessous:
          </p>
          <a href="{{ url("manager/deliveries/" . $order->deliverie->id . '/sent') }}" class="btn btn-sm btn-outline-primary" title="Cliquer ici si vous venez d'expedier votre colis pour changer le status en: expédié" href="">Expédier ce colis <i class="fa fa-rocket ml-1"></i></a>
          @endif
          @endif
      </div>
      <div class="col-lg-6"></div>
    </div>

@else

    @if($order->closed)
     <p class="text-muted">
   Le client est venu récupérer sa commande lors de la vente de {{ \App\Models\Vente::where('slug', $order->cart)->first()->name }} du {{ \App\Models\Vente::where('slug', $order->cart)->first()->date }} à l'adresse: {{ \App\Models\Vente::where('slug', $order->cart)->first()->location_address }} {{ \App\Models\Vente::where('slug', $order->cart)->first()->location_postalcode }}
 </p>
<p>
  Commande réceptionné par le client

    <a class="btn btn-sm  btn-outline-secondary" href="{{ url("manager/orders/" . $order->id . "/close") }}">Annuler <i class="fa fa-times"></i></a>
  @elseif( \App\Models\Vente::where('slug', $order->cart)->first() != null)

   <p class="text-muted">
   Le client viendra récupérer sa commande lors de la vente de {{ \App\Models\Vente::where('slug', $order->cart)->first()->name }} du {{ \App\Models\Vente::where('slug', $order->cart)->first()->date }} à l'adresse: {{ \App\Models\Vente::where('slug', $order->cart)->first()->location_address }} {{ \App\Models\Vente::where('slug', $order->cart)->first()->location_postalcode }}
 </p>
<p>
  La commande n'a pas encore été réceptionné par le client.

  <a class="btn btn-sm btn-outline-success" href="{{ url("manager/orders/" . $order->id . "/close") }}">Remettre la commande au client <i class="fa fa-check"></i></a>
  @else
  Box
  @endif
</p>
@endif


 

  </div>
</div>

@endif
      </div>

      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">Information</a></div>
          <div class="card-body">
            

  <div class="my-2">
    <i class="text-muted  mr-1 fa fa-user"> </i>
      <span class="text-muted">Crée par:</span> <a data-toggle="tooltip" title="{{$order->user->email}} " class="text-dark" target="_blank" href="{{ url("manager/users/" . $order->user->id) }}">{{$order->user->first_name}} {{$order->user->last_name}} (ID: {{ $order->user->id }})</a>
   
  </div>
    <div class="my-2">
                <i class="text-muted  mr-1 fa fa-euro-sign"></i>
                <span class="text-muted">Montant:</span> {{$order->amount}}€
              </div>
              <div class="my-2">
                <i class="text-muted  mr-1 fa fa-shopping-cart"></i>
                <span class="text-muted">Panier:</span>   @if(\App\Models\Vente::where('slug', $order->cart)->first() == null)
      <a class="text-muted" href="{{ url("manager/orders/filters/shop") }}">shop</a>
    @else
      Vente à <b>{{\App\Models\Vente::where('slug', $order->cart)->first()->name ?? '' }}</b> du {{ date('d/m/Y', strtotime(\App\Models\Vente::where('slug', $order->cart)->first()->date ?? '')) }}
    @endif

              </div>

              <div class="my-2">
                @if($order->cart == "shop")
                  <i class="text-muted  mr-1 fa fa-rocket"></i>
                <span class="text-muted">Livraison:</span> 
                <a class="text-dark" href="{{ url("manager/deliveries/" . $order->deliverie->id) }}">{{ $order->deliverie->deliverie_id ?? "Supprimée" }}</a>

                @endif
               

              </div>

          
            
              <div class="my-2">
                <i class="text-muted  mr-1 fa fa-map-marker"></i>
                <span class="text-muted">Adresse de facturation:</span> {{ $order->user->profile->location_address ?? "Adresse non renseignée." }} - {{ $order->user->profile->location_postalcode ?? "00000" }} {{ $order->user->profile->location_city ?? "Ville inconnue" }}</div>
              <div class="my-2">

                <i class="text-muted  mr-1 fa fa-phone"></i><span class="text-muted"> Téléphone: </span>{{ $order->user->profile->phone_number ?? "Non renseigné." }}</div>
            
          </div>
      </div>

<div class="card">
          <div class="card-header">Paiement 
@if($order->payment_status == "false" && $order->payment_id == null)
               <span class="float-right badge badge-warning">en attente...</span>
               @else
                              <span class="float-right badge badge-success"> validé</span>

               @endif
          </div>
          <div class="card-body">
            <p>
                @if(!is_null($order->payment_id))

     <div class="my-2">
                <i class="text-muted  mr-1 fa fa-clock"></i>
                <span class="text-muted">Enregistré le:</span> {{ \App\Models\Payment::where('ref_id', $order->payment_id)->first()->created_at }}</div>
 
   <div class="my-2">
                <i class="text-muted  mr-1 fa fa-file-invoice-dollar"></i>
                <span class="text-muted">Numéro de paiement:</span> <a   class="text-dark" href="{{url("manager/payments/$order->payment_id")}}"class="">{{$order->payment_id}}</a></div>

   <div class="my-2">
                <i class="text-muted  mr-1 fa fa-handshake"></i>
                <span class="text-muted">Numéro de transaction:</span> <a  class="text-dark" href="{{url("manager/payments/$order->payment_id")}}"class="">{{$order->transaction_id}}</a></div>
   <div class="my-2">
                <i class="text-muted  mr-1 fa fa-cash-register"></i>
                <span class="text-muted">Méthode de paiement:</span> <a class="text-dark"  href="{{url("manager/payments/$order->payment_id")}}"class="">{{$order->payment_method}}</a></div>


  @else
    <p>Aucune transaction enregistrée pour le moment.</p>

  @endif
 
            </p>
            
          </div>
      </div>


  </div>
  <div class="col-lg-12">
     {!! Form::open(array('url' => 'manager/orders/' . $order->id, 'class' => '', 'data-toggle' => '', 'title' => 'Supprimer')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::button("Supprimer cette commande <i class='ml-1 fa fa-trash'></i>", array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Supprimer cette commande', 'data-message' => 'Etes vous sur de vouloir supprimer cette commande ? Si une livraison est associée, elle sera également supprimée!')) !!}
                {!! Form::close() !!}
  </div>
</section>





  @include('modals.modal-delete')

@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')

    @include('scripts.tooltips')

@endsection

