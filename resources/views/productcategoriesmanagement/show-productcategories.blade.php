@extends('layouts.manager')

@section('template_title')
    Toutes les catégories produit
@endsection

@section('template_linked_css')
    @if(config('productsmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('productsmanagement.datatablesCssCDN') }}">
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
    <section class="content">
        

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Toutes les catégories produit
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                              <a class="dropdown-item ^hidden-xs" href="/manager/products">
                                  <i class="fa fa-eye" aria-hidden="true"></i>
                                  Voir les produits
                              </a>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('productsmanagement.products-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/manager/products/categories/create">
                                        <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                        Ajouter une catégorie
                                    </a>

                                    <a class="dropdown-item" href="/manager/products/categories/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        Voir les catégories supprimés
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(config('productsmanagement.enableSearchProducts'))
                            @include('partials.search-products-form')
                        @endif

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count">
                                    Total: {{count($productcategories)}} produits
                                </caption>
                                <thead class="thead">
                                    <tr>

                                        <th>Slug</th>
                                        <th>Nom</th>
                                        <th class="hidden-xs">Description</th>

                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="users_table">
                                    @foreach($productcategories as $productcategorie)
                                        <tr>


                                            <td>{{$productcategorie->slug}}</td>
                                            <td>{{$productcategorie->name}}</td>
                                            <td class="hidden-xs" >{{$productcategorie->description}}</td>


                                            <td>
                                                {!! Form::open(array('url' => 'manager/products/categories/' . $productcategorie->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Supprimer')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(trans('productsmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td style="line-height:80px;">
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('manager/products/categories/' . $productcategorie->id) }}" data-toggle="tooltip" title="Voir les détails">
                                                    {!! trans('productsmanagement.buttons.show') !!}
                                                </a>
                                            </td>
                                            <td style="line-height:80px;">
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('manager/products/categories/' . $productcategorie->id . '/edit') }}" data-toggle="tooltip" title="Modifier">
                                                    {!! trans('productsmanagement.buttons.edit') !!}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('productsmanagement.enableSearchProducts'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('productsmanagement.enablePagination'))
                                {{ $productcategories->links() }}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    @include('modals.modal-delete')


@endsection

@section('footer_scripts')
    @if ((count($productcategories) > config('productsmanagement.datatablesJsStartCount')) && config('productsmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('productsmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('productsmanagement.enableSearchProducts'))
        @include('scripts.search-products')
    @endif
@endsection

