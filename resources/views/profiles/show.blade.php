@extends('layouts.user')

@section('template_fastload_css')

@endsection

@section('content')


  	@if(session()->has('error'))
  		<div style="z-index:9999; bottom:0px !important; left:10px; right:10px;" class=" position-fixed alert alert-danger alert-dismissible fade show" role="alert">
  	   	{!! session()->get('error') !!}
  	  <button type="button" class="alert-close mt-2 close" data-dismiss="alert" aria-label="Close">
  	    <span aria-hidden="true">&times;</span>
  	  </button>
  	</div>


  	@endif

  	@if(session()->has('success'))
  		<div style="z-index:9999; bottom:0px !important; left:10px; right:10px;" class=" position-fixed alert alert-success alert-dismissible fade show" role="alert">
  	   	{!! session()->get('success') !!}
  	  <button type="button"  class="alert-close mt-2 close" data-dismiss="alert" aria-label="Close">
  	    <span aria-hidden="true">&times;</span>
  	  </button>
  	</div>


  	@endif

  	@if ($message = Session::get('warning'))

  	<div style="z-index:9999; bottom:0px !important; left:10px; right:10px;" class=" position-fixed alert alert-warning alert-dismissible fade show" role="alert">
     	{!! session()->get('warning') !!}
    <button type="button" class="alert-close mt-2 close" data-dismiss="alert" aria-label="Close">
      <span class="" style="display:block; line-height:20px;" aria-hidden="true">&times;</span>
    </button>
  </div>


  	@endif

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<div class="main-content">
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
<div class="container-fluid">
<!-- Brand -->
<a class="h5 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{url("home")}}" >Compte client </a>


<!-- Form -->
<div class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">

</div>

</div>
</nav>
<!-- Header -->
<div class="header d-flex align-items-center" style="min-height: 400px; background-image: url(https://images.pexels.com/photos/1078058/pexels-photo-1078058.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260); background-size: cover; background-position: center top;">
<!-- Mask -->
<span class="mask bg-gradient-default opacity-8"></span>
<!-- Header container -->
<div class="container-fluid d-flex align-items-center">
<div class="row">
<div class="col-lg-12">
<h1 class="text-white">Bonjour {{ucfirst(Auth::user()->name)}}</h1>
<p class="text-white ">Bienvenue sur votre espace client. Vous pouvez voir vos commandes, retrouvez vos achats et les fiches d'entretien associés, ainsi que des astuces et un groupe d'entraide!</p>
<a href="{{url('shop')}}" class="btn btn-success">Aller sur le shop</a>
<a href="{{url('profile/' . Auth::user()->name . '/commandes')}}" class="btn btn-secondary">Voir mes commandes</a>

</div>
</div>
</div>
</div>
@include('pages.user.profile-info')

</div>
</div>
</div>
<div class="col-xl-8 order-xl-1">
<div class="card shadow">
<div class="card-header bg-white border-0">
<div class="row align-items-center">
<div class="col-8">
<h3 class="mb-0">Votre compte</h3>
</div>
<div class="col-4 text-right">
{{-- <a href="mailto:contact@plantesaddict.fr" class="btn btn-sm btn-secondary">Contacter le support</a> --}}
</div>
</div>
</div>
<div class="card-body">

<h6 class="heading-small text-muted mb-4">Voici le résumé de vos commandes</h6>

<div class="table-responsive">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Montant</th>
      <th scope="col">Paiement</th>
    </tr>
  </thead>
  <tbody>
    @if(count(Auth::user()->orders) > 0)
    @foreach(Auth::user()->orders as $order)
    <tr>
      <th scope="row"> <a href="{{url("profile/" . Auth::user()->name . "/commandes/" . $order->order_id)}}">{{$order->order_id}}</a> </th>
      <td>{{$order->created_at}}</td>
      <td>{{$order->amount}}€</td>
      <td>
        @if($order->status == "payed")
          <a href="{{url("compte/paiements/$order->payment_id")}}" class="badge badge-pill badge-success">Validé</a> </td>

        @else
          <a href="{{url("compte/commandes/$order->order_id")}}" class="badge badge-pill badge-warning">Payer maintenant</a> </td>

        @endif
    </tr>
    @endforeach

  @endif

  </tbody>
</table>
</div>

<hr class="my-4">
<!-- Address -->


</div>
</div>
</div>
</div>
</div>
<footer class="footer">
<div class="row align-items-center justify-content-xl-between">
<div class="col-xl-6 m-auto text-center">
<div class="copyright">
  <p>Si vous rencontrez un problème ou avez des questions, contactez-nous en <a href="mailto:contact@plantesaddict.fr" target="_blank">cliquant-ici</p>
</div>
</div>
</div>
</footer>






@endsection

