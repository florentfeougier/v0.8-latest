<div class="form-group has-feedback row">
    <?php echo Form::label('typeId', trans('laravelblocker::laravelblocker.forms.blockedTypeLabel'), array('class' => 'col-md-3 control-label'));; ?>

    <div class="col-md-9">
        <div class="input-group">
            <select class="<?php echo e($errors->has('typeId') ? 'custom-select form-control is-invalid ' : 'custom-select form-control'); ?>" name="typeId" id="typeId" >
                <option value="">
                    <?php echo e(trans('laravelblocker::laravelblocker.forms.blockedTypeSelect')); ?>

                </option>
                <?php if($blockedTypes): ?>
                    <?php $__currentLoopData = $blockedTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blockedType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($blockedType->id); ?>" data-type="<?php echo e($blockedType->slug); ?>" <?php if(isset($item)): ?> <?php echo e($item->typeId == $blockedType->id ? 'selected="selected"' : ''); ?> <?php endif; ?> >
                            <?php echo e($blockedType->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="typeId">
                    <i class="fa fas fa-fw fa-shield" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        <?php if($errors->has('typeId')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('typeId')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /Users/florent/Dev/plantesaddict/prod/vendor/jeremykenedy/laravel-blocker/src/resources/views//forms/partials/item-type-select.blade.php ENDPATH**/ ?>