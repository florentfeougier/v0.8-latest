@extends('layouts.user')

@section('template_fastload_css')

@endsection

@section('content')


  	{{-- @if(session()->has('error'))
  		<div style="z-index:9999; bottom:0px !important; left:10px; right:10px;" class=" position-fixed alert alert-danger alert-dismissible fade show" role="alert">
  	   	{!! session()->get('error') !!}
  	  <button type="button" class="alert-close mt-2 close" data-dismiss="alert" aria-label="Close">
  	    <span aria-hidden="true">&times;</span>
  	  </button>
  	</div>


  	@endif

  	@if(session()->has('success'))
  		<div style="z-index:9999; bottom:0px !important; left:10px; right:10px;" class=" position-fixed alert alert-success alert-dismissible fade show" role="alert">
  	   	{!! session()->get('success') !!}
  	  <button type="button"  class="alert-close mt-2 close" data-dismiss="alert" aria-label="Close">
  	    <span aria-hidden="true">&times;</span>
  	  </button>
  	</div>


  	@endif

  	@if ($message = Session::get('warning'))

  	<div style="z-index:9999; bottom:0px !important; left:10px; right:10px;" class=" position-fixed alert alert-warning alert-dismissible fade show" role="alert">
     	{!! session()->get('warning') !!}
    <button type="button" class="alert-close mt-2 close" data-dismiss="alert" aria-label="Close">
      <span class="" style="display:block; line-height:20px;" aria-hidden="true">&times;</span>
    </button>
  </div>


  	@endif --}}

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<div class="main-content">
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
<div class="container-fluid">
<!-- Brand -->
<a class="h5 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{url("profile/" . Auth::user()->name)}}" >Compte client <span class="d-lg-inline-block text-white mx-2 ">></span></a>

<a class="h5 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{url("profile/" . Auth::user()->name . '/commandes')}}" >Commandes <span class="d-lg-inline-block text-white mx-2 ">></span></a>
<a class="h5 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{url("profile/" . Auth::user()->name . "/commandes/" . $order->order_id)}}" >{{$order->order_id}}</a>

<!-- Form -->
<div class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">

</div>

</div>
</nav>
<!-- Header -->
<div class="header d-flex align-items-center" style="min-height: 400px; background-image: url(https://images.pexels.com/photos/1078058/pexels-photo-1078058.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260); background-size: cover; background-position: center top;">
<!-- Mask -->
<span class="mask bg-gradient-default opacity-8"></span>
<!-- Header container -->
<div class="container-fluid d-flex align-items-center">
<div class="row">
<div class="col-lg-12">
<h1 class=" text-white">@if($order->payment_status == true) Votre commande a été validé @else Payer votre commande @endif</h1>
<p class="text-white ">
@if($order->payment_status == true)

  Votre commande a été payé le {{$order->updated_at}}

@else
  Vous n'avez pas encore payé votre commande d'un montant de {{$order->amount}}€

@endif
</p>
<p class="text-white ">
@if($order->cart == "shop")
  Cette commande sera livré au point relais suivant:
@else
 Vos articles sont à récupérer lors de la vente de {{ \App\Models\Vente::where('slug', $order->cart)->first()->name }} du {{ date('d/m/Y', strtotime(\App\Models\Vente::where('slug', $order->cart)->first()->date)) }} à l'adresse:

 {{ \App\Models\Vente::where('slug', $order->cart)->first()->location_address }}
 {{ \App\Models\Vente::where('slug', $order->cart)->first()->location_postalcode }} -
 {{ \App\Models\Vente::where('slug', $order->cart)->first()->location_city }}
@endif
</p>


@if($order->payment_status == true)
  <span class="badge badge-success">Référence de paiement: {{$order->payment_id}}</span>
  <span class="badge badge-secondary">Numéro de transaction: {{$order->transaction_id}}</span>
@else

  <p class="text-white"> <small>Si vous venez de procéder au paiement, celle-ci sera validée d'ici quelques secondes, autrement cliquez sur le lien ci-dessous pour être redirigé vers la page de paiement:</small></p>

  <form method="GET" action="{{ url("payment/pay/$order->order_id")}}">
      {{csrf_field()}}
      <input type="hidden" name="total" value="{{$order->amount}}">
      <input type="hidden" name="customer" value="flofgr@pm.me">
      <input type="hidden" name="cart" value="{{$order->cart}}">
      <button class="text-center btn btn-success  text-white bo-rad-23 hov1  trans-0-4" type="submit" name="button">Payer ma commande ({{$order->amount}}€)</button>

    </form>
    <form method="GET" action="{{ url("profile/" . Auth::user()->name . "/commandes/" . $order->order_id . '/delete')}}">
        {{csrf_field()}}
        <input type="hidden" name="order_id" value="{{$order->id}}">


      </form>
@endif

@if(count($order->payments) > 1)
<a href="{{url('profile/' . Auth::user()->name . '/paiements')}}" class="btn btn-secondary">Historique de paiements</a>
@endif
</div>
</div>
</div>
</div>
@include('pages.user.profile-info')

</div>
</div>
</div>
<div class="col-xl-8 order-xl-1">
<div class="card shadow">
<div class="card-header bg-white border-0">
<div class="row align-items-center">
<div class="col-8">
<h3 class="mb-0">Détails de votre commande</h3>
</div>
<div class="col-4 text-right">
  @if($order->payment_status == true)
<a href="{{url("profile/" . Auth::user()->name . "/commandes/" . $order->order_id . "/receipt")}}" class="btn btn-sm btn-secondary">Télécharger une facture</a>
@else
  <form method="GET" action="{{ url("profile/" . Auth::user()->name . "/commandes/" . $order->order_id . '/delete')}}">
      {{csrf_field()}}
      <input type="hidden" name="order_id" value="{{$order->id}}">
      <button class="text-center btn-sm btn btn-warning my-1  text-white bo-rad-23 hov1  trans-0-4" data-toggle="tooltip" title="Cette commande n'est pas encore payé, vous pouvez donc la supprimer. Si vous venez de procéder au paiment, merci de rafraichir la page." type="submit" name="button">Supprimer cette commande</button>


    </form>

@endif
</div>
</div>
</div>
<div class="card-body">

<h6 class="heading-small text-muted mb-4">Voici le résumé de votre commande enregistré le {{$order->created_at}}</h6>

<div class="table-responsive">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Quantité</th>
      <th scope="col">Montant</th>
      <th scope="col">Fiche d'entretien</th>
    </tr>
  </thead>
  <tbody>

    @foreach($order->products as $product)
    <tr>
      <th scope="row"> <a href="{{url("profile/" . Auth::user()->name . "/commandes/" . $product->order_id )}}">
        <img src="{{asset("$product->thumbnail")}}" height="100" alt="">
      </a> </th>
      <td>{{$product->name}}</td>
      <td>{{$product->pivot->quantity}}</td>
      <td>{{$product->price}}€</td>
      <td>

        @foreach($product->fiches as $fiche)
          <a href="{{url("compte/paiements/$product->payment_id")}}" class="badge badge-pill badge-success">{{$fiche->name}}</a> </td>
        @endforeach

    </tr>
    @endforeach



  </tbody>
</table>
</div>
<div class="row">
  <div class="col-6">
    Transaction: <span class="badge badge-secondary">{{$order->transaction_id}}</span>
  </div>
  <div class="col-3">
    TVA {{$order->tax}}€
  </div>
  <div class="col-3">
    <span class="btn btn-success">TOTAL: {{$order->amount}}€</span>
  </div>
</div>
<hr class="my-4">

<!-- Address -->
@if($order->payment_status == false)
  <h6 class="heading-small text-muted mb-4">

  @if($order->cart == "shop")
    Livraison
  @else
    Récupérer votre commande
  @endif
    </h6>

    <div class="">
      <p> <strong>Adresse</strong> : <small>{{$order->pickup_location}}</small> </p>
      <p> <strong>Date</strong>: <small>{{$order->pickup_date}}</small> </p>
    </div>

@endif



</div>
</div>
</div>
</div>
</div>
<footer class="footer">
<div class="row align-items-center justify-content-xl-between">
<div class="col-xl-6 m-auto text-center">
<div class="copyright">
  <p>Si vous rencontrez un problème ou avez des questions, contactez-nous en <a href="mailto:contact@plantesaddict.fr" target="_blank">cliquant-ici</p>
</div>
</div>
</div>
</footer>






@endsection

