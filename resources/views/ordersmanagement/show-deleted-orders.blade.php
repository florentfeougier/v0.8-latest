@extends('layouts.app')

@section('template_title')
Toutes les commandes supprimées

@endsection

@section('template_linked_css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <style type="text/css" media="screen">
        .orders-table {
            border: 0;
        }
        .orders-table tr td:first-child {
            padding-left: 15px;
        }
        .orders-table tr td:last-child {
            padding-right: 15px;
        }
        .orders-table.table-responsive,
        .orders-table.table-responsive table {
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
                                Toutes les commandes supprimées
                            </span>
                            <div class="float-right">
                                <a href="{{url("manager/orders")}}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('ordersmanagement.tooltips.back-orders') }}">
                                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                    Retour aux commandes
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(count($orders) === 0)

                            <tr>
                                <p class="text-center margin-half">
                                    {!! trans('ordersmanagement.no-records') !!}
                                </p>
                            </tr>

                        @else

                            <div class="table-responsive orders-table">
                                <table class="table table-striped table-sm data-table">
                                    <caption id="order_count">
                                        {{ trans_choice('ordersmanagement.orders-table.caption', 1, ['orderscount' => $orders->count()]) }}
                                    </caption>
                                    <thead>
                                        <tr>
                                            <th class="hidden-xxs">#</th>
                                            <th>Date</th>
                                            <th class="hidden-xs hidden-sm">Panier</th>
                                            <th class="hidden-xs hidden-sm hidden-md">Utilisateur</th>

                                            <th class="hidden-xs">Supprimé le</th>
                                            <th class="hidden-xs">Par</th>
                                            <th>Actions</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($orders as $order)
                                            <tr>
                                                <td class="hidden-xxs">{{$order->order_id}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td class="hidden-xs hidden-sm"><a href="mailto:{{ $order->cart }}" title="email {{ $order->email }}">{{ $order->email }}</a></td>
                                                <td class="hidden-xs hidden-sm hidden-md">{{$order->user->email}}</td>
                                                <td class="hidden-xs">{{$order->deleted_at}}</td>
                                                <td class="hidden-xs">{{$order->deleted_ip_address}}</td>
                                                <td>
                                                    {!! Form::model($order, array('action' => array('SoftDeletesOrderController@update', $order->id), 'method' => 'PUT', 'data-toggle' => 'tooltip')) !!}
                                                        {!! Form::button('<i class="fa fa-refresh" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-block btn-sm', 'type' => 'submit', 'data-toggle' => 'tooltip', 'title' => 'Restore User')) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('manager/orders/deleted/' . $order->id) }}" data-toggle="tooltip" title="Show User">
                                                        <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    {!! Form::model($order, array('action' => array('SoftDeletesOrderController@destroy', $order->id), 'method' => 'DELETE', 'class' => 'inline', 'data-toggle' => 'tooltip', 'title' => 'Destroy User Record')) !!}
                                                        {!! Form::hidden('_method', 'DELETE') !!}
                                                        {!! Form::button('<i class="fa fa-order-times" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm inline','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this order ?')) !!}
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

    @if (count($orders) > 10)
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @include('scripts.tooltips')

@endsection

