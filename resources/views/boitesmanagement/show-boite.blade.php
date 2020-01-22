





@extends('layouts.manager')

@section('template_title')
  Vente de {{ $vente->name }}
@endsection

<?php
  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
?>
  <?php     $sold = []; ?>


@section('breadcrumb')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vente de {{ $vente->name }} du {{ date('d/m/Y', strtotime($vente->date)) }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url("manager/dashboard") }}">Accueil</a></li>
              <li class="breadcrumb-item"><a href="{{ url("manager/ventes") }}">Ventes</a></li>
              <li class="breadcrumb-item active">{{ $vente->slug }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection

@foreach(\App\Models\Order::where('cart', $vente->slug)->where('payment_status', true)->get() as $order)
  
    <?php

    foreach($order->products as $product){

      if(array_key_exists("$product->slug", $sold)){
        $sold["$product->slug"] += $product->pivot->quantity;

      }else {
        $sold["$product->slug"] = $product->pivot->quantity;

      }
    }


    ?>
@endforeach

@section('content')

<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Détails</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Ouvrir">
              <i class="fas fa-minus"></i></button>
           
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Commandes</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ count(\App\Models\Order::where('cart', $vente->slug)->where('payment_status', true)->get()) }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Revenues total</span>
                      <span class="info-box-number text-center text-muted mb-0">
                         <?php $revenue = 0;
                  foreach(\App\Models\Order::where('cart',$vente->slug)->where('payment_status', true)->get() as $order){

                    $revenue += $order->amount;
                  }
                  ?>
     {{$revenue}}€


                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Produits en vente</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ count($vente->products) }} <span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Produit(s) disponible</h4>
                    

                    <div class="post">
                      <div class="user-block">
                        {{-- <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                        </span>
                        <span class="description">Shared publicly - 5 days ago</span> --}}
                      </div>
                      <!-- /.user-block -->
                      <p>
                        @if(count($vente->products) > 0)
                        @foreach($vente->products as $product)
                        <a data-toggle="tooltip" title="

                        @foreach($sold as $a => $s)
                              @if($a == $product->slug)
                              {{ $s ?? "0" }} vendues
                              @endif
                        @endforeach


                         " href="" class="mx-2 badge text-secondary" target="_blank">{{ $product->name }}</a>
                        @endforeach
                        @else
                        <p>Aucun produit n'est associé à cette vente.</p>
                        @endif
                      </p>

                      <p>
                        <a href="#sold-products" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Liste des produits vendues</a>
                      </p>
                       <h5 class="mt-5 text-muted">Export des données</h5>
              <ul class="list-unstyled">
                
                <li>
                  <a target="_blank" href="{{url("manager/ventes/" . $vente->id . "/export-orders")}}" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> Liste des commandes (texte)</a>
                </li>
                <li>
                  <a target="_blank" href="{{url("manager/ventes/" . $vente->id . "/export-orders-mailing-list")}}" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Liste des emails clients</a>
                </li>
                
                <li>
                  <a href="#sold-products" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Liste des produits vendues




                  </a>
                </li>
              </ul>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <img height="140px" src="{{ url("$vente->thumbnail") }}" class="img-fluid mb-2 rounded" alt="">
              <h4 class="text-secondary"><i class="fa fa-map-marker"></i> {{ $vente->location_address }} {{ $vente->city }}</h4>
              <h4 class="text-secondary"><i class="fa fa-calendar"></i> {{ $vente->date }}</h4>
              <p class="text-muted">{{ $vente->description }}</p>
             
              
             
              <div class="text-center mt-5 mb-3">
                <a href="{{ url("manager/ventes/$vente->id/edit") }}" class="btn btn-sm btn-secondary">Modifier cette vente</a>
                
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


<!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Commandes ({{ count(\App\Models\Order::where('cart', $vente->slug)->where('payment_status', true)->get()) }} payées sur {{ count(\App\Models\Order::where('cart', $vente->slug)->get()) }} )</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Ouvrir">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Panier</th>
                  <th>Utilisateur</th>
                  <th>Montant</th>
                  <th>Paiement</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Order::where('cart', $vente->slug)->get() as $order)
                <tr>
                  <td>
                    {{$order->order_id}}
                  </td>
                    <td>
                        <small>{{$order->created_at->format("Y/m/d H:i:s")}}</small>
                    </td>
                    <td><small>
                      @if($order->cart == "shop")
                      shop
                      @else
                      <a  target="_blank" class="text-dark" href="{{ url("manager/ventes/" . \App\Models\Vente::where('slug', $order->cart)->first()->slug) }}">{{ \App\Models\Vente::where('slug', $order->cart)->first()->name }} le {{ date('d/m/Y', strtotime($vente->date)) }}</a>
                      @endif
                    </small></td>
                    <td><small ><a data-toggle="tooltip" title="{{ $order->user->first_name }} {{ $order->user->last_name }}" href="{{ url("manager/users/" . $order->user->id) }}" target="_blank" class="text-dark">{{ $order->user->email }}</a>

                        @if(!empty($order->user->profile->phone_number))
                   
                   <i class="fa fa-phone text-success" data-toggle="tooltip" title="{{ $order->user->profile->phone_number ?? "00000" }}"></i>
                   @else
                   <i class="fa fa-phone text-danger"></i>
                   @endif
                  
                   
                   @if(!empty($deliverie->order->user->profile->location_address))
                   
                   <i class="fa fa-map-marker text-success" data-toggle="tooltip" title="{{ $deliverie->order->user->profile->location_address ?? "00000" }}"></i>
                   @else
                   
                   @endif

                    </small></td>
                  <td>
                    <small>{{ $order->amount }}€
                      

                    </small>
                  </td>
                  <td>
                    @if($order->payment_status == true)
                      <a href="{{ url("manager/payments/" . $order->payment_id ?? "deleted") }}" target="_blank" class="badge badge-success">Payé via {{ $order->payment_method ?? "CB" }}</a>
                      @else
                      <span class="badge badge-warning">En attente de paiement</span>
                      @endif
                  </td>
                  
                        <td>
                          <span class="badge badge-secondary">En cours...</span>
                        </td>         
                  <td>
                     <a target="_blank" class="btn btn-sm btn-outline-secondary btn-block" href="{{ URL::to('manager/orders/' . $order->id) }}" data-toggle="tooltip" title="Voir les détails">
                                                  Voir <i class="fa fa-eye"></i>
                                                </a>

                    </td>
                </tr>
                @endforeach

                
                 
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Panier</th>
                  <th>Utilisateur</th>
                  <th>Montant</th>
                  <th>Paiement</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->




<!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 id="sold-products" class="card-title">Liste des produits vendus
   <?php
$totalItemsSold = 0;

foreach($sold as $a => $s){
  $totalItemsSold += $s;
}
        ?>
        ({{ $totalItemsSold }})
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Ouvrir">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Produit</th>
                  <th>Stock</th>
                  <th>Quantité vendue</th>
                  
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  
                    @foreach($sold as $a => $s)
                    <tr>
                      <td style="width:90%">
                        {{ \App\Models\Product::where('slug', $a)->first()->name }}
                      </td>
                      <td style="width:20%"><small>{{ \App\Models\Product::where('slug', $a)->first()->stock }}</small></td>
                      <td><small>{{ $s }} vendues</small></td>
                      <td>
                        <a data-toggle="tooltip" title="Modifier ce produit" href="{{ url("manager/products/") }}" class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                   
                              {{-- <a href="{{url("manager/products/$a")}}" class="mb-2 btn btn-outline-success">
                                {{\App\Models\Product::where('slug', $a)->first()->name}} -
                               {{$s}} vendues</a> --}}
                   @endforeach
                  
               

                
                 
                </tbody>
                <tfoot>
                <tr>
                  <th>Produit</th>
                  <th>Stock</th>
                  <th>Quantité vendue</th>
                  
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->

@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')
  @if(config('usersmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif

  <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script>

    
  $(function () {
  
    $('#example1').DataTable({
      "paging": true,
      "pageLength": 50,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "responsive": true,
      "info": true,
      "autoWidth": true,
      "dom": 'Bfrtip',
        "buttons": [
            'excel',
            'pdf',
            'copy'
        ]
    });

   $('#example2').DataTable({
      "paging": true,
      "pageLength": 50,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "responsive": true,
      "info": true,
      "autoWidth": true,
      "dom": 'Bfrtip',
        "buttons": [
            'excel',
            'pdf',
            'copy'
        ]
    });
  });
</script>
@endsection



