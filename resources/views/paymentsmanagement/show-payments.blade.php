@extends('layouts.manager')

@section('template_title')
    Toutes les paiements
@endsection

@section('template_linked_css')
   
@endsection

@section('breadcrumb')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Paiements</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Paiements</li>
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
              <h3 class="card-title">Tous les paiements ({{ count(\App\Models\Payment::where('response_code', "00000")->get()) }} acceptés sur {{ count(\App\Models\Payment::all()) }})</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Commande</th>
                  <th>Utilisateur</th>
                  <th>Montant</th>
                  <th>Transaction</th>
                  <th>Méthode</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                <tr>
                  <td>
                    {{$payment->ref_id}}
                  </td>
                    <td>
                        <small>{{$payment->created_at->format("Y/m/d H:i:s")}}</small>
                    </td>
                    <td><small>
                      <a href="{{ url("manager/orders/") }}/{{ $payment->order->order_id ?? "deleted" }}">{{ $payment->order->order_id ?? "Commande supprimée" }}</a>
                    </small></td>
                    <td><small ><a href="{{ url("manager/users/") }}/{{ $payment->order->user->id ?? "deleted" }}" target="_blank" class="text-dark">{{ $payment->user->email ?? "Inconnu" }}</a></small></td>
                  <td>
                    <small>{{ $payment->amount }}€
                      

                    </small>
                  </td>
                  <td>
                    @if($payment->response_code == "00000")
                      <span class="badge badge-success">{{ $payment->transaction_number ?? "Aucun" }}</span>
                      
                    @elseif($payment->response_code == "00151")
                      
                      <span class="badge badge-danger">Refusé</span>
                    @else
                      <span class="badge badge-warning">En attente...</span>
                  @endif
                  </td>

                  <td>
                    <small>{{ $payment->payment_method ?? "Aucune" }}</small>
                  </td>
                  
                                 
                  <td>
                      <a target="_blank" class="btn btn-sm btn-outline-secondary btn-block" href="{{ URL::to('manager/payments/' . $payment->id) }}" data-toggle="tooltip" title="Voir les détails">
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
      "order": [],
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

