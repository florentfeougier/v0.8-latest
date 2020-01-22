<div class="form-group has-feedback row">
    <?php echo Form::label('userId', trans('laravelblocker::laravelblocker.forms.blockedUserLabel'), array('class' => 'col-md-3 control-label disabled', 'id' => 'blockerUserLabel1'));; ?>

    <div class="col-md-9">
        <div class="input-group">
            <select class="<?php echo e($errors->has('userId') ? 'custom-select form-control is-invalid disabled' : 'custom-select form-control disabled'); ?>" name="userId" id="userId">
                <option value="">
                    <?php echo e(trans('laravelblocker::laravelblocker.forms.blockedUserSelect')); ?>

                </option>
                <?php if($users): ?>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($aUser->id); ?>" data-email="<?php echo e($aUser->email); ?>" <?php if(isset($item->userId)): ?> <?php echo e($item->userId == $aUser->id ? 'selected="selected"' : ''); ?> <?php endif; ?> >
                            <?php echo e($aUser->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
            <div class="input-group-append">
                <label class="input-group-text disabled" for="userId" id="blockerUserLabel2">
                    <i class="fa fas fa-fw fa-shield" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        <?php if($errors->has('userId')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('userId')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /Users/florent/Dev/plantesaddict/prod/vendor/jeremykenedy/laravel-blocker/src/resources/views//forms/partials/item-blocked-user-select.blade.php ENDPATH**/ ?>