<!-- Shipping -->
<section class="shipping bgwhite">
  <div class="flex-w py-2 px-1">
    <div class="flex-col-c w-size50 py-4 respon1">
      <span class="text-center"> <img src="{{asset('storage/icons/icon-time.svg')}}" height="60px" alt=""> </span>
      <h4 class="m-text12 t-center mt-4 mb-3 font-2b" style="text-transform:uppercase;">
         Durée
      </h4>

      <span class="s-text11 t-center px-1  fontsize-2">
{{$conseil->duration}} minutes
    </span>
    </div>

    <div class="flex-col-c w-size50 py-4  respon2">
      <span class="text-center"> <img src="/storage/icons/icon-cactus.svg" height="60px" alt=""> </span>
      <h4 class="m-text12 t-center mt-4 mb-3 font-2b" style="text-transform:uppercase;">
        Difficulté
      </h4>

      <span class="s-text11 t-center  fontsize-2">
        @if($conseil->difficulty == 1)
          <i class="fa fa-star"></i>  <i class="fa fa-star-o"></i>  <i class="fa fa-star-o"></i>   <i class="fa fa-star-o"></i>  <i class="fa fa-star-o"></i>
        @elseif($conseil->difficulty == 2)
          <i class="fa fa-star"></i>  <i class="fa fa-star"></i>  <i class="fa fa-star-o"></i>   <i class="fa fa-star-o"></i>  <i class="fa fa-star-o"></i>
        @elseif($conseil->difficulty == 3)
          <i class="fa fa-star"></i>  <i class="fa fa-star"></i>  <i class="fa fa-star"></i>   <i class="fa fa-star-o"></i>  <i class="fa fa-star-o"></i>
        @elseif($conseil->difficulty == 4)
          <i class="fa fa-star"></i>  <i class="fa fa-star"></i>  <i class="fa fa-star"></i>   <i class="fa fa-star"></i>  <i class="fa fa-star"></i>
        @else
          <i class="fa fa-star"></i>  <i class="fa fa-star"></i>  <i class="fa fa-star"></i>   <i class="fa fa-star"></i>  <i class="fa fa-star"></i>

        @endif


      </span>
    </div>


  </div>
</section>
