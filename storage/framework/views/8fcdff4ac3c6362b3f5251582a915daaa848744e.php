<?php $__env->startSection('template_title'); ?>
  Toutes les commandes
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
    <?php if(config('ordersmanagement.enabledDatatablesJs')): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(config('ordersmanagement.datatablesCssCDN')); ?>">
    <?php endif; ?>
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
            margin-bottom: 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
 <div>
                    <h1 class="text-center">Commandes de la vente <?php echo e($vente->name); ?></h1>
                    <h5></h5>
                </div>
                <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link text-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          <i class="fa fa-charts"></i> Evolution des ventes
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <canvas  id="lineChart"></canvas>
      </div>
    </div>
  </div>
  <div class="card my-2">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed text-dark" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Evolution du revenues
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card my-2">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed text-dark" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          Toutes les commandes (<?php echo e(count(\App\Models\Order::where('cart', $vente->slug)->where('payment_status', true)->get())); ?> payées sur <?php echo e(count(\App\Models\Order::where('cart', $vente->slug)->get())); ?>)
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">

     <?php if(config('ordersmanagement.enableSearchOrders')): ?>
                            <?php echo $__env->make('partials.search-orders-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                        <div class="table-responsive orders-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="order_count">
                                    total: <?php echo e(count($orders)); ?> commandes
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        <th>Date
                                          <a href="<?php echo e(url("manager/orders?q=orderbyasc_date")); ?>"> <i class="text-secondary fa fa-arrow-circle-o-up"></i> </a>
                                          <a href="<?php echo e(url("manager/orders?q=orderbydesc_date")); ?>"> <i class="text-secondary fa fa-arrow-circle-o-down"></i> </a>

                                        </th>
                    <th>Vente
<a href="<?php echo e(url("manager/orders?q=orderbyasc_vente")); ?>"> <i class="text-secondary fa fa-arrow-circle-o-up"></i> </a>
                                          <a href="<?php echo e(url("manager/orders?q=orderbydesc_vente")); ?>"> <i class="text-secondary fa fa-arrow-circle-o-down"></i> </a>
</th>
                                        <th>Utilisateur</th>
                                        <th>Montant
                                          <a href="<?php echo e(url("manager/orders?q=orderbyasc_amount")); ?>"> <i class="text-secondary fa fa-arrow-circle-o-up"></i> </a>
                                          <a href="<?php echo e(url("manager/orders?q=orderbydesc_amount")); ?>"> <i class="text-secondary fa fa-arrow-circle-o-down"></i> </a>
                                        </th>
                                        <th class="hidden-sm hidden-xs">Paiement</th>
                                        <th class="hidden-sm hidden-xs ">Terminé</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="orders_table">
                                    <?php $__currentLoopData = $orders->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                              <?php if($order->payment_status == true and !is_null($order->payment_id)): ?>
                                                <span class="badge badge-success" data-toggle="tooltip" title="Cette commande a été payé"><?php echo e($order->order_id); ?></span>
                                              <?php else: ?>
                                                <span class="badge badge-warning" data-toggle="tooltip" title="Cette commande n'est pas encore payé"><?php echo e($order->order_id); ?></span>

                                              <?php endif; ?>
                                            </td>

                        <td > <small><?php echo e($order->created_at->format("d/m/Y H:i:s")); ?></small> </td>
                                            <td > <small>
                                              <?php if($order->cart == "shop"): ?>
                                              <?php echo e($order->cart); ?>

                                            <?php else: ?>
                                              <?php echo e(\App\Models\Vente::where('slug', $order->cart)->first()->name); ?>

                                            <?php endif; ?>
                                            </small> </td>

                                            <td > <small> <a class="text-dark" target="_blank" href="<?php echo e(url("manager/users/" . $order->user->id)); ?>"><?php echo e($order->user->email); ?></a> </small> </td>
                                            <td > <small><?php echo e($order->amount); ?>€</small> </td>
                                            <td class="hidden-sm hidden-xs">
                                              <?php if($order->payment_status == true and !is_null($order->payment_id)): ?>
                                                <a href="<?php echo e(url("manager/payments/$order->payment_id")); ?>" class="badge badge-success">
                                                  <?php echo e($order->payment_id); ?>

                                                  <?php if($order->payment_method == "VISA"): ?>
                                                    <i class="fa fa-cc-visa"></i>
                                                  <?php elseif($order->payment_method == "MASTERCARD"): ?>
                                                    <i class="fa fa-cc-mastercard"></i>
                                                  <?php elseif($order->payment_method == "PAYPAL"): ?>
                                                    <i class="fa fa-cc-paypal"></i>
                                                  <?php else: ?>
                                                    <i class="fa fa-credit-card"></i>
                                                  <?php endif; ?>
                                                </a>
                                              <?php else: ?>
                                                <span class="badge badge-secondary">Pas encore payé</span>


                                              <?php endif; ?>
                                            </td>
                                            <td class="hidden-sm hidden-xs">
                                              <?php if($order->closed == true): ?>
                                                <i class="text-success fa fa-check"></i>
                                              <?php else: ?>
                                                <i class="text-black fa fa-times"></i>

                                              <?php endif; ?>
                                            </td>
                                            
                                            <td>
                                                <a target="_blank" class="btn btn-sm btn-outline-secondary btn-block" href="<?php echo e(URL::to('manager/orders/' . $order->id)); ?>"  title="Voir les détails">
                                                    <?php echo trans('ordersmanagement.buttons.show'); ?>

                                                </a>
                                            </td>
                                            
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tbody id="search_results"></tbody>
                                <?php if(config('ordersmanagement.enableSearchOrders')): ?>
                                    <tbody id="search_results"></tbody>
                                <?php endif; ?>

                            </table>

                            

                        </div>
      </div>
    </div>
  </div>
</div>
               
        </div>
    </div>

    <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer_scripts'); ?>
    <?php if((count($orders) > config('ordersmanagement.datatablesJsStartCount')) && config('ordersmanagement.enabledDatatablesJs')): ?>
        <?php echo $__env->make('scripts.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.save-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(config('ordersmanagement.tooltipsEnabled')): ?>
        <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(config('ordersmanagement.enableSearchOrders')): ?>
        <?php echo $__env->make('scripts.search-orders', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

        <script type="text/javascript">


//line
var ctxL = document.getElementById("lineChart").getContext('2d');
ctxL.height=400;
var myLineChart = new Chart(ctxL, {
type: 'line',
data: {
labels: [
"<?php echo e(\Carbon\Carbon::today()->subDays(14)->toDateString()); ?>",
"<?php echo e(\Carbon\Carbon::today()->subDays(13)->toDateString()); ?>",
"<?php echo e(\Carbon\Carbon::today()->subDays(12)->toDateString()); ?>",
"<?php echo e(\Carbon\Carbon::today()->subDays(11)->toDateString()); ?>",
"<?php echo e(\Carbon\Carbon::today()->subDays(10)->toDateString()); ?>",
"<?php echo e(\Carbon\Carbon::today()->subDays(9)->toDateString()); ?>",
"<?php echo e(\Carbon\Carbon::today()->subDays(8)->toDateString()); ?>",
"<?php echo e(\Carbon\Carbon::today()->subDays(7)->toDateString()); ?>",
"<?php echo e(\Carbon\Carbon::today()->subDays(6)->toDateString()); ?>",
"<?php echo e(\Carbon\Carbon::today()->subDays(4)->toDateString()); ?>",
"<?php echo e(\Carbon\Carbon::today()->subDays(3)->toDateString()); ?>",
"<?php echo e(\Carbon\Carbon::today()->subDays(2)->toDateString()); ?>",
"<?php echo e(\Carbon\Carbon::today()->subDays(1)->toDateString()); ?>",
"<?php echo e(\Carbon\Carbon::today()->toDateString()); ?>"],
datasets: [{
label: "<?php echo e($vente->name); ?>",
data: ["<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(14))->get())); ?>","<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(13))->get())); ?>","<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(12))->get())); ?>","<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(11))->get())); ?>","<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(10))->get())); ?>","<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(9))->get())); ?>","<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(8))->get())); ?>","<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(7))->get())); ?>","<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(6))->get())); ?>","<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(5))->get())); ?>", "<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(4))->get())); ?>", "<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(3))->get())); ?>", "<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(2))->get())); ?>", "<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(1))->get())); ?>", "<?php echo e(count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today())->get())); ?>"],
backgroundColor: [
'rgba(105, 0, 132, .2)',
],
borderColor: [
'rgba(200, 99, 132, .7)',
],
borderWidth: 2
},

]
},
options: {
responsive: true
}
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/ordersmanagement/show-orders-vente.blade.php ENDPATH**/ ?>