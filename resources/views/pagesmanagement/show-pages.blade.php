@extends('layouts.manager')

@section('template_title')
    {!! trans('usersmanagement.showing-all-users') !!}
@endsection

@section('template_linked_css')
    @if(config('usersmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('usersmanagement.datatablesCssCDN') }}">
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
                              Toutes les pages
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        dddd
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/pages/create">
                                        <i class="fa fa-page-plus" aria-hidden="true"></i>
                                        {!! trans('pagesmanagement.buttons.create-new') !!}
                                    </a>
                                    <a class="dropdown-item" href="/pages/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        {!! trans('pagesmanagement.show-deleted-pages') !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(config('pagesmanagement.enableSearchUsers'))
                            @include('partials.search-pages-form')
                        @endif

                        <div class="table-responsive pages-table">
                            <table class="table table-striped table-sm data-table table-responsive">
                                <caption id="page_count">
                                    {{ trans_choice('pagesmanagement.pages-table.caption', 1, ['pagescount' => count($pages)]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>{!! trans('pagesmanagement.pages-table.name') !!}</th>
                                        <th class="hidden-xs">URL</th>
                                        <th class="hidden-sm hidden-xs hidden-md">Mis à jour</th>
                                        <th>{!! trans('pagesmanagement.pages-table.actions') !!}</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="pages_table">
                                    @foreach($pages as $page)
                                        <tr>

                                            <td>{{$page->name}}</td>
                                            <td class="hidden-xs">
                                              <small>
                                              <a href="mailto:{{ $page->slug }}" title="email {{ $page->email }}">/{{ $page->slug }}</a>
                                            </small>

                                            </td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$page->updated_at->diffForHumans()}}</td>

                                            <td>
                                                <a class="btn btn-sm btn-outline-success btn-block" href="{{ URL::to('manager/pages/' . $page->id) }}" data-toggle="tooltip" title="Show">
                                                  Voir <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('manager/pages/' . $page->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    Modifier <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('pagesmanagement.enableSearchUsers'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('pagesmanagement.enablePagination'))
                                {{ $pages->links() }}
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
    @if ((count($pages) > config('pagesmanagement.datatablesJsStartCount')) && config('pagesmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('usersmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('usersmanagement.enableSearchUsers'))
        @include('scripts.search-users')
    @endif
@endsection

