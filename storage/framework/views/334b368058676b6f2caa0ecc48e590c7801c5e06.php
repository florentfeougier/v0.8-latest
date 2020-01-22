<div class="js-cookie-consent cookie-consent py-2 pl-4 pr-2" style="z-index: 999; position:fixed; bottom:0; left:0; right:0; background:#333; color:#FFF;">

    <span class="cookie-consent__message">
        <?php echo trans('cookieConsent::texts.message'); ?>

    </span>

    <a href="<?php echo e(url("rgpd")); ?>" class="mx-2 js-cookie-consent-agree cookie-consent__agree bo-rad-23 btn btn-outline-secondary">
        En savoir plus
    </a>
    <button class="js-cookie-consent-agree cookie-consent__agree bo-rad-23 btn btn-danger">
        <?php echo e(trans('cookieConsent::texts.agree')); ?>

    </button>

</div>
<?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/vendor/cookieConsent/dialogContents.blade.php ENDPATH**/ ?>