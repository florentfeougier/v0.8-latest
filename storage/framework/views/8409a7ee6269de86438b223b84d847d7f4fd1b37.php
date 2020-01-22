<div class="form-group has-feedback row">
    <?php echo Form::label('value', trans('laravelblocker::laravelblocker.forms.blockedValueLabel'), array('class' => 'col-md-3 control-label', 'id' => 'blockerValueLabel1'));; ?>

    <div class="col-md-9">
        <div class="input-group">
            <?php if(isset($item)): ?>
                <?php echo Form::text('value', $item->value, array('id' => 'value', 'class' => $errors->has('value') ? 'form-control is-invalid ' : 'form-control', 'placeholder' => trans('laravelblocker::laravelblocker.forms.blockedValuePH'))); ?>

            <?php else: ?>
                <?php echo Form::text('value', NULL, array('id' => 'value', 'class' => $errors->has('value') ? 'form-control is-invalid ' : 'form-control', 'placeholder' => trans('laravelblocker::laravelblocker.forms.blockedValuePH'))); ?>

            <?php endif; ?>
            <div class="input-group-append">
                <label class="input-group-text" for="value" id="blockerValueLabel2">
                    <i class="fa fa-fw fa-key fa-rotate-90" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        <?php if($errors->has('value')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('value')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /Users/florent/Dev/plantesaddict/prod/vendor/jeremykenedy/laravel-blocker/src/resources/views//forms/partials/item-value-input.blade.php ENDPATH**/ ?>