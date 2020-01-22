<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(url('/manager/dashboard')); ?>">
            <img src="<?php echo e(asset('storage/plantesaddict-logo-small.png')); ?>" height="40px" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="sr-only"><?php echo trans('titles.toggleNav'); ?></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="navbar-nav mr-auto">
                <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Contenu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

<a class="dropdown-item <?php echo e(Request::is('elfinder*') ? 'active' : null); ?>" target="_blank" href="<?php echo e(url('/elfinder')); ?>">
    Explorer
</a>
<div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php echo e(Request::is('manager/fiches*') ? 'active' : null); ?>" href="<?php echo e(url('/manager/fiches')); ?>">
                            Fiches d'entretien
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php echo e(Request::is('manager/pages*') ? 'active' : null); ?>" href="<?php echo e(url('/manager/pages')); ?>">
                            Pages
                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php echo e(Request::is('manager/posts*') ? 'active' : null); ?>" href="<?php echo e(url('/manager/posts')); ?>">
                            Blog
                        </a>

                    </div>
                </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            eCommerce
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item <?php echo e(Request::is('manager/ventes*') ? 'active' : null); ?>" href="<?php echo e(url('/manager/ventes')); ?>">
                                Ventes <span class="badge badge-success"><?php echo e(count(\App\Models\Vente::where('is_public', true)->get())); ?> actives</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?php echo e(Request::is('manager/products*') ? 'active' : null); ?>" href="<?php echo e(url('/manager/products')); ?>">
                              Produits <span class="badge badge-secondary"><?php echo e(count(\App\Models\Product::all())); ?></span>
                            </a>


                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?php echo e(Request::is('manager/orders*') ? 'active' : null); ?>" href="<?php echo e(url('/manager/orders')); ?>">
                                Commandes <span data-toggle="tooltip" title="Commandes payées il y a moins de 24h" class="badge badge-success"><?php echo e(count(\App\Models\Order::where('payment_status', true)->whereDate('updated_at', \Carbon\Carbon::today())->get())); ?></span>

                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?php echo e(Request::is('manager/payments*') ? 'active' : null); ?>" href="<?php echo e(url('/manager/payments')); ?>">
                                Paiements
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?php echo e(Request::is('manager/deliveries*') ? 'active' : null); ?>" href="<?php echo e(url('/manager/deliveries')); ?>">
                                Livraisons
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Utilisateurs
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                          <a class="dropdown-item <?php echo e(Request::is('manager/users/*', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'active' : null); ?>" href="<?php echo e(url('manager/users')); ?>">
                              Utilisateurs <span class="badge badge-success"><?php echo e(count(\App\Models\User::all())); ?></span>
                          </a>
                          <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item <?php echo e((Request::is('roles') || Request::is('permissions')) ? 'active' : null); ?>" href="<?php echo e(route('laravelroles::roles.index')); ?>">
                                                            Roles & permissions
                                                        </a>
                                                        <div class="dropdown-divider"></div>


                            <a class="dropdown-item <?php echo e(Request::is('blocker') ? 'active' : null); ?>" href="<?php echo e(route('laravelblocker::blocker.index')); ?>">
                                <?php echo trans('titles.laravelBlocker'); ?>

                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Réglages
                          </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                            


                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?php echo e(Request::is('phpinfo') ? 'active' : null); ?>" href="<?php echo e(url('manager/phpinfo')); ?>">
                                <?php echo trans('titles.adminPHP'); ?>

                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?php echo e(Request::is('routes') ? 'active' : null); ?>" href="<?php echo e(url('/routes')); ?>">
                                <?php echo trans('titles.adminRoutes'); ?>

                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?php echo e(Request::is('blocker') ? 'active' : null); ?>" href="<?php echo e(route('laravelblocker::blocker.index')); ?>">
                                <?php echo trans('titles.laravelBlocker'); ?>

                            </a>
                        </div>
                    </li>


                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Logs
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">




                                                <a class="dropdown-item <?php echo e(Request::is('activity*') ? 'active' : null); ?>" href="<?php echo e(url('activity')); ?>">
                                                    Activités
                                                </a>
                                                <div class="dropdown-divider"></div>

                                                <a class="dropdown-item <?php echo e(Request::is('manager/logs*') ? 'active' : null); ?>" href="<?php echo e(url('manager/logs')); ?>">
                                                    Logs
                                                </a>


                                            </div>
                                        </li>
                <?php endif; ?>
            </ul>
            
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
                          <a class="dropdown-item <?php echo e(Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/plantes*') ? 'active' : null); ?>" href="<?php echo e(url('/profile/'.Auth::user()->name. '/plantes')); ?>">
                              Mes plantes (<?php echo e(count(Auth::user()->products)); ?>)
                          </a>

                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item <?php echo e(Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/commandes*') ? 'active' : null); ?>" href="<?php echo e(url('/profile/'.Auth::user()->name. '/commandes')); ?>">
                              Commandes (<?php echo e(count(Auth::user()->orders)); ?>)
                          </a>

                          <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?php echo e(Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'active' : null); ?>" href="<?php echo e(url('/profile/'.Auth::user()->name)); ?>">
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

<?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/partials/manager-nav.blade.php ENDPATH**/ ?>