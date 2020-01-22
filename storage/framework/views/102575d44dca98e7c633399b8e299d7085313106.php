<?php $__env->startSection('template_title'); ?>
Nos fiches d'entretien
<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description'); ?>
Parce que nous aussi là pour vous aider à l'entretien de vos petites et grandes plantes d'intérieur
<?php $__env->stopSection(); ?>


<?php $__env->startSection('template_fastload_css'); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/flickity.min.css')); ?>">


  <style>

.carousel {
background: #FFF;
}

.carousel-cell {
width: 28%;
min-height: 240px;
margin-right: 10px;
background: #FFF;
border-radius: 5px;

}

@media (max-width: 960px) {
  .carousel-cell {
  width: 33%;
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

.dummy {
  margin-top: 100%;
}
.thumbnail {
  position: absolute;
  top: 10px;
  bottom: 0;
  left: 0px;
  right: 0;
  text-align:center;
  line-height: 15px;
  color: #FFFF;
  padding-top:calc(50% - 30px);
}

.cons {
  width: 25%;
  height: 25%;

}

.cons h3 {
  color: #FFF;
  font-size: 18px;
  line-height: 10px;
}

@media (min-width: 768px) {

.cons{
  width: 50%;
  height: 50%;
}

}

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



<section class="jumbotron text-center" style="border-radius:0;background-image: url(<?php echo e(asset('storage/images/ventes-bg-index.jpg')); ?>);background-size: cover;">
  <div class="container">
    <h1 class="mb-2 font-bold text-white text-center jumbotron-heading animated zoomIn">ENTRETENIR VOS PLANTES</h1>
    <h2 class="lead my-2 text-white animated zoomIn">Parce que nous sommes aussi la pour vous conseillez</h2>
    <p class="text-center ">
      <form  action="<?php echo e(url("entretien")); ?>" class="animated zoomIn newsletter-form ml-auto mr-auto" method="GET" target="">
<?php echo e(csrf_field()); ?>


           <input type="text" name="q" id="email" placeholder="Cactus, Monstera..." required>
           <button type="submit" class="button">Rechercher</button>
         </form>
    </p>
  </div>
</section>


<!-- Section: fiches entretiens -->
<div class="animated slideInUp">


  <!-- Relate Product -->
  	<section class="partials-fiches-entretien bgwhite">
  		<div class="container">
  			<div class="sec-title py-2">

  				<h2 class=" t-center font-2">
  				 Fiches d'entretiens
  				</h2>
  				<h3 class=" t-center my-2">
  				 Retrouvez les infos necessaire au bon entretien de votre plante
  				</h3>
            <p class="text-center">				<a href="<?php echo e(url('fiches-entretien')); ?>" class="t-center my-2 btn btn-outline-danger bo-rad-23">Voir toutes (<?php echo e(count($fiches)); ?>)</a>
  </p>			</div>

  			<!-- Slide2 -->


<div class="carousel pt-3" data-flickity='{ "pageDots": false, "groupCells": true, "wrapAround": true,"autoPlay": 5000, "pauseAutoPlayOnHover": false }'>
            <?php $__currentLoopData = $fiches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  					<div class="item-slick2 carousel-cell mx-2">
  						<!-- Block2 -->
  						<div class="block2">


  							<div class="block2-img wrap-pic-w of-hidden pos-relative">

                  <img src='<?php echo e(asset("storage/$fiche->thumbnail")); ?>' alt="<?php echo e($fiche->name); ?>">


                <div class="block2-overlay trans-0-4">

                  <a href="<?php echo e(url("fiches-entretien/$fiche->slug")); ?>" class="block2-btn-addwishlist hov-pointer trans-0-4">
                    <i class="icon-wishlist icon_heart_alt" aria-hidden="false"></i>
                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                  </a>

                  <a href="<?php echo e(url("fiches-entretien/$fiche->slug")); ?>" class="text-center" style="display:block;height:100%;">
                    <i class="text-center fa fa-eye text-white" style="margin-top:43%;font-size:40px;"></i>
                   </a>

                  <div class=" w-size1 trans-0-4">

                      <a href="<?php echo e(url("fiches-entretien/$fiche->slug")); ?>" class="text-center bg4 bo-rad-23 hov1 text-white btn">
                        Fiche d'entretien
                      </a>


                  </div>

                </div> <!-- end block2-overlay -->


  							</div>

  							<div class="block2-txt mt-2">
  								<a href="<?php echo e(url("fiches-entretien/$fiche->slug")); ?>" class="badge fontsize-2 block2-name dis-block s-text3 p-b-5">
  									<?php echo e($fiche->name); ?>

  								</a>

  							</div>
  						</div>
  					</div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  				</div>



  		</div>
  	</section>



    <section class="instagram py-2 mt-4">
      <div class="container">
        <div class="sec-title py-2">

          <h2 class="fontsize-8 t-center py-2 font-2">
        NOS ASTUCES
          </h2>
          <h3 class=" t-center font-3 my-2">
 Retrouvez nos différents conseils et astuces pour vous aider à l'entretien de vos plantes           </h3>
            <p class="text-center">				<a href="<?php echo e(url('blog/astuces')); ?>" class="t-center my-2 btn btn-outline-danger bo-rad-23">Voir toutes (<?php echo e(count($astuces)); ?>)</a>
    </p>			</div>
      		<div id="sales" class="flex-w rs1-block4 mb-4">


            <?php $__currentLoopData = $astuces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $astuce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="block4 wrap-pic-w p-1">
              <div class="block4-square" style="position:relative;width:100%;height:400px; line-height:400px; background:<?php echo e($astuce->color_code); ?>;">
                <h3 class="text-center my-auto" style="font-size:28px;line-height:400px;" ><?php echo e($astuce->name); ?></h3>
              </div>
              <a href="<?php echo e(url("blog/astuces/$astuce->slug")); ?>" class="block4-overlay sizefull ab-t-l trans-0-4">
                <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-4">
                  <i class="fa fa-plant fs-20 mr-2" aria-hidden="true"></i>
                  <span class="p-t-2"></span>
                </span>

                <div class="block4-overlay-txt trans-0-4 p-4">
                  <h3 class="text-white"><?php echo e($astuce->name); ?></h3>
                  <p class="s-text10 m-b-15 h-size1 of-hidden">
                    <?php echo e($astuce->description); ?>

                  </p>

                  <span class="s-text9">
                    <i class="fa fa-plant mr-1"></i>
                  </span>
                </div>
              </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      		</div>

      </div>
    </section>


</div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>


<script src="<?php echo e(asset('js/flickity.pkgd.min.js')); ?>" type="text/javascript">

</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantes-addict/webapp/development/v0.8-latest/resources/views/entretien/index.blade.php ENDPATH**/ ?>