<?php $__env->startSection(config('laravelblocker.laravelBlockerTitleExtended')); ?>
    <?php echo trans('laravelblocker::laravelblocker.titles.create-blocked'); ?>

<?php $__env->stopSection(); ?>

<?php
    switch (config('laravelblocker.blockerBootstapVersion')) {
        case '4':
            $containerClass = 'card';
            $containerHeaderClass = 'card-header bg-warning text-white';
            $containerBodyClass = 'card-body';
            break;
        case '3':
        default:
            $containerClass = 'panel panel-warning';
            $containerHeaderClass = 'panel-heading';
            $containerBodyClass = 'panel-body';
    }
    $blockerBootstrapCardClasses = (is_null(config('laravelblocker.blockerBootstrapCardClasses')) ? '' : config('laravelblocker.blockerBootstrapCardClasses'));
?>

<?php $__env->startSection(config('laravelblocker.blockerBladePlacementCss')); ?>
    <?php if(config('laravelblocker.blockerEnableFontAwesomeCDN')): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(config('laravelblocker.blockerFontAwesomeCDN')); ?>">
    <?php endif; ?>
    <?php echo $__env->make('laravelblocker::partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('laravelblocker::partials.bs-visibility-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('laravelblocker::partials.flash-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="<?php echo e($containerClass); ?> <?php echo e($blockerBootstrapCardClasses); ?>">
                    <div class="<?php echo e($containerHeaderClass); ?>">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <?php echo trans('laravelblocker::laravelblocker.titles.create-blocked'); ?>

                            <div class="pull-right">
                                <a href="<?php echo e(url('blocker')); ?>" class="btn btn-warning btn-sm float-right text-white" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('laravelblocker::laravelblocker.tooltips.back-blocked')); ?>">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    <?php echo trans('laravelblocker::laravelblocker.buttons.back-to-blocked'); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="<?php echo e($containerBodyClass); ?>">
                        <?php echo $__env->make('laravelblocker::forms.create-new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection(config('laravelblocker.blockerBladePlacementJs')); ?>
    <?php if(config('laravelblocker.enablejQueryCDN')): ?>
        <script type="text/javascript" src="<?php echo e(config('laravelblocker.JQueryCDN')); ?>"></script>
    <?php endif; ?>
    <?php if(config('laravelblocker.tooltipsEnabled')): ?>
        <?php echo $__env->make('laravelblocker::scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('laravelblocker::scripts.blocked-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('inline_template_linked_css'); ?>
<?php echo $__env->yieldContent('inline_footer_scripts'); ?>

<?php echo $__env->make(config('laravelblocker.laravelBlockerBladeExtended'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/vendor/jeremykenedy/laravel-blocker/src/resources/views//laravelblocker/create.blade.php ENDPATH**/ ?>