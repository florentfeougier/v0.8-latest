<?php $__env->startSection('template_title'); ?>
  Tous les labels produits
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
    <?php if(config('productsmanagement.enabledDatatablesJs')): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(config('productsmanagement.datatablesCssCDN')); ?>">
    <?php endif; ?>
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Tous les labels produits
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                              <a class="dropdown-item hidden-xs" href="/manager/products">
                                  <i class="fa fa-eye" aria-hidden="true"></i>
                                  Voir les produits
                              </a>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        <?php echo trans('productsmanagement.products-menu-alt'); ?>

                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/manager/products/labels/create">
                                        <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                        Ajouter un label
                                    </a>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php if(config('productsmanagement.enableSearchProducts')): ?>
                            <?php echo $__env->make('partials.search-products-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count">
                                    Total: <?php echo e(count($productlabels)); ?>

                                </caption>
                                <thead class="thead">
                                    <tr>
                                      <th>Slug</th>
                                        <th class="hidden-xs">Name</th>
                                        <th class="hidden-xs">Couleur</th>
                                        <th><?php echo trans('productsmanagement.products-table.stock'); ?></th>
                                        <th>Infos</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="users_table">
                                    <?php $__currentLoopData = $productlabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productcategorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>


                                            <td>
                                                <?php echo e(count($productcategorie->products)); ?>

                                            </td>

                                            <td class="hidden-sm hidden-xs hidden-md"> <?php echo e($productcategorie->name); ?></td>
                                            <td class="hidden-sm hidden-xs hidden-md"> <span class="text-white badge" style="background:<?php echo e($productcategorie->color_code); ?>"><?php echo e($productcategorie->color_code); ?></span > </td>

                                            <td>
                                                <?php echo Form::open(array('url' => 'manager/products/labels/' . $productcategorie->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Supprimer')); ?>

                                                    <?php echo Form::hidden('_method', 'DELETE'); ?>

                                                    <?php echo Form::button(trans('productsmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')); ?>

                                                <?php echo Form::close(); ?>

                                            </td>
                                            <td style="line-height:80px;">
                                                <a class="btn btn-sm btn-success btn-block" href="<?php echo e(URL::to('manager/products/labels/' . $productcategorie->id)); ?>" data-toggle="tooltip" title="Voir les détails">
                                                    <?php echo trans('productsmanagement.buttons.show'); ?>

                                                </a>
                                            </td>
                                            <td style="line-height:80px;">
                                                <a class="btn btn-sm btn-info btn-block" href="<?php echo e(URL::to('manager/products/labels/' . $productcategorie->id . '/edit')); ?>" data-toggle="tooltip" title="Modifier">
                                                    <?php echo trans('productsmanagement.buttons.edit'); ?>

                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tbody id="search_results"></tbody>
                                <?php if(config('productsmanagement.enableSearchProducts')): ?>
                                    <tbody id="search_results"></tbody>
                                <?php endif; ?>

                            </table>

                            <?php if(config('productsmanagement.enablePagination')): ?>
                                <?php echo e($productlabels->links()); ?>

                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
    <?php if((count($productlabels) > config('productsmanagement.datatablesJsStartCount')) && config('productsmanagement.enabledDatatablesJs')): ?>
        <?php echo $__env->make('scripts.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.save-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(config('productsmanagement.tooltipsEnabled')): ?>
        <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(config('productsmanagement.enableSearchProducts')): ?>
        <?php echo $__env->make('scripts.search-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/productlabelsmanagement/show-productlabels.blade.php ENDPATH**/ ?>