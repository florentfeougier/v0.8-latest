<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <title>elFinder 2.0</title>

        <!-- jQuery and jQuery UI (REQUIRED) -->
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

        <!-- elFinder CSS (REQUIRED) -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset($dir.'/css/elfinder.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset($dir.'/css/theme.css')); ?>">

        <!-- elFinder JS (REQUIRED) -->
        <script src="<?php echo e(asset($dir.'/js/elfinder.min.js')); ?>"></script>

        <?php if($locale): ?>
            <!-- elFinder translation (OPTIONAL) -->
            <script src="<?php echo e(asset($dir."/js/i18n/elfinder.$locale.js")); ?>"></script>
        <?php endif; ?>

        <!-- elFinder initialization (REQUIRED) -->
        <script type="text/javascript" charset="utf-8">
            // Documentation for client options:
            // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
            $().ready(function() {
                $('#elfinder').elfinder({
                    // set your elFinder options here
                    <?php if($locale): ?>
                        lang: '<?php echo e($locale); ?>', // locale
                    <?php endif; ?>
                    customData: { 
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    url : '<?php echo e(route("elfinder.connector")); ?>',  // connector URL
                    soundPath: '<?php echo e(asset($dir.'/sounds')); ?>'
                });
            });
        </script>
    </head>
    <body>

        <!-- Element where elFinder will be created (REQUIRED) -->
        <div id="elfinder"></div>

    </body>
</html>
<?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/vendor/elfinder/elfinder.blade.php ENDPATH**/ ?>