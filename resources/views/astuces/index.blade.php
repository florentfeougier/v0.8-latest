@extends('layouts.front.app')

@section('pageTitle', "Nos astuces")

@section('template_linked_css')
@endsection
@section('content')

<!-- Content heading section -->
<section class="jumbotron text-center" style="border-radius:0;background-image: url(https://images.pexels.com/photos/1667586/pexels-photo-1667586.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=1920);background-size: cover;">
  <div class="container">
    <h1 class="mb-2 font-bold text-white text-center jumbotron-heading">Nos astuces</h1>
    <h2 class="lead my-2 text-white">Parce que nous sommes aussi la pour vous</h2>
    <p class="text-center">
      <form  action="{{url("conseils")}}" class="newsletter-form ml-auto text-center mr-auto" method="GET" target="">
        {{csrf_field()}}

         <input type="text" class="text-white" name="q" id="email" placeholder="Cactus, Monstera...">
          <button type="submit" class="button">Rechercher</button>
        </form>
    </p>
  </div>
</section>

<!-- Section: fiches entretiens -->
<!------------------------------>
<!--        List sales        -->
<!------------------------------>
<section class="instagram p-t-0">
  <div class="container">

  		<div id="sales" class="flex-w rs1-block4 mb-4">


        @foreach($astuces as $astuce)

        <div class="block4 wrap-pic-w p-1">
          <div class="block4-square" style="position:relative;width:100%;height:400px; line-height:400px; background:{{$astuce->color_code}};">
            <h3 class="text-center my-auto" style="font-size:28px;line-height:400px;" >{{$astuce->name}}</h3>
          </div>
          <a href="{{url("astuces/$astuce->slug")}}" class="block4-overlay sizefull ab-t-l trans-0-4">
            <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-4">
              <i class="fa fa-calendar fs-20 mr-2" aria-hidden="true"></i>
              <span class="p-t-2">{{ date('d/m/Y', strtotime($astuce->date)) }} de {{$astuce->horaires}}</span>
            </span>

            <div class="block4-overlay-txt trans-0-4 p-4">
              <h3 class="text-white">{{$astuce->name}}</h3>
              <p class="s-text10 m-b-15 h-size1 of-hidden">
                {{$astuce->description}}
              </p>

              <span class="s-text9">
                <i class="fa fa-map-marker mr-1"></i> {{ $astuce->location_address }} - {{$astuce->location_postalcode}}
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
@endsection
