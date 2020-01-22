@extends('layouts.manager')

@section('template_title')
    Toutes les commandes
@endsection

@section('template_linked_css')
   <style>
         .dt-buttons {
   
       /* margin-bottom: -7px; */
    position: absolute;
    bottom: 0;
    left: 0;
    padding: 15px;

    text-align: center;
    }
   </style>
@endsection

@section('breadcrumb')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Commandes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Commandes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection

@section('content')
 <!-- Main content -->
    <section class="content">

       <!-- =========================================================== -->
        <div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Aujourd'hui</span>
                <span class="info-box-number">{{ count(\App\Models\Order::whereDate('created_at', \Carbon\Carbon::today())->get()) }} <small>commandes au total</small></span>

                <div class="progress">
                 <?php
                  $paid = 0;
                  foreach(\App\Models\Order::where('created_at', '>=', \Carbon\Carbon::today())->where('payment_status', true)->get() as $order)
                    if($order->payment_status == true){
                  $paid += 1;
                  }

                  $percentagePaid = $paid * 100 / count($orders);

                  ?>
                  <div class="progress-bar" style="width: {{ $percentagePaid }}%"></div>
                </div>
                <span class="progress-description">
                  @if(count($orders) > 0)
{{ $percentagePaid }}% payées
                  @else
                   0% payées
                  @endif
                 
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cette semaine</span>
                <span class="info-box-number"> <?php
                  $weeklyOrders = 0;

                  foreach(\App\Models\Order::where('payment_status', true)->whereBetween('created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->get() as $order){

                  $weeklyOrders += 1;
                    
                  }
                  ?>
                    {{ $weeklyOrders }} <small>commandes au total</small>
                  </span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  70% Increase in 30 Days
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Revenue</span>
                <span class="info-box-number"><?php
            $todayRevenue = 0;
            foreach(\App\Models\Order::where('created_at', '>=', \Carbon\Carbon::today())->where('payment_status', true)->get() as $order){

              $todayRevenue = $todayRevenue + $order->amount;
            }
            ?>
          {{$todayRevenue}}€ <small>aujourd'hui</small></span>


                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                    <?php
                  $weeklyRevenue = 0;

                  foreach(\App\Models\Order::where('payment_status', true)->whereBetween('created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->get() as $order){

                  $weeklyRevenue += $order->amount;
                    
                  }
                  ?>

                  {{ $weeklyRevenue }}€ cumulé cette semaine
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
        </div>
        <!-- /.row -->
      <div class="row">


        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Toutes les commandes ({{ count(\App\Models\Order::all()) }})</h3>
                 <a href="{{ url("manager/orders/create") }}" class="mx-2 text-dark float-right"><i class="fa fa-trash"></i></a>
              <a href="{{ url("manager/orders/create") }}" title="Ajouter un nouveau produit" class="text-dark float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
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
                @foreach($orders as $order)
                <tr>
                  <td>
                    
                    {{$order->order_id}}
                  </td>
                    <td>
                        <small data-toggle="tooltip" title="{{$order->created_at->format("Y/m/d H:i:s")}}">{{$order->created_at->format("Y/m/d")}}</small>
                    </td>
                    <td><small>
                      @if($order->cart == "shop")
                      <a target="_blank" href="{{ url("manager/orders/filters/shop") }}" class="text-dark">shop</a>

                  @if($order->deliverie != null)
                    @if($order->deliverie->completed == true)
                       <a data-toggle="tooltip" title="Cette commande a été envoyé au client" target="_blank" href="{{ url("manager/deliveries/" . $order->deliverie->id) }}"><i class="text-success fa fa-rocket"></i></a>

                    @else
                       <a data-toggle="tooltip" title="La commande n'a pas encore été traité" target="_blank" href="{{ url("manager/deliveries/" . $order->deliverie->id) }}"><i class="text-secondary fa fa-rocket"></i></a>

                    @endif
                  @endif
                  
               
                      @else
                      <a data-toggle="tooltip" title="Voir toutes les commandes de ce type">{{ $order->cart }}
                     
                     </a>
                      
                      @endif
                    </small></td>
                    <td><small ><a href="{{ url("manager/users/" . $order->user->id) }}" target="_blank" class="text-dark" data-toggle="tooltip" title="{{ $order->user->first_name . " " . $order->user->last_name }}">{{ $order->user->email }}</a></small>

                 

                    </td>
                  <td>
                    <small>{{ $order->amount }}€
                      

                    </small>
                  </td>
                  <td>
                    @if($order->payment_status == true)
                      <a title="Voir les détails du paiement" href="{{ url("manager/payments/" . $order->payment_id ?? "deleted") }}" target="_blank" class="badge badge-success">
                       via {{ $order->payment_method ?? "CB" }}</a>
                      @else
                      <span data-toggle="tooltip" title="Le client a été redirigé vers la page de paiement mais n'a pas encore validé la transaction" class="badge badge-secondary">Aucun</span>
                      @endif
                  </td>
                  
                    <td>

                    @if($order->payment_status == true)

                      @if($order->cart == "shop")

                        @if($order->deliverie != null)
                        
                          @if($order->closed == true && $order->deliverie->completed == true)
                            <small class="badge badge-success">Colis expédié</small>
                          @elseif($order->status == "doing")
                            <small class="badge badge-info">Colis en préparation...</small>
                          @elseif($order->status == "done")
                            <small class="badge badge-info">Colis préparé</small>
                          @else
                            <small class="badge badge-secondary">A préparer...</small>
                          @endif
                        @else
                          <small>Livraison supprimé</small>
                        @endif

                      
                      @else
                         @if($order->closed == true)
                        <small class="badge badge-success">Receptionnée</small>
                        @else
                        <small class="badge badge-secondary">En cours....</small>
                        @endif

                      @endif


                    @else
                     <small class="badge badge-warning">En attente de paiement...</small>
                    @endif



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
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('footer_scripts')
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
       "order": [],
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

    @include('scripts.tooltips')
@endsection

