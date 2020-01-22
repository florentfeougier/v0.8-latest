<?php $__env->startSection('template_title'); ?>
    Modifier la commande <?php echo e($order->order_id); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
    <style type="text/css">
        .btn-save,
        .pw-change-container {
            display: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          Modifier la commande <?php echo e($order->order_id); ?>

                            <div class="pull-right">
                                <a href="<?php echo e(route('manager.orders')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('ordermanagement.tooltips.back-order')); ?>">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux commandes
                                </a>
                                <a href="<?php echo e(url('manager/orders/' . $order->id)); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('ordermanagement.tooltips.back-order')); ?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    Voir cette commande
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo Form::open(array('route' => ['orders.update', $order->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation', 'files' => true, 'enctype'=>'multipart/form-data')); ?>


                            <?php echo csrf_field(); ?>






                            <div class="form-group has-feedback row <?php echo e($errors->has('order_id') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('order_id', "Numéro de commande", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('order_id', $order->order_id, array('id' => 'order_id', 'class' => 'form-control', 'placeholder' => trans('forms.create_order_ph_orderorder_id'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="order_id">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_order_icon_orderorder_id')); ?>" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('order_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('order_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group has-feedback row <?php echo e($errors->has('amount') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('amount', "Montant", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('amount', $order->amount, array('id' => 'amount', 'class' => 'form-control', 'placeholder' => trans('forms.create_order_ph_orderamount'))); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="amount">
                                                <i class="fa fa-eur" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('amount')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('amount')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>





<div class="form-group has-feedback row <?php echo e($errors->has('closed') ? ' has-error ' : ''); ?>">

    <?php echo Form::label('closed', "Status (terminé ou non)", array('class' => 'col-md-3 control-label'));; ?>


    <div class="col-md-9">
        <div class="input-group">
            <select class="custom-select form-control" name="closed" id="closed">

              <?php if($order->closed == true): ?>

                    <option value="0">Commande en cours</option>
                    <option value="1" selected>Terminé</option>
              <?php else: ?>

                    <option value="0" selected>Commande en cours</option>
                    <option value="1" >Terminé</option>
              <?php endif; ?>



            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="closed">
                    <i class="<?php echo e(trans('forms.create_order_icon_closed')); ?>" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        <?php if($errors->has('closed')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('closed')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>


<div class="form-group has-feedback row <?php echo e($errors->has('user') ? ' has-error ' : ''); ?>">

    <?php echo Form::label('user', "Utilisateur", array('class' => 'col-md-3 control-label'));; ?>


    <div class="col-md-9">
        <div class="input-group">
            <select class="custom-select form-control" name="user_id" id="user">
                <?php $__currentLoopData = \App\Models\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($user->id == $order->user_id): ?>
                  <option value="<?php echo e($order->user_id); ?>" selected><?php echo e($user->email); ?></option>
                <?php else: ?>
                  <option value="<?php echo e($user->id); ?>"><?php echo e($user->email); ?></option>

                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="user">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        <?php if($errors->has('user')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('user')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>


<div class="form-group has-feedback row <?php echo e($errors->has('cart') ? ' has-error ' : ''); ?>">

    <?php echo Form::label('cart', "Panier", array('class' => 'col-md-3 control-label'));; ?>


    <div class="col-md-9">
        <div class="input-group">
            <select class="custom-select form-control" name="cart_id" id="cart">
              <?php if($order->cart == "shop"): ?>
              <option value="shop" selected>Shop</option>
            <?php else: ?>
              <option value="shop">Shop</option>

            <?php endif; ?>
                <?php $__currentLoopData = \App\Models\Vente::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($cart->slug == $order->cart): ?>
                  <option value="<?php echo e($order->cart); ?>" selected><?php echo e($cart->name); ?> du <?php echo e($cart->date); ?></option>
                <?php else: ?>
                  <option value="<?php echo e($order->cart); ?>" ><?php echo e($cart->name); ?> du <?php echo e($cart->date); ?></option>

                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        <?php if($errors->has('cart')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('cart')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>


<div class="form-group has-feedback row <?php echo e($errors->has('payment') ? ' has-error ' : ''); ?>">

    <?php echo Form::label('payment', "Paiement validé", array('class' => 'col-md-3 control-label'));; ?>


    <div class="col-md-9">
        <div class="input-group">
            <select class="custom-select form-control" name="payment_id" id="payment">
              <?php if($order->payment_id == null): ?>
                <option value="" selected>Aucun</option>

              <?php endif; ?>
                <?php $__currentLoopData = \App\Models\Payment::where('status', true)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($payment->id == $order->payment_id): ?>
                  <option value="<?php echo e($order->payment_id); ?>" selected><?php echo e($payment->ref_id); ?></option>
                <?php else: ?>
                  <option value="<?php echo e($payment->id); ?>"><?php echo e($payment->ref_id); ?> (<?php echo e($payment->user->email); ?>)</option>

                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="payment">
                    <i class="<?php echo e(trans('forms.create_order_icon_payment')); ?>" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        <?php if($errors->has('payment')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('payment')); ?></strong>
            </span>
        <?php endif; ?>
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
  <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="col-sm-4">
            <select class="form-control" name="product<?php echo e($i); ?>">
              <?php $__currentLoopData = \App\Models\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($orderProduct->id == $product->id): ?>
                <option value="<?php echo e($product->id); ?>" selected><?php echo e($product->name); ?> (<?php echo e($product->price); ?>€)</option>
              <?php else: ?>
                <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?> (<?php echo e($product->price); ?>€)</option>

              <?php endif; ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </td>
        <td class="col-sm-4">
            <input type="number" name="quantity<?php echo e($i); ?>" value="<?php echo e($orderProduct->pivot->quantity); ?>" class="form-control"/>
        </td>
        
      <td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Retirer"></td>
    </tr>
    <?php $i++; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<div class="form-group has-feedback row <?php echo e($errors->has('pickup_location') ? ' has-error ' : ''); ?>">
    <?php echo Form::label('pickup_location', 'pickup_location', array('class' => 'col-md-3 control-label'));; ?>

    <div class="col-md-9">
        <div class="input-group">
            <?php echo Form::text('pickup_location', $order->pickup_location, array('id' => 'pickup_location', 'class' => 'form-control', 'placeholder' => trans('forms.create_order_ph_orderpickup_location'))); ?>

            <div class="input-group-append">
                <label class="input-group-text" for="pickup_location">
                    <i class="fa fa-fw <?php echo e(trans('forms.create_order_icon_orderpickup_location')); ?>" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        <?php if($errors->has('pickup_location')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('pickup_location')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group has-feedback row <?php echo e($errors->has('pickup_date') ? ' has-error ' : ''); ?>">
    <?php echo Form::label('pickup_date', 'pickup_date', array('class' => 'col-md-3 control-label'));; ?>

    <div class="col-md-9">
        <div class="input-group">
            <?php echo Form::text('pickup_date', $order->pickup_date, array('id' => 'pickup_date', 'class' => 'form-control', 'placeholder' => trans('forms.create_order_ph_orderpickup_date'))); ?>

            <div class="input-group-append">
                <label class="input-group-text" for="pickup_date">
                    <i class="fa fa-fw <?php echo e(trans('forms.create_order_icon_orderpickup_date')); ?>" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        <?php if($errors->has('pickup_date')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('pickup_date')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>






                            <?php echo Form::button('Enregistrer mes changements', array('class' => 'btn btn-success btn-block margin-bottom-1 mt-3 mb-2 ','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => 'Enregistrer', 'data-message' => 'Enregistrer mes changements')); ?>


                        <?php echo Form::close(); ?>

                    </div>

                </div>
                <?php echo Form::button("Supprimer cette commande", array('class' => 'mt-2 btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')); ?>


            </div>
        </div>
    </div>

    <?php echo $__env->make('modals.modal-save', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <!-- include libraries(jQuery, bootstrap) -->


  <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('scripts.save-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('scripts.check-changed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <script type="text/javascript">
    $(document).ready(function () {
    var counter = <?php echo e(count($order->products) + 1); ?>;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><select class="form-control" name="product' + counter + '"><?php $__currentLoopData = \App\Models\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><option value="1">Cactus</option><option value="2">Musa</option></select></td>';
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/ordersmanagement/edit-order.blade.php ENDPATH**/ ?>