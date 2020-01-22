
<!-- Relate Product -->

	<section class="partials-fiches-entretien bgwhite py-4">
		<div class="container">
			<div class="sec-title py-4">
        <h2 class="mb-4 t-center font-2b ">
          Nos astuces
        </h2>
        <h3 class="mb-4 t-center">
          Techniques et autre savoir de l'expert
        </h3>
				<p class="text-center">
						<a href="#" class="t-center my-2 btn btn-outline-danger bo-rad-23">Voir toutes ({{count($fiches)}})</a>
				</p>
			</div>

    <div class="row">
      @foreach($conseils as $conseil)
    <div class="col-md-3 col-sm-4 col-xs-6 " style="background-color: #{{$conseil->color_code}}">
      <div class="dummy"></div>
      <a  href="{{url("conseils/$conseil->slug")}}" class="thumbnail purple">{{$conseil->name}}</a>
    </div>
    @endforeach
    </div>
		</div>
	</section>
