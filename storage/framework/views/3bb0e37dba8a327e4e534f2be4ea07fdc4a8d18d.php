<?php $__env->startSection('template_title'); ?>
    Vente à <?php echo e($vente->name); ?> - <?php echo e($vente->meta_title); ?>

<?php $__env->stopSection(); ?>

<?php
  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
?>
<?php $__env->startSection('template_description'); ?>
<?php echo e($vente->meta_desc); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('og'); ?>
<meta name="og:site_name" content="Plantes Addict">
<meta name="og:title" property="og:title" content="<?php echo e($vente->meta_title); ?>">
<meta property="og:description" content="<?php echo e($vente->meta_desc); ?>" />
<meta property="og:type" content="article" />
<meta property="og:local" content="fr_FR" />
<meta property="og:url" content="<?php echo e(url("ventes/$vente->slug")); ?>" />
<meta property="og:image:secure_url" content="<?php echo e(asset("$vente->thumbnail")); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
  <style>


  @media  screen and (max-width: 560px) {
  .bg-title-page h1 {
    font-size: 2.4rem;

  }

  .bg-title-page p .badge {
    font-size: 1.0rem;
  }


    }

.wrap {
  display: flex;
  background: #FFF;
  padding: 1rem 1rem 1rem 1rem;
  border-radius: 0.5rem;
  box-shadow: 7px 7px 30px -5px rgba(0,0,0,0.1);
  margin-bottom: 2rem;
}

.wrap:hover {
  background: #f4f4f4;
  box-shadow: 8px 8px 36px -5px rgba(0,0,0,0.3);

  color: #000;
}
.wrap:hover > .ico-wrap img {
  height: 80px;
}
.ico-wrap {
  margin: auto;
}

.mbr-iconfont {
  font-size: 4.5rem !important;
  color: #313131;
  margin: 1rem;
  padding-right: 1rem;
}
.vcenter {
  margin: auto;
}

.mbr-section-title3 {
  text-align: left;
}


.mbr-bold {
  font-weight: 700;
}

.mbr-section-title3 {
    text-align: left;
}
.text-wrap h2 {
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
}
.display-5 {
    font-family: 'Source Sans Pro',sans-serif;
    font-size: 1.4rem;
}
.mbr-bold {
    font-weight: 700;
}

 .text-wrap p {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    line-height: 25px;
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

<!-- Title Page -->
<section class="bg-title-page flex-col-c-m" style="background-image: url(<?php echo e(asset('storage/images/bg-sale.jpg')); ?>);">
	<h1 class="animated zoomIn  mt-4 mb-2 t-center text-white fontsize-9 font-uppercase font-2b text-shadow" style="text-shadow: black 0.1em 0.1em 0.2em;"> <?php echo e($vente->name); ?> </h1>

	<p class="text-center">

  <!-- Lieu -->
  	<?php if($vente->show_location == 1): ?>
  		<a target="_blank" href="https://www.google.fr/maps/place/<?php echo e($vente->location_address); ?>+<?php echo e($vente->location_city); ?>" class="animated bounceInLeft fontsize-4 my-1 badge badge-pill badge-danger" data-toggle="tooltip" data-placement="top" title="Voir sur Google Maps"><img src="<?php echo e(asset('storage/icons/marker-w.svg')); ?>" class="mr-1" height="20px" alt="Lieu:"> <?php echo e($vente->location_address); ?> - <?php echo e($vente->location_postalcode); ?></a>
  	<?php else: ?>
  		<span  class="animated bounceInLeft my-1 fontsize-4 badge badge-pill badge-danger"> <img src="<?php echo e(asset('storage/icons/marker-w.svg')); ?>" class="mr-1" height="20px" alt="Lieu:"> Adresse envoyée par email après commande</span>
  	<?php endif; ?>

    <!-- Date -->
    <?php if($vente->show_date == 1): ?>
      <span  class="animated bounceInRight my-1  fontsize-4 ml-2 badge  badge-pill badge-danger">
        <img src="<?php echo e(asset('storage/icons/calendar-w.svg')); ?>" class="mr-1" height="20px" alt="Date:">
        <?php echo e(date('d/m/Y', strtotime($vente->date))); ?> de <?php echo e($vente->horaires); ?></span>
  	<?php else: ?>
      <span  class="animated bounceInRight my-1  fontsize-4 ml-2 badge  badge-pill badge-danger"><i class="fa fa-calendar-check-o"></i>  Date non dévoilée</span>
  	<?php endif; ?>

  </p>

  <!-- Countdown -->
  <?php if(\Carbon\Carbon::now() > $vente->date): ?>
  <span class="badge badge-secondary mt-3 ">Cette vente est terminé!</span>
  <?php else: ?>
  <div class="flex-c-m pt-4">

  <!-- Jours -->
    <div class="flex-col-c-m size3 bo1 bg-white mr-1 animated flipInY" style="width:65px;">
      <span class="countdown-value m-text10 p-b-1 days font-3" >
        1
      </span>

      <span class="countdown-unit s-text5 font-3" >
        jours
      </span>
    </div>

  <!-- Heures -->
      <div class="flex-col-c-m size3 bg-white bo1 mr-1 animated flipInY" style="width:65px;">
        <span class="countdown-value m-text10 p-b-1 hours font-3" >
          2
        </span>

        <span class="countdown-unit s-text5 font-3" >
          heures
        </span>
      </div>

  <!-- Minutes -->
      <div class="flex-col-c-m size3 bg-white bo1 mr-1 animated flipInY" style="width:65px;">
        <span class="countdown-value m-text10 p-b-1 minutes font-3" >
          32
        </span>

        <span class="countdown-unit s-text5 font-3" >
          mins
        </span>
      </div>

  <!-- Secondes -->
      <div class="flex-col-c-m size3 bg-white bo1 mr-1 animated flipInY" style="width:65px;">
        <span class="countdown-value m-text10 p-b-1 seconds" style="font-family: 'Amatic SC', cursive;">
          05
        </span>

        <span class="countdown-unit s-text5" style="font-family: 'Amatic SC', cursive;">
          secs
        </span>

      </div>

      </div> 	<!-- End flex -->


  <!-- Panier -->
      <div class="py-4 animated zoomIn">
    			<?php if(Cart::instance("$vente->slug")->count() == 0): ?>
    				<span class=" badge badge-pill badge-secondary" >
    Votre panier est vide pour cette vente
    </span>
			<?php else: ?>
					<a href="<?php echo e(url("panier/$vente->slug")); ?>" class="badge badge-pill badge-secondary" >
			<?php echo e(Cart::instance("$vente->slug")->count()); ?> articles dans votre panier pour cette vente
				</a>


			<?php endif; ?>
		</div>

    <?php endif; ?>

	</section>

<section>
  <div class="container">
    <p class="lead"></p>
  </div>
</section>

	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container animated slideInUp">
			<div class="row">


				<div class="col-sm-12 col-md-12 col-lg-12 py-2">
					<!--  -->

						<h3 id="products" class="my-4 text-center">
              Pré-commander vos plantes <br>
              <small class="font-3">Récupérez votre commande lors de la vente</small>

            </h3>




					<!-- Product -->
					<div class="row">

            <?php if(count($products) > 0): ?>
	<?php $__currentLoopData = $products->sortBy('price'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	<div class="col-sm-12 col-md-6 col-lg-4 my-2">
		<!-- Block2 -->
		<div class="block2 block2-name">
			<div class="block2-img wrap-pic-w px-1 of-hidden pos-relative   block2-label"


>
<?php if($product->productlabel_id != null): ?>
  <span class="text-white badge m-2 px-2 py-1 bo-rad-23" style="font-weight:none !important;display:inline-block; position:absolute; background:<?php echo e(\App\Models\ProductLabel::find($product->productlabel_id)->color_code); ?> !important;"><?php echo e(\App\Models\ProductLabel::find($product->productlabel_id)->name); ?></span>

<?php endif; ?>
    				<img src="<?php echo e(asset("$product->thumbnail")); ?>" alt="<?php echo e($product->name); ?> - <?php echo e($product->description); ?>">

    				<div class="block2-overlay trans-0-4">

    					<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
    						<i class="icon-wishlist icon_heart_alt" aria-hidden="false"></i>
    						<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
    					</a>

    					<a href="<?php echo e(url("ventes/$vente->slug/produits/$product->slug")); ?>" class="text-center" style="display:block;height:100%;">
    						<img src="<?php echo e(asset('storage/icons/eye-closeup.svg')); ?>" height="40px" style="margin-top:43%;font-size:40px;">
    					 </a>

    					<div class="block2-btn-addcart  trans-0-4">
                <form action="<?php echo e(url("panier/$vente->slug/store")); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                <input type="hidden" name="cart" value="<?php echo e($vente->slug); ?>">
                <input type="hidden" name="product" value="<?php echo e($product->id); ?>">
    						<input type="hidden" name="quantity" value="1">
    						<div class="">
                  <button type="submit" style="width:100%;" class=" text-center bg4 bo-rad-23 hov1 ml-auto mr-auto text-white btn">
      AJOUTER
      <img src="<?php echo e(asset('storage/icons/add-to-cart.svg')); ?>" class=" ml-1" style=" width:20px;" height="20px" alt="">

                  </button>
                </form>
    	</div>

    					</div>
    				</div> <!-- end block2-overlay -->

    			</div>


        		<!-- Blog -->
        			<div class="block2-txt p-t-20 fontsize-4 text-center py-2">
        				<a href="<?php echo e(url("ventes/$vente->slug/produits/$product->slug")); ?>" class="badge fontsize-3">
        					<?php echo e($product->name); ?>

        				</a>


                <?php if($product->old_price != null): ?>
                  <span class="badge badge-pill badge-success"><?php echo e($product->price); ?>€</span>
                  <span class="badge  badge-pill badge-secondary"> <del><?php echo e($product->old_price); ?>€</del> </span>
                <?php else: ?>
                  <span class="badge badge-pill badge-secondary"><?php echo e($product->price); ?>€</span>
                <?php endif; ?>
        			</div>

        		<!-- Blog -->
        	</div>

        	</div>
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <?php else: ?>
            <div class="container">
              <p class="float-center text-center">
            <?php if(\Carbon\Carbon::now() > $vente->date): ?>
              Cette vente est terminé. <a href="<?php echo e(url("ventes")); ?>">Voir nos prochaines ventes</a>
            <?php else: ?>
            Aucun plantes disponible pour cette vente.
            <?php endif; ?>
              </p>

            </div>
          <?php endif; ?>

					</div>


				</div>
			</div>
		</div>
	</section>


	<!-- Modal -->
	<div class="modal fade" id="addCartSuccessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Produit ajouté à votre panier!</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <i class="fa fa-shopping-cart"></i>
	      </div>
	      <div class="modal-footer">
	        <a href="<?php echo e(url("panier/$vente->slug")); ?>" class="btn btn-secondary" >Voir mon panier</a>
	        <a href="<?php echo e(url("panier/$vente->slug/checkout")); ?>" class="btn btn-secondary" >Valider ma commande</a>
	      </div>

	    </div>
	  </div>

	</div>

<div class="container py-3">
  <hr>
</div>


<section class="pt-2 pb-4">
<div class="container">

  <h4 class="font-2b fontsize-6 text-center pt-1">Comment ça marche ?</h4>
<p class="text-center font-3 pt-4 pb-3 fontsize-5"><?php echo e($vente->description); ?> </p>

<div class="container text-center pb-4">
  <a href="<?php echo e($vente->fb_event_url); ?>" target="_blank" title="S'inscrire à l'evenement Facebook de la vente éphemère de <?php echo e($vente->location_city); ?>" class="wrap-btn-slide1 text-center font-2 bo-rad-23 btn btn-primary animated zoomIn" >
    Voir l'évenement Facebook <img class="ml-2" src="<?php echo e(asset('storage/icons/facebook.svg')); ?>" height="20px" alt="Cliquer ici pour voir nos ventes">
  </a>
</div>
		<div class="row mbr-justify-content-center mt-2">

            <div class="col-lg-6 mbr-col-md-10">
                <div class="wrap">
                    <div class="ico-wrap">
                      <img src="<?php echo e(asset('storage/icons/plant-bold.svg')); ?>" height="70px" class="mbr-iconfont fa-globe fa">
                    </div>
                    <div class="text-wrap vcenter">
                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Variétiés <span>et fraicheur</span></h2>
                        <p class="mbr-fonts-style text1 mbr-text display-6">Toutes nos variétés: petites, moyennes et plantes d'intérieur</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mbr-col-md-10">
                <div class="wrap">
                    <div class="ico-wrap">
                      <img src="<?php echo e(asset('storage/icons/open.svg')); ?>" height="70px" class="mbr-iconfont fa-globe fa">
                    </div>
                    <div class="text-wrap vcenter">
                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Entrée gratuite
                            <span>toute la journée</span>
                        </h2>
                        <p class="mbr-fonts-style text1 mbr-text display-6">L'entrée est libre à tous le   <?php echo e(date('d/m/Y', strtotime($vente->date))); ?> de <?php echo e($vente->horaires); ?>


                          <?php if($vente->show_location == 1): ?>


                          (<?php echo e($vente->location_address); ?> - <?php echo e($vente->location_postalcode); ?> <?php echo e($vente->location_city); ?>)</p>
<?php else: ?>
  (L'adresse exacte vous sera communiqué par email)
<?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mbr-col-md-10">
                <div class="wrap">
                    <div class="ico-wrap">
                        <img src="<?php echo e(asset('storage/icons/payment-method.svg')); ?>" height="70px" class="mbr-iconfont fa-globe fa">
                    </div>
                    <div class="text-wrap vcenter">
                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Paiement facile
                            <span> & sécurisé!</span>
                        </h2>
                        <p class="mbr-fonts-style text1 mbr-text display-6">Précommander via notre site ou acheter sur place en espèces, CB et Lydia</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mbr-col-md-10">
                <div class="wrap">
                    <div class="ico-wrap">
                      <img src="<?php echo e(asset('storage/icons/shelf.svg')); ?>" height="70px" class="mbr-iconfont fa-globe fa">
                    </div>
                    <div class="text-wrap vcenter">
                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Quantité limitée <span>Commandez sur le site</span></h2>
                        <p class="mbr-fonts-style text1 mbr-text display-6">Pensez à venir le matin ou à pré-commander sur le site pour être sur d'avoir vos plantes!</p>
                    </div>
                </div>
            </div>




        </div>


</div>



</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

<script type="text/javascript">


function countdown(endDate) {
  let days, hours, minutes, seconds;

  endDate = new Date(endDate).getTime();

  if (isNaN(endDate)) {
	return;
  }

  setInterval(function(){calculate(endDate)}, 1000, true);

  function calculate() {


    let startDate = new Date();
    startDate = startDate.getTime();

    let timeRemaining = parseInt((endDate - startDate) / 1000);

    if (timeRemaining >= 0) {
      days = parseInt(timeRemaining / 86400);
      timeRemaining = (timeRemaining % 86400);

      hours = parseInt(timeRemaining / 3600);
      timeRemaining = (timeRemaining % 3600);

      minutes = parseInt(timeRemaining / 60);
      timeRemaining = (timeRemaining % 60);



      seconds = parseInt(timeRemaining);

      document.querySelector(".days").innerHTML = parseInt(days, 10);
      document.querySelector(".hours").innerHTML = ("0" + hours).slice(-2);
      document.querySelector(".minutes").innerHTML = ("0" + minutes).slice(-2);
      document.querySelector(".seconds").innerHTML = ("0" + seconds).slice(-2);
    } else {
      return;
    }
  }
}

(function () {
  countdown("<?php echo e($vente->date); ?>".replace(/\s/, 'T')+'Z');
}());




</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/ventes/show.blade.php ENDPATH**/ ?>