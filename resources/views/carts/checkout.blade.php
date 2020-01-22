@extends('layouts.front')

@section('template_title')
  Valider votre commande - {{$cartName}}
@endsection


@section('template_fastload_css')

<style>
.cart-checkout-btn:hover > img {
  margin-left:20px !important;
  transition-duration: 0.3s;
}

.MR-Widget {
  width: 100% !important;
}
</style>
@endsection


@section('content')
  @if(session()->has('error'))
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


  @endif
  <?php

    $totalTax = 0;
  ?>
<!---------------->
<!-- Title Page -->
<!---------------->
	<section class="bg-title-page flex-col-c-m" style="background-image: url({{asset('storage/images/bg-sale.jpg')}});">

		<h2 class="fontsize-7 text-white font-2b my-2 t-center">VALIDER MA COMMANDE</h2>
    <h3 class="text-white fontsize-7 font-3 ">{{$cartName}}</h3>

	</section>

<!---------------->
<!-- Carts section -->
<!---------------->

<section class="cart bgwhite py-4">

	<div class="container">
	@if($cart->count() > 0)

		<!-- Cart item -->
		<div class="container-table-cart pos-relative">
			<div class="wrap-table-shopping-cart bgwhite">

				<table class="table-shopping-cart">
					<tr class="table-head">
						<th class="column-1"></th>
						<th class="column-2">Produit</th>
						<th class="column-3">Prix</th>
						<th class="column-3">TVA</th>
						<th class="column-4 ">Quantité</th>
						<th class="column-5">Total</th>
					</tr>

					@foreach($cart->content() as $item)
            <?php $totalTax = $totalTax + \App\Models\Product::find($item->id)->tax / 100 * $item->price * $item->qty; ?>

					<tr class="table-row">

						<td class="column-1">
							<div class="cart-img-product b-rad-4 o-f-hidden">
								<img src="{{url("products/$item->id/thumbnail")}}" alt="Produit: {{$item->name}}">
							</div>
						</td>
						<td class="column-2">{{$item->name}}</td>
						<td class="column-3">{{$item->price}} €</td>
						<td class="column-3">{{ \App\Models\Product::find($item->id)->tax }}%</td>
						<td class="column-4">{{$item->qty}}</td>
						<td class="column-5">{{$item->price * $item->qty}} €</td>
					</tr>
					@endforeach

				</table>
			</div>
		</div> <!-- End Cart item -->




     



<div class="row mt-2">

   @if($cartName == "shop")
  <div class="col-lg-12 my-2">
     <div id="Zone_Widget"></div>
      <!-- HTML element to display the parcelshop selected, for demo only. Should use hidden instead. -->
      <input type="text" id="Target_Widget" />

  </div>
  @endif


  <div class="col-lg-12 my-2">
      <form action="{{url("orders/store")}}" method="post">

    <div class="bo9 w-size28  text-center ml-auto mr-auto">

     

      <h5 class="m-text20 py-4"><a href="">
<img src="https://image.flaticon.com/icons/svg/852/852680.svg" height="25px" alt="">
      </a>

    Livraison</h5>

    <div>
      <div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
  <label class="form-check-label" for="exampleRadios1">
    Livraison à domicile via Colissimo: 5€
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
  <label class="form-check-label" for="exampleRadios2">
    En point retrait
  </label>
</div>
<div class="form-check disabled">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
  <label class="form-check-label" for="exampleRadios3">
    Retrait en boutique (fermer pour les fêtes)
  </label>
</div>
    </div>

  </div>
</div>

  <div class="col-lg-7 my-2">
      <form action="{{url("orders/store")}}" method="post">

    <div class="bo9 w-size28  text-center ml-auto mr-auto">

     

      <h5 class="m-text20 py-4"><a href="">
<img src="https://image.flaticon.com/icons/svg/852/852680.svg" height="25px" alt="">
      </a>

    Information de facturation</h5>


        <div class="">
            Email: {{ Auth::user()->email }} <small>(<a href="">Modifier mes infos</a>)</small>
        </div>
        <div class="pt-2">
             @if(Auth::user()->profile->phone_number == null)
           <label for="phone_number">Téléphone:</label>
            <input style="width:120px; border-bottom: 1px solid red !important;" class="ml-auto mr-auto float-center" type="text" name="phone_number" value="" placeholder="Ex: 0612345678" required>

        @else
          <span>Téléphone: </span><span class="m-text21 mt-1 w-size20 w-full-sm">{{Auth::user()->profile->phone_number}}</span>
        @endif
        </div>

        <div class="pt-2">
             @if(Auth::user()->profile->location_address == null)
           <label for="phone_number">Adresse:</label>
            <input style="width:250px; border-bottom: 1px solid red !important;" class="ml-auto mr-auto float-center" type="text" name="location_address" value="" placeholder="Ex: 1 rue de la gare" required>

        @else
          <span>Adresse: </span><span class="m-text21 mt-1 w-size20 w-full-sm">{{Auth::user()->profile->location_address}}</span>
        @endif
       
             @if(Auth::user()->profile->location_postalcode == null)
           
            <input style="width:70px; border-bottom: 1px solid red !important;" class="ml-auto mr-auto float-center" type="text" name="location_postalcode" value="" placeholder="69000" required>

        @else
          <span class="m-text21 mt-1 w-size20 w-full-sm">{{Auth::user()->profile->location_postalcode}}</span>
          <a href="{{ url("home/") }}"><i class="fa fa-user"></i></a>
        @endif

             @if(Auth::user()->profile->location_city == null)
           
            <input style="width:110px; border-bottom: 1px solid red !important;" class="ml-auto mr-auto float-center" type="text" name="location_city" value="" placeholder="Lyon" required>

        @else
          <span class="m-text21 mt-1 w-size20 w-full-sm">{{Auth::user()->profile->location_city}}</span>
        @endif
          </div>

      <h5 class="m-text20 py-4">Livraison</h5>


<p class="px-4 text-muted">Afin de procéder au paiement, vous allez être redirigé vers e-transactions.
  Vous avez la possibilité de payer via ces différents moyens de paiement:</p>
<p class="pb-3 ">

  {{-- <a rel="noreferrer" href="{{url("informations-paiements-livraison#paypal")}}" title="Paiement sécurisé par E-transaction">
  	<img height="22px" class="mr-2" src="{{asset('storage/icons/creditagricole.png')}}" alt="etransaction">
  </a> --}}

  		

  		<a rel="noreferrer" href="{{url("informations-paiements-livraison#visa")}}" title="Paiement par carte VISA">
  			<img height="40px"  src="{{asset('storage/icons/visa.svg')}}" alt="Paiement VISA">
  		</a>

  		<a rel="noreferrer" href="{{url("informations-paiements-livraison#mastercard")}}" title="Paiement par carte MASTERCARD">
  			<img height="40px" class="ml-2"  src="{{asset('storage/icons/mastercard.svg')}}" alt="Paiement MASTERCARD">
  		</a>

      {{-- <a rel="noreferrer" href="{{url("informations-paiements-livraison#paypal")}}" title="Paiement par PAYPAL">
        <img height="40px" class="mr-2" src="{{asset('storage/icons/paypal.svg')}}" alt="Paypal">
      </a> --}}


    </p>

      </div>


  </div>


  <div class="col-lg-5 my-2">

    <div class="bo9 w-size28  text-center ml-auto mr-auto">
      <h5 class="m-text20 py-4">Résumé de la commande</h5>


     


        <!-- Livraisonπ -->
        <div class="flex-w flex-sb-m py-3 ">
          <span class="s-text18 w-size19 w-full-sm">Livraison:</span>

            @if($cartName == "shop")
              <span class="m-text21 mt-1 w-size20 w-full-sm" id="cb_Nom">Sélectionner un point relais...</span>


          @else
            <span class="m-text21 w-size20 w-full-sm">Articles à récupérer lors de la vente.</span>
          @endif

        </div>

        <!-- Tax -->
        <div class="flex-w flex-sb-m bo10 py-3">
          <span class="s-text18 w-size19 w-full-sm">
            TVA incluses:
          </span>

          <span class="m-text21 w-size20 w-full-sm">
            {{round($totalTax, 2)}} €
          </span>
        </div>

        <!--  -->
        <div class="flex-w flex-sb-m py-3">
          <span class="m-text22 w-size19 w-full-sm">Total (TTC):</span>
          <span class="m-text21 w-size20 w-full-sm">{{Cart::instance($cartName)->subtotal()}}€</span>
        </div>

        <div class="size15  trans-0-4 mb-2 mt-4">
          <!-- Button -->


            {{csrf_field()}}
            @if($cartName == "shop")
              <input type="hidden" id="input_pickup_id" name="pickup_id" value="">
              <input type="hidden" id="input_pickup_name" name="pickup_name" value="">
              <input type="hidden" id="input_pickup_address" name="pickup_address" value="">
              <input type="hidden" id="input_pickup_postalcode" name="pickup_postalcode" value="">
              <input type="hidden" id="input_pickup_city" name="pickup_city" value="">

            @endif
            <input type="hidden" name="cart" value="{{$cartName}}">
            <input type="hidden" name="customer" value="flofgr@pm.me">
            <input type="hidden" name="amount" value="{{Cart::instance($cartName)->total()}}">
            <div class="form-check mb-3">
                <input type="checkbox" name="accept_cgu" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Accepter les <a style="text-decoration:underline;" href="{{url('cgv')}}">conditions générales de vente</a> </label>
              </div>            <button type="submit" class="cart-checkout-btn btn btn-danger py-2 px-3  text-white bo-rad-23 hov0  trans-0-4">
                @guest SE CONNECTER ET PAYER MA COMMANDE <img class="ml-2" src="{{asset("storage/icons/right-arrow.svg")}}" height="20px" alt="Payer votre commande"> @else VALIDER ET PAYER MA COMMANDE <img class="ml-2" src="{{asset("storage/icons/right-arrow.svg")}}" height="20px" alt="Payer votre commande"> @endguest
            </button>
          </form>
        </div>

      </div>


  </div>
</div>

			@else
			<p>Votre panier est vide. <a href="{{url('ventes')}}">Voir nos ventes</a></p>
			@endif
		</div>

</section>



@endsection

@section('footer_scripts')


<!-- Enable tooltips -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<!-- Leaflet dependency is not required since it is loaded by the plugin -->
<script src="//unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" type="text/css" href="//unpkg.com/leaflet/dist/leaflet.css" />

<!-- JS plugin for the Parcelshop Picker Widget MR using JQuery -->
<script src="//widget.mondialrelay.com/parcelshop-picker/jquery.plugin.mondialrelay.parcelshoppicker.min.js"></script>    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <!-- Leaflet dependency is not required since it is loaded by the plugin -->
    <script src="//unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" type="text/css" href="//unpkg.com/leaflet/dist/leaflet.css" />

    <!-- JS plugin for the Parcelshop Picker Widget MR using JQuery -->
    <script src="//widget.mondialrelay.com/parcelshop-picker/jquery.plugin.mondialrelay.parcelshoppicker.min.js"></script>

<script type="text/javascript">

// Initialiser le widget après le chargement complet de la page
$(document).ready(function() {
  // Charge le widget dans la DIV d'id "Zone_Widget" avec les paramètres indiqués
  $("#Zone_Widget").MR_ParcelShopPicker({
    //
    // Paramétrage de la liaison avec la page.
    //
    Responsive: true,
    // Selecteur de l'élément dans lequel est envoyé l'ID du Point Relais (ex: input hidden)
    Target: "#Target_Widget",
    // Selecteur de l'élément dans lequel est envoyé l'ID du Point Relais pour affichage
    TargetDisplay: "#TargetDisplay_Widget",
    // Selecteur de l'élément dans lequel sont envoysé les coordonnées complètes du point relais
    TargetDisplayInfoPR: "#TargetDisplayInfoPR_Widget",
    //
    // Paramétrage du widget pour obtention des point relais.
    //
    // Le code client Mondial Relay, sur 8 caractères (ajouter des espaces à droite)
    // BDTEST est utilisé pour les tests => un message d'avertissement apparaît
    Brand: "CC21BY2Y",
    // Pays utilisé pour la recherche: code ISO 2 lettres.
    Country: "FR",
    // Code postal pour lancer une recherche par défaut
    PostCode: "69000",
    // Mode de livraison (Standard [24R], XL [24L], XXL [24X], Drive [DRI])
    ColLivMod: "24R",
    // Nombre de Point Relais à afficher
    NbResults: "10",
    //
    // Paramétrage d'affichage du widget.
    //
    // Afficher les résultats sur une carte?
    ShowResultsOnMap: true,
    // Afficher les informations du point relais à la sélection sur la carte?
    DisplayMapInfo: true,
    // Fonction de callback déclenché lors de la selection d'un Point Relais
    OnParcelShopSelected:
      // Fonction de traitement à la sélection du point relais.
      // Remplace les données de cette page par le contenu de la variable data.
      // data: les informations du Point Relais
      function(data) {
        //$("#cb_ID").html(data.ID);
        $("#cb_Nom").html(data.Nom + ' | ' + data.Adresse1 + " - " + data.CP + ' ' + data.Ville);

        $("#input_pickup_id").val(data.ID);
        $("#input_pickup_name").val(data.Nom);
        $("#input_pickup_address").val(data.Adresse1);
        $("#input_pickup_postalcode").val(data.CP);
        $("#input_pickup_city").val(data.Ville);
      }
    //
    // Autres paramétrages.
    //
    // Filtrer les Points Relais selon le Poids (en grammes) du colis à livrer
    // Weight: "",
    // Spécifier le nombre de jours entre la recherche et la dépose du colis dans notre réseau
    // SearchDelay: "3",
    // Limiter la recherche des Points Relais à une distance maximum
    // SearchFar: "",
    // Liste des pays selectionnable par l'utilisateur pour la recherche: codes ISO 2 lettres
    // AllowedCountries: "FR,ES",
    // Force l'utilisation de Google Map si la librairie est présente?
    // EnableGmap: true,
    // Activer la recherche de la position lorsque le navigateur de l'utilisateur le supporte?
    // EnableGeolocalisatedSearch: "true",
    // Spécifier l'utilisation de votre feuille de style CSS lorsque vous lui donnez la valeur "0"
    // CSS: "1",
    // Activer le zoom on scroll sur la carte des résultats?
    //,MapScrollWheel: "false",
    // Activer le mode Street View sur la carte des résultats (attention aux quotas imposés par Google)
    // MapStreetView: "false"
  });

});

</script>
@endsection

