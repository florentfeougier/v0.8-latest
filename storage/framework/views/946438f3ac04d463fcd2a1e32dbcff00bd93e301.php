<?php $__env->startSection('template_title'); ?>
    <?php echo trans('usersmanagement.showing-all-users'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
    <?php if(config('usersmanagement.enabledDatatablesJs')): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(config('usersmanagement.datatablesCssCDN')); ?>">
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
                              Toutes les pages
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        dddd
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/pages/create">
                                        <i class="fa fa-page-plus" aria-hidden="true"></i>
                                        <?php echo trans('pagesmanagement.buttons.create-new'); ?>

                                    </a>
                                    <a class="dropdown-item" href="/pages/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        <?php echo trans('pagesmanagement.show-deleted-pages'); ?>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php if(config('pagesmanagement.enableSearchUsers')): ?>
                            <?php echo $__env->make('partials.search-pages-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                        <div class="table-responsive pages-table">
                            <table class="table table-striped table-sm data-table table-responsive">
                                <caption id="page_count">
                                    <?php echo e(trans_choice('pagesmanagement.pages-table.caption', 1, ['pagescount' => count($pages)])); ?>

                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th><?php echo trans('pagesmanagement.pages-table.name'); ?></th>
                                        <th class="hidden-xs">URL</th>
                                        <th class="hidden-sm hidden-xs hidden-md">Mis à jour</th>
                                        <th><?php echo trans('pagesmanagement.pages-table.actions'); ?></th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="pages_table">
                                    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td><?php echo e($page->name); ?></td>
                                            <td class="hidden-xs">
                                              <small>
                                              <a href="mailto:<?php echo e($page->slug); ?>" title="email <?php echo e($page->email); ?>">/<?php echo e($page->slug); ?></a>
                                            </small>

                                            </td>
                                            <td class="hidden-sm hidden-xs hidden-md"><?php echo e($page->updated_at->diffForHumans()); ?></td>

                                            <td>
                                                <a class="btn btn-sm btn-outline-success btn-block" href="<?php echo e(URL::to('manager/pages/' . $page->id)); ?>" data-toggle="tooltip" title="Show">
                                                  Voir <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="<?php echo e(URL::to('manager/pages/' . $page->id . '/edit')); ?>" data-toggle="tooltip" title="Edit">
                                                    Modifier <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tbody id="search_results"></tbody>
                                <?php if(config('pagesmanagement.enableSearchUsers')): ?>
                                    <tbody id="search_results"></tbody>
                                <?php endif; ?>

                            </table>

                            <?php if(config('pagesmanagement.enablePagination')): ?>
                                <?php echo e($pages->links()); ?>

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
    <?php if((count($pages) > config('pagesmanagement.datatablesJsStartCount')) && config('pagesmanagement.enabledDatatablesJs')): ?>
        <?php echo $__env->make('scripts.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.save-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(config('usersmanagement.tooltipsEnabled')): ?>
        <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(config('usersmanagement.enableSearchUsers')): ?>
        <?php echo $__env->make('scripts.search-users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/pagesmanagement/show-pages.blade.php ENDPATH**/ ?>