@extends('layouts.admin')

@section('template_title')
    Tous les produits
@endsection

@section('template_linked_css')
    @if(config('productsmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('productsmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .products-table {
            border: 0;
        }
        .products-table tr td:first-child {
            padding-left: 15px;
        }
        .products-table tr td:last-child {
            padding-right: 15px;
        }
        .products-table.table-responsive,
        .products-table.table-responsive table {
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
                              Tous les produits ({{count($products)}})
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                              <a class="dropdown-item" href="{{url("manager/products/labels")}}">
                                  <i class="fa fa-tags" aria-hidden="true"></i>
                                  Gérer les labels
                              </a>
                              <a class="dropdown-item" href="{{url("manager/products/categories")}}">
                                  <i class="fa fa-list" aria-hidden="true"></i>
                                  Gérer les catégories
                              </a>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('productsmanagement.products-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{url("/manager/products/create")}}">
                                        <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                        Ajouter un produit
                                    </a>

                                    <a class="dropdown-item" href="{{url("manager/products/deleted")}}">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        Voir les produits supprimées
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(config('productsmanagement.enableSearchProducts'))
                            @include('partials.search-products-form')
                        @endif

                        <div class="table-responsive products-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="product_count">
                                    {{ trans_choice('productsmanagement.products-table.caption', 1, ['productscount' => $products->count()]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        <th>{!! trans('productsmanagement.products-table.name') !!}</th>
                                        <th class="hidden-xs">Prix
                                          <a href="{{url("manager/products?q=orderbyasc_price")}}"> <i class="text-secondary fa fa-arrow-circle-o-up"></i> </a>
                                          <a href="{{url("manager/products?q=orderbydesc_price")}}"> <i class="text-secondary fa fa-arrow-circle-o-down"></i> </a>

                                        </th>
                                        <th class="hidden-xs">TVA</th>
                                        <th>Stock
                                          <a href="{{url("manager/products?q=orderbyasc_stock")}}"> <i class="text-secondary fa fa-arrow-circle-o-up"></i> </a>
                                          <a href="{{url("manager/products?q=orderbydesc_stock")}}"> <i class="text-secondary fa fa-arrow-circle-o-down"></i> </a>

                                        </th>

                                        {{-- <th class="hidden-sm hidden-xs hidden-md">{!! trans('productsmanagement.products-table.created') !!}</th> --}}
                                        <th>{!! trans('productsmanagement.products-table.actions') !!}</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="products_table">
                                    @foreach($products as $product)
                                        <tr>
                                            <td>

                                              {{$product->sku}}</td>
                                            <td>{{$product->name}}       @if($product->store_enabled == true)
                                                    <i class="mr-2 fa fa-shopping-cart" data-toggle='tooltip' title="Ce produit est en vente sur le shop"></i>
                                                  @elseif(count($product->ventes) > 0)
                                                    <i class="mr-2 fa fa-shopping-bag" data-toggle='tooltip' title="Ce produit est en vente dans au moins une vente"></i>

                                                  @endif</td>
                                            <td class="hidden-xs"> <small>{{ $product->price }}€</small> </td>
                                            <td class="hidden-xs"> <small>{{$product->tax}}%</small> </td>
                                            <td>
                                              @if($product->stock == 0)
                                            <span class="badge badge-danger">  {{$product->stock}} restants</span>
                                          @elseif($product->stock > 0 && $product->stock < 5)
                                            <span class="badge badge-warning">  {{$product->stock}} restants</span>
                                          @else
                                            <span class="badge badge-success">  {{$product->stock}} restants</span>
                                          @endif
                                          </td>

                                            <td>
                                                {!! Form::open(array('url' => 'manager/products/' . $product->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Supprimer')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button("<i class='fa fa-trash'></i>", array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Supprimer un produit', 'data-message' => 'Etes vous sur de vouloir supprimer ce produit ?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('manager/products/' . $product->id) }}" data-toggle="tooltip" title="Voir les détails">
                                                  <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('manager/products/' . $product->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    Modifier
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
                                {{ $products->links() }}
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
    @if ((count($products) > config('productsmanagement.datatablesJsStartCount')) && config('productsmanagement.enabledDatatablesJs'))
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

