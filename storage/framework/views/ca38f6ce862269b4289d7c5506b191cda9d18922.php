<?php $__env->startSection('template_title'); ?>
  <?php echo e($fiche->name); ?> - Fiches d'entretien pour plantes d'intérieur
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?>
Gardes ta plante verte d'intérieur très longtemps avec nos conseils d'entretien. Rempotage, arrosage, luminosité tout devient facile avec plantes addict.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('og'); ?>
<meta name="og:title" property="og:title" content="Vente éphémère à <?php echo e($fiche->location_city); ?> le <?php echo e($fiche->date); ?>">
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
  min-height: 240px;
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
<!-- Banner video -->


<section class="pt-2">
	<div class="container">

		<div class="row featurette">
	 <div class="col-md-7 order-md-2">
		 <h4 class="font-3 fontsize-6 py-4">Fiche d'entretien</h4>
		 <h1 class="animated flipInX featurette-heading font-uppercase fontsize-8 font-2b"><?php echo e($fiche->name); ?></h1>
<hr>

		 <?php echo $__env->make('fiches.partials.features', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	 	</div>
	 <div class="col-md-5 order-md-1 mb-4">
		 <img class="featurette-image  rounded img-fluid mx-auto" src="<?php echo e(asset("storage/$fiche->thumbnail")); ?>" alt="Image fiche d'entretien pour <?php echo e($fiche->name); ?>">
	 </div>
 </div>

	</div>
</section>

<!-- Title Page -->



<?php echo $__env->make('fiches.partials.description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


	<?php echo $fiche->content; ?>




<!-- Relate Product -->
<section class="partials-fiches-entretien bgwhite mb-4">
	<div class="container">
		<div class="sec-title py-2">

			<h2 class=" t-center font-2b"> Nos prochaines ventes</h2>

			<h3 class=" t-center my-2"> Bientôt prêt de chez vous lors d'une de nos ventes </h3>
		</div>

			<!-- Slide2 -->
		<div class="wrap-slick2 mt-2">
			<div class="slick2">
        <div class="carousel" data-flickity='{ "groupCells": true }'>

          <?php $__currentLoopData = $ventes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                  <div class="block4 carousel-cell wrap-pic-w p-1">
                    <div class="block4-square" style="position:relative;width:100%;height:400px; line-height:400px; background:<?php echo e($vente->color_code); ?>;">
                      <h3 class="text-center my-auto" style="font-size:28px;line-height:400px;" ><?php echo e($vente->name); ?></h3>
                    </div>
                    <a href="<?php echo e(url("ventes/$vente->slug")); ?>" class="block4-overlay sizefull text-white ab-t-l trans-0-4">
                        <?php if($vente->show_date == 1): ?>
                          <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-4">
                            <i class="fa fa-calendar fs-20 mr-2" aria-hidden="true"></i> <?php echo e($vente->date); ?>

                            <span class="p-t-2"></span>
                      <?php endif; ?>

                      </span>

                      <div class="block4-overlay-txt trans-0-4 p-4">
                        <h3 class="text-white"><?php echo e($vente->name); ?></h3>
                        <p class="s-text10 m-b-15 h-size1 of-hidden">
                          <?php echo e($vente->description); ?>

                        </p>

                        <span class="s-text9">
                          <?php if($vente->show_location == 1): ?>
                            <span class="text-secondary font-2">
                              <i class="fa fa-map-marker mr-1"> <?php echo e($vente->location_address); ?> <?php echo e($vente->location_postalcode); ?></i>
                            </span>
                        <?php endif; ?>

                      </div>
                    </a>
                  </div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

			</div> <!-- Wrap slick-->
		</div> <!-- Slick -->

		</div> <!-- End container -->
</section>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <script src="<?php echo e(asset('js/flickity.pkgd.min.js')); ?>" type="text/javascript">

  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/fiches/show.blade.php ENDPATH**/ ?>