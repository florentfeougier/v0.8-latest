@extends('layouts.front')

@section('template_title')
  Vos paniers
@endsection

@section('content')

  <?php $count = 0;
  foreach($carts as $cart){
    $count = $count + Cart::instance($cart)->count();
  }
  ?>


<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url( {{asset("storage/images/bg-pots.jpg")}} );  background-repeat: no-repeat; background-position: center;">
		<h2 class="fontsize-9 text-white font-2b my-2 t-center">
			VOS PANIER
		</h2>
    <h3 class="text-white fontsize-7 font-3">Vous avez {{$count}} articles dans {{count($carts)}} paniers</h3>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite py-4 ">
		<div class="container">
<div class="row">


	@foreach($carts as $cart)

<div class="col-lg-6">
  <main role="main" class="container">
  <div class="jumbotron mb-3">
    <h2>

      @if($cart == "shop")
      shop
      @else
        @if(\App\Models\Vente::where('slug', $cart)->first() != null && \App\Models\Vente::where('slug', $cart)->first()->name != null)
        Vente de {{ \App\Models\Vente::where('slug', $cart)->first()->name }} le {{ date('d/m/Y', strtotime(\App\Models\Vente::where('slug', $cart)->first()->date)) }}
        @else
        {{ $cart }}
        @endif
      @endif
    </h2>
    <p class="lead">{{Cart::instance($cart)->count()}} articles dans ce panier</p>
    <p class="lead mb-2">Total: {{Cart::instance($cart)->total()}}€</p>
    <a href="{{url("panier/$cart")}}" class="btn btn-secondary mt-2 bo-rad-23">Voir les détails</a>
    <a href="{{url("panier/$cart/checkout")}}" class="btn btn-danger mt-2 bo-rad-23">Valider ma commande</a>

  </div>
</main>
</div>
	@endforeach
  </div>

		</div>
	</section>



@endsection

@section('footer_scripts')
<script>
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection
