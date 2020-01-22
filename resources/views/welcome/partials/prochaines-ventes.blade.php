

  <!-- Blog -->
  <section class="coming-sales bg5 py-5 slideInUp">
    <div class="container">

      <div class="sec-title">

        <h5 class="m-text2 my-4 t-center animated zoomIn">Ventes éphémères</h5>
        <h3 class="animated zoomIn font-2b fontsize-10 font-uppercase my-4 t-center">
          Nos Prochaines Ventes
        </h3>
      </div>

      <div class="row my-2">

      @foreach($ventes ?? '' as $vente)
        <div class="col-sm-10 col-md-4  py-4 m-l-r-auto" >
          <!-- Block3 -->
          <div class="block3 bo-rad-10">

            <div class="animated flipInX circle shadow-sm border border-secondary shadow mt-4" style=" background-color: {{$vente->color_code}};   transition-duration: 0.2s;">
              <a href="{{url("ventes/$vente->slug")}}" style="display:block; height:40px;" title="Précommande tes plantes pour la vente de {{ucfirst($vente->location_city)}}">
                {{ucfirst(substr($vente->name,0,15))}}
              </a>
            </div>

            <div class="block3-txt py-3">
              <h4 class="text-center ml-auto mr-auto">
                <a href="{{url("ventes/$vente->slug")}}" title="Précommande tes plantes pour la vente de {{ucfirst($vente->location_city)}}" class=" m-text11">
                  Vente à {{ucfirst($vente->name)}}
                </a>
              </h4>

              <p class=" t-center text-center ml-auto mr-auto py-2">
                <span class="s-text6 t-center text-center ml-auto mr-auto">

                  @if($vente->show_location)
                    {{$vente->location_address}}
                  @endif
                </span>
                <span class="s-text6 t-center text-center ml-auto mr-auto"> le </span> <span class="s-text7">{{ date('d/m/Y', strtotime($vente->date)) }} de {{$vente->horaires}}</span>
                <br>
                <a href="{{url("ventes/$vente->slug")}}" class="text-center font-2 mt-4 bo-rad-23 btn btn-outline-danger animated zoomIn" title="Précommande tes plantes">
                Précommander vos plantes <img class="ml-2" src="{{asset('storage/icons/right-arrow-red-light.svg')}}" height="20px" alt="Cliquer ici pour voir nos ventes">
                </a>
              </p>
            </div>





          </div>
        </div>
@endforeach



      </div>
    </div>
</section>

