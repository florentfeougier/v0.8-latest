<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Middleware options can be located in `app/Http/Kernel.php`
|
*/



Route::get('/payment/process', ['uses' => 'Front\PaymentController@process'])->name('paybox.process');


// Homepage Route
Route::group(['middleware' => ['web', 'checkblocked']], function () {
    Route::get('/', 'Front\WelcomeController@index')->name('welcome');
    Route::get('/ventes', 'Front\VenteController@index')->name('ventes.index');
    Route::get('/ventes/{slug}', 'Front\VenteController@show')->name('ventes.show');
    Route::get('/ventes/{slug}/produits/{product_slug}', 'Front\VenteController@product')->name('ventes.product');

  Route::get('/box', 'Front\BoiteController@index')->name('box.index');
    Route::get('/box/{slug}/validation', 'Front\BoiteController@validation')->name('box.show');
    Route::get('/box/{slug}/checkout', 'Front\BoiteController@checkout')->name('box.show')->middleware('auth');
    Route::get('/box/{slug}', 'Front\BoiteController@show')->name('box.show');
 
    Route::get('/ventes/{slug}/produits/{product_slug}', 'Front\VenteController@product')->name('ventes.product');
    Route::get('/products/{slug}/thumbnail', 'Front\ProductsController@thumbnail')->name('product.thumbnail');

    // Fiches
    Route::get('/fiches-entretien', 'Front\FichesController@index')->name('fiches.index');
    Route::get('/fiches-entretien/{slug}', 'Front\FichesController@show')->name('fiches.show');


    // Blog
    Route::get('/entretien', 'Front\EntretienController@show')->name('entretien.index');

    // Blog
    Route::get('/blog', 'Front\PostsController@index')->name('posts.index');
    Route::get('/blog/categories', 'Front\PostsController@categories')->name('posts.categories');
    Route::get('/blog/{categorie}/{slug}', 'Front\PostsController@show')->name('posts.show');
    Route::get('/blog/{categorie_slug}', 'Front\PostsController@categorie')->name('posts.categorie');

    //Route::get('/astuces', 'Front\PostsController@astuce')->name('astuce.show');
  //  Route::get('/astuces/{slug}', 'Front\AstucesController@show')->name('astuces.show');

    // Shop
    Route::get('shop', 'Front\ShopController@index')->name('shop.index');
    Route::get('shop/categories/', 'Front\ShopController@categories')->name('shop.categories');
    Route::get('shop/categorie/', 'Front\ShopController@categorie')->name('shop.categorie');
    Route::get('shop/produits/{slug}', 'Front\ShopController@product')->name('shop.product');

    // Panier
    Route::get('/panier', 'Front\CartController@index')->name('cart.index');
    Route::get('/panier/{slug}', 'Front\CartController@show')->name('cart.show');
    Route::post('panier/{slug}/store', 'Front\CartController@store')->name('cart.store');
    Route::post('panier/{slug}/update', 'Front\CartController@update')->name('cart.store');
    Route::post('panier/{slug}/remove', 'Front\CartController@remove')->name('cart.remove');
    Route::get('panier/{slug}/checkout', 'Front\CartController@checkout')->name('cart.checkout')->middleware('auth');
    Route::post('panier/{cart}/discount', 'Front\CartController@discount')->name('cart.discount');
    Route::post('orders/store', 'Front\OrdersController@store')->name('order.store');
    Route::post('orders/store_box', 'Front\OrdersController@store_boite')->name('order.store');
    Route::get('/newsletter/subscribe', 'Front\NewslettersController@subscribe')->name('newsletter.subscribe');

    // Newsletter
    Route::post('/livraison/search', 'Front\PickupController@search')->name('pickup.search');

    // Contact
    Route::get('/contact', 'Front\ContactController@index')->name('contact.show');
    Route::post('/contact/store', 'Front\ContactController@store')->name('contact.store');

    // payments
    Route::get('/payment/accepted', ['uses' => '\App\Http\Controllers\Front\PaymentController@accepted'])->name('paybox.accepted')->middleware('auth');
    Route::get('/payment/refused', ['uses' => '\App\Http\Controllers\Front\PaymentController@refused'])->name('paybox.refused')->middleware('auth');
    Route::get('/payment/aborted', ['uses' => '\App\Http\Controllers\Front\PaymentController@aborted'])->name('paybox.aborted')->middleware('auth');
    Route::get('/payment/waiting', ['uses' => '\App\Http\Controllers\Front\PaymentController@aborted'])->name('paybox.waiting')->middleware('auth');
    Route::get('/payment/pay/{order}', ['uses' => '\App\Http\Controllers\Front\PaymentController@create'])->name('paybox.created')->middleware('auth');;

});

// Authentication Routes
Auth::routes();

// Public Routes
Route::group(['middleware' => ['web', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);

    // Socialite Register Routes
    Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'Auth\SocialController@getSocialHandle']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'twostep', 'checkblocked']], function () {

    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', ['as' => 'public.home',   'uses' => 'UserController@index']);

    // // Show users profile - viewable by other users.
    // Route::get('profile/{username}', [
    //     'as'   => '{username}',
    //     'uses' => 'ProfilesController@show',
    // ]);
});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep', 'checkblocked']], function () {

    // User Profile and Account Routes
    Route::resource(
        'profile',
        'ProfilesController', [
            'only' => [
                'show',

                'edit',
                'update',
                'create',
            ],
        ]
    );

    Route::get('profile/{username}/paiements', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@payments',
    ]);
    Route::get('profile/{username}/commandes', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@orders',
    ]);
    Route::get('profile/{username}/plantes', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@products',
    ]);
    Route::get('profile/{username}/commandes/{id}', [

        'uses' => 'ProfilesController@order',
    ]);

    Route::get('profile/{username}/commandes/{id}/delete', [

        'uses' => 'ProfilesController@deleteUnpaidOrder',
    ]);

    Route::get('profile/{username}/paiements/{id}', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@payment',
    ]);


    Route::get('profile/{username}/commandes/{id}/receipt', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@sendOrderReceipt',
    ]);
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount',
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'ProfilesController@userProfileAvatar',
    ]);



    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);
});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep', 'checkblocked']], function () {
    Route::resource('/manager/users/deleted', 'SoftDeletesController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::resource('/manager/payments/deleted', 'SoftDeletesPaymentController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::resource('/manager/fiches/deleted', 'SoftDeletesFicheController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

Route::get('/manager/orders/datatableAjax', [
    'as'   => 'datatableAjaxOrders',
    'uses' => function () {
        $orders = App\Models\Order::all();
        return Datatables::of($orders)->make();
    }
]);

  Route::get('manager/orders/{id}/close', 'OrdersManagementController@close');
  Route::get('manager/orders/{id}/change-status-delivered', 'OrdersManagementController@changeStatusDelivered');
    Route::resource('/manager/orders/deleted', 'SoftDeletesOrderController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::resource('/manager/products/deleted', 'SoftDeletesProductController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::resource('manager/users', 'UsersManagementController', [
        'names' => [
            'index'   => 'users',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

    // Route::get('manager/deliveries/{id}/received', 'DeliveriesManagementController@received');
    // Route::get('manager/deliveries/{id}/unreceived', 'DeliveriesManagementController@unreceived');

    Route::get('manager/deliveries/{id}/send', 'DeliveriesManagementController@send');
    Route::get('manager/deliveries/{id}/unsend', 'DeliveriesManagementController@unsend');

    Route::get('manager/deliveries/{id}/doing', 'DeliveriesManagementController@doing');
    Route::get('manager/deliveries/{id}/undoing', 'DeliveriesManagementController@undoing');

    Route::get('manager/deliveries/{id}/todo', 'DeliveriesManagementController@todo');
    Route::get('manager/deliveries/{id}/todo', 'DeliveriesManagementController@todo');

    Route::get('manager/deliveries/{id}/done', 'DeliveriesManagementController@done');
    Route::get('manager/deliveries/{id}/undo', 'DeliveriesManagementController@undo');

    Route::get('manager/deliveries/{id}/generate-sticker', 'DeliveriesManagementController@generateSticker');

Route::get('manager/ventes/{id}/orders', 'VentesManagementController@orders');
    Route::get('manager/ventes/{id}/export-orders', 'VentesManagementController@exportVenteOrders');
    Route::get('manager/ventes/{id}/export-orders-mailing-list', 'VentesManagementController@exportVenteOrdersMailingList');
    Route::get('manager/ventes/{id}/export-sold-products', 'VentesManagementController@exportSoldProducts');

    Route::resource('manager/ventes', 'VentesManagementController', [
        'names' => [
            'index'   => 'manager.ventes',
            'destroy' => 'manager.ventes.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);



    Route::resource('manager/box', 'BoitesManagementController', [
        'names' => [
            'index'   => 'manager.boites',
            'update'   => 'manager.boites.update',
            'destroy' => 'manager.boites.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

        Route::resource('manager/products/categories', 'ProductCategoriesManagementController', [
            'names' => [
                'index'   => 'manager.productcategories',
                'destroy' => 'manager.productcategories.destroy',
            ],
            'except' => [
                'deleted',
            ],
        ]);

        Route::resource('manager/products/labels', 'ProductLabelsManagementController', [
            'names' => [
                'index'   => 'manager.labels',
                'destroy' => 'manager.labels.destroy',
            ],
            'except' => [
                'deleted',
            ],
        ]);

    Route::resource('manager/products', 'ProductsManagementController', [
        'names' => [
            'index'   => 'manager.products',
            'destroy' => 'manager.products.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

Route::get('manager/fiches/{id}/clone', 'FichesManagementController@clone');
    Route::resource('manager/fiches', 'FichesManagementController', [
        'names' => [
            'index'   => 'manager.fiches',

            'destroy' => 'manager.fiches.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);


Route::get('manager/posts/{id}/clone', 'PostsManagementController@clone');

    Route::resource('manager/posts', 'PostsManagementController', [
        'names' => [
            'index'   => 'manager.posts',
            'destroy' => 'manager.posts.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

    Route::resource('manager/pages', 'PagesManagementController', [
        'names' => [
            'index'   => 'manager.pages',
            'destroy' => 'manager.pages.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

    Route::get('manager/orders/{id}/receipt', 'OrdersManagementController@receipt');
    Route::get('manager/orders/{id}/unpaidNotificationCheck', 'OrdersManagementController@unpaidNotificationCheck');
  Route::get('manager/orders/filters/shop', 'OrdersManagementController@filterByShop');
  Route::get('manager/orders/filters/{vente}', 'OrdersManagementController@filterByVente');

    Route::resource('manager/orders', 'OrdersManagementController', [
        'names' => [
            'index'   => 'manager.orders',
            'destroy' => 'manager.orders.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

    Route::resource('manager/payments', 'PaymentsManagementController', [
        'names' => [
            'index'   => 'manager.payments',
            'destroy' => 'manager.payments.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

    Route::get('elfinder/popup/{input_id}', ['uses' => '\Barryvdh\Elfinder\ElfinderController@showPopup'
])->name('elfinder.popup');

    Route::resource('manager/dashboard', 'DashboardManagementController', [
        'names' => [
            'index'   => 'manager.dashboard',
            'destroy' => 'manager.dashboard.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

    Route::resource('manager/deliveries', 'DeliveriesManagementController', [
        'names' => [
            'index'   => 'manager.deliveries',
            'destroy' => 'manager.deliveries.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);
    Route::post('search-users', 'UsersManagementController@search')->name('search-users');
    Route::post('search-orders', 'OrdersManagementController@search')->name('search-orders');
    Route::post('search-products', 'ProductsManagementController@search')->name('search-products');
    Route::post('search-payments', 'PaymentsManagementController@search')->name('search-payments');
    Route::post('search-deliveries', 'DeliveriesManagementController@search')->name('search-deliveries');

    Route::resource('themes', 'ThemesManagementController', [
        'names' => [
            'index'   => 'themes',
            'destroy' => 'themes.destroy',
        ],
    ]);

    Route::get('/manager/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('manager/routes', 'AdminDetailsController@listRoutes');
    Route::get('manager/active-users', 'AdminDetailsController@activeUsers');
});

Route::redirect('/php', '/phpinfo', 301);
Route::get('/sitemap.xml', 'Front\PagesController@sitemap');
Route::get('/{slug}', 'Front\PagesController@show')->name('pages.show');
