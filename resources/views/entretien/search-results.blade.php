@extends('layouts.front.app')

@section('pageTitle', "Nos conseils entretiens et repiquage")

@section('template_linked_css')
<style>
.dummy {
  margin-top: 100%;
}
.thumbnail {
  position: absolute;
  top: 10px;
  bottom: 0;
  left: 0px;
  right: 0;
  text-align:center;
  line-height: 15px;
  color: #FFFF;
  padding-top:calc(50% - 30px);
}

.cons {
  width: 25%;
  height: 25%;

}

.cons h3 {
  color: #FFF;
  font-size: 18px;
  line-height: 10px;
}

@media (min-width: 768px) {

.cons{
  width: 50%;
  height: 50%;
}

}

</style>
@endsection
@section('content')



<section class="jumbotron text-center" style="border-radius:0;background-image: url(https://images.pexels.com/photos/1667586/pexels-photo-1667586.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=1920);background-size: cover;">
  <div class="container">
    <h1 class="mb-2 font-bold text-white text-center jumbotron-heading">Résultats de votre recherche</h1>
    <h2 class="lead my-2 text-white">Parce que nous sommes aussi la pour vous</h2>
    <p class="text-center">
      <form  action="{{url("conseils/search")}}" class="newsletter-form" method="post" target="">
{{csrf_field()}}

           <input type="text" name="search" id="email" placeholder="Cactus, Monstera...">
           <button type="submit" class="button">Rechercher</button>
         </form>
    </p>
  </div>
</section>

<!-- Section: fiches entretiens -->

<!-- Relate Product -->
	<section class="partials-fiches-entretien bgwhite">
		<div class="container">
			<div class="sec-title py-2">

				<h2 class=" t-center font-2b">
					Fiches d'entretiens
				</h2>
				<h3 class=" t-center my-2">
					Retrouvez les infos necessaires au bon entretien de votre plante
				</h3>
<p class="text-center">				<a href="#" class="t-center my-2 btn btn-outline-danger bo-rad-23">Résultats: ({{count($fiches)}})</a>
</p>			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2 mt-2">
				<div class="slick2">


          @foreach($fiches as $fiche)
					<div class="item-slick2 mx-2">
						<!-- Block2 -->
						<div class="block2">


							<div class="block2-img wrap-pic-w of-hidden pos-relative">

                <img src='{{asset("images/fiches/$fiche->slug.jpg")}}' alt="k">


              <div class="block2-overlay trans-0-4">

                <a href="{{url("fiches-entretien/$fiche->slug")}}" class="block2-btn-addwishlist hov-pointer trans-0-4">
                  <i class="icon-wishlist icon_heart_alt" aria-hidden="false"></i>
                  <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                </a>

                <a href="{{url("fiches-entretien/$fiche->slug")}}" class="text-center" style="display:block;height:100%;">
                  <i class="text-center fa fa-eye text-white" style="margin-top:43%;font-size:40px;"></i>
                 </a>

                <div class=" w-size1 trans-0-4">

                    <a href="{{url("fiches-entretien/$fiche->slug")}}" class="text-center bg4 bo-rad-23 hov1 text-white btn">
                      Fiche d'entretien
                    </a>


                </div>

              </div> <!-- end block2-overlay -->


							</div>

							<div class="block2-txt mt-2">
								<a href="{{url("fiches-entretien/$fiche->slug")}}" class="badge fontsize-2 block2-name dis-block s-text3 p-b-5">
									{{$fiche->name}}
								</a>

							</div>
						</div>
					</div>

          @endforeach





				</div>
			</div>

		</div>
	</section>



@endsection

@section('footer_scripts')
<script>
$(document).ready(function(){
$('.your-class').slick({
  setting-name: setting-value
});
});
</script>
@endsection
