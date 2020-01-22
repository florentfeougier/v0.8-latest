@extends('layouts.front')

@section('meta_title')
  Ventes de plantes d'intérieur à partir de 1€ partout en France
@endsection

@section('meta_description')
  Ventes de plantes d'intérieur à partir de 1€ partout en France
@endsection

@section('template_fastload_css')

  <style type="text/css">
    .circle {
    width: 250px;
    height: 250px;
    border-radius: 50%;
    font-size: 22px;
    color: #fff;
    line-height: 250px;
    text-align: center;
    float:center;
    margin-left:auto;
    margin-right: auto;
    background: #000;
    }

    .block3:hover > .circle {
    	width: 260px;
    	height: 260px;
    	border-radius: 50%;
    	font-size: 22px;
    	color: #fff;
    	line-height: 260px;
    }

    .block3 > .circle a {
    line-height: 260px;
    }

    .circle a {

    font-size: 22px;
    color: #fff;
    line-height: 250px;
    text-align: center;
    float:center;
    margin-left:auto;
    margin-right: auto;

    }

    .modal-dialog {
    		max-width: 800px;
    		margin: 100px auto;
    }

.modal-content {
  width: 60%;
  height:70%;
  overflow: hidden;
  background-color: #FFF;
  opacity: 1;
  position:absolute;

  top:12%;
  left:20%;
}

.modal-close {
  cursor:pointer;
  color: #FFF;
  position: absolute;
  background-color: #000;
  top:70px;
  right:15%;
}

.modal-close:hover {
  background: #FFF;
  color: #000;

}

@media screen and (max-width: 640px) {
  .modal-content {
    width:90%;
    height:50%;
    top:12%;
    left:5%;
  }

  .modal-close {
    top:5px;
    right:10px;
    background-color: #000;

  }
}
    .modal-body {
    position:relative;
    padding:0px;
    }


    .close {
      position: absolute;
      width: 32px;
      height: 32px;
      opacity: 0.3;
    }
    .close:hover {
      opacity: 1;
    }
    .close:before, .close:after {
      position: absolute;
      left: 15px;
      content: ' ';
      height: 33px;
      width: 2px;
      background-color: #FFF;
    }
    .close:before {
      transform: rotate(45deg);
    }
    .close:after {
      transform: rotate(-45deg);
    }





  </style>
@endsection

@section('content')

@guest
@else
  @if( count(Auth::user()->orders->where('payment_status', false))  > 0)
    <div style="z-index:9999; bottom:0px !important; left:10px; right:10px;" class=" position-fixed alert alert-danger alert-dismissible fade show" role="alert">
      Vous avez une commande en attente de paiement <a href="{{url("profile/" . Auth::user()->name . "/commandes")}}">Payer maintenant</a>
    <button type="button" class="alert-close mt-2 close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>


  @endif
@endguest
  @include('welcome.partials.welcome-block')
  @include('welcome.partials.services')
  @include('welcome.partials.prochaines-ventes')
  @include('welcome.partials.box')
  @include('welcome.partials.block-images')
  @include('welcome.partials.video')
  @include('welcome.partials.instagram-feed')

@endsection

@section('modals')

<div id="modal-home_video" class="modal-home_video dis-none" style="position:fixed; z-index:999; left:0; right:0; top:0; bottom:0; background-color: rgba(0,0,0,0.5);">
  <div id="modal-content" class="modal-content" >

  </div>
    <div class="modal-close px-1">
      FERMER
    </div>
</div>

@endsection

@section('fastload_scripts')
  <script>


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
  delayLoop(1800, ["Aloe Vera", "Pilea", "Yucca", "Cactus", "Monstera", "Plantes <img src='{{asset('storage/icons/plant-red.svg')}}' style='line-height:1em;height:1em;display:inline-block;' alt=''> Addict"]);


  document.addEventListener('click', function (event) {

  	// If the clicked element doesn't have the right selector, bail
  	if (!event.target.matches('.modal-home_video-btn')) return;

  	// Don't follow the link
  	event.preventDefault();
    console.log('Video btn clicked');

  	// Log the clicked element in the console
    var modal = document.getElementById("modal-home_video");
    modal.style.display = "block";

    modal.classList.remove("dis-none");
    console.log('showing modal...');

    var frame = '<iframe width="100%" height="100%"  src="https://www.youtube.com/embed/ON4GRUEpWSM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    var getRef = document.getElementById("modal-content");
    var parentDiv = getRef.parentNode;
    getRef.innerHTML = frame;
    console.log(event.target);
    //

  }, false);


    document.addEventListener('click', function (event) {

    	// If the clicked element doesn't have the right selector, bail
    	if (!event.target.matches('.modal-close')) return;

    	// Don't follow the link
    	event.preventDefault();
      console.log('Video btn clicked');

    	// Log the clicked element in the console
      var modal = document.getElementById("modal-home_video");
      modal.style.display = "none";

      modal.classList.add("dis-none");
      console.log('hidding modal...');

      //var frame = '<iframe width="100%" height="100%"  src="https://www.youtube.com/embed/ON4GRUEpWSM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
      var getRef = document.getElementById("modal-content");
      //var parentDiv = getRef.parentNode;
      getRef.innerHTML = "Loading video...";
      console.log(event.target);
      //

    }, false);

  </script>
@endsection

