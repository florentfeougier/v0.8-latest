<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(asset('storage/plantesaddict-logo-small.png')); ?>" height="40px" alt="">
        </a>
        <div>

          <a href="<?php echo e(URL::previous()); ?>" title="Retour en arrière" class="header-wrapicon2">
  <i class="fa fa-arrow-left  text-secondary" style="font-size: 20px;"></i>
  

        </a>

          <a href="<?php echo e(url("ventes")); ?>" title="Retour en arrière" class="header-wrapicon2">
  <i class=" fa fa-store-alt  text-secondary" style="font-size: 20px;"></i>
 

        </a>

  <a href="<?php echo e(url("panier")); ?>" title="Voir mes paniers" class="header-wrapicon2  text-secondary" style="font-size: 20px;">
  <i class=" fa fa-shopping-cart"></i>
  <?php if(Cart::count() > 0): ?>
    <span class=" header-icons-noti"><?php echo e(Cart::count()); ?></span>

  <?php endif; ?>

        </a>
      </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="sr-only"><?php echo trans('titles.toggleNav'); ?></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            
            
            <ul class="navbar-nav ml-auto">
                
                <?php if(auth()->guard()->guest()): ?>
                    <li><a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(trans('titles.login')); ?></a></li>
                    <li><a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(trans('titles.register')); ?></a></li>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php if((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1): ?>
                                <img src="<?php echo e(Auth::user()->profile->avatar); ?>" alt="<?php echo e(Auth::user()->name); ?>" class="user-avatar-nav">
                            <?php else: ?>
                                <div class="user-avatar-nav"></div>
                            <?php endif; ?>
                            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item"  href="<?php echo e(url('panier')); ?>">
                            Mon panier
                          </a>

                          <div class="dropdown-divider"></div>

                          <a class="dropdown-item <?php echo e(Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/plantes*') ? 'active' : null); ?>" href="<?php echo e(url('/profile/'.Auth::user()->name. '/plantes')); ?>">
                              Mes plantes (<?php echo e(count(Auth::user()->products)); ?>)
                          </a>

                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item <?php echo e(Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/commandes*') ? 'active' : null); ?>" href="<?php echo e(url('/profile/'.Auth::user()->name. '/commandes')); ?>">
                              Commandes (<?php echo e(count(Auth::user()->orders)); ?>)
                          </a>

                          <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?php echo e(Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'active' : null); ?>" href="<?php echo e(url('/profile/'.Auth::user()->name.'/edit')); ?>">
                                Mes infos
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <?php echo e(__('Déconnexion')); ?>

                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>


<?php /**PATH /Users/florent/Dev/plantes-addict/webapp/development/v0.8-latest/resources/views/partials/nav.blade.php ENDPATH**/ ?>