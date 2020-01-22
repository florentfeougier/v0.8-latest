<?php $__env->startSection('template_title'); ?>
Toutes les commandes supprimées

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                                <a href="<?php echo e(url("manager/orders")); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('ordersmanagement.tooltips.back-orders')); ?>">
                                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                    Retour aux commandes
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php if(count($orders) === 0): ?>

                            <tr>
                                <p class="text-center margin-half">
                                    <?php echo trans('ordersmanagement.no-records'); ?>

                                </p>
                            </tr>

                        <?php else: ?>

                            <div class="table-responsive orders-table">
                                <table class="table table-striped table-sm data-table">
                                    <caption id="order_count">
                                        <?php echo e(trans_choice('ordersmanagement.orders-table.caption', 1, ['orderscount' => $orders->count()])); ?>

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

                                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="hidden-xxs"><?php echo e($order->order_id); ?></td>
                                                <td><?php echo e($order->created_at); ?></td>
                                                <td class="hidden-xs hidden-sm"><a href="mailto:<?php echo e($order->cart); ?>" title="email <?php echo e($order->email); ?>"><?php echo e($order->email); ?></a></td>
                                                <td class="hidden-xs hidden-sm hidden-md"><?php echo e($order->user->email); ?></td>
                                                <td class="hidden-xs"><?php echo e($order->deleted_at); ?></td>
                                                <td class="hidden-xs"><?php echo e($order->deleted_ip_address); ?></td>
                                                <td>
                                                    <?php echo Form::model($order, array('action' => array('SoftDeletesOrderController@update', $order->id), 'method' => 'PUT', 'data-toggle' => 'tooltip')); ?>

                                                        <?php echo Form::button('<i class="fa fa-refresh" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-block btn-sm', 'type' => 'submit', 'data-toggle' => 'tooltip', 'title' => 'Restore User')); ?>

                                                    <?php echo Form::close(); ?>

                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-info btn-block" href="<?php echo e(URL::to('manager/orders/deleted/' . $order->id)); ?>" data-toggle="tooltip" title="Show User">
                                                        <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php echo Form::model($order, array('action' => array('SoftDeletesOrderController@destroy', $order->id), 'method' => 'DELETE', 'class' => 'inline', 'data-toggle' => 'tooltip', 'title' => 'Destroy User Record')); ?>

                                                        <?php echo Form::hidden('_method', 'DELETE'); ?>

                                                        <?php echo Form::button('<i class="fa fa-order-times" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm inline','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this order ?')); ?>

                                                    <?php echo Form::close(); ?>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php if(count($orders) > 10): ?>
        <?php echo $__env->make('scripts.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.save-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/ordersmanagement/show-deleted-orders.blade.php ENDPATH**/ ?>