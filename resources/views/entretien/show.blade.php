

			@extends('layouts.front.app')

			@section('template_title', "Fiche entretien - $conseil->name")

@section('meta_description')
  {{ $conseil->meta_desc }}
@endsection

			@section('og')
			<meta name="og:title" property="og:title" content="Vente éphémère à {{$conseil->location_city}} le {{$conseil->date}}">
			@endsection

			@section('content')
			<!-- Banner video -->


<section class="pt-2 pb-4">
	<div class="container">

	<div class="row featurette">
		<div class="col-md-7 order-md-2">
			<h4 class="font-3 fontsize-6 py-4">Conseil</h4>
			<h2 class="featurette-heading font-uppercase fontsize-8 font-2b">{{$conseil->name}} <span class="text-muted fontsize-4">It'll blow your mind.</span></h2>
			<hr>

			@include('front.conseils.partials.features')

		</div>
		<div class="col-md-5 order-md-1">
			<img class="featurette-image animated zoomIn rounded img-fluid mx-auto" src="{{asset("storage/$conseil->thumbnail")}}" alt="Generic placeholder image">
		</div>
	</div>

	</div>
</section>

<!-- Content Page -->
{!! $conseil->content !!}

@endsection
