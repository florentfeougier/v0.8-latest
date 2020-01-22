@extends('layouts.front')

@section('template_title')
  Catégories - Blog
@endsection

@section('og')
<meta name="og:title" property="og:title" content="Nos articles de blog">
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
@section('content')


<section class="py-4">
  <div class="container">

    <div class="row">
      <div class="col-lg-2 mt-3">
        <h1 class="font-2b">BLOG</h1>
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

      <div class="col-lg-7 mt-3 pt-3">
        @foreach($postcategories as $postcategorie)
          <a href="{{url("blog/categorie/$postcategorie->slug")}}" class="display-block text-center mt-4 mr-3 ">

            <span class="  px-1 rounded-circle" style="background-color: #{{$postcategorie->color_code}};padding-top: 9px; padding-bottom:11px;" >
              <img class="m-0"  src="{{asset("$postcategorie->icon")}}" id="svg" class="" alt="">

            </span>
            <span class="ml-2">{{$postcategorie->name}}</span>

          </a>
        @endforeach
      </div>

    <!-- End row -->
    </div>
  </div>

</section>

<section>

<div class="container mt-3">
  <div class="row">


    @foreach ($postcategories as $post)

         <div class="col-md-4">
           <div class="card mb-4 box-shadow text-center">
  <a href="{{url("blog/$post->slug")}}">            <img class="card-img-top" src="{{asset("storage/posts/$post->thumbnail")}}" alt="Card image cap">
   </a>
          <div class="card-body">
<p class="card-text text-center" style="margin-top:-90px;">



     <span class="  px-1 rounded-circle" style="background-color: #{{$postcategorie->color_code}};padding-top: 9px; padding-bottom:11px;" >
       <img class="m-0"  src="{{asset("$postcategorie->icon")}}" id="svg" class="" alt="">

     </span>
</p>

               <p class="card-text text-center ">{{$post->description}}</p>

               <div class="text-center mt-3">

               <a href="{{url("blog/$post->slug")}}" class="color-1 text-center py-2" style="border-bottom: 2px solid #e65540; color: #e65540;">LIRE LA SUITE <i class="fa fa-arrow-right"></i> </a>
                </div>
             </div>
           </div>
         </div>

    @endforeach

</div>
</div>

</section>

@endsection
