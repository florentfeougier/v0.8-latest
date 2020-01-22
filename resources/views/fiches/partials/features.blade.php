<!-- Shipping -->
<section class="shipping bgwhite animated bounceInUp">
  <div class="flex-w py-2 px-1">
    <div class="flex-col-c w-size5 py-4 respon1">
      <span class="text-center"> <img src="{{url('https://image.flaticon.com/icons/svg/1670/1670020.svg')}}" height="60px" alt=""> </span>
      <h4 class="m-text12 t-center mt-4 mb-3 font-2b" style="text-transform:uppercase;">
         Arrosage
      </h4>

      <span class="s-text11 t-center px-1  fontsize-2">

      {!!$fiche->arrosage_info!!}
    </span>
    </div>

    <div class="flex-col-c w-size5 py-4  respon2">
      <span class="text-center"> <img src="https://image.flaticon.com/icons/svg/2077/2077033.svg" height="60px" alt=""> </span>
      <h4 class="m-text12 t-center mt-4 mb-3 font-2b" style="text-transform:uppercase;">
        Entretien
      </h4>

      <span class="s-text11 t-center  fontsize-2">
        {!!$fiche->entretien_info!!}
      </span>
    </div>

    <div class="flex-col-c w-size5  py-4 respon1">
      <span class="text-center"> <img src="https://image.flaticon.com/icons/svg/869/869853.svg" height="60px" alt=""> </span>
      <h4 class="m-text12 t-center mt-4 mb-3 font-2b" style="text-transform:uppercase;" >
        Lumière
      </h4>

      <span class="s-text11 t-center  fontsize-2">
        {!!$fiche->lumiere_info!!}
      </span>
    </div>
  </div>
</section>
