@extends('layouts.front')

@section('template_title')
    {{substr($post->name,0,40)}} - {{$post->postcategorie->name}}
@endsection

@section('template_description')
    {{$post->name}} - Astuces et Conseils pour vos plantes d'intérieur
@endsection

@section('og')
<meta name="og:title" property="og:title" content="{{$post->name}} - Blog">
<meta property="og:type" content="article" />
<meta property="og:description" content="{{$post->description}}" />
<meta property="og:url" content="{{url("blog/$post->slug")}}" />
<meta property="og:image" content="{{asset("storages/posts/$post->thumbnail")}}" />
@endsection

@section('content')


@if($post->postcategorie->slug=='astuces')
	{!!$post->content!!}
@else

	<!-- article details -->
	<section class="bgwhite pt-2">
		<div class="container">
      <!-- breadcrumb -->
      	<div class="bread-crumb bgwhite flex-w py-2">
      		<a href="{{url('/')}}" class="s-text16">
      			Accueil
      			<i class="fa fa-angle-right px-2" aria-hidden="true">></i>
      		</a>

      		<a href="{{url('/blog')}}" class="s-text16">
      			Blog
      			<i class="fa fa-angle-right px-2" aria-hidden="true">></i>
      		</a>

      		<span class="s-text17">
      			{{$post->name}}
      		</span>
      	</div>
			<div class="row">
				<div class="col-md-8 col-lg-9 pb-4">
					<div class="">
						<div class="">


							<div class="blog-detail-txt py-1">
								<h1 class="mb-2 font-2b pb-1 fontsize-8">
									{{$post->name}}
								</h1>

								<div class=" flex-w flex-m pb-2">


									<span>
										Date: {{$post->created_at}}
										<span class="mx-2">|</span>
									</span>

									<span>
										Catégorie: {{$post->postcategorie->name}}
										<span class="mx-2"></span>
									</span>


								</div>
                <div class="blog-detail-img wrap-pic-w">
                  <img src="{{asset("$post->thumbnail")}}" alt="{{$post->name}} - {{substr($post->description,0,68)}}">
                </div>


								<p class="py-3 mt-4 pl-2 " style="border-left: 1px solid #ECECEC;">
                  {{$post->description}}
								</p>

								<p class="pt-3 pb-2">
                  {!!$post->content!!}
								</p>
							</div>


						</div>


					</div>
				</div>

				<div class="col-md-4 col-lg-3 ">
					<div class="rightbar">
						<!-- Search -->
					<form method="GET" action="{{url("/blog")}}">
						{{csrf_field()}}
						<div class="pos-relative bo11 of-hidden">
							<input class="s-text7 size16 py-2 px-3" type="text" name="q" placeholder="Cactus, Lyon...">

							<button class="flex-c-m size5 px-3 ab-r-m color1 color0-hov trans-0-4">
								<i class="fs-13 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</form>

						<!-- Categories -->
						<h4 class="m-text23 py-4 mt-2">
							Fiches d'entretien
						</h4>

						<ul>
              @foreach ($fiches as $fiche)
                <li class="py-2 bo6">
  								<a href="{{url("fiches-entretien/$fiche->slug")}}" class="s-text13 p-t-5 p-b-5">
  									{{$fiche->name}}
  								</a>
  							</li>
              @endforeach
              <li class="py-2 bo6">
                <a href="{{url("fiches/")}}" class="s-text13 p-t-5 p-b-5">
                  Voir toutes ({{count($fiches)}})
                </a>
              </li>
						</ul>

						<!-- Featured Products -->
						<h4 class="m-text23 py-4 mt-2">
							Shop
						</h4>

						<ul class="bgwhite">

            @if(count($products) > 0)
              @foreach ($products as $product)


              <li class="flex-w pb-2">
                <a href="{{url("shop/products/$product->slug")}}" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
                  <img src="{{asset(asset("storage/$product->thumbnail"))}}" alt="IMG-PRODUCT">
                </a>

                <div class="w-size23 pt-2">
                  <a href="{{url("shop/products/$product->slug")}}" class="s-text20">
                    {{$product->name}}
                  </a>

                  <span class=" badge badge-secondary s-text17 p-t-6">
                    {{$product->price}}€
                  </span>
                </div>
              </li>
              @endforeach
            @else
              <p>Aucun produit en vente actuellement.</p>
            @endif


						</ul>



						<!-- Tags -->
						<h4 class="m-text23 py-4 mt-2">
							Nos Ventes
						</h4>

						<div class="wrap-tags flex-w">
              @foreach($ventes as $vente)
              	<a href="{{url("ventes/$vente->slug")}}" class="tag-item">
              		{{$vente->name}}
              	</a>
              @endforeach


						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endif

@endsection

@section('footer_scripts')
	<script type="text/javascript">
	$(function () {
	$('[data-toggle="tooltip"]').tooltip()
	})
	</script>
@endsection
