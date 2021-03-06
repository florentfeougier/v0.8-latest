<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('template_title'); ?> <?php echo $__env->yieldContent('meta_title'); ?> <?php if(trim($__env->yieldContent('meta_title'))): ?> <?php endif; ?> | <?php echo e(config('app.name', Lang::get('titles.app'))); ?></title>

    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', "Ventes de plantes d'intérieur à partir de 1€ partout en France - Fiches d'entretien, shop, astuces et conseils"); ?>">
    <meta name="author" content="Plantes Addict">
    <link rel="shortcut icon" href="<?php echo e(url("storage/favicon.ico")); ?>">

    <?php echo $__env->yieldContent('og'); ?>

        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/core.css')); ?>">
    <link href="<?php echo e(asset('/css/glider.min.css')); ?>" rel="stylesheet">

    <style >

    @media (min-width: 992px) {
      .wrap-side-menu {
        display: none !important;

      }
    }


    </style>
    <?php echo $__env->yieldContent('template_linked_css'); ?>
    <?php echo $__env->yieldContent('template_fastload_css'); ?>

    <script>
      window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>;
    </script>

    <?php echo $__env->yieldContent('head'); ?>
    <?php echo $__env->yieldContent('fastload_scripts'); ?>
  </head>
<body>

<?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div id="app">


  	<!-- header fixed -->
  	<div class="wrap_header fixed-header2 trans-0-4">
  		<!-- Logo -->

  		<a href="<?php echo e(url('/')); ?>" class="logo">
  			<img src="<?php echo e(asset('storage/plantesaddict-logo-small.png')); ?>" alt="Plantes Addict Logo">
  		</a>

  		<!-- Menu -->
  		<div class="wrap_menu">
  			<nav class="menu">
  				<ul class="main_menu">



  					<li class="<?php echo e((request()->is('entretien*')) ? 'sale-noti' : ''); ?> <?php echo e((request()->is('fiches-entretien*')) ? 'sale-noti' : ''); ?>">
  						<a style="font-size:22px; font-family: 'Amatic SC';" href="<?php echo e(url('entretien')); ?>">Entretien</a>
  					</li>

  					<li class="<?php echo e((request()->is('blog*')) ? 'sale-noti' : ''); ?>">
  						<a style="font-size:22px; font-family: 'Amatic SC';" href="<?php echo e(url('blog')); ?>">Blog</a>
  					</li>


  					<li class="<?php echo e((request()->is('ventes*')) ? 'sale-noti' : ''); ?>">
  						<a style="font-size:22px; font-family: 'Amatic SC';" class="" href="<?php echo e(url('ventes')); ?>">Nos Ventes</a>
  					</li>

  					<li class="<?php echo e((request()->is('shop*')) ? 'sale-noti' : ''); ?>">
  						<a style="font-size:22px; font-family: 'Amatic SC';" href="<?php echo e(url('box')); ?>">BOX</a>
  					</li>


  				</ul>
  			</nav>
  		</div>

  		<!-- Header Icon -->
  		<div class="header-icons">


  	<a href="<?php echo e(url('register')); ?>" class="header-wrapicon1 dis-block">

  	<img src="<?php echo e(asset('storage/icons/user.svg')); ?>" class="header-icon1" alt="Espace client">
  	<?php if(auth()->guard()->guest()): ?>
  	<?php else: ?>
  		<span class=" header-icons-connected"> <i></i> </span>

  	<?php endif; ?>
  </a>




  			<span class="linedivide1"></span>

  			<a href="<?php echo e(url("panier")); ?>" title="Voir mes paniers" class="header-wrapicon2">
  <img src="<?php echo e(asset('storage/icons/shopping-bag.svg')); ?>" class="header-icon1 " alt="Votre panier">
  <?php if(Cart::count() > 0): ?>
  	<span class=" header-icons-noti"><?php echo e(Cart::count()); ?></span>

  <?php endif; ?>




  			</a>
  		</div>
  	</div>



  	<header class="header2">
  		<!-- Header desktop -->
  		<div class="container-menu-header-v2 py-2">
  			<div class="topbar2">
  				<div class="topbar-social">
  					<a href="https://www.facebook.com/plantesaddict/" rel="noreferrer" target="_blank" class="topbar-social-item" title="Suivez-nous sur Facebook"> <img src="<?php echo e(asset("storage/icons/facebook-grey.svg")); ?>" height="18px" alt="Suivez-nous sur Facebook"> </a>
  					<a href="https://www.instagram.com/plantesaddict" rel="noreferrer" target="_blank" class="topbar-social-item" title="Suivez-nous sur Instagram"><img src="<?php echo e(asset("storage/icons/instagram-grey.svg")); ?>" height="18px" alt="Suivez-nous sur Instagram"></a>
  					<a href="https://www.pinterest.fr/888357ab5f4120ceeb7d545977779b/" rel="noreferrer" class="topbar-social-item " target="_blank" title="Suivez-nous sur Pinterest"><img src="<?php echo e(asset("storage/icons/pinterest-grey.svg")); ?>" height="18px" alt="Suivez-nous sur Pinterest"></a>
  					<a href="https://www.youtube.com/channel/UCoEZV_awB72o9_U53n8_r5g" rel="noreferrer" target="_blank" class="topbar-social-item " title="Suivez-nous sur Youtube"><img src="<?php echo e(asset("storage/icons/youtube-grey.svg")); ?>" height="18px" alt="Suivez-nous sur Youtube"></a>
  				</div>
  						<a class="header-link mx-4 text-black <?php echo e((request()->is('entretien*')) ? 'header-link-active' : ''); ?> <?php echo e((request()->is('fiches-entretien*')) ? 'header-link-active' : ''); ?>" href="<?php echo e(url('entretien')); ?>"  style="font-size:24px; font-family: 'Amatic SC';">Entretien</a>
  						<a class=" header-link mr-4 text-black <?php echo e((request()->is('blog*')) ? 'header-link-active' : ''); ?>" href="<?php echo e(url('blog')); ?>" style="font-size:24px; font-family: 'Amatic SC';">Blog</a>
  				<!-- Logo2 -->
  				<a href="<?php echo e(url('/')); ?>" class="logo2 animated rotateIn">
  					<img src="<?php echo e(asset('storage/plantesaddict-logo-small.png')); ?>" alt="Plantes Addict Logo">
  				</a>
  					<a class="header-link ml-4 text-black <?php echo e((request()->is('ventes*')) ? 'header-link-active' : ''); ?> " href="<?php echo e(url('ventes')); ?>" style="font-size:24px; font-family: 'Amatic SC';" >Nos Ventes</a>
  					<a class="header-link mx-4 text-black <?php echo e((request()->is('box*')) ? 'header-link-active' : ''); ?>" href="<?php echo e(url('box')); ?>"  style="font-size:24px; font-family: 'Amatic SC';">BOX</a>

  				<div class="topbar-child2">

  					<div class="topbar-language rs1-select2">

  					</div>

  					<!--  -->
  					<a href="<?php echo e(url('register')); ?>" class="header-wrapicon1  dis-block" title="Se connecter / S'inscrire">

  						<img src="<?php echo e(asset('storage/icons/user.svg')); ?>" class="header-icon1" alt="Espace client">
  						<?php if(auth()->guard()->guest()): ?>
  						<?php else: ?>
  							<span class=" header-icons-connected"> <i></i> </span>

  						<?php endif; ?>
  					</a>


  					<span class="linedivide1"></span>

  					<a href="<?php echo e(url("panier")); ?>" class="header-wrapicon2" title="Voir vos paniers">

  						<?php if(Cart::count() > 0): ?>
  						<img src="<?php echo e(asset('storage/icons/shopping-bag-full.svg')); ?>" class="header-icon1 js-show-header-dropdown" alt="Vos paniers">
  						<span class="header-icons-noti"><?php echo e(Cart::count()); ?></span>

  					<?php else: ?>
  						<img src="<?php echo e(asset('storage/icons/shopping-bag.svg')); ?>" class="header-icon1 js-show-header-dropdown" alt="Vos paniers">

  					<?php endif; ?>
  					</a>
  				</div>
  			</div>


  		</div>

  		<!-- Header Mobile -->
  		<div class="wrap_header_mobile">
  			<!-- Logo moblie -->
  			<a href="<?php echo e(url('/')); ?>" class="logo-mobile" title="Plantes Addict">
  				<img src="<?php echo e(asset('storage/plantesaddict-logo-small.png')); ?>" alt="Plantes Addict Logo">
  			</a>



  			<!-- Button show menu -->
  			<div class="btn-show-menu">
  				<!-- Header Icon mobile -->
  				<div class="header-icons-mobile">
  					<a href="<?php echo e(url('register')); ?>" class="header-wrapicon1 dis-block" title="Se connecter / S'inscrire">
  						<img src="<?php echo e(asset('storage/icons/user.svg')); ?>" class="header-icon1" alt="Compte client">
  <?php if(auth()->guard()->guest()): ?>
  <?php else: ?>
  	<span class=" header-icons-connected"> <i></i> </span>

  <?php endif; ?>
  					</a>

  					<span class="linedivide2"></span>

  					<a href="<?php echo e(url('panier')); ?>" class="header-wrapicon2" title="Voir vos paniers">
  						<?php if(Cart::count() > 0): ?>
  						<img src="<?php echo e(asset('storage/icons/shopping-bag-full.svg')); ?>" class="header-icon1 js-show-header-dropdown" alt="Vos paniers">
  						<span class="header-icons-noti"><?php echo e(Cart::count()); ?></span>

  					<?php else: ?>
  						<img src="<?php echo e(asset('storage/icons/shopping-bag.svg')); ?>" class="header-icon1 js-show-header-dropdown" alt="Vos paniers">

  					<?php endif; ?>
  						<!-- Header cart noti -->

  					</a>
  				</div>

  				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
  					<span class="hamburger-box">
  						<span class="hamburger-inner"></span>
  					</span>
  				</div>
  			</div>
  		</div>

  		<!-- Menu Mobile -->
  		<div class="wrap-side-menu" >
  			<nav class="side-menu">
  				<ul class="main-menu">




  					<li class="item-topbar-mobile py-2">
  						<div class="topbar-social-mobile px-2">
  							<a href="https://www.facebook.com/plantesaddict/" rel="noreferrer" target="_blank" class="topbar-social-item"><img src="<?php echo e(asset("storage/icons/facebook-grey.svg")); ?>" height="18px" alt="Suivez-nous sur Facebook"></a>
  							<a href="https://www.instagram.com/plantesaddict" rel="noreferrer" target="_blank" class="topbar-social-item"><img src="<?php echo e(asset("storage/icons/instagram-grey.svg")); ?>" height="18px" alt="Suivez-nous sur Instagram"></a>
  							<a href="https://www.pinterest.fr/888357ab5f4120ceeb7d545977779b/" rel="noreferrer" class="topbar-social-item " target="_blank"><img src="<?php echo e(asset("storage/icons/pinterest-grey.svg")); ?>" height="18px" alt="Suivez-nous sur Pinterest"></a>
  							<a href="https://www.youtube.com/channel/UCoEZV_awB72o9_U53n8_r5g" rel="noreferrer" target="_blank" class="topbar-social-item "><img src="<?php echo e(asset("storage/icons/youtube-grey.svg")); ?>" height="18px" alt="Suivez-nous sur Youtube"></a>
  						</div>
  					</li>



  					<li class="item-menu-mobile <?php echo e((request()->is('ventes*')) ? 'header-link-active' : ''); ?>">
  						<a href="<?php echo e(url('ventes')); ?>">Nos Ventes</a>
  					</li>

  					<li class="item-menu-mobile <?php echo e((request()->is('entretien*')) ? 'header-link-active' : ''); ?> <?php echo e((request()->is('fiches-entretien*')) ? 'header-link-active' : ''); ?>">
  						<a href="<?php echo e(url('entretien')); ?>">Entretien</a>
  					</li>

  					<li class="item-menu-mobile <?php echo e((request()->is('shop*')) ? 'header-link-active' : ''); ?>">
  						<a href="<?php echo e(url('box')); ?>">BOX</a>
  					</li>

  					<li class="item-menu-mobile <?php echo e((request()->is('blog*')) ? 'header-link-active' : ''); ?>">
  						<a href="<?php echo e(url('blog')); ?>">Blog</a>
  					</li>

  				</ul>
  			</nav>
  		</div>
  	</header>


  <main>
    <?php echo $__env->yieldContent('content'); ?>
  </main>
</div>




<!-- Footer -->
<footer class="bg6  pt-4 px-4 pb-2">
	<div class="flex-w pb-4">

		<div class="w-size6 py-2 respon3">
			<h4 class="fontsize-2 pb-2">Contactez-nous!</h4>

			<div>
				<p class="fontsize-2 w-size27 pr-2">
					Ventes de petites et grandes plantes d'intérieur partout en France
				</p>

				<div class="flex-m pt-3 pb-2">
					<a rel="noreferrer" href="https://www.facebook.com/plantesaddict" target="_blank" class="fs-18 color1 pr-4 "> <img src="<?php echo e(asset('storage/icons/facebook.svg')); ?>" height="24px" alt="Suivez-nous sur Facebook"> </a>
					<a rel="noreferrer" href="https://www.instagram.com/plantesaddict" target="_blank" class="fs-18 color1 pr-4  "> <img src="<?php echo e(asset('storage/icons/instagram.svg')); ?>" height="24px" alt="Suivez-nous sur Instagram"></a>
					<a rel="noreferrer" href="https://www.pinterest.fr/888357ab5f4120ceeb7d545977779b/" target="_blank" class="fs-18 color1 pr-4 "> <img src="<?php echo e(asset('storage/icons/pinterest.svg')); ?>" height="24px" alt="Suivez-nous sur Pinsterest"></a>
					<a rel="noreferrer" href="https://www.youtube.com/channel/UCoEZV_awB72o9_U53n8_r5g" target="_blank" class="fs-18 color1 pr-4 "> <img src="<?php echo e(asset('storage/icons/youtube.svg')); ?>" height="24px" alt="Suivez-nous sur Youtube"></a>
				</div>
			</div>
		</div>

		<div class="w-size7 py-2 respon4">
			<h4 class="fontsize-2 pb-3">Pages</h4>

			<ul>
				<li class="p-b-9">
					<a href="<?php echo e(url('ventes')); ?>" class="fontsize-2">Ventes</a>
				</li>

				<li class="p-b-9">
					<a href="<?php echo e(url('entretien')); ?>" class="fontsize-2">Entretiens</a>
				</li>

				<li class="p-b-9">
					<a href="<?php echo e(url('blog/astuces')); ?>" class="fontsize-2">Conseils et astuces</a>
				</li>

				<li class="p-b-9">
					<a href="<?php echo e(url('box')); ?>" class="fontsize-2">Box Surprise</a>
				</li>
			</ul>
		</div>

		<div class="w-size7 py-2 respon4">
			<h4 class="fontsize-2 pb-3">Aide</h4>

			<ul>
				<li class="p-b-9">
					<a href="" class="fontsize-2">Chercher</a>
				</li>

				<li class="p-b-9">
					<a href="<?php echo e(url('a-propos')); ?>" class="fontsize-2">A propos</a>
				</li>

				<li class="p-b-9">
					<a href="<?php echo e(url('contact')); ?>" class="fontsize-2">Nous contacter</a>
				</li>

				<li class="p-b-9">
					<a href="<?php echo e(url('login')); ?>" class="fontsize-2">Mon Compte</a>
				</li>
			</ul>
		</div>

		<div class="w-size7 py-2 respon4">
			<h4 class="fontsize-2 pb-3">Info légales</h4>

			<ul>
				<li class="p-b-9">
					<a href="<?php echo e(url('informations-paiements-livraison')); ?>" class="fontsize-2">Paiements et livraisons</a>
				</li>

				<li class="p-b-9">
					<a href="<?php echo e(url('cgu')); ?>" class="fontsize-2">CGU</a> /
					<a href="<?php echo e(url('cgv')); ?>" class="fontsize-2">CGV</a>
				</li>

				<li class="p-b-9">
					<a href="<?php echo e(url('rgpd')); ?>" class="fontsize-2">Données Personnelles</a>
				</li>

				<li class="p-b-9">
					<a href="<?php echo e(url('mentions-legales')); ?>" class="fontsize-2">Mentions Légales</a>
				</li>
			</ul>
		</div>

		<div class="w-size8 py-2 respon3">
			<h4 class="fontsize-2 pb-3">Newsletter</h4>

			<!-- Newsletter form -->
			<form action="<?php echo e(url('newsletter/subscribe')); ?>" enctype="multipart/form-data" method="get" class="ml-auto mr-auto newsletter-form" >
				<input type="email" class="subscribe-input text-white" name="user_email" id="email" placeholder="Addresse E-mail..." required>
				<button type="submit" class="px-2 add-to-newsletter button hov4">S'inscrire <img class="ml-1" src="<?php echo e(asset('storage/icons/envelope.svg')); ?>" height="20px" alt="Cliquer ici pour vous inscrire"> </button>
			</form>

		</div>
	</div>

	<hr>

	<div class="text-center py-1">

<div class="">
	<a class="fontsize-2" href="https://www.ca-moncommerce.com/" title="E-transaction Crédit Agricole">
		Paiement sécurisé par E-transaction
	</a>

</div>

<a rel="noreferrer" href="<?php echo e(url("informations-paiements-livraison#paypal")); ?>" title="Paiement sécurisé par E-transaction">
	<img height="22px" class="mr-2" src="<?php echo e(asset('storage/icons/creditagricole.png')); ?>" alt="etransaction">
</a>

		<a rel="noreferrer" href="<?php echo e(url("informations-paiements-livraison#paypal")); ?>" title="Paiement par PAYPAL">
			<img height="40px" class="mr-2" src="<?php echo e(asset('storage/icons/paypal.svg')); ?>" alt="Paypal">
		</a>

		<a rel="noreferrer" href="<?php echo e(url("informations-paiements-livraison#visa")); ?>" title="Paiement par carte VISA">
			<img height="40px"  src="<?php echo e(asset('storage/icons/visa.svg')); ?>" alt="Paiement VISA">
		</a>

		<a rel="noreferrer" href="<?php echo e(url("informations-paiements-livraison#mastercard")); ?>" title="Paiement par carte MASTERCARD">
			<img height="40px" class="ml-2"  src="<?php echo e(asset('storage/icons/mastercard.svg')); ?>" alt="Paiement MASTERCARD">
		</a>

		<div class="t-center fontsize-2 pt-2">
			Copyright © 2019 PlantesAddict | Developé par <a href="https://www.joyne.fr">Joyne</a>
		</div>

	</div>
</footer>


<!-- Scripts -->

<script type="text/javascript" src="<?php echo e(asset('js/glider.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148189516-1"></script>


<?php echo $__env->yieldContent('footer_scripts'); ?>

<script>

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-148189516-1');
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150907103-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-150907103-1');
</script>


<!-- Hotjar Tracking Code for plantesaddcit.fr -->
<script>
(function(h,o,t,j,a,r){
h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
h._hjSettings={hjid:1515424,hjsv:6};
a=o.getElementsByTagName('head')[0];
r=o.createElement('script');r.async=1;
r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
a.appendChild(r);
})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<?php echo $__env->yieldContent('modals'); ?>

  </body>
</html>


<?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/layouts/front.blade.php ENDPATH**/ ?>