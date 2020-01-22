@extends('layouts.manager')

@section('template_title')
    Toutes les fiches d'entretien
@endsection

@section('template_linked_css')
   
@endsection

@section('content')
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Toutes vos fiches d'entretien</h3>
                <a href="{{ url("manager/fiches/create") }}" class="mx-2 text-dark float-right"><i class="fa fa-trash"></i></a>
              <a href="{{ url("manager/fiches/create") }}" title="Ajouter une nouvelle vente" class="text-dark float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Produit(s) associé(s)</th>
            
                  <th>Modifié le</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fiches as $fiche)
                <tr>
                  <td style="width:auto;">
                    {{ $fiche->name }}
                  </td>
                  <td style="width:40%;">
                      @foreach($fiche->products as $product)
                      <small><a class=" text-underline text-dark" href="{{ url("manager/products/" . $product->id) }}">{{ $product->name }} </a>,</small> 

                      @endforeach
                  </td>
                  <td style="width:15%;"><small>{{ $fiche->updated_at }}</small></td>
                  
                  <td style="width:25%;">
                    <a href="{{ url("manager/fiches/" . $fiche->id . "/clone") }}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Cloner cette fiche"><i class="fa fa-clone" title="Cloner cette fiche"></i></a>
                     <a class="btn btn-sm btn-outline-secondary" href="{{ URL::to('manager/fiches/' . $fiche->id ."/edit") }}" data-toggle="tooltip" title="Voir les détails">
                                                  Modifier <i class="fa fa-edit"></i>
                                                </a>
                     <a target="_blank" class="btn btn-sm btn-outline-secondary" href="{{ URL::to('fiches-entretien/' . $fiche->slug) }}" data-toggle="tooltip" title="Voir cette fiche">
                                                  Voir <i class="fa fa-eye"></i>
                                                </a>
                    

                    </td>
                </tr>
                @endforeach

                
                 
                </tbody>
                <tfoot>
                <tr>
                  <th>Nom</th>
                  <th>Produit(s)</th>
                  <th>Modifié le</th>
                 
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
      "autoWidth": true
    });
  });
</script>
@endsection

