<?php $__env->startComponent('mail::message'); ?>

<?php if(! empty($greeting)): ?>
# <?php echo e($greeting); ?>

<?php else: ?>
<?php if($level == 'error'): ?>
# Whoops!
<?php else: ?>
# Bonjour!
<?php endif; ?>
<?php endif; ?>


<?php $__currentLoopData = $introLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo $line; ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php if(isset($actionText)): ?>
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
<?php $__env->startComponent('mail::button', ['url' => $actionUrl, 'color' => $color]); ?>
<?php echo e($actionText); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>


<?php $__currentLoopData = $outroLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo $line; ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- Salutation -->
<?php if(! empty($salutation)): ?>
<?php echo e($salutation); ?>

<?php else: ?>
A bientôt,<br><?php echo e(config('app.name')); ?>

<?php endif; ?>

<!-- Subcopy -->
<?php if(isset($actionText)): ?>
<?php $__env->startComponent('mail::subcopy'); ?>
Si vous avez des problèmes pour cliquer sur le bouton "<?php echo e($actionText); ?>" button, copy and paste the URL below
into your web browser: [<?php echo e($actionUrl); ?>](<?php echo e($actionUrl); ?>)
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/florent/Dev/plantes-addict/webapp/development/v0.8-latest/resources/views/vendor/notifications/email.blade.php ENDPATH**/ ?>