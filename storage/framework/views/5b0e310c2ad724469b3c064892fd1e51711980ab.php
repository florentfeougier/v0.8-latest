<script type="text/javascript">

    // Confirm Form Submit Modal
    $('<?php echo e($formTrigger); ?>').on('show.bs.modal', function (e) {
        var message = $(e.relatedTarget).attr('data-message');
        var title = $(e.relatedTarget).attr('data-title');
        var form = $(e.relatedTarget).closest('form');
        $(this).find('.modal-body p').text(message);
        $(this).find('.modal-title').text(title);
        $(this).find('.modal-footer #confirm').data('form', form);
    });
    $('<?php echo e($formTrigger); ?>').find('.modal-footer #confirm').on('click', function(){
        $(this).data('form').submit();
    });

</script>
<?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/vendor/LaravelLogger/scripts/confirm-modal.blade.php ENDPATH**/ ?>