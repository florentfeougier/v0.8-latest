@extends('layouts.manager')

@section('template_title')
    Toutes les ventes
@endsection

@section('template_linked_css')
   
@endsection

@section('breadcrumb')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Gérer vos ventes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url("manager/dashboard") }}">Accueil</a></li>
              <li class="breadcrumb-item active">Ventes</li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection

@section('content')
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Toutes vos ventes</h3>
                <a href="{{ url("manager/ventes/create") }}" class="mx-2 text-dark float-right"><i class="fa fa-trash"></i></a>
              <a href="{{ url("manager/ventes/create") }}" title="Ajouter une nouvelle vente" class="text-dark float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Ville</th>
                  <th>Adresse</th>
                  <th>Date</th>
                  <th>Produit(s)</th>
                  <th>Commandes</th>
                  <th>Revenue</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ventes as $vente)
                <tr>
                  <td>
                    @if($vente->is_public)
                     <span class="badge badge-success" data-toggle="tooltip" title="Cette vente est publique et est affichée à tous les visiteurs">{{ $vente->name }}</span>
                    @else
                    <span class="" data-toggle="tooltip" title="Cette vente n'est pas affiché">{{ $vente->name }}</span>
                    @endif
                  </td>
                  <td><small>{{ $vente->location_address }} - {{ $vente->location_postalcode }}</small>
                  
                  @if($vente->show_location == true)
                  
                  @else
                  <i class="fa fa-times text-warning" data-toggle="tooltip" title="N'est pas affiché au visiteur"></i>
                  @endif

                  </td>
                  <td><small>{{ date('Y/m/d', strtotime($vente->date)) }} {{ $vente->horaires }}</small>
                     @if($vente->show_date == true)
                  
                  @else
                  <i class="fa fa-times text-warning" data-toggle="tooltip" title="N'est pas affiché au visiteur"></i>
                  @endif
                  </td>
                  <td><small>{{ count($vente->products) }} actifs</small></td>
                  
                  <td><small>{{ count(\App\Models\Order::where("cart", $vente->slug)->where('payment_status', true)->get()) }} validées</small></td>
                  
                  <td>
                    <?php 
                    $venteRevenue = 0;
                    foreach(\App\Models\Order::where("cart", $vente->slug)->where('payment_status', true)->get() as $venteOrder){
                      $venteRevenue += $venteOrder->amount;
                    }
                    ?>
                    <small>{{ $venteRevenue }}€</small>
                  </td>
                  <td>
                    @if($vente->status == "active")
                    <small>En cours</small>
                    @elseif($vente->status == "closed")
                    <small>Terminé</small>
                    @endif
                  </td>
                  <td>
                     <a target="_blank" class="btn btn-sm btn-outline-secondary " href="{{ URL::to('manager/ventes/' . $vente->id . "/edit") }}" data-toggle="tooltip" title="Modifier cette vente">
                                                   <i class="fa fa-edit"></i>
                                                </a>
                     <a target="_blank" class="btn btn-sm btn-outline-secondary " href="{{ URL::to('manager/ventes/' . $vente->id) }}" data-toggle="tooltip" title="Voir les détails">
                                                  Voir <i class="fa fa-eye"></i>
                                                </a>
                    
                    

                    </td>
                </tr>
                @endforeach

                
                 
                </tbody>
                <tfoot>
                <tr>
                  <th>Ville</th>
                  <th>Adresse</th>
                  <th>Date</th>
                  <th>Produit(s)</th>
                  <th>Commandes</th>
                  <th>Revenue</th>
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
  
<script>
  $(function () {
  
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "responsive": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
    @include('scripts.tooltips')

@endsection

