@extends('layouts.front')

@section('template_title')
    boite à {{$boite->name}} - {{$boite->meta_title}}
@endsection

<?php
  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
?>
@section('template_description')
{{$boite->meta_desc}}
@endsection

@section('og')
<meta name="og:site_name" content="Plantes Addict">
<meta name="og:title" property="og:title" content="{{$boite->meta_title}}">
<meta property="og:description" content="{{$boite->meta_desc}}" />
<meta property="og:type" content="article" />
<meta property="og:local" content="fr_FR" />
<meta property="og:url" content="{{url("boites/$boite->slug")}}" />
<meta property="og:image:secure_url" content="{{asset("$boite->thumbnail")}}" />
@endsection

@section('template_fastload_css')
  <style>


  @media screen and (max-width: 560px) {
  .bg-title-page h1 {
    font-size: 2.4rem;

  }

  .bg-title-page p .badge {
    font-size: 1.0rem;
  }


    }

.wrap {
  display: flex;
  background: #FFF;
  padding: 1rem 1rem 1rem 1rem;
  border-radius: 0.5rem;
  box-shadow: 7px 7px 30px -5px rgba(0,0,0,0.1);
  margin-bottom: 2rem;
}

.wrap:hover {
  background: #f4f4f4;
  box-shadow: 8px 8px 36px -5px rgba(0,0,0,0.3);

  color: #000;
}
.wrap:hover > .ico-wrap img {
  height: 80px;
}
.ico-wrap {
  margin: auto;
}

.mbr-iconfont {
  font-size: 4.5rem !important;
  color: #313131;
  margin: 1rem;
  padding-right: 1rem;
}
.vcenter {
  margin: auto;
}

.mbr-section-title3 {
  text-align: left;
}


.mbr-bold {
  font-weight: 700;
}

.mbr-section-title3 {
    text-align: left;
}
.text-wrap h2 {
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
}
.display-5 {
    font-family: 'Source Sans Pro',sans-serif;
    font-size: 1.4rem;
}
.mbr-bold {
    font-weight: 700;
}

 .text-wrap p {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    line-height: 25px;
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

<!-- Title Page -->
<section class="bg-title-page flex-col-c-m" style="background-image: url({{asset('storage/images/bg-sale.jpg')}});">
	<h1 class="animated zoomIn  mt-4 mb-2 t-center text-white fontsize-9 font-uppercase font-2b text-shadow" style="text-shadow: black 0.1em 0.1em 0.2em;"> {{$boite->name}} </h1>

	<p class="text-center">

  <!-- Lieu -->
  	@if($boite->show_location == 1)
  		<a target="_blank" href="https://www.google.fr/maps/place/{{$boite->location_address}}+{{$boite->location_city}}" class="animated bounceInLeft fontsize-4 my-1 badge badge-pill badge-danger" data-toggle="tooltip" data-placement="top" title="Voir sur Google Maps"><img src="{{asset('storage/icons/marker-w.svg')}}" class="mr-1" height="20px" alt="Lieu:"> {{$boite->location_address}} - {{$boite->location_postalcode}}</a>
  	@else
  		<span  class="animated bounceInLeft my-1 fontsize-4 badge badge-pill badge-danger"> <img src="{{asset('storage/icons/marker-w.svg')}}" class="mr-1" height="20px" alt="Lieu:"> 29,99 € Livraison incluse</span>
  	@endif


  </p>

  <!-- Countdown -->
<div>
  
      @if(Cart::instance("$boite->slug")->count() == $boite->product_quantity)
          @foreach(Cart::instance("$boite->slug")->content() as $selectedProduct)
          <?php $product = \App\Models\Product::find($selectedProduct->id); ?>
           <a style="float:left;" href="remove">
              <img src="{{ url("$product->thumbnail") }}" style="float:left;height:60px;border-radius:30px;border: 1px solid red;" alt="">
            </a>
          @if($selectedProduct->qty == "2")
            <a style="float:left;" href="remove" >
              <img src="{{ url("$product->thumbnail") }}" style="float:left;height:60px;border-radius:30px;border: 1px solid red;" alt="">
            </a>
          @elseif($selectedProduct->qty == "3")
           <a style="float:left;" href="remove" >
              <img  src="{{ url("$product->thumbnail") }}" style="float:left;height:60px; border-radius:30px;border: 1px solid red;" alt="">
            </a>
          @endif
          @endforeach

          <a class=" btn btn-outline-danger bg-white" style="padding-top:10px;margin-top:10px !important;text-align:center;display:block;" href="{{ url("box/" . $boite->slug . "/checkout") }}">Valider ma box ></a> 

      @elseif(Cart::instance("$boite->slug")->count() < $boite->product_quantity)
          @foreach(Cart::instance("$boite->slug")->content() as $selectedProduct)
          <?php $product = \App\Models\Product::find($selectedProduct->id); ?>
          <img src="{{ url("$product->thumbnail") }}" style="float:left;height:60px;border: 1px solid red;" alt="">
          @endforeach
                   Vous devez encore sélectionner des plantes.    
 
      @else
           <span class="badge badge-secondary mt-3 ">Aucune plante sélectionnée </span>

      @endif
   
</div>

  @if(\Carbon\Carbon::now() > $boite->date)
  @else
  <div class="flex-c-m pt-4">

  <!-- Jours -->
    <div class="flex-col-c-m size3 bo1 bg-white mr-1 animated flipInY" style="width:65px;">
      <span class="countdown-value m-text10 p-b-1 days font-3" >
        1
      </span>

      <span class="countdown-unit s-text5 font-3" >
        jours
      </span>
    </div>

  <!-- Heures -->
      <div class="flex-col-c-m size3 bg-white bo1 mr-1 animated flipInY" style="width:65px;">
        <span class="countdown-value m-text10 p-b-1 hours font-3" >
          2
        </span>

        <span class="countdown-unit s-text5 font-3" >
          heures
        </span>
      </div>

  <!-- Minutes -->
      <div class="flex-col-c-m size3 bg-white bo1 mr-1 animated flipInY" style="width:65px;">
        <span class="countdown-value m-text10 p-b-1 minutes font-3" >
          32
        </span>

        <span class="countdown-unit s-text5 font-3" >
          mins
        </span>
      </div>

  <!-- Secondes -->
      <div class="flex-col-c-m size3 bg-white bo1 mr-1 animated flipInY" style="width:65px;">
        <span class="countdown-value m-text10 p-b-1 seconds" style="font-family: 'Amatic SC', cursive;">
          05
        </span>

        <span class="countdown-unit s-text5" style="font-family: 'Amatic SC', cursive;">
          secs
        </span>

      </div>

      </div> 	<!-- End flex -->


  <!-- Panier -->
      <div class="py-4 animated zoomIn">
    			@if(Cart::instance("$boite->slug")->count() == 0)
    				<span class=" badge badge-pill badge-secondary" >
    Votre panier est vide pour cette boite
    </span>
			@else
					<a href="{{url("panier/$boite->slug")}}" class="badge badge-pill badge-secondary" >
			{{Cart::instance("$boite->slug")->count()}} articles dans votre panier pour cette boite
				</a>


			@endif
		</div>

    @endif

	</section>

<section>
  <div class="container">
    <p class="lead"></p>
  </div>
</section>

	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container animated slideInUp">
			<div class="row">


				<div class="col-sm-12 col-md-12 col-lg-12 py-2">
					<!--  -->

						<h3 id="products" class="my-4 text-center">
              Configurer votre box sur mesure <br>
              <small class="font-3">Sélectionner vos plantes en cliquant sur leur photos.</small>

            </h3>




					<!-- Product -->
					<div class="row">

            @if (count($products) > 0)
	@foreach($products->sortBy('price') as $product)

	<div class="col-sm-12 col-md-6 col-lg-2 my-2">
		<!-- Block2 -->
		<div class="block2 block2-name">
			<div class="block2-img wrap-pic-w px-1 of-hidden pos-relative   block2-label"


>


    				<img src="{{asset("$product->thumbnail")}}" alt="{{$product->name}} - {{$product->description}}" style="@foreach(Cart::instance("$boite->slug")->content() as $selected)
@if($selected->id == $product->id)
border: 2px solid red;
@endif
@endforeach">

    				<div class="block2-overlay trans-0-4">

    					<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
    						<i class="icon-wishlist icon_heart_alt" aria-hidden="false"></i>
    						<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
    					</a>

    					<a href="" class="text-center" style="display:block;height:100%;">
    						<img src="{{asset('storage/icons/eye-closeup.svg')}}" height="40px" style="margin-top:43%;font-size:40px;">
    					 </a>

    					<div class="block2-btn-addcart  trans-0-4">
                <form action="{{url("panier/$boite->slug/store")}}" method="post">
                  {{csrf_field()}}
                <input type="hidden" name="cart" value="{{$boite->slug}}">
                <input type="hidden" name="product" value="{{$product->id}}">
    						<input type="hidden" name="quantity" value="1">
    						<div class="">
                  <button type="submit" style="width:100%;" class=" text-center fontsize-1 bg4 bo-rad-23 hov1 ml-auto mr-auto text-white btn">
     Ajouter

                  </button>
                </form>
    	</div>

    					</div>
    				</div> <!-- end block2-overlay -->

    			</div>


        		<!-- Blog -->
        			<div class="block2-txt p-t-20 fontsize-2 text-center py-2">
        				<a href="{{url("boites/$boite->slug/produits/$product->slug")}}" class="badge fontsize-3">
        					{{$product->name}}
        				</a>

<span class="badge badge-pill badge-success">Voir</span>
                
        			</div>

        		<!-- Blog -->
        	</div>

        	</div>
        	@endforeach

          @else
           
          @endif

					</div>


				</div>
			</div>
		</div>
	</section>


	<!-- Modal -->
	<div class="modal fade" id="addCartSuccessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Produit ajouté à votre panier!</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <i class="fa fa-shopping-cart"></i>
	      </div>
	      <div class="modal-footer">
	        <a href="{{url("panier/$boite->slug")}}" class="btn btn-secondary" >Voir mon panier</a>
	        <a href="{{url("panier/$boite->slug/checkout")}}" class="btn btn-secondary" >Valider ma commande ></a>
	      </div>

	    </div>
	  </div>

	</div>

<div class="container py-3">
  <hr>
</div>


<section class="pt-2 pb-4">
<div class="container">

  <h4 class="font-2b fontsize-6 text-center pt-1">Comment ça marche ?</h4>
<p class="text-center font-3 pt-4 pb-3 fontsize-5">{{$boite->description}} </p>

<div class="container text-center pb-4">
  <a href="{{$boite->fb_event_url}}" target="_blank" title="S'inscrire à l'evenement Facebook de la boite éphemère de {{$boite->location_city}}" class="wrap-btn-slide1 text-center font-2 bo-rad-23 btn btn-primary animated zoomIn" >
    Voir l'évenement Facebook <img class="ml-2" src="{{asset('storage/icons/facebook.svg')}}" height="20px" alt="Cliquer ici pour voir nos boites">
  </a>
</div>
		<div class="row mbr-justify-content-center mt-2">

            <div class="col-lg-6 mbr-col-md-10">
                <div class="wrap">
                    <div class="ico-wrap">
                      <img src="{{asset('storage/icons/plant-bold.svg')}}" height="70px" class="mbr-iconfont fa-globe fa">
                    </div>
                    <div class="text-wrap vcenter">
                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Variétiés <span>et fraicheur</span></h2>
                        <p class="mbr-fonts-style text1 mbr-text display-6">Toutes nos variétés: petites, moyennes et plantes d'intérieur</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mbr-col-md-10">
                <div class="wrap">
                    <div class="ico-wrap">
                      <img src="{{asset('storage/icons/open.svg')}}" height="70px" class="mbr-iconfont fa-globe fa">
                    </div>
                    <div class="text-wrap vcenter">
                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Livrée chez vous</span>
                        </h2>
                        <p class="mbr-fonts-style text1 mbr-text display-6">Nous avons développé une box sur mesure pour nous permettre de vous envoyer vos plantes dans les meilleurs conditions.

                          @if($boite->show_location == 1)


                          ({{$boite->location_address}} - {{$boite->location_postalcode}} {{$boite->location_city}})</p>
@else
  (L'adresse exacte vous sera communiqué par email)
@endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mbr-col-md-10">
                <div class="wrap">
                    <div class="ico-wrap">
                        <img src="{{asset('storage/icons/payment-method.svg')}}" height="70px" class="mbr-iconfont fa-globe fa">
                    </div>
                    <div class="text-wrap vcenter">
                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Paiement facile
                            <span> & sécurisé!</span>
                        </h2>
                        <p class="mbr-fonts-style text1 mbr-text display-6">Précommander via notre site ou acheter sur place en espèces, CB et Lydia</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mbr-col-md-10">
                <div class="wrap">
                    <div class="ico-wrap">
                      <img src="{{asset('storage/icons/shelf.svg')}}" height="70px" class="mbr-iconfont fa-globe fa">
                    </div>
                    <div class="text-wrap vcenter">
                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Quantité limitée <span>Commandez sur le site</span></h2>
                        <p class="mbr-fonts-style text1 mbr-text display-6">Pensez à venir le matin ou à pré-commander sur le site pour être sur d'avoir vos plantes!</p>
                    </div>
                </div>
            </div>




        </div>


</div>



</section>
@endsection

@section('footer_scripts')

<script type="text/javascript">


function countdown(endDate) {
  let days, hours, minutes, seconds;

  endDate = new Date(endDate).getTime();

  if (isNaN(endDate)) {
	return;
  }

  setInterval(function(){calculate(endDate)}, 1000, true);

  function calculate() {


    let startDate = new Date();
    startDate = startDate.getTime();

    let timeRemaining = parseInt((endDate - startDate) / 1000);

    if (timeRemaining >= 0) {
      days = parseInt(timeRemaining / 86400);
      timeRemaining = (timeRemaining % 86400);

      hours = parseInt(timeRemaining / 3600);
      timeRemaining = (timeRemaining % 3600);

      minutes = parseInt(timeRemaining / 60);
      timeRemaining = (timeRemaining % 60);



      seconds = parseInt(timeRemaining);

      document.querySelector(".days").innerHTML = parseInt(days, 10);
      document.querySelector(".hours").innerHTML = ("0" + hours).slice(-2);
      document.querySelector(".minutes").innerHTML = ("0" + minutes).slice(-2);
      document.querySelector(".seconds").innerHTML = ("0" + seconds).slice(-2);
    } else {
      return;
    }
  }
}

(function () {
  countdown("{{$boite->date}}".replace(/\s/, 'T')+'Z');
}());




</script>
@endsection

