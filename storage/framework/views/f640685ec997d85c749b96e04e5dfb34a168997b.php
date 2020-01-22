<?php $__env->startSection('template_title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('og'); ?>
  <meta name="og:site_name" content="Plantes Addict">
  <meta name="og:title" property="og:title" content="  ">
  <meta property="og:description" content="  " />
  <meta property="og:type" content="siteweb" />
  <meta property="og:local" content="fr_FR" />
  <meta property="og:url" content="<?php echo e(url("/")); ?>" />
  <meta property="og:image:secure_url" content="<?php echo e(asset("storage/plantesaddict-logo-big.png")); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('template_linked_css'); ?>

<style>


.dummy {
  margin-top: 100%;
}
.thumbnail {
  position: absolute;
  top: 15px;
  bottom: 0;
  left: 15px;
  right: 0;
  text-align:center;
  line-height: 50%;
  padding-top:calc(50% - 30px);
}
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


  <?php if(session('message')): ?>
      <div class="alert alert-<?php echo e(Session::get('status')); ?> status-box alert-dismissable fade show" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">
              &times;
              <span class="sr-only">
                  <?php echo trans('laravelblocker::laravelblocker.flash-messages.close'); ?>

              </span>
          </a>
          <?php echo session('message'); ?>

      </div>
  <?php endif; ?>

  <?php if(session('success')): ?>
      <div class="alert alert-success alert-dismissable fade show" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">
              &times;
              <span class="sr-only">
                  <?php echo trans('laravelblocker::laravelblocker.flash-messages.close'); ?>

              </span>
          </a>
          <h4>
              <i class="icon fa fas fa-check fa-fw" aria-hidden="true"></i>
              <?php echo trans('laravelblocker::laravelblocker.flash-messages.success'); ?>

          </h4>
          <?php echo session('success'); ?>

      </div>
  <?php endif; ?>

  <?php if(session()->has('status')): ?>
      <?php if(session()->get('status') == 'wrong'): ?>
          <div class="alert alert-danger status-box alert-dismissable fade show" role="alert">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">
                  &times;
                  <span class="sr-only">
                      <?php echo trans('laravelblocker::laravelblocker.flash-messages.close'); ?>

                  </span>
              </a>
              <?php echo session('message'); ?>

          </div>
      <?php endif; ?>
  <?php endif; ?>

  <?php if(session('error')): ?>
      <div class="alert alert-danger alert-dismissable fade show" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">
              &times;
              <span class="sr-only">
                  <?php echo trans('laravelblocker::laravelblocker.flash-messages.close'); ?>

              </span>
          </a>
          <h4>
              <i class="icon fa fas fa-warning fa-fw" aria-hidden="true"></i>
              <?php echo trans('laravelblocker::laravelblocker.flash-messages.error'); ?>

          </h4>
          <?php echo session('error'); ?>

      </div>
  <?php endif; ?>

  <?php if(session('errors') && count($errors) > 0): ?>
      <div class="alert alert-danger alert-dismissable fade show" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">
              &times;
              <span class="sr-only">
                  <?php echo trans('laravelblocker::laravelblocker.flash-messages.close'); ?>

              </span>
          </a>
          <h4>
              <i class="icon fa fas fa-warning fa-fw" aria-hidden="true"></i>
              <strong>
                  <?php echo trans('laravelblocker::laravelblocker.flash-messages.whoops'); ?>

              </strong>
              <?php echo trans('laravelblocker::laravelblocker.flash-messages.someProblems'); ?>

          </h4>
          <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                      <?php echo $error; ?>

                  </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
  <?php endif; ?>

<!------------------------------>
<!--         Heading          -->
<!------------------------------>
<section class="jumbotron text-center " style="border-radius:0;background-image: url(<?php echo e(asset('storage/images/ventes-bg-index.jpg')); ?>);background-size: cover;">
  <div class="container">

    <!-- Title -->
    <h1 class="animated zoomIn mb-2 fontsize-8 font-2b font-bold text-white text-center jumbotron-heading"> Nos ventes</h1>

    <p id="message" class="animated lead zoomIn text-white pb-2">Partout en France</p>

    <h2 class="lead my-2 text-white animated zoomIn">Commander en ligne, récuperer vos plantes lors de la vente</h2>

    <!-- Newsletter form -->
    <p class="text-center animated flipInX">
      <form action="<?php echo e(url('newsletter/subscribe')); ?>" id="newsletter-form" enctype="multipart/form-data" method="get" class="animated flipInX ml-auto mr-auto newsletter-form" >
        <?php echo e(csrf_field()); ?>

           <input id="input_subscribe" type="email" class="text-white" name="user_email" id="email" placeholder="Addresse E-mail..." required>
           <button type="submit" class="add-to-newsletter button hov4">S'inscrire</button>
      </form>
    </p>

  </div>
</section>


<!------------------------------>
<!--        List sales        -->
<!------------------------------>
<section class="instagram p-t-0">
  <div class="container animated bounceInUp">

  		<div id="sales" class="flex-w rs1-block4 mb-4">

        <?php $__currentLoopData = $ventes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="block4 wrap-pic-w p-1 animated slideInUp">
          <div class="block4-square" style="position:relative;width:100%;height:400px; line-height:400px; background:<?php echo e($sale->color_code); ?>;">
            <h3 class="text-center my-auto" style="line-height:400px;" ><?php echo e($sale->name); ?></h3>
          </div>
          <a href="<?php echo e(url("ventes/$sale->slug")); ?>" class="block4-overlay sizefull ab-t-l trans-0-4">
            <span class="block4-overlay-heart  text-white  flex-m trans-0-4 p-4">

              <span class="p-t-2 ">
                <img src="<?php echo e(asset("storage/icons/calendar-w.svg")); ?>" style="width:20px;margin:0; padding:0;"width="20px" height="15px" alt="Date de l'evenement">
                <?php echo e(date('d/m/Y', strtotime($sale->date))); ?> de <?php echo e($sale->horaires); ?></span>
            </span>

            <div class="block4-overlay-txt trans-0-4 p-4">
              <h3 class="text-white"><?php echo e($sale->name); ?></h3>
              <p class="s-text10 m-b-15 h-size1 of-hidden">
                <?php echo e(substr($sale->description, 0, 180)); ?>...
              </p>

              <span class="s-text9 text-white">
                <img  src="<?php echo e(asset("storage/icons/marker-w.svg")); ?>" style="width:20px;margin:0; padding:0;" width="20px" height="15px" alt="Lieu de la vente">
<?php if($sale->show_location == true): ?>
   <?php echo e($sale->location_address); ?> - <?php echo e($sale->location_postalcode); ?>

<?php else: ?>
  Lieu non dévoilé
<?php endif; ?>
              </span>
            </div>
          </a>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



  		</div>

      <hr>

      <div class="py-3">
        <small>Ventes récemment terminé:</small>
        <?php $__currentLoopData = \App\Models\Vente::where('status', 'closed')->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="badge badge-secondary"><?php echo e($vente->name); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

  </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<script type="text/javascript">


  function delayLoop(delay, messages) {
    console.log('delayLoop');
    var time = 0;

    messages.forEach(function(value) {
        setTimeout(function()
        {
            document.getElementById("message").innerHTML = value;
        }, time)
        time += delay;
    });
  }
  delayLoop(1500, ["à Valence", "à Bordeaux", "à Nice", "à Strasbourg", "à Lyon", "à Montélimar", "à Annecy", "Partout en France"]);






</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/ventes/index.blade.php ENDPATH**/ ?>