@extends('layouts.app')

@section('template_title')
    {!!trans('productsmanagement.showing-product-deleted')!!}

@endsection

@section('template_linked_css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
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
            margin-bottom: .15em;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {!!trans('productsmanagement.showing-product-deleted')!!}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('manager.products') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('productsmanagement.tooltips.back-products') }}">
                                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                    {!! trans('productsmanagement.buttons.back-to-products') !!}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(count($products) === 0)

                            <tr>
                                <p class="text-center margin-half">
                                    {!! trans('productsmanagement.no-records') !!}
                                </p>
                            </tr>

                        @else

                            <div class="table-responsive products-table">
                                <table class="table table-striped table-sm data-table">
                                    <caption id="product_count">
                                        {{ trans_choice('productsmanagement.products-table.caption', 1, ['productscount' => $products->count()]) }}
                                    </caption>
                                    <thead>
                                        <tr>
                                            <th class="hidden-xxs">ID</th>
                                            <th>{!!trans('productsmanagement.products-table.name')!!}</th>
                                            <th class="hidden-xs hidden-sm">Email</th>
                                            <th class="hidden-xs hidden-sm hidden-md">{!!trans('productsmanagement.products-table.fname')!!}</th>
                                            <th class="hidden-xs hidden-sm hidden-md">{!!trans('productsmanagement.products-table.lname')!!}</th>
                                            <th class="hidden-xs hidden-sm">{!!trans('productsmanagement.role')!!}</th>
                                            <th class="hidden-xs">{!!trans('productsmanagement.deleted')!!}</th>
                                            <th class="hidden-xs">{!!trans('productsmanagement.IpDeleted')!!}</th>
                                            <th>{!!trans('productsmanagement.actions')!!}</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($products as $product)
                                            <tr>
                                                <td class="hidden-xxs">{{$product->id}}</td>
                                                <td>{{$product->name}}</td>
                                                <td class="hidden-xs hidden-sm"><a href="mailto:{{ $product->email }}" title="email {{ $product->email }}">{{ $product->email }}</a></td>
                                                <td class="hidden-xs hidden-sm hidden-md">{{$product->first_name}}</td>
                                                <td class="hidden-xs hidden-sm hidden-md">{{$product->last_name}}</td>
                                                <td class="hidden-xs hidden-sm">
                                                    {{-- @foreach ($product->roles as $product_role)

                                                        @if ($product_role->name == 'User')
                                                            @php $labelClass = 'primary' @endphp

                                                        @elseif ($product_role->name == 'Admin')
                                                            @php $labelClass = 'warning' @endphp

                                                        @elseif ($product_role->name == 'Unverified')
                                                            @php $labelClass = 'danger' @endphp

                                                        @else
                                                            @php $labelClass = 'default' @endphp

                                                        @endif

                                                        <span class="label label-{{$labelClass}}">{{ $product_role->name }}</span>

                                                    @endforeach --}}
                                                </td>
                                                <td class="hidden-xs">{{$product->deleted_at}}</td>
                                                <td class="hidden-xs">{{$product->deleted_ip_address}}</td>
                                                <td>
                                                    {!! Form::model($product, array('action' => array('SoftDeletesProductController@update', $product->id), 'method' => 'PUT', 'data-toggle' => 'tooltip')) !!}
                                                        {!! Form::button('<i class="fa fa-refresh" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-block btn-sm', 'type' => 'submit', 'data-toggle' => 'tooltip', 'title' => 'Restore User')) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('products/deleted/' . $product->id) }}" data-toggle="tooltip" title="Show User">
                                                        <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    {!! Form::model($product, array('action' => array('SoftDeletesProductController@destroy', $product->id), 'method' => 'DELETE', 'class' => 'inline', 'data-toggle' => 'tooltip', 'title' => 'Destroy User Record')) !!}
                                                        {!! Form::hidden('_method', 'DELETE') !!}
                                                        {!! Form::button('<i class="fa fa-product-times" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm inline','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this product ?')) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-delete')

@endsection

@section('footer_scripts')

    @if (count($products) > 10)
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @include('scripts.tooltips')

@endsection
