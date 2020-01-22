@extends('layouts.manager')

@section('template_title')
   Tous les utilisateurs
@endsection

@section('template_linked_css')
   
@endsection

@section('breadcrumb')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Utilisateurs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Utilisateurs</li>
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
                <span class="info-box-number">{{ count(\App\Models\User::whereDate('created_at', \Carbon\Carbon::today())->get()) }} <small> inscriptions</small></span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  {{-- 70% Increase in 30 Days --}}
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
                <span class="info-box-text">Comptes clients</span>
                <span class="info-box-number">{{ count(\App\Models\User::all()) }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  <small>Clients qui ont commandé</small>
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
                <span class="info-box-text">Convertion client</span>
                <span class="info-box-number">
<?php 
$convertedUser = 0;
foreach($users as $user){
  if(count($user->orders) > 0){
    $convertedUser += 1;
  }
}
?>{{ substr($convertedUser * 100 / count($users), 0, 5)  }}%

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
         
        </div>
        <!-- /.row -->
      <div class="row">


        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tous les utilisateurs ({{ count(\App\Models\Order::all()) }})</h3>
                 <a href="{{ url("manager/users/create") }}" class="mx-2 text-dark float-right"><i class="fa fa-trash"></i></a>
              <a href="{{ url("manager/users/create") }}" title="Ajouter un nouveau produit" class="text-dark float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Email</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th style="25%">Détails</th>
                  <th>Inscrit le</th>
                  <th>Dernière connexion</th>
                  <th>Dernière IP</th>
                 
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                  <td>
                    {{$user->email}}

                    
                  </td>
                 
                  <td>
                      <small>{{ $user->last_name }}</small>
                  </td>
                  <td>
                     <small> {{ $user->first_name }}</small>
                  </td>

                  <td>

                      @foreach ($user->roles as $user_role)
                                                    @if ($user_role->name == 'User')
                                                        @php $badgeClass = 'primary' @endphp
                                                    @elseif ($user_role->name == 'Admin')
                                                        @php $badgeClass = 'warning' @endphp
                                                    @elseif ($user_role->name == 'Unverified')
                                                        @php $badgeClass = 'danger' @endphp
                                                    @else
                                                        @php $badgeClass = 'default' @endphp
                                                    @endif
                                                    <span class="badge badge-{{$badgeClass}}">
                                                      @if($user_role->name == "User")
                                                      Client
                                                      @else
                                                      {{ $user_role->name }}
                                                      @endif
                                                    </span>
                                                @endforeach
                     @if(!empty($user->profile->phone_number))
                   
                   <span><i class="fa fa-phone text-success" data-toggle="tooltip" title="{{ $user->profile->phone_number ?? "00000" }}"></i></span>
                   @else
                   <span><i class="fa fa-phone text-danger"></i></span>
                   @endif
                  
                   
                   @if(!empty($user->profile->location_address))
                   
                   <span><i class="fa fa-map-marker text-success" data-toggle="tooltip" title="{{ $user->profile->location_address ?? "00000" }}"></i></span>
                   @else
                   <span><i class="fa fa-map-marker text-danger"></i></span>
                   @endif
                  </td>
                    <td>
                        <small>{{ date('d/m/Y', strtotime($user->created_at)) }}
                          </small>
                    </td>
                    <td>
                        <small>{{$user->updated_at->format("Y/m/d H:i:s")}}</small>
                    </td>

                    <td><small>{{ $user->updated_ip_address ?? $user->signup_ip_address  }}</small></td>
                    
                    
                  <td>
                    
                   <a target="_blank" class="btn btn-sm btn-outline-secondary btn-block" href="{{ URL::to('manager/users/' . $user->id ) }}" data-toggle="tooltip" title="Voir les détails">
                                                  Voir <i class="fa fa-eye"></i>
                                                </a>
                    

                    </td>
                </tr>
                @endforeach

                
                 
                </tbody>
                <tfoot>
                <tr>
                 <th>Email</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Inscrit le</th>
                  <th>Dernière connexion</th>
                 <th>Dernière IP</th>
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

