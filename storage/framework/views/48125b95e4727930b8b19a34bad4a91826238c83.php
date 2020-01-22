<?php echo Form::open([
    'route' => 'laravelblocker::blocker.store',
    'method' => 'POST',
    'role' => 'form',
    'class' => 'needs-validation'
]); ?>

    <?php echo csrf_field(); ?>

    <?php echo $__env->make('laravelblocker::forms.partials.item-type-select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('laravelblocker::forms.partials.item-value-input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('laravelblocker::forms.partials.item-blocked-user-select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('laravelblocker::forms.partials.item-note-input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-sm-9 offset-sm-3">
                <?php echo Form::button(trans('laravelblocker::laravelblocker.buttons.create-larger'), array('class' => 'btn btn-success btn-block margin-bottom-1 mb-1 float-right','type' => 'submit' )); ?>

        </div>
    </div>
<?php echo Form::close(); ?>

<?php /**PATH /Users/florent/Dev/plantesaddict/prod/vendor/jeremykenedy/laravel-blocker/src/resources/views//forms/create-new.blade.php ENDPATH**/ ?>