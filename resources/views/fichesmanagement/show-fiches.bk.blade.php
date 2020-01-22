@extends('layouts.admin')

@section('template_title')
    Toutes vos fiches d'entretien
@endsection

@section('template_linked_css')
    @if(config('fichesmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('fichesmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
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
                                Vos fiches d'entretien ({{count(\App\Models\Vente::where('is_public', true)->get())}})
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('fichesmanagement.fiches-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/manager/fiches/create">
                                        <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                        Ajouter une fiche
                                    </a>
                                    <a class="dropdown-item" href="/manager/fiches/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        Voir les fiches supprimées
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(config('fichesmanagement.enableSearchVentes'))
                            @include('partials.search-fiches-form')
                        @endif

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count">
                                    total: {{ $fiches->count() }} fiches
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>{!! trans('fichesmanagement.fiches-table.name') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">Produits associés</th>
                                        <th>{!! trans('fichesmanagement.fiches-table.actions') !!}</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="users_table">
                                    @foreach($fiches as $fiche)
                                        <tr>
                                            <td>{{$fiche->name}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">
                                              @if(count($fiche->products) > 0)
                                                @foreach($fiche->products->take(3) as $product)
                                                  <a href="{{url("manager/products/$product->id")}}"><small class="badge badge-secondary">{{$product->name}}</small>
</a>
                                                @endforeach


                                              @else
                                                <small class="badge badge-secondary">0</small>

                                              @endif
                                            </td>
                                            {{-- <td>
                                                {!! Form::open(array('url' => 'manager/fiches/' . $fiche->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(trans('fichesmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')) !!}
                                                {!! Form::close() !!}
                                            </td> --}}
                                            <td>
                                                <a class="btn btn-sm btn-secondary btn-block" href="{{ URL::to('manager/fiches/' . $fiche->id . '/clone') }}" data-toggle="tooltip" title="Cloner cette fiche">
                                                    <i class="fa fa-clone"></i> 
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('manager/fiches/' . $fiche->id . '/edit') }}" data-toggle="tooltip" title="Modifier">
                                                    {!! trans('fichesmanagement.buttons.edit') !!}
                                                </a>
                                            </td>

                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('manager/fiches/' . $fiche->id) }}" data-toggle="tooltip" title="Show">
                                                    {!! trans('fichesmanagement.buttons.show') !!}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('fichesmanagement.enableSearchVentes'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('fichesmanagement.enablePagination'))
                                {{ $fiches->links() }}
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
    @if ((count($fiches) > config('fichesmanagement.datatablesJsStartCount')) && config('fichesmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('fichesmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('fichesmanagement.enableSearchVentes'))
        @include('scripts.search-fiches')
    @endif
@endsection

