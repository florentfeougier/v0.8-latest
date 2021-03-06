<?php $__env->startSection('template_title'); ?>
    boite à <?php echo e($boite->name); ?> - <?php echo e($boite->meta_title); ?>

<?php $__env->stopSection(); ?>

<?php
  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
?>
<?php $__env->startSection('template_description'); ?>
<?php echo e($boite->meta_desc); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('og'); ?>
<meta name="og:site_name" content="Plantes Addict">
<meta name="og:title" property="og:title" content="<?php echo e($boite->meta_title); ?>">
<meta property="og:description" content="<?php echo e($boite->meta_desc); ?>" />
<meta property="og:type" content="article" />
<meta property="og:local" content="fr_FR" />
<meta property="og:url" content="<?php echo e(url("boites/$boite->slug")); ?>" />
<meta property="og:image:secure_url" content="<?php echo e(asset("$boite->thumbnail")); ?>" />
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
	<h1 class="animated zoomIn  mt-4 mb-2 t-center text-white fontsize-9 font-uppercase font-2b text-shadow" style="text-shadow: black 0.1em 0.1em 0.2em;"> <?php echo e($boite->name); ?> </h1>

	<p class="text-center">

  <!-- Lieu -->
  	<?php if($boite->show_location == 1): ?>
  		<a target="_blank" href="https://www.google.fr/maps/place/<?php echo e($boite->location_address); ?>+<?php echo e($boite->location_city); ?>" class="animated bounceInLeft fontsize-4 my-1 badge badge-pill badge-danger" data-toggle="tooltip" data-placement="top" title="Voir sur Google Maps"><img src="<?php echo e(asset('storage/icons/marker-w.svg')); ?>" class="mr-1" height="20px" alt="Lieu:"> <?php echo e($boite->location_address); ?> - <?php echo e($boite->location_postalcode); ?></a>
  	<?php else: ?>
  		<span  class="animated bounceInLeft my-1 fontsize-4 badge badge-pill badge-danger"> <img src="<?php echo e(asset('storage/icons/marker-w.svg')); ?>" class="mr-1" height="20px" alt="Lieu:"> <?php echo e($boite->price); ?>€ Livraison incluse</span>
  	<?php endif; ?>


  </p>

  <!-- Countdown -->
<div>


  <?php if(\Carbon\Carbon::now() > $boite->date): ?>
  <?php else: ?>




  <!-- Panier -->
      <div class="py-4 animated zoomIn">
    			<?php if(Cart::instance("$boite->slug")->count() == 0): ?>
    				<span class=" badge badge-pill badge-secondary" >
    Votre panier est vide pour cette boite
    </span>
			<?php else: ?>
					<a href="<?php echo e(url("panier/$boite->slug")); ?>" class="badge badge-pill badge-secondary" >
			<?php echo e(Cart::instance("$boite->slug")->count()); ?> articles dans votre panier pour cette boite
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
              Configurer votre box sur mesure <br>
              <small class="font-3"> Vous avez sélectionné <?php echo e(Cart::instance("$boite->slug")->count()); ?> plante(s) sur <?php echo e($boite->product_quantity); ?></small>

            </h3>

      <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
          
           <?php if(Cart::instance("$boite->slug")->count() == 0): ?>
            <p class="text-center">Aucune plante sélectionnée.</p>
           <?php elseif(Cart::instance("$boite->slug")->count() < $boite->product_quantity): ?>

                <?php $__currentLoopData = Cart::instance("$boite->slug")->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $product = \App\Models\Product::find($selectedProduct->id); ?>
               <span class="text-center" >
                  <img src="<?php echo e(url("$product->thumbnail")); ?>" style="float:left;height:60px;border-radius:30px;border: 1px solid red;" alt="">
                </span>
              <?php if($selectedProduct->qty == "2"): ?>
                <a style="float:left;" href="remove" >
                  <img src="<?php echo e(url("$product->thumbnail")); ?>" style="float:left;height:60px;border-radius:30px;border: 1px solid red;" alt="">
                </a>
              <?php elseif($selectedProduct->qty == "3"): ?>
               <a style="float:left;" href="remove" >
                  <img  src="<?php echo e(url("$product->thumbnail")); ?>" style="float:left;height:60px; border-radius:30px;border: 1px solid red;" alt="">
                </a>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




           <?php elseif(Cart::instance("$boite->slug")->count() == $boite->product_quantity): ?>
           <div class="text-center">
             <a href="<?php echo e(url("box/" . $boite->slug . "/checkout")); ?>" class="btn float-center text-center btn-danger">Valider et commander ma box</a>
           </div>
           <?php endif; ?>


        </div>
        <div class="col-3"></div>
      </div>
</div>

					<!-- Product -->
					<div class="row">

            <?php if(count($products) > 0): ?>
	<?php $__currentLoopData = $products->sortBy('price'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	<div class="col-sm-12 col-md-6 col-lg-2 my-2">
		<!-- Block2 -->
		<div class="block2 block2-name">
			<div class="block2-img wrap-pic-w px-1 of-hidden pos-relative   block2-label"


>


    				<img src="<?php echo e(asset("$product->thumbnail")); ?>" alt="<?php echo e($product->name); ?> - <?php echo e($product->description); ?>" style="
border: 2px solid red;
">

    				<div class="block2-overlay trans-0-4">

    					<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
    						<i class="icon-wishlist icon_heart_alt" aria-hidden="false"></i>
    						<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
    					</a>

    					<p href="" class="text-center" style="display:block;height:100%;">
    						
    					 </p>

    					<div class="block2-btn-addcart  trans-0-4">

                <?php $__currentLoopData = Cart::instance("$boite->slug")->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selected): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($selected->id == $product->id): ?>
 <form action="<?php echo e(url("panier/$boite->slug/remove")); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                <input type="hidden" name="cart" value="<?php echo e($boite->slug); ?>">
                <input type="hidden" name="product" value="<?php echo e($product->id); ?>">
                <input type="hidden" name="quantity" value="1">
                <div class="">
                  <button type="submit" style="width:100%;" class=" text-center fontsize-1 bg4 bo-rad-23 hov1 ml-auto mr-auto text-white btn">
     Supprimer
</div>
                  </button>
                </form>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               


    	

    					</div>
    				</div> <!-- end block2-overlay -->

    			</div>


        		<!-- Blog -->
        			<div class="block2-txt p-t-20 fontsize-2 text-center py-2">
        				<a href="<?php echo e(url("boites/$boite->slug/produits/$product->slug")); ?>" class="badge fontsize-1">
        					<?php echo e($product->name); ?>

        				</a>
 

<div class="row">
<div class="col-1"></div>
  <div class="col-2">
    <form action="<?php echo e(url("panier/$boite->slug/remove")); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                <input type="hidden" name="cart" value="<?php echo e($boite->slug); ?>">
                <input type="hidden" name="product" value="<?php echo e($product->id); ?>">
                <input type="hidden" name="quantity" value="1">
                <div class="">
                  <button type="submit"  class=" text-center px-2 py-1 mt-2 fontsize-1 bo-rad-23 hov1  text-white btn-danger">
     -
</div>
                  </button>
                </form>  
  </div>

  <div class="col-3">
    
                <span class="btn btn-danger">
                  <?php $added="0"; ?>
                   <?php $__currentLoopData = Cart::instance("$boite->slug")->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selected): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($selected->id == $product->id): ?>

<?php echo e($selected->qty ?? "0"); ?>

<?php $added="1"; ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if($added == "0"): ?>
0
<?php endif; ?>
                </span>
  </div>

 <div class="col-2">
   <form action="<?php echo e(url("panier/$boite->slug/store")); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                <input type="hidden" name="cart" value="<?php echo e($boite->slug); ?>">
                <input type="hidden" name="product" value="<?php echo e($product->id); ?>">
                <input type="hidden" name="quantity" value="1">
                <div class="">
                  <button type="submit"  class=" text-center fontsize-1 px-2 py-1 mt-2 bo-rad-23 hov1 text-white btn-danger">
     +
</div>
                  </button>
                </form>
 </div>
 <div class="col-1"></div>
</div>



                
        			</div>

        		<!-- Blog -->
        	</div>

        	</div>
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <?php else: ?>
           
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
	        <a href="<?php echo e(url("panier/$boite->slug")); ?>" class="btn btn-secondary" >Voir mon panier</a>
	        <a href="<?php echo e(url("panier/$boite->slug/checkout")); ?>" class="btn btn-secondary" >Valider ma commande ></a>
	      </div>

	    </div>
	  </div>

	</div>

<div class="container py-3">
  <hr>
</div>


<section class="pt-2 pb-4">
<div class="container">

  <h4 class="font-2b fontsize-6 text-center pt-1">Notre box sur mesure</h4>
<p class="text-center font-3 pt-4 pb-3 fontsize-5">
<img src="https://www.plantesaddict.fr/storage/images/box.jpg" height="190px" alt="">
</p>




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
                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Livraison rapide chez vous</span>
                        </h2>
                        <p class="mbr-fonts-style text1 mbr-text display-6">Nous avons développé une box sur mesure pour nous permettre de vous envoyer vos plantes dans les meilleurs conditions.

                          <?php if($boite->show_location == 1): ?>


                          (<?php echo e($boite->location_address); ?> - <?php echo e($boite->location_postalcode); ?> <?php echo e($boite->location_city); ?>)</p>
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
                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Economique <span>et facile</span></h2>
                        <p class="mbr-fonts-style text1 mbr-text display-6">Prix bas avec livraison incluse, et configurable facilement.</p>
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
  countdown("<?php echo e($boite->date); ?>".replace(/\s/, 'T')+'Z');
}());




</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantes-addict/webapp/development/v0.8-latest/resources/views/boites/show.blade.php ENDPATH**/ ?>