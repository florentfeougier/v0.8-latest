
<!-- Relate Product -->
	<section class="partials-fiches-entretien bgwhite">
		<div class="container">
			<div class="sec-title py-2">

				<h2 class=" t-center font-2">
					Fiches d'entretiens
				</h2>
				<h3 class=" t-center my-2">
					Retrouvez les infos nécessaire au bon entretien de votre plante
				</h3>
<p class="text-center">				<a href="#" class="t-center my-2 btn btn-outline-danger bo-rad-23">Voir toutes ({{count($fiches)}})</a>
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
