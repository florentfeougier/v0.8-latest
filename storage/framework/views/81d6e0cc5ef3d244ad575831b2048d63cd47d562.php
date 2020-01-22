<div class="row">
    <div class="col-lg-9">
        <a class="
<?php echo e(Request::is('manager/orders') ? 'btn-secondary' : 'btn-outline-secondary'); ?>

        btn" href="<?php echo e(url("manager/orders")); ?>">Toutes (<?php echo e(count( \App\Models\Order::all())); ?>)</a>

        <?php $__currentLoopData = \App\Models\Vente::where('is_public', true)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="btn <?php echo e(Request::is("manager/orders/filters/$vente->slug") ? 'btn-secondary' : 'btn-outline-secondary'); ?>

        btn" href="<?php echo e(url("manager/orders/filters/$vente->slug")); ?>" href="<?php echo e(url("manager/orders/filters/$vente->slug")); ?>"><?php echo e($vente->name); ?> (<?php echo e(count( \App\Models\Order::where('cart', $vente->slug)->get() )); ?>)</a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a class="btn <?php echo e(Request::is('manager/orders/filters/shop') ? 'btn-secondary' : 'btn-outline-secondary'); ?>

        btn" href="<?php echo e(url("manager/orders/filters/shop")); ?>" href="<?php echo e(url("manager/orders/filters/shop")); ?>">Shop</a>
               
    </div>
    <div class="col-lg-3">
        <?php echo Form::open(['route' => 'search-orders', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation', 'id' => 'search_orders']); ?>

            <?php echo csrf_field(); ?>

            <div class="input-group mb-3">
                <?php echo Form::text('order_search_box', NULL, ['id' => 'order_search_box', 'class' => 'form-control', 'placeholder' => "Recherche...", 'aria-label' => trans('ordersmanagement.search.search-orders-ph'), 'required' => false]); ?>

                <div class="input-group-append">
                    <a href="#" class="input-group-addon btn btn-warning clear-search" data-toggle="tooltip" title="<?php echo e(trans('ordersmanagement.tooltips.clear-search')); ?>" style="display:none;">
                        <i class="fa fa-fw fa-times" aria-hidden="true"></i>
                        <span class="sr-only">
                            <?php echo trans('ordersmanagement.tooltips.clear-search'); ?>

                        </span>
                    </a>
                    <a href="#" class="input-group-addon btn btn-secondary" id="search_trigger" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('ordersmanagement.tooltips.submit-search')); ?>" >
                        <i class="fa fa-search fa-fw" aria-hidden="true"></i>
                        <span class="sr-only">
                            <?php echo trans('ordersmanagement.tooltips.submit-search'); ?>

                        </span>
                    </a>
                </div>
            </div>
        <?php echo Form::close(); ?>

    </div>
</div>


<?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/partials/search-orders-form.blade.php ENDPATH**/ ?>