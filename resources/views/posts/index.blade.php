@extends('layouts.front')

@section('template_title')
Astuces et actualités des Plantes Addict
@endsection

@section('meta_description')
Astuces et actualités des Plantes Addict
@endsection

@section('template_fastload_css')
  <style >
  #svg {
width: 25px;
height: 25px;
margin-left:4px !important;
}

.svg-circle {
border-radius: 20px;
}
  </style>
@endsection

@section('og')
<meta name="og:title" property="og:title" content="Nos articles de blog">
@endsection

@section('content')


<section class="py-4">
  <div class="container animated fadeIn ">

    <div class="row">
      <div class="col-lg-2 mt-2">
        <h1 class="font-2b fontsize-6">BLOG</h1>
      </div>


      <div class="col-lg-7 mt-3">
        @foreach($postcategories as $postcategorie)
          <a href="{{url("blog/$postcategorie->slug")}}" class="display-block text-center mt-3 mr-3 ">

            <span class="  px-1 rounded-circle" style="background-color: #{{$postcategorie->color_code}};padding-top: 9px; padding-bottom:11px;" >
              <img class="m-0"  src="{{asset("$postcategorie->icon")}}" id="svg" class="" alt="">

            </span>
            <span class="ml-2">{{$postcategorie->name}}</span>

          </a>
        @endforeach
      </div>

      <div class="col-lg-3  mt-3">
        <form method="GET" action="{{url("blog")}}">
          {{csrf_field()}}
          <div class="pos-relative bo11 of-hidden">
            <input class="s-text7 size16 py-2 px-3" type="text" name="q" placeholder="Cactus, Lyon...">

            <button class="flex-c-m size5 px-3 ab-r-m color1 color0-hov trans-0-4">
              <i class="fs-13 fa fa-search" aria-hidden="true"></i>
            </button>
          </div>
        </form>

      </div>

    <!-- End row -->
    </div>
  </div>

</section>

<section>

<div class="container ">
  <div class="row">


    @foreach ($posts as $post)


         <div class="col-md-4 animated bounceInUp">
           <div class="card mb-4 box-shadow text-center">
  <a href="{{url("blog/" . $post->postcategorie->slug . "/$post->slug")}}" style="overflow:hidden;height:240px;"> <img class="card-img-top" src="{{asset("$post->thumbnail")}}" alt="{{$post->name}}" style="margin-top:-60px; background-cover:cover;">
   </a>
          <div class="card-body">
<p class="card-text text-center">
    <img class="p-2  bo-rad-23 shadow" src="{{$post->postcategorie->icon }}" style="background-color: #{{$post->postcategorie->color_code}}; margin-top:-90px !important;" height="50px" alt="">

</p>

              <h4 class="fontsize-2 mb-2 font-2b font-uppercase">{{$post->name}}</h4>
               <p class="card-text text-center ">{{$post->description}}</p>
               @foreach ($post->postcategorie() as $a)
                 {{$a}}
               @endforeach
               <div class="text-center mt-3">

               <a href="{{url("blog/" . $post->postcategorie->slug . "/$post->slug")}}" class="color-1 text-center py-2" style="border-bottom: 2px solid #e65540; color: #e65540;">LIRE LA SUITE <i class="fa fa-arrow-right"></i> </a>
                </div>
             </div>
           </div>
         </div>

    @endforeach

</div>
<div class="py-2">


</div>
</div>

</section>

@endsection
