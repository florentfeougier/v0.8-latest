@extends('layouts.front')

@section('template_title')
  {{$fiche->name}} - Fiches d'entretien pour plantes d'intérieur
@endsection

@section('meta_description')
  {{ $conseil->meta_desc ?? "Gardes ta plante verte d'intérieur très longtemps avec nos conseils d'entretien. Rempotage, arrosage, luminosité tout devient facile avec plantes addict." }}
@endsection


@section('og')
<meta name="og:title" property="og:title" content="Vente éphémère à {{$fiche->location_city}} le {{$fiche->date}}">
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
  min-height: 240px;
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
<!-- Banner video -->


<section class="pt-2">
	<div class="container">

		<div class="row featurette">
	 <div class="col-md-7 order-md-2">
		 <h4 class="font-3 fontsize-6 py-4">Fiche d'entretien</h4>
		 <h1 class="animated flipInX featurette-heading font-uppercase fontsize-8 font-2b">{{$fiche->name}}</h1>
<hr>

		 @include('fiches.partials.features')

	 	</div>
	 <div class="col-md-5 order-md-1 mb-4">
		 <img class="featurette-image  rounded img-fluid mx-auto" src="{{asset("storage/$fiche->thumbnail")}}" alt="Image fiche d'entretien pour {{$fiche->name}}">
	 </div>
 </div>

	</div>
</section>

<!-- Title Page -->



@include('fiches.partials.description')


	{!! $fiche->content !!}



<!-- Relate Product -->
<section class="partials-fiches-entretien bgwhite mb-4">
	<div class="container">
		<div class="sec-title py-2">

			<h2 class=" t-center font-2b"> Nos prochaines ventes</h2>

			<h3 class=" t-center my-2"> Bientôt prêt de chez vous lors d'une de nos ventes </h3>
		</div>

			<!-- Slide2 -->
		<div class="wrap-slick2 mt-2">
			<div class="slick2">
        <div class="carousel" data-flickity='{ "groupCells": true }'>

          @foreach($ventes as $vente)



                  <div class="block4 carousel-cell wrap-pic-w p-1">
                    <div class="block4-square" style="position:relative;width:100%;height:400px; line-height:400px; background:{{$vente->color_code}};">
                      <h3 class="text-center my-auto" style="font-size:28px;line-height:400px;" >{{$vente->name}}</h3>
                    </div>
                    <a href="{{url("ventes/$vente->slug")}}" class="block4-overlay sizefull text-white ab-t-l trans-0-4">
                        @if($vente->show_date == 1)
                          <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-4">
                            <i class="fa fa-calendar fs-20 mr-2" aria-hidden="true"></i> {{$vente->date}}
                            <span class="p-t-2"></span>
                      @endif

                      </span>

                      <div class="block4-overlay-txt trans-0-4 p-4">
                        <h3 class="text-white">{{$vente->name}}</h3>
                        <p class="s-text10 m-b-15 h-size1 of-hidden">
                          {{$vente->description}}
                        </p>

                        <span class="s-text9">
                          @if($vente->show_location == 1)
                            <span class="text-secondary font-2">
                              <i class="fa fa-map-marker mr-1"> {{$vente->location_address}} {{$vente->location_postalcode}}</i>
                            </span>
                        @endif

                      </div>
                    </a>
                  </div>
				@endforeach
      </div>

			</div> <!-- Wrap slick-->
		</div> <!-- Slick -->

		</div> <!-- End container -->
</section>




@endsection

@section('footer_scripts')
  <script src="{{asset('js/flickity.pkgd.min.js')}}" type="text/javascript">

  </script>
@endsection
