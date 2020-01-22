@extends('layouts.admin')

@section('template_title')
    Toutes les ventes
@endsection

@section('template_linked_css')
    @if(config('ventesmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('ventesmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .ventes-table {
            border: 0;
        }
        .ventes-table tr td:first-child {
            padding-left: 15px;
        }
        .ventes-table tr td:last-child {
            padding-right: 15px;
        }
        .ventes-table.table-responsive,
        .ventes-table.table-responsive table {
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
                                Tous les ventes ({{count($ventes)}})
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('ventesmanagement.ventes-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/manager/ventes/create">
                                        <i class="fa fa-fw fa-vente-plus" aria-hidden="true"></i>
                                        Ajouter une vente
                                    </a>
                                    <a class="dropdown-item" href="manager/ventes/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        Voir les ventes supprimées
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(config('ventesmanagement.enableSearchUsers'))
                            @include('partials.search-ventes-form')
                        @endif

                        <div class="table-responsive ventes-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="vente_count">
                                    {{ trans_choice('ventesmanagement.ventes-table.caption', 1, ['ventescount' => $ventes->count()]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>{!! trans('ventesmanagement.ventes-table.name') !!}</th>
                                        <th class="hidden-xs">Date</th>
                                        <th class="hidden-xs">Adresse</th>
                                        <th class="hidden-xs">Commandes</th>


                                        <th>{!! trans('ventesmanagement.ventes-table.actions') !!}</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="ventes_table">
                                    @foreach($ventes as $vente)
                                        <tr>

                                            <td>
                                              @if($vente->is_public == true)
                                              <span class="badge badge-success">{{$vente->name}}</span>
                                            @else
                                              <span class="badge badge-secondary">{{$vente->name}}</span>

                                            @endif
                                            </td>
                                            <td class="hidden-xs"> <small>{{ date('d/m/Y', strtotime($vente->date)) }} - {{$vente->horaires}}</small> </td>
                                            <td class="hidden-xs"> <small>

                                              @if($vente->show_location == true)
                                                <i class="fa fa-map-marker fa-lg mr-2 text-success" data-toggle="tooltip" title="L'adresse est affichée publiquement pour cette vente"></i>
                                              @else
                                                  <i class="fa fa-map-marker fa-lg mr-2 text-danger"></i>
                                              @endif

                                              {{$vente->location_address}} {{$vente->location_postalcode}}</small> </td>
                                            <td class="hidden-xs"> <small>
                                              {{count(\App\Models\Order::where('cart', $vente->slug)->where('payment_status', true)->get())}}
                                            </small> </td>


                                            <td>
                                                {!! Form::open(array('url' => 'manager/ventes/' . $vente->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Supprimer')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(trans('ventesmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Supprimer cette vente', 'data-message' => 'Etes vous sur de vouloir supprimer cette vente ?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('manager/ventes/' . $vente->id) }}" data-toggle="tooltip" title="Show">
                                                    {!! trans('ventesmanagement.buttons.show') !!}
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('manager/ventes/' . $vente->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! trans('ventesmanagement.buttons.edit') !!}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('ventesmanagement.enableSearchUsers'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('ventesmanagement.enablePagination'))
                                {{ $ventes->links() }}
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
    @if ((count($ventes) > config('ventesmanagement.datatablesJsStartCount')) && config('ventesmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('ventesmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('ventesmanagement.enableSearchUsers'))
        @include('scripts.search-ventes')
    @endif
@endsection

