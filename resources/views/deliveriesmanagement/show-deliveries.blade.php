@extends('layouts.manager')

@section('template_title')
    Toutes les livraisons
@endsection

@section('template_linked_css')
   
@endsection

@section('breadcrumb')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Livraisons</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">livraisons</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection

@section('content')
 <!-- Main content -->
    <section class="content">

       {{-- <!-- =========================================================== -->
        <div class="row">
          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Aujourd'hui</span>
                <span class="info-box-number">41 <small>livraisons</small></span>

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
          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Expédiées</span>
                <span class="info-box-number">41,410 livraisons</span>

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
          
          
        </div> --}}
        <!-- /.row -->
      <div class="row">


        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Toutes les livraisons ({{ count(\App\Models\Deliverie::all()) }})</h3>
                 <a href="{{ url("manager/products/create") }}" class="mx-2 text-dark float-right"><i class="fa fa-trash"></i></a>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Commande</th>
                  <th>Crée le</th>
                  <th>Utilisateur</th>
                  <th>Destination</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($deliveries as $deliverie)
                @if($deliverie->order != null && $deliverie->order->payment_status == true && $deliverie->order->payment_id != null)
                <tr>
                  <td>
                    {{$deliverie->deliverie_id}}
                  </td>
                  <td>
                    <small>

                    
            @if($deliverie->order != null && $deliverie->order->payment_status == true)
                      <a class="text-dark" target="_blank" href="{{ url("manager/orders/") }}/{{$deliverie->order->order_id ?? "deleted"}}">{{$deliverie->order->order_id ?? "Supprimée"}}
                        </a>
                    @else
                    <p>Non payée</p>
                    @endif
                    

                    </small>
                  </td>
                    <td>
                        <small>{{$deliverie->created_at->format("Y/m/d")}}</small>
                    </td>
                  
                    <td><small>
                      <a data-toggle="tooltip" title="" target="_blank" href="{{ url("manager/users/") }}/{{ $deliverie->order->user->id ?? "deleted" }}" class="text-dark">{{ $deliverie->order->user->email ?? "Inconnu" }}

                   
                   @if(!empty($deliverie->order->user->profile->phone_number))
                   
                   <i class="fa fa-phone text-success" data-toggle="tooltip" title="{{ $deliverie->order->user->profile->phone_number ?? "00000" }}"></i>
                   @else
                   <i class="fa fa-phone text-danger"></i>
                   @endif
                  
                   
                   @if(!empty($deliverie->order->user->profile->location_address))
                   
                   <i class="fa fa-map-marker text-success" data-toggle="tooltip" title="{{ $deliverie->order->user->profile->location_address ?? "00000" }}"></i>
                   @else
                   <i class="fa fa-map-marker text-danger"></i>
                   @endif

                      </a></small></td>
                  <td>
                    <small >

                      <a data-toggle="tooltip" title="Identifiant du point relais" href="" class="badge badge-secondary">{{ $deliverie->pickup_id }}</a> 
                    <span data-toggle="tooltip" title="{{ $deliverie->pickup_name }} | {{ $deliverie->pickup_address }} - {{ $deliverie->pickup_postalcode }}, {{ $deliverie->pickup_city }}">
                        {{ $deliverie->pickup_postalcode }} {{ $deliverie->pickup_city }}
                      
                    </span>

                    

                    </small>
                  </td>
                  <td>
                    @if($deliverie->order != null && $deliverie->order->payment_status == true)
                    @if($deliverie->completed == true)

                      <a href="{{ $deliverie->shipment_tracking_url ?? url("manager/deliveries/" . $deliverie->id) }}" target="_blank" title="Suivre le colis {{ $deliverie->tracking_id ?? "#000" }}" data-toggle="tooltip" class="badge badge-success">Colis {{ $deliverie->tracking_id ?? "#000" }} expédié </a>
                      @elseif($deliverie->status == "doing")
                      <span class="badge badge-info">Colis en préparation...</span>
                      @else
                      <span class="badge badge-secondary">A traiter</span>
                      @endif
                      @else
                      <span class="badge badge-danger">Non payé</span>
                      @endif

                  </td>
                  
                                 
                  <td>
                   
                     <a target="_blank" class="btn btn-sm btn-outline-secondary btn-block" href="{{ URL::to('manager/deliveries/') }}/{{ $deliverie->id }}" data-toggle="tooltip" title="Voir les détails">
                                                  Voir <i class="fa fa-eye"></i>
                                                </a>
                    
                    

                    </td>
                </tr>
                @endif
                @endforeach

                
                 
                </tbody>
                <tfoot>
                <tr>
                   <th>#</th>
                  <th>Commande</th>
                  <th>Ajoutée le</th>
                  <th>Utilisateur</th>
                  <th>Destination</th>
                  <th>Statut</th>
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

