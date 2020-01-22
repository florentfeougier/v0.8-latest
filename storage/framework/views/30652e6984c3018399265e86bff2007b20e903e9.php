<?php $__env->startSection('template_title'); ?>
    Créer une commande manuellement
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Créer une commande manuellement
                            <div class="pull-right">
                                <a href="<?php echo e(route('manager.orders')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('ordersmanagement.tooltips.back-orders')); ?>">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Retour aux commandes
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php echo Form::open(array('route' => 'orders.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')); ?>


                            <?php echo csrf_field(); ?>


                            <div class="form-group has-feedback row <?php echo e($errors->has('order_id') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('order_id', "Numéro de commande", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('order_id', NULL, array('id' => 'order_id', 'class' => 'form-control', 'placeholder' => "OR849482742827494929")); ?>

                                        <div class="input-group-append">
                                            <label for="order_id" class="input-group-text">
                                                <i class="fa fa-fw <?php echo e(trans('forms.create_order_icon_order_id')); ?>" aria-hidden="true"></i>
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
                                <?php echo Form::label('amount', "Montant (€ TTC)", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('amount', NULL, array('id' => 'amount', 'class' => 'form-control', 'placeholder' => "Ex: 30,90")); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="amount">
                                                <i class="fa fa-euro" aria-hidden="true"></i>
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

                            <div class="form-group has-feedback row <?php echo e($errors->has('user') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('user_id', "Utilisateur", array('class' => 'col-md-3 control-label'));; ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="user_id" id="user">
                                            <option value="">Sélectionner un utilisateur...</option>
                                            <?php if($users): ?>
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
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
                                        <select class="custom-select form-control" name="cart" id="cart">
                                            <option value="">Sélectionner un panier</option>

                                                <?php $__currentLoopData = \App\Models\Vente::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($cart->slug); ?>"><?php echo e($cart->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <option value="shop">Shop</option>


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
                                          <?php $__currentLoopData = \App\Models\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?> (<?php echo e($product->price); ?>€)</option>

                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </td>
                                    <td class="col-sm-4">
                                        <input type="number" name="quantity1" value="1" class="form-control"/>
                                    </td>
                                    
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


                            <?php echo Form::button("Créer cette commande", array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )); ?>

                        <?php echo Form::close(); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>



  <script type="text/javascript">
  $(document).ready(function () {
  var counter = 2;

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


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/ordersmanagement/create-order.blade.php ENDPATH**/ ?>