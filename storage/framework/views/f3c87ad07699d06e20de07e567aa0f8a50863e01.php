<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Paybox payment</title>
</head>
<body>
<form method="post" action="<?php echo e($url); ?>" id="paybox-payment">
    <?php $__currentLoopData = $parameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($value); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <input type="submit" value="Redirection vers le site du Crédit Agricole en cours. Cliquer ici sur vous n'êtes pas rediriger automatiquement...">
</form>
<script>
    document.getElementById("paybox-payment").submit();
</script>
</body>
</html>
<?php /**PATH /Users/florent/Dev/plantes-addict/webapp/development/v0.8-latest/resources/views/paybox/send.blade.php ENDPATH**/ ?>