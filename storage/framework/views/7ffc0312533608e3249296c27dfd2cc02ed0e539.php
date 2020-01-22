<?php if(config('laravelblocker.jQueryIpMaskEnabled')): ?>
    <script src="<?php echo e(config('laravelblocker.jQueryIpMaskCDN')); ?>"></script>
<?php endif; ?>

<script>
    $(function() {
        var blockedType = $('#typeId');
        var blockedUser = $('#userId');
        var blockedValue = $('#value');

        checkBlockedTypes(blockedUser, blockedValue, blockedType, false);

        blockedType.on('change', function() {
            checkBlockedTypes(blockedUser, blockedValue, blockedType, true);
        });
        blockedUser.on('change', function() {
            checkBlockedUser(blockedUser, blockedValue);
        });
    });

    function checkBlockedTypes(blockedUser, blockedValue, blockedType, clearTypes = false) {
        var type = blockedType.find(':selected').data('type');
        var blockerValueLabel1 = $('#blockerValueLabel1');
        var blockerValueLabel2 = $('#blockerValueLabel2');

        var blockerUserLabel1 = $('#blockerUserLabel1');
        var blockerUserLabel2 = $('#blockerUserLabel2');
        var disabledClass = 'disabled';

        if (clearTypes) {
            blockedValue.removeClass(disabledClass).val('');
            blockerValueLabel1.removeClass(disabledClass);
            blockerValueLabel2.removeClass(disabledClass);
            blockedUser.addClass(disabledClass).val('');
            blockerUserLabel1.addClass(disabledClass);
            blockerUserLabel2.addClass(disabledClass);
        };

        

        if (type == 'user') {
            blockedValue.addClass(disabledClass).val('');
            blockerValueLabel1.addClass(disabledClass);
            blockerValueLabel2.addClass(disabledClass);

            checkBlockedUser(blockedUser, blockedValue);

            blockedUser.removeClass(disabledClass);
            blockerUserLabel1.removeClass(disabledClass);
            blockerUserLabel2.removeClass(disabledClass);
        };

        
    }

    function checkBlockedUser(blockedUser, blockedValue) {
        var email = blockedUser.find(':selected').data('email');
        blockedValue.val(email);
    }

</script>
<?php /**PATH /Users/florent/Dev/plantesaddict/prod/vendor/jeremykenedy/laravel-blocker/src/resources/views//scripts/blocked-form.blade.php ENDPATH**/ ?>