@extends('layouts.front')
@section('template_title')
    {{$product->name}} -
@endsection

@section('template_fastload_css')
<style>


.value-button {
  display: inline-block;
  border: 1px solid #ececec;
  margin: 0px;
  width: 40px;
  height: 40px;
  color: #757575;
  text-align: center;
  vertical-align: middle;
  padding: 6px 0;
  background: #ececec;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.value-button:hover {
  cursor: pointer;
}

form #decrease {
  margin-right: -4px;

  border-radius: 23px 0 0 23px;
}

form #increase {
  margin-left: -4px;
  border-radius: 0 23px 23px 0;
}

form #input-wrap {
  margin: 0px;
  padding: 0px;
}

input#number {
  text-align: center;

  border-top: 1px solid #ddd !important;
  border-bottom: 1px solid #ddd !important;
  margin: 0px;
  width: 45px;
  height: 40px;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.wrap-medias-thumbnails img {
  border: 2px solid #ECECEC;
  margin-bottom: 10px;
  cursor: pointer;
  border-radius:50%;
  transition: transform .3s ease;
}

.wrap-medias-thumbnails img:hover {
  box-shadow: 2px 2px 2px #ECECEC;
  transform: scale(1.1);
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


<!-- Product Detail -->
	<div class="container bgwhite py-2">

    <!-- breadcrumb -->
    	<div class="bread-crumb bgwhite flex-w py-4 animated bounceInLeft">
    		<a href="{{url('ventes')}}" class="s-text16">
    			Shop
    			<span class=" mx-2">></span>
    		</a>



    		<a href="{{url("ventes/$product->slug#products")}}" class="s-text16">
    			Produits
          <span class=" mx-2">></span>
    		</a>


    		<span class="s-text17">
    			{{$product->name}}
    		</span>
    	</div>


		<div class="flex-w flex-sb ">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots wrap-medias-thumbnails">

            <img width="60px" class="product-thumbnail" data-type='image' data-content="{{asset("$product->thumbnail")}}" src="{{asset("$product->thumbnail")}}" alt="{{$product->name}}">

            @if(!is_null($product->picture_one))
            <img width="60px" class="product-thumbnail" data-type='image' data-content="{{asset("$product->picture_one")}}" src="{{asset("$product->picture_one")}}" alt="{{$product->name}}" title="{{$product->name}}">
            @endif
            @if(!is_null($product->picture_two))

            <img width="60px" class="product-thumbnail" data-type='image' data-content="{{asset("$product->picture_two")}}" src="{{asset("storage/$product->picture_two")}}" alt="{{$product->name}}" title="{{$product->name}}">
          @endif
          @if(!is_null($product->video))

            <img width="60px" class="product-thumbnail" data-type='video' data-content="{{asset("storage/$product->picture_video")}}" height="60px"src="{{asset("storage/images/play-button.png")}}" alt="{{$product->name}}">
@endif


          </div>

					<div class="slick3 ">

						<div class="item-slick3">
							<div id="media-wrap" class="wrap-pic-w ">
								<img id="product-media" src="{{asset("$product->thumbnail")}}" alt="{{$product->name}}">

                <video width="100%" height="60%" id="product-video" style="display:none;" controls width="250">



                    <source id="product-video-src" src=""
                            type="video/mp4">

                    Sorry, your browser doesn't support embedded videos.
                </video>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="w-size14 py-2 respon5">
				<h1 class="animated flipInX product-detail-name fontsize-5 pt-3 pb-2">
					{{$product->name}}
          @if($product->old_price != null)
            <span class="badge  badge-pill badge-secondary"> <del>{{$product->old_price}}€</del> </span>
            <span class="badge badge-pill badge-success">{{$product->price}}€ TTC</span>
          @else
            <span class="badge badge-pill badge-secondary">{{$product->price}}€ TTC</span>
          @endif

				</h1>


				<p class="s-text8 py-2">
          <h2 class="fontsize-3 font-2 text-secondary">{{$product->description}}</h2>
				</p>

				<!--  -->
        <form action="{{url("panier/shop/store")}}" method="POST">
          {{csrf_field()}}
				<div class="">
            <input type="hidden" name="product" value="{{$product->id}}">
            <input type="hidden" name="cart" value="{{$product->slug}}">

					<!-- Select quantity block -->
					<div class="py-3">
						<div class="w-size16 flex-m flex-w">

              <div class="value-button mt-2" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
        <input class="mt-2" type="number" name="quantity" id="number" value="1" />
        <div class="value-button mt-2 mr-2" id="increase" onclick="increaseValue()" value="Increase Value">+</div>



							<div class="mt-2 btn-addcart-product-detail m-b-10">
								<!-- Button -->
								<button  class=" animated tada add-to-cart bg0 bo-rad-23 hov-bg-black text-white btn">
									Ajouter au panier       <img src="{{asset('storage/icons/add-to-cart.svg')}}" class=" ml-1" style=" width:20px;" height="20px" alt="">

								</button>
							</div>

						</div>
					</div>
        </form>
					<!-- End select quantity block -->

				</div>



				<!--  -->
        <div class="wrap-dropdown-content bo6 py-3 active-dropdown-content">
          <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer fontsize-2 color0-hov trans-0-4">
            Description
            <i class="up-mark fs-12 color1 " aria-hidden="true">+</i>
          </h5>

          <div class="dropdown-content dis-none py-2">
            <p class="s-text8">{{$product->description}}</p>
          </div>
        </div>

				<div class="wrap-dropdown-content bo7 py-3">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer fontsize-2 color0-hov trans-0-4">
						Information supplémentaire
            <i class="up-mark fs-12 color1 " aria-hidden="false">-</i>
					</h5>

					<div class="dropdown-content   py-2">
						<p class="s-text8">
							{{$product->specs}}</p>
					</div>
				</div>

		@if (count($product->fiches) > 0)
			<div class="wrap-dropdown-content bo7 py-3">
				@foreach($product->fiches as $fiche)
					<a target="_blank" href="{{url("fiches-entretien/$fiche->slug")}}" class="fontsize-2">

					<h5 class="flex-sb-m text-black cs-pointer fontsize-2 color0-hov trans-0-4">
						Fiche d'entretien
						<i class="down-mark fs-12 color1 fa fa-file-text dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-file-text-o" aria-hidden="true"></i>
					</h5>
	</a>
				@endforeach

				<div class="dropdown-content dis-none p-t-15 p-b-23">
					<p class="s-text8">

						@foreach($product->fiches as $fiche)
						<a target="_blank" href="{{url("fiches-entretien/$fiche->slug")}}">Voir la fiche d'entretien</a>

						@endforeach
					</p>
				</div>
			</div>

		@endif


				<div class="py-2">
					<span class="fontsize-1 m-r-35">SKU: {{$product->sku}}</span> |
					<span class="fontsize-1 m-r-35">Taux TVA: {{$product->tax}}%</span> |
					<span class="fontsize-1">Catégories: {{$product->productcategorie->name ?? 'Aucune'}}	</div>
			</div>
		</div>
	</div>



	<!-- Relate Product -->
		{{-- <section class=" bgwhite py-4">
			<div class="container">
				<div class="sec-title py-4">

					<h4 class="fontsize-6 t-center font-2b">
						PRODUITS SIMILAIRES
					</h4>
          <h6 class="fontsize-5 mt-2 t-center font-3">Une sélection de plantes et accéssoires</h6>
				</div>

				<!-- Slide2 -->
				<div class="wrap-slick2 mt-2 glider-contain">
					<div class="slick2 glider"> --}}


	          {{-- @foreach($product->products as $relatedProduct)
						@if($product->id == $relatedProduct->id)
						@else

						<div class="item-slick2 mx-2">
							<!-- Block2 -->
							<div class="block2">

								<div class="block2-img wrap-pic-w of-hidden pos-relative">

	                <img src="{{asset("$relatedProduct->thumbnail")}}" alt="k">


	              <div class="block2-overlay trans-0-4">

	                <a href="{{url("ventes/$vente->slug/produits/$relatedProduct->slug")}}" class="block2-btn-addwishlist hov-pointer trans-0-4">
	                  <i class="icon-wishlist icon_heart_alt" aria-hidden="false"></i>
	                  <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
	                </a>

	                <a href="{{url("ventes/$vente->slug/produits/$relatedProduct->slug")}}" class="text-center" style="display:block;height:100%;">
	                  <img src="{{asset('storage/icons/eye-closeup.svg')}}" height="40px" style="margin-top:43%;font-size:40px;">
	                 </a>

	                <div class=" w-size1 trans-0-4">

	                    <a href="{{url("fiches-entretien/$relatedProduct->slug")}}" class="text-center bg4 bo-rad-23 hov1 text-white btn">
	                      Fiche d'entretien
	                    </a>


	                </div>

	              </div> <!-- end block2-overlay -->


								</div>

								<div class="block2-txt mt-2">
									<a href="{{url("fiches-entretien/$relatedProduct->slug")}}" class="badge fontsize-2 block2-name dis-block s-text3 p-b-5">
										{{$relatedProduct->name}}

                    @if($product->old_price != null)
                      <span class="badge badge-secondary"><del>{{$product->old_price}}€</del> </span>
                      <span class="badge badge-success">{{$relatedProduct->price}}€</span>
                    @else
                      <span class="badge badge-secondary">{{$relatedProduct->price}}€</span>
                    @endif

									</a>

								</div>
							</div>
						</div>
					@endif
	          @endforeach --}}





					</div>
				</div>

			</div>
		</section>




@endsection

@section('footer_scripts')
  <script>

  var thumbnails = document.getElementsByClassName("product-thumbnail");

  var changeThumbnail = function() {

      var mediaType = this.getAttribute("data-type");
      var content = this.getAttribute("data-content");
      console.log("Src = " + content);

      var mediaWrap = document.getElementById("media-wrap").firstChild;
      var mediaElement = document.getElementById("product-media");

    //  var = mediaType = mediaWrap.getAttribute("data-type")//  console.log(mediaType);

      if(mediaType == 'video'){

        // sourceMP4.type = "video/mp4";
        // sourceMP4.src = content;

        mediaElement.style.display = "none";
        document.getElementById("product-video").style.display = "block";
        document.getElementById("product-video-src").setAttribute("src", content);
        console.log(document.getElementById("product-video-src").getAttribute("src"));
        document.getElementById("product-video-src").type = "video/mp4";
        document.getElementById("product-video-src").src = content;
        document.getElementById("product-video").load();

      } else {
        document.getElementById("product-video").style.display = "none";

        mediaElement.style.display = "block";

        console.log('Type is image');
      //  var img = document.createElement('img');
      //  img.src = content;

        //mediaWrap.appendChild(img)
        mediaElement.setAttribute('src', content);

      }



  };

  for(var i=0;i<thumbnails.length;i++){
   var clique = thumbnails[i];

   thumbnails[i].addEventListener('click', changeThumbnail, false);
  }

  Array.from(thumbnails).forEach(function(element) {

     element.addEventListener('click', changeThumbnail);
   });

  new Glider(document.querySelector('.glider'), {

    // `auto` allows automatic responsive
    // width calculations
    slidesToShow: 'auto',
    slidesToScroll: 'auto',

    // should have been named `itemMinWidth`
    // slides grow to fit the container viewport
    // ignored unless `slidesToShow` is set to `auto`
    itemWidth: undefined,

    // if true, slides wont be resized to fit viewport
    // requires `itemWidth` to be set
    // * this may cause fractional slides
    exactWidth: false,

    // speed aggravator - higher is slower
    duration: .5,

    // dot container element or selector
    dots: 'CSS Selector',

    // arrow container elements or selector
    arrows: {
      prev: 'CSS Selector',
      // may also pass element directly
      next: document.querySelector('CSS Selector')
    },

    // allow mouse dragging
    draggable: true,
    // how much to scroll with each mouse delta
    dragVelocity: 3.3,

    // use any custom easing function
    // compatible with most easing plugins
    easing: function (x, t, b, c, d) {
      return c*(t/=d)*t + b;
    },

    // event control
    scrollPropagate: false,
    eventPropagate: true,

    // Force centering slide after scroll event
    scrollLock: false,
    // how long to wait after scroll event before locking
    // if too low, it might interrupt normal scrolling
    scrollLockDelay: 150,

    // Force centering slide after resize event
    resizeLock: true,

    // Glider.js breakpoints are mobile-first
    // be conscious of your ordering
    responsive: [
      {
        breakpoint: 900,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 8
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 8
        }
      }
    ]
  });




  document.querySelector(".js-toggle-dropdown-content").onclick = function(){
          //click me function!
          alert('ok');
    }


    Array.prototype.slice.call(document.querySelectorAll('.quantity-container'))
    	.map(function (container) {
        return {
          input: container.querySelector('.quantity-amount'),
          decrease: container.querySelector('.decrease'),
          increase: container.querySelector('.increase'),
          get value () { return parseInt(this.input.value); },
          set value (v) { this.input.value = v; }
        }
      })
      .forEach(function (item) {
        item.decrease.addEventListener('click', function () {
          console.log('clicked -');
          item.value -= 1;
        });
        item.increase.addEventListener('click', function () {
          console.log('clicked +');
          item.value += 1;
        });
      });
    //
    // Show/Hide mobile menu on click
    //

    function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
}


function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
}




  </script>
@endsection

