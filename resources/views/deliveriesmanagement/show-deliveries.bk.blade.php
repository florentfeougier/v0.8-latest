@extends('layouts.admin')

@section('template_title')
    Toutes les livraisons
@endsection

@section('template_linked_css')
    @if(config('deliveriesmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('deliveriesmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .deliveries-table {
            border: 0;
        }
        .deliveries-table tr td:first-child {
            padding-left: 15px;
        }
        .deliveries-table tr td:last-child {
            padding-right: 15px;
        }
        .deliveries-table.table-responsive,
        .deliveries-table.table-responsive table {
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Toutes les livraisons ({{count($deliveries)}})
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('deliveriesmanagement.deliveries-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/manager/deliveries/create">
                                        <i class="fa fa-fw fa-deliverie-plus" aria-hidden="true"></i>
                                        {!! trans('deliveriesmanagement.buttons.create-new') !!}
                                    </a>
                                    <a class="dropdown-item" href="manager/deliveries/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        {!! trans('deliveriesmanagement.show-deleted-deliveries') !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(config('deliveriesmanagement.enableSearchDeliveries'))
                            @include('partials.search-deliveries-form')
                        @endif

                        <div class="table-responsive deliveries-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="deliverie_count">
                                    {{ trans_choice('deliveriesmanagement.deliveries-table.caption', 1, ['deliveriescount' => $deliveries->count()]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                              
                                        <th>Statut</th>
                                        <th>Commande</th>
                                        <th class="hidden-xs">Utilisateur</th>

                                        <th>Point relais</th>
                                        {{-- <th class="hidden-sm hidden-xs hidden-md">{!! trans('deliveriesmanagement.deliveries-table.updated') !!}</th> --}}
                                        <th>{!! trans('deliveriesmanagement.deliveries-table.actions') !!}</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="deliveries_table">
                                    @foreach($deliveries as $deliverie)
                                        <tr>
                                            <td><span class="badge badge-secondary">{{$deliverie->deliverie_id}}</span></td>
                                            
                                            <td>
                                              @if($deliverie->status == "en attente de paiement")
                                              <small class="badge badge-warning">{{$deliverie->status}}</small>
                                            @else
                                              <small class="badge badge-info">{{$deliverie->status}}</small>
                                            @endif

                                             </td>
                                            <td>

                                              @if($deliverie->order == null)
                                                Commande supprimée
                                              @else
                                                <small><a target="_blank" class="text-dark" href="{{url("manager/orders/" . $deliverie->order->order_id )}}">{{$deliverie->order->order_id}}</a></small> </td>

                                              @endif
                                            <td class="hidden-xs"> <small>{{\App\Models\User::where('id', $deliverie->order->user_id ?? 1)->first()->email}}</small> </td>
                                            <td class="hidden-xs">
                                              <span class="badge badge-secondary mr-2">{{$deliverie->pickup_id}}</span>
                                              <small>{{$deliverie->pickup_address ?? 'Aucune adresse'}} {{$deliverie->pickup_postalcode ?? 'Aucun code postal'}} {{$deliverie->pickup_city ?? 'Aucune ville'}}</small> </td>
{{--
                                            <td class="hidden-sm hidden-xs hidden-md">{{$deliverie->created_at}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$deliverie->updated_at}}</td> --}}
                                            <td>
                                                {!! Form::open(array('url' => 'manager/deliveries/' . $deliverie->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Supprimer')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button("<i class='fa fa-trash'></i>", array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Deliverie', 'data-message' => 'Etes vous sur de vouloir supprimer cette livraison ?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('manager/deliveries/' . $deliverie->id) }}" data-toggle="tooltip" title="Voir">
                                                    Détails <i class="fa fa-eye"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('deliveriesmanagement.enableSearchDeliveries'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('deliveriesmanagement.enablePagination'))
                                {{ $deliveries->links() }}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
    @if ((count($deliveries) > config('deliveriesmanagement.datatablesJsStartCount')) && config('deliveriesmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('deliveriesmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('deliveriesmanagement.enableSearchDeliveries'))
        @include('scripts.search-deliveries')
    @endif
@endsection

