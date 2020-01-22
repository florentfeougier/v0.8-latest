@extends('layouts.front')
@section('template_title')
Nos box 
@endsection

@section('og')
  <meta name="og:site_name" content="Plantes Addict">
  <meta name="og:title" property="og:title" content="  ">
  <meta property="og:description" content="  " />
  <meta property="og:type" content="siteweb" />
  <meta property="og:local" content="fr_FR" />
  <meta property="og:url" content="{{url("/")}}" />
  <meta property="og:image:secure_url" content="{{asset("storage/plantesaddict-logo-big.png")}}" />
@endsection

@section('meta_description')


@endsection
@section('template_linked_css')

<style>


.dummy {
  margin-top: 100%;
}
.thumbnail {
  position: absolute;
  top: 15px;
  bottom: 0;
  left: 15px;
  right: 0;
  text-align:center;
  line-height: 50%;
  padding-top:calc(50% - 30px);
}
</style>

@endsection

@section('content')


  @if (session('message'))
      <div class="alert alert-{{ Session::get('status') }} status-box alert-dismissable fade show" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">
              &times;
              <span class="sr-only">
                  {!! trans('laravelblocker::laravelblocker.flash-messages.close') !!}
              </span>
          </a>
          {!! session('message') !!}
      </div>
  @endif

  @if (session('success'))
      <div class="alert alert-success alert-dismissable fade show" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">
              &times;
              <span class="sr-only">
                  {!! trans('laravelblocker::laravelblocker.flash-messages.close') !!}
              </span>
          </a>
          <h4>
              <i class="icon fa fas fa-check fa-fw" aria-hidden="true"></i>
              {!! trans('laravelblocker::laravelblocker.flash-messages.success') !!}
          </h4>
          {!! session('success') !!}
      </div>
  @endif

  @if(session()->has('status'))
      @if(session()->get('status') == 'wrong')
          <div class="alert alert-danger status-box alert-dismissable fade show" role="alert">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">
                  &times;
                  <span class="sr-only">
                      {!! trans('laravelblocker::laravelblocker.flash-messages.close') !!}
                  </span>
              </a>
              {!! session('message') !!}
          </div>
      @endif
  @endif

  @if (session('error'))
      <div class="alert alert-danger alert-dismissable fade show" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">
              &times;
              <span class="sr-only">
                  {!! trans('laravelblocker::laravelblocker.flash-messages.close') !!}
              </span>
          </a>
          <h4>
              <i class="icon fa fas fa-warning fa-fw" aria-hidden="true"></i>
              {!! trans('laravelblocker::laravelblocker.flash-messages.error') !!}
          </h4>
          {!! session('error') !!}
      </div>
  @endif

  @if (session('errors') && count($errors) > 0)
      <div class="alert alert-danger alert-dismissable fade show" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">
              &times;
              <span class="sr-only">
                  {!! trans('laravelblocker::laravelblocker.flash-messages.close') !!}
              </span>
          </a>
          <h4>
              <i class="icon fa fas fa-warning fa-fw" aria-hidden="true"></i>
              <strong>
                  {!! trans('laravelblocker::laravelblocker.flash-messages.whoops') !!}
              </strong>
              {!! trans('laravelblocker::laravelblocker.flash-messages.someProblems') !!}
          </h4>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>
                      {!! $error !!}
                  </li>
              @endforeach
          </ul>
      </div>
  @endif

<!------------------------------>
<!--         Heading          -->
<!------------------------------>
<section class="jumbotron text-center " style="border-radius:0;background-image: url({{asset('storage/images/ventes-bg-index.jpg')}});background-size: cover;">
  <div class="container">

    <!-- Title -->
    <h1 class="animated zoomIn mb-2 fontsize-8 font-2b font-bold text-white text-center jumbotron-heading"> Nos boxes</h1>

    <p class="animated lead zoomIn text-white pb-2">Surprise, personnalisable, colorés...</p>

    <h2 class="lead my-2 text-white animated zoomIn">Commander et personaliser votre box de plantes simplement</h2>

    <!-- Newsletter form -->
    <p class="text-center animated flipInX">
      <form action="{{url('newsletter/subscribe')}}" id="newsletter-form" enctype="multipart/form-data" method="get" class="animated flipInX ml-auto mr-auto newsletter-form" >
        {{csrf_field()}}
           <input id="input_subscribe" type="email" class="text-white" name="user_email" id="email" placeholder="Addresse E-mail..." required>
           <button type="submit" class="add-to-newsletter button hov4">S'inscrire</button>
      </form>
    </p>

  </div>
</section>


<!------------------------------>
<!--        List sales        -->
<!------------------------------>
<section class="instagram p-t-0">
  <div class="container animated bounceInUp">

  		<div id="sales" class="flex-w rs1-block4 mb-4">

        @foreach($boites as $boite)
        <div class="block4 wrap-pic-w p-1 animated slideInUp">
          <div class="block4-square" style="position:relative;width:100%;height:400px; line-height:400px; background:{{$boite->color_code}};">
            <h3 class="text-center my-auto" style="line-height:400px;" >{{$boite->name}}</h3>
          </div>
          <a href="{{url("ventes/$boite->slug")}}" class="block4-overlay sizefull ab-t-l trans-0-4">
            <span class="block4-overlay-heart  text-white  flex-m trans-0-4 p-4">

              <span class="p-t-2 ">
                <img src="{{asset("storage/icons/calendar-w.svg")}}" style="width:20px;margin:0; padding:0;"width="20px" height="15px" alt="Date de l'evenement">
                {{ date('d/m/Y', strtotime($boite->date)) }} de {{$boite->horaires}}</span>
            </span>

            <div class="block4-overlay-txt trans-0-4 p-4">
              <h3 class="text-white">{{$boite->name}}</h3>
              <p class="s-text10 m-b-15 h-size1 of-hidden">
                {{substr($boite->description, 0, 180)}}...
              </p>

              <span class="s-text9 text-white">
                <img  src="{{asset("storage/icons/marker-w.svg")}}" style="width:20px;margin:0; padding:0;" width="20px" height="15px" alt="Lieu de la vente">
@if($boite->show_location == true)
   {{ $boite->location_address }} - {{$boite->location_postalcode}}
@else
  Lieu non dévoilé
@endif
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
<script type="text/javascript">


  function delayLoop(delay, messages) {
    console.log('delayLoop');
    var time = 0;

    messages.forEach(function(value) {
        setTimeout(function()
        {
            document.getElementById("message").innerHTML = value;
        }, time)
        time += delay;
    });
  }
  delayLoop(1500, ["à Valence", "à Bordeaux", "à Nice", "à Strasbourg", "à Lyon", "à Montélimar", "à Annecy", "Partout en France"]);






</script>

@endsection

