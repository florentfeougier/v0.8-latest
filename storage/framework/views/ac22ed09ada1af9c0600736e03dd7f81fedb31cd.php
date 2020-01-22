<?php $__env->startSection('template_title'); ?>
  Shop - Achat de plantes d'intérieur et accessoires
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?>
  Shop en ligne
<?php $__env->stopSection(); ?>

<?php $__env->startSection('og'); ?>
<meta name="og:site_name" content="Plantes Addict">
<meta name="og:title" property="og:title" content="Shop en ligne">
<meta property="og:description" content="Commander facilement vos petites et grandes plantes toutes l'années sur notre boutique en ligne..." />
<meta property="og:type" content="website" />
<meta property="og:local" content="fr_FR" />
<meta property="og:url" content="<?php echo e(url("/shop")); ?>" />
<meta property="og:image:secure_url" content="<?php echo e(asset("storage/plantesaddict-logo-big.png")); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/flickity.min.css')); ?>">

  <style>

.carousel {
background: #FFF;
}

.carousel-cell {
width: 28%;
min-height: 400px;
margin-right: 10px;
background: #FFF;
border-radius: 5px;

}

@media (max-width: 960px) {
  .carousel-cell {
  width: 28%;
  min-height: 180px;
  margin-right: 10px;
  background: #FFF;
  border-radius: 5px;

  }

}



.carousel-cell.is-selected {
background: #FFF;
}

/* cell number */
.carousel-cell:before {
display: block;
text-align: center;
line-height: 200px;
font-size: 80px;
color: white;
}

  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <?php if(session()->has('error')): ?>
    <div style="z-index:9999; bottom:0px !important; left:10px; right:10px;" class=" position-fixed alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo session()->get('error'); ?>

    <button type="button" class="alert-close mt-2 close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>


  <?php endif; ?>

  <?php if(session()->has('success')): ?>
    <div style="z-index:9999; bottom:0px !important; left:10px; right:10px;" class=" position-fixed alert alert-success alert-dismissible fade show" role="alert">
      <?php echo session()->get('success'); ?>

    <button type="button"  class="alert-close mt-2 close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>


  <?php endif; ?>

  <?php if($message = Session::get('warning')): ?>

  <div style="z-index:9999; bottom:0px !important; left:10px; right:10px;" class=" position-fixed alert alert-warning alert-dismissible fade show" role="alert">
    <?php echo session()->get('warning'); ?>

  <button type="button" class="alert-close mt-2 close" data-dismiss="alert" aria-label="Close">
    <span class="" style="display:block; line-height:20px;" aria-hidden="true">&times;</span>
  </button>
</div>


  <?php endif; ?>
<section class="jumbotron text-center" style="border-radius:0;background-image: url(<?php echo e(url("storage/images/ventes-bg-index.jpg")); ?>);background-size: cover;">
  <div class="container">

      <h1 class="mb-2 animated zoomIn font-bold text-white text-center jumbotron-heading">Shop </h1>
      <p id="message" class="text-white pb-2"></p>


    <h2 class="lead my-2 text-white animated zoomIn">	Retrouvez une sélection de petites et grandes plantes d'intérieur toute l'année sur notre boutique</h2>

  </div>
</section>


<!-- Relate Product -->
	<section class="partials-fiches-entretien bgwhite my-3 animated slideInUp">
		<div class="container">
			<div class="sec-title pb-2">



<?php if(!$products->isEmpty()): ?>
  <h2 class="mb-2 t-center">
    Nouvel arrivage
  </h2>
  <h3 class=" t-center mb-3">
    Des plantes toutes fraiches directement du producteur, livrée sous 48h
  </h3>
</div>



<!-- Flickity HTML init -->
<div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false, "wrapAround": true,"autoPlay": 5000, "pauseAutoPlayOnHover": false }'>
  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <div class="carousel-cell">
    	<div class="item-slick2 mx-2">
    <div class="block2">


      <div class="block2-img wrap-pic-w of-hidden pos-relative

  <?php if($product->productlabel_id == 1): ?>
          block2-labelnew
  <?php elseif($product->productlabel_id == 2): ?>
          block2-labelsale
    <?php elseif($product->productlabel_id == 3): ?>
          block2-labelbaselumiere
    <?php endif; ?>

            ">
        <img src="<?php echo e(asset("storage/$product->thumbnail")); ?>" alt="<?php echo e($product->name); ?>">


      <div class="block2-overlay trans-0-4">

        <a href="<?php echo e(url("shop/produits/$product->slug")); ?>" class="block2-btn-addwishlist hov-pointer trans-0-4">
          <i class="icon-wishlist icon_heart_alt" aria-hidden="false"></i>
          <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
        </a>

        <a href="<?php echo e(url("shop/produits/$product->slug")); ?>" class="text-center" style="display:block;height:100%;">
          <i class="text-center fa fa-eye text-white" style="margin-top:43%;font-size:40px;"></i>
         </a>

        <div class="block2-btn-addcart w-size1 trans-0-4">
          <form class="ml-auto mr-auto" action="<?php echo e(url("panier/shop/store")); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="product" value="<?php echo e($product->id); ?>">
            <input type="hidden" name="cart" value="shop">
            <input type="hidden" name="quantity" value="1">
            <button type="submit" style="width:100%;" class=" text-center bg4 bo-rad-23 hov1 ml-auto mr-auto text-white btn">
AJOUTER
<img src="<?php echo e(asset('storage/icons/add-to-cart.svg')); ?>" class=" ml-1" style=" width:20px;" height="20px" alt="">

            </button>

          </form>
        </div>

      </div> <!-- end block2-overlay -->


      </div>

      <div class="block2-txt mt-2">
        <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
          <?php echo e($product->name); ?>

        </a>
        <span class="badge"><?php echo e($product->price); ?> €</span>

      </div>
    </div>
  </div>
</div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>




<?php else: ?>
  <p>Notre shop ouvrira très prochainement...</p>
<?php endif; ?>




		</div>
	</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <script src="<?php echo e(asset('js/flickity.pkgd.min.js')); ?>" type="text/javascript">

  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/shop/index.blade.php ENDPATH**/ ?>