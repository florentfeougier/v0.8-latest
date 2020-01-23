<!-- Page content -->
<div class="container-fluid mt-4 mt--7">
  <div class="row">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
      <div class="card card-profile shadow">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
            <a href="<?php echo e(url('home')); ?>">
            <img width="160px"  src="<?php echo e(url("storage/icons/cactus.svg")); ?>" class="mt-4 rounded-circle">
            </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="d-flex justify-content-between">
          <a href="<?php echo e(url('panier')); ?>" class="btn btn-sm btn-secondary mr-4">Mon panier</a>
          <a target="_blank" href="https://www.facebook.com/pg/plantesaddict/groups/?ref=page_internal" class="btn btn-sm btn-secondary float-right">Aide ?</a>
          </div>
        </div>
        <div class="card-body pt-0 pt-md-4">
          <div class="row">
            <div class="col">
              <div class="card-profile-stats d-flex justify-content-center mt-md-5">
              <div>
            <span class="heading"><?php echo e(count(Auth::user()->orders)); ?></span>
            <span class="description">Commandes</span>
            </div>
          <div>
        <span class="heading"><?php echo e(count(Auth::user()->products)); ?></span>
        <span class="description">Plantes</span>
        </div>
      <div>
    <span class="heading">0</span>
    <span class="description">Notifications</span>
    </div>
  </div>
</div>

</div>

<div class="text-center">
  <h3>
  <?php echo e(Auth::user()->first_name); ?><span class="font-weight-light">

  <?php if(Auth::user()->birthday != null): ?>
    , <?php echo e(intval(date('Y', time() - strtotime(Auth::user()->birthday))) - 1970); ?> ans</span>
  <?php endif; ?>

  </h3>
  <div class=" font-weight-300">

<span>  <i class="mr-2 fa fa-map-marker"></i><?php echo e(Auth::user()->profile->phone_number ?? "Aucun téléphone renseigné"); ?>

</span>


  </div>
  <div class=" font-weight-300">

    <span>  <i class="mr-2 fa fa-phone"></i><?php echo e(Auth::user()->profile->location_address ?? "Aucune adresse de facturation renseignée"); ?> - <?php echo e(Auth::user()->profile->location_city ?? ""); ?> <?php echo e(Auth::user()->profile->location_address ?? ""); ?>

    </span>

  </div>


  <hr class="my-4">
  <p></p>
  <a href="<?php echo e(url('profile/' . Auth::user()->name . '/edit')); ?>">Modifier mes informations</a>
</div>

<?php /**PATH /Users/florent/Dev/plantes-addict/webapp/development/v0.8-latest/resources/views/pages/user/profile-info.blade.php ENDPATH**/ ?>