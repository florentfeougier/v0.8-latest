@extends('layouts.front')

@section('template_title', "Nos fiches d'entretien")

@section('template_description')
    Nos fiches d'entretien pour vos plantes d'intérieur
@endsection

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
    <h1 class="mb-2 font-bold text-white text-center jumbotron-heading">Fiches d'entretien</h1>
    <h2 class="lead my-2 text-white">Parce que nous sommes aussi la pour vous</h2>
    <p class="text-center">
      <form  action="{{url("fiches-entretien")}}" class="newsletter-form ml-auto mr-auto" method="get" target="">
{{csrf_field()}}

           <input type="text" name="search" id="email" placeholder="Cactus, Monstera...">
           <button type="submit" class="button">Rechercher</button>
         </form>
    </p>
  </div>
</section>

<!-- Section: fiches entretiens -->

<!------------------------------>
<!--        List sales        -->
<!------------------------------>

<!-- Instagram -->
<section class="instagram py-4 px-4">



    <div id="sales" class="flex-w rs1-block4 mb-4">

    @foreach($fiches as $fiche)
    <div class="block4 wrap-pic-w p-1">
      <div class="block4-square" style="position:relative;width:100%;height:400px; line-height:400px; background-size: cover; background-color: {{$fiche->color_code}}">
        <h3 class="text-center my-auto" style="line-height:400px;" >{{$fiche->name}}</h3>
      </div>
      <a href="{{url("fiches-entretien/$fiche->slug")}}" class="block4-overlay sizefull ab-t-l trans-0-4">
        <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-4">
          <i class="fa fa-plant fs-20 mr-2" aria-hidden="true"></i>
          <span class="p-t-2"></span>
        </span>

        <div class="block4-overlay-txt trans-0-4 p-4">
          <h3 class="text-white">{{$fiche->name}}</h3>
          <p class="s-text10 m-b-15 h-size1 of-hidden">
            {{substr($fiche->description_short, 0,200)}}
          </p>

          <span class="s-text9">
            <i class="fa fa-plant mr-1"></i>
          </span>
        </div>
      </a>
    </div>
    @endforeach

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
