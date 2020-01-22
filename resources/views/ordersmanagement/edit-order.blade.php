@extends('layouts.admin')

@section('template_title')
    Modifier la commande {{$order->order_id}}
@endsection

@section('template_linked_css')
    <style type="text/css">
        .btn-save,
        .pw-change-container {
            display: none;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          Modifier la commande {{$order->order_id}}
                            <div class="pull-right">
                                <a href="{{ route('manager.orders') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="top" title="{{ trans('ordermanagement.tooltips.back-order') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux commandes
                                </a>
                                <a href="{{ url('manager/orders/' . $order->id) }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('ordermanagement.tooltips.back-order') }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    Voir cette commande
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('route' => ['orders.update', $order->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation', 'files' => true, 'enctype'=>'multipart/form-data')) !!}

                            {!! csrf_field() !!}





                            <div class="form-group has-feedback row {{ $errors->has('order_id') ? ' has-error ' : '' }}">
                                {!! Form::label('order_id', "Numéro de commande", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('order_id', $order->order_id, array('id' => 'order_id', 'class' => 'form-control', 'placeholder' => trans('forms.create_order_ph_orderorder_id'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="order_id">
                                                <i class="fa fa-fw {{ trans('forms.create_order_icon_orderorder_id') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('order_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('order_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('amount') ? ' has-error ' : '' }}">
                                {!! Form::label('amount', "Montant", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('amount', $order->amount, array('id' => 'amount', 'class' => 'form-control', 'placeholder' => trans('forms.create_order_ph_orderamount'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="amount">
                                                <i class="fa fa-eur" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


{{--
<div class="form-group has-feedback row {{ $errors->has('ordercategorie') ? ' has-error ' : '' }}">

    {!! Form::label('ordercategorie', trans('forms.create_order_label_ordercategorie'), array('class' => 'col-md-3 control-label')); !!}

    <div class="col-md-9">
        <div class="input-group">

            <select class="custom-select form-control" name="ordercategorie_id" id="ordercategorie">
                <option value="">Sélectionner une catégorie</option>
                @if ($ordercategories)
                    @foreach($ordercategories as $ordercategorie)
                        <option value="{{ $ordercategorie->id }}" {{ $order->ordercategorie_id == $ordercategorie->id ? 'selected="selected"' : '' }}>{{ $ordercategorie->name }}</option>
                    @endforeach
                @endif
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="ordercategorie">
                    <i class="{{ trans('forms.create_order_icon_ordercategorie') }}" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        @if ($errors->has('ordercategorie'))
            <span class="help-block">
                <strong>{{ $errors->first('ordercategorie') }}</strong>
            </span>
        @endif
    </div>
</div> --}}


<div class="form-group has-feedback row {{ $errors->has('closed') ? ' has-error ' : '' }}">

    {!! Form::label('closed', "Status (terminé ou non)", array('class' => 'col-md-3 control-label')); !!}

    <div class="col-md-9">
        <div class="input-group">
            <select class="custom-select form-control" name="closed" id="closed">

              @if($order->closed == true)

                    <option value="0">Commande en cours</option>
                    <option value="1" selected>Terminé</option>
              @else

                    <option value="0" selected>Commande en cours</option>
                    <option value="1" >Terminé</option>
              @endif



            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="closed">
                    <i class="{{ trans('forms.create_order_icon_closed') }}" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        @if ($errors->has('closed'))
            <span class="help-block">
                <strong>{{ $errors->first('closed') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group has-feedback row {{ $errors->has('user') ? ' has-error ' : '' }}">

    {!! Form::label('user', "Utilisateur", array('class' => 'col-md-3 control-label')); !!}

    <div class="col-md-9">
        <div class="input-group">
            <select class="custom-select form-control" name="user_id" id="user">
                @foreach(\App\Models\User::all() as $user)
                  @if($user->id == $order->user_id)
                  <option value="{{$order->user_id}}" selected>{{$user->email}}</option>
                @else
                  <option value="{{$user->id}}">{{$user->email}}</option>

                @endif
                @endforeach

            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="user">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        @if ($errors->has('user'))
            <span class="help-block">
                <strong>{{ $errors->first('user') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group has-feedback row {{ $errors->has('cart') ? ' has-error ' : '' }}">

    {!! Form::label('cart', "Panier", array('class' => 'col-md-3 control-label')); !!}

    <div class="col-md-9">
        <div class="input-group">
            <select class="custom-select form-control" name="cart_id" id="cart">
              @if($order->cart == "shop")
              <option value="shop" selected>Shop</option>
            @else
              <option value="shop">Shop</option>

            @endif
                @foreach(\App\Models\Vente::all() as $cart)
                  @if($cart->slug == $order->cart)
                  <option value="{{$order->cart}}" selected>{{$cart->name}} du {{$cart->date}}</option>
                @else
                  <option value="{{$order->cart}}" >{{$cart->name}} du {{$cart->date}}</option>

                @endif
                @endforeach

            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        @if ($errors->has('cart'))
            <span class="help-block">
                <strong>{{ $errors->first('cart') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group has-feedback row {{ $errors->has('payment') ? ' has-error ' : '' }}">

    {!! Form::label('payment', "Paiement validé", array('class' => 'col-md-3 control-label')); !!}

    <div class="col-md-9">
        <div class="input-group">
            <select class="custom-select form-control" name="payment_id" id="payment">
              @if($order->payment_id == null)
                <option value="" selected>Aucun</option>

              @endif
                @foreach(\App\Models\Payment::where('status', true)->get() as $payment)
                  @if($payment->id == $order->payment_id)
                  <option value="{{$order->payment_id}}" selected>{{$payment->ref_id}}</option>
                @else
                  <option value="{{$payment->id}}">{{$payment->ref_id}} ({{$payment->user->email}})</option>

                @endif
                @endforeach

            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="payment">
                    <i class="{{ trans('forms.create_order_icon_payment') }}" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        @if ($errors->has('payment'))
            <span class="help-block">
                <strong>{{ $errors->first('payment') }}</strong>
            </span>
        @endif
    </div>
</div>

<h4 class="py-3">Détails de la commande</h4>

<table id="myTable" class=" table order-list">
<thead>
    <tr>
        <td>Produit</td>
        <td>Quantité</td>

    </tr>
</thead>
<tbody>
  <?php $i=1; ?>
  @foreach($order->products as $orderProduct)
    <tr>
        <td class="col-sm-4">
            <select class="form-control" name="product{{$i}}">
              @foreach (\App\Models\Product::all() as $product)
                @if($orderProduct->id == $product->id)
                <option value="{{ $product->id }}" selected>{{ $product->name }} ({{ $product->price }}€)</option>
              @else
                <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->price }}€)</option>

              @endif

              @endforeach
            </select>
        </td>
        <td class="col-sm-4">
            <input type="number" name="quantity{{$i}}" value="{{$orderProduct->pivot->quantity}}" class="form-control"/>
        </td>
        {{-- <td class="col-sm-3">
            <input type="text" name="phone"  class="form-control"/>
        </td> --}}
      <td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Retirer"></td>
    </tr>
    <?php $i++; ?>
  @endforeach
</tbody>
<tfoot>
    <tr>
        <td colspan="5" style="text-align: left;">
            <input type="button" class="btn btn-lg btn-block " id="addrow" value="Ajouter un produit" />
        </td>
    </tr>
    <tr>
    </tr>
</tfoot>
</table>


<hr>

<div class="form-group has-feedback row {{ $errors->has('pickup_location') ? ' has-error ' : '' }}">
    {!! Form::label('pickup_location', 'pickup_location', array('class' => 'col-md-3 control-label')); !!}
    <div class="col-md-9">
        <div class="input-group">
            {!! Form::text('pickup_location', $order->pickup_location, array('id' => 'pickup_location', 'class' => 'form-control', 'placeholder' => trans('forms.create_order_ph_orderpickup_location'))) !!}
            <div class="input-group-append">
                <label class="input-group-text" for="pickup_location">
                    <i class="fa fa-fw {{ trans('forms.create_order_icon_orderpickup_location') }}" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        @if($errors->has('pickup_location'))
            <span class="help-block">
                <strong>{{ $errors->first('pickup_location') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group has-feedback row {{ $errors->has('pickup_date') ? ' has-error ' : '' }}">
    {!! Form::label('pickup_date', 'pickup_date', array('class' => 'col-md-3 control-label')); !!}
    <div class="col-md-9">
        <div class="input-group">
            {!! Form::text('pickup_date', $order->pickup_date, array('id' => 'pickup_date', 'class' => 'form-control', 'placeholder' => trans('forms.create_order_ph_orderpickup_date'))) !!}
            <div class="input-group-append">
                <label class="input-group-text" for="pickup_date">
                    <i class="fa fa-fw {{ trans('forms.create_order_icon_orderpickup_date') }}" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        @if($errors->has('pickup_date'))
            <span class="help-block">
                <strong>{{ $errors->first('pickup_date') }}</strong>
            </span>
        @endif
    </div>
</div>






                            {!! Form::button('Enregistrer mes changements', array('class' => 'btn btn-success btn-block margin-bottom-1 mt-3 mb-2 ','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => 'Enregistrer', 'data-message' => 'Enregistrer mes changements')) !!}

                        {!! Form::close() !!}
                    </div>

                </div>
                {!! Form::button("Supprimer cette commande", array('class' => 'mt-2 btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')) !!}

            </div>
        </div>
    </div>

    @include('modals.modal-save')
    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
  <!-- include libraries(jQuery, bootstrap) -->


  @include('scripts.delete-modal-script')
  @include('scripts.save-modal-script')
  @include('scripts.check-changed')


    <script type="text/javascript">
    $(document).ready(function () {
    var counter = {{count($order->products) + 1}};

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><select class="form-control" name="product' + counter + '">@foreach(\App\Models\Product::all() as $product)<option value="{{$product->id}}">{{$product->name}}</option>@endforeach<option value="1">Cactus</option><option value="2">Musa</option></select></td>';
        cols += '<td><input type="number" class="form-control" value="1" name="quantity' + counter + '"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Retirer"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });


  });



  function calculateRow(row) {
    var price = +row.find('input[name^="quantity"]').val();

  }

  function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="quantity"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
  }
    </script>
@endsection

