<script type="text/javascript">
    $(document).on('mouseenter', "div.activity-table table > tbody > tr > td ", function () {
        var $this = $(this);
        if (this.offsetWidth < this.scrollWidth && !$this.attr('title')) {
            $this.attr('title', $this.text());
        }
    });
</script>
<?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/vendor/LaravelLogger/scripts/add-title-attribute.blade.php ENDPATH**/ ?>