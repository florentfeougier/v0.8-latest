<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($order->order_id); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/ventesmanagement/show-vente-orders.blade.php ENDPATH**/ ?>