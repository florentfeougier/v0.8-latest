<!DOCTYPE html>
<html>
    <head>
        <title>404 | Not Found.</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="img"> <img src="<?php echo e(asset('storage/icons/cactus.svg')); ?>" height="140px" alt="">  </div>
                <div class="title">Ops! Un cactus t'as piqué  </div>
                <div > <p>Cette page n'existe pas (Erreur 404)</p>  </div>
            </div>
        </div>
    </body>
</html>

<?php /**PATH /Users/florent/Dev/plantes-addict/webapp/production/v0.8-latest/resources/views/errors/404.blade.php ENDPATH**/ ?>