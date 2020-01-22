@extends('layouts.front')

@section('template_title')
  Shop - Achat de plantes d'intérieur et accessoires
@endsection

@section('meta_description')
  Shop en ligne
@endsection

@section('og')
<meta name="og:site_name" content="Plantes Addict">
<meta name="og:title" property="og:title" content="Shop en ligne">
<meta property="og:description" content="Commander facilement vos petites et grandes plantes toutes l'années sur notre boutique en ligne..." />
<meta property="og:type" content="website" />
<meta property="og:local" content="fr_FR" />
<meta property="og:url" content="{{url("/shop")}}" />
<meta property="og:image:secure_url" content="{{asset("storage/plantesaddict-logo-big.png")}}" />
@endsection

@section('template_fastload_css')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/flickity.min.css')}}">

  <style>

.carousel {
background: #FFF;
}

.carousel-cell {
width: 28%;
min-height: 400px;
margin-right: 10px;
background: #FFF;
border-radius: 5px;

}

@media (max-width: 960px) {
  .carousel-cell {
  width: 28%;
  min-height: 180px;
  margin-right: 10px;
  background: #FFF;
  border-radius: 5px;

  }

}



.carousel-cell.is-selected {
background: #FFF;
}

/* cell number */
.carousel-cell:before {
display: block;
text-align: center;
line-height: 200px;
font-size: 80px;
color: white;
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
<section class="jumbotron text-center" style="border-radius:0;background-image: url({{url("storage/images/ventes-bg-index.jpg")}});background-size: cover;">
  <div class="container">

      <h1 class="mb-2 animated zoomIn font-bold text-white text-center jumbotron-heading">Shop </h1>
      <p id="message" class="text-white pb-2"></p>


    <h2 class="lead my-2 text-white animated zoomIn">	Retrouvez une sélection de petites et grandes plantes d'intérieur toute l'année sur notre boutique</h2>

  </div>
</section>


<!-- Relate Product -->
	<section class="partials-fiches-entretien bgwhite my-3 animated slideInUp">
		<div class="container">
			<div class="sec-title pb-2">



@if(!$products->isEmpty())
  <h2 class="mb-2 t-center">
    Nouvel arrivage
  </h2>
  <h3 class=" t-center mb-3">
    Des plantes toutes fraiches directement du producteur, livrée sous 48h
  </h3>
</div>



<!-- Flickity HTML init -->
<div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false, "wrapAround": true,"autoPlay": 5000, "pauseAutoPlayOnHover": false }'>
  @foreach($products as $product)

  <div class="carousel-cell">
    	<div class="item-slick2 mx-2">
    <div class="block2">


      <div class="block2-img wrap-pic-w of-hidden pos-relative

  @if($product->productlabel_id == 1)
          block2-labelnew
  @elseif($product->productlabel_id == 2)
          block2-labelsale
    @elseif($product->productlabel_id == 3)
          block2-labelbaselumiere
    @endif

            ">
        <img src="{{asset("storage/$product->thumbnail")}}" alt="{{$product->name}}">


      <div class="block2-overlay trans-0-4">

        <a href="{{url("shop/produits/$product->slug")}}" class="block2-btn-addwishlist hov-pointer trans-0-4">
          <i class="icon-wishlist icon_heart_alt" aria-hidden="false"></i>
          <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
        </a>

        <a href="{{url("shop/produits/$product->slug")}}" class="text-center" style="display:block;height:100%;">
          <i class="text-center fa fa-eye text-white" style="margin-top:43%;font-size:40px;"></i>
         </a>

        <div class="block2-btn-addcart w-size1 trans-0-4">
          <form class="ml-auto mr-auto" action="{{url("panier/shop/store")}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="product" value="{{$product->id}}">
            <input type="hidden" name="cart" value="shop">
            <input type="hidden" name="quantity" value="1">
            <button type="submit" style="width:100%;" class=" text-center bg4 bo-rad-23 hov1 ml-auto mr-auto text-white btn">
AJOUTER
<img src="{{asset('storage/icons/add-to-cart.svg')}}" class=" ml-1" style=" width:20px;" height="20px" alt="">

            </button>

          </form>
        </div>

      </div> <!-- end block2-overlay -->


      </div>

      <div class="block2-txt mt-2">
        <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
          {{$product->name}}
        </a>
        <span class="badge">{{$product->price}} €</span>

      </div>
    </div>
  </div>
</div>
  @endforeach

</div>




@else
  <p>Notre shop ouvrira très prochainement...</p>
@endif




		</div>
	</section>

@endsection

@section('footer_scripts')
  <script src="{{asset('js/flickity.pkgd.min.js')}}" type="text/javascript">

  </script>
@endsection
