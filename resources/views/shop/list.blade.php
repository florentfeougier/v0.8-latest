@extends('layouts.front')

@section('content')
<section class="jumbotron text-center" style="border-radius:0;background-image: url(https://images.pexels.com/photos/1667586/pexels-photo-1667586.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=1920);background-size: cover;">
  <div class="container">

      <h1 class="mb-2 font-bold text-white text-center jumbotron-heading">Shop </h1>
      <p id="message" class="text-white pb-2"></p>


    <h2 class="lead my-2 text-white">Pour les vrai Plants Addict, nous vendons certaines variétés toutes l'années sur notre boutique!</h2>
    <p class="text-center">
      <form method="GET" action="{{url("conseils/")}}" class="newsletter-form" target="_blank">
           <input type="hidden" name="u" value="d08fe605a9149dc54a3c13f44">
           <input type="hidden" name="id" value="96f67efdeb">
           <input type="email" name="EMAIL" id="email" placeholder="Cactus, Aloe Vera...">
           <button type="submit" class="button">Rechercher</button>
         </form>
    </p>
  </div>
</section>

<section>
  @foreach($products as $product)
  {{ $product->name }}
  @endforeach
</section>
@endsection
