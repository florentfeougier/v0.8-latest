<div class="form-group has-feedback row">
    <?php echo Form::label('note', trans('laravelblocker::laravelblocker.forms.blockedNoteLabel'), array('class' => 'col-md-3 control-label'));; ?>

    <div class="col-md-9">
        <div class="input-group">
            <?php if(isset($item)): ?>
                <?php echo Form::textarea('note', $item->note, array('id' => 'note', 'class' => $errors->has('note') ? 'form-control is-invalid ' : 'form-control', 'placeholder' => trans('laravelblocker::laravelblocker.forms.blockedNotePH'))); ?>

            <?php else: ?>
                <?php echo Form::textarea('note', NULL, array('id' => 'note', 'class' => $errors->has('note') ? 'form-control is-invalid ' : 'form-control', 'placeholder' => trans('laravelblocker::laravelblocker.forms.blockedNotePH'))); ?>

            <?php endif; ?>
            <div class="input-group-append">
                <label class="input-group-text" for="note">
                    <i class="fa fa-fw fa-pencil" aria-hidden="true"></i>
                </label>
            </div>
        </div>
        <?php if($errors->has('note')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('note')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /Users/florent/Dev/plantesaddict/prod/vendor/jeremykenedy/laravel-blocker/src/resources/views//forms/partials/item-note-input.blade.php ENDPATH**/ ?>