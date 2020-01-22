@extends('layouts.manager')

@section('template_title')
    Créer une commande manuellement
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Créer une commande manuellement
                            <div class="pull-right">
                                <a href="{{ route('manager.orders') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('ordersmanagement.tooltips.back-orders') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux commandes
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(array('route' => 'orders.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}

                            <div class="form-group has-feedback row {{ $errors->has('order_id') ? ' has-error ' : '' }}">
                                {!! Form::label('order_id', "Numéro de commande", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('order_id', NULL, array('id' => 'order_id', 'class' => 'form-control', 'placeholder' => "OR849482742827494929")) !!}
                                        <div class="input-group-append">
                                            <label for="order_id" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_order_icon_order_id') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('order_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('order_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('amount') ? ' has-error ' : '' }}">
                                {!! Form::label('amount', "Montant (€ TTC)", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('amount', NULL, array('id' => 'amount', 'class' => 'form-control', 'placeholder' => "Ex: 30,90")) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="amount">
                                                <i class="fa fa-euro" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('user') ? ' has-error ' : '' }}">
                                {!! Form::label('user_id', "Utilisateur", array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="user_id" id="user">
                                            <option value="">Sélectionner un utilisateur...</option>
                                            @if ($users)
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            @endif
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
                                        <select class="custom-select form-control" name="cart" id="cart">
                                            <option value="">Sélectionner un panier</option>

                                                @foreach(\App\Models\Vente::all() as $cart)
                                                    <option value="{{ $cart->slug }}">{{ $cart->name }}</option>
                                                @endforeach
                                                <option value="shop">Shop</option>


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


                            <hr>

                            <h4 class="py-3">Détails de la commande</h4>

                            <table id="myTable" class=" table order-list">
                            <thead>
                                <tr>
                                    <td>Produit</td>
                                    <td>Quantité</td>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-sm-4">
                                        <select class="form-control" name="product1">
                                          @foreach (\App\Models\Product::all() as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->price }}€)</option>

                                          @endforeach
                                        </select>
                                    </td>
                                    <td class="col-sm-4">
                                        <input type="number" name="quantity1" value="1" class="form-control"/>
                                    </td>
                                    {{-- <td class="col-sm-3">
                                        <input type="text" name="phone"  class="form-control"/>
                                    </td> --}}
                                    <td class="col-sm-2"><a class="deleteRow"></a>

                                    </td>
                                </tr>
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


                            {!! Form::button("Créer cette commande", array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')



  <script type="text/javascript">
  $(document).ready(function () {
  var counter = 2;

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

