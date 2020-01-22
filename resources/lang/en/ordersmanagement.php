<?php

return [

    // Titles
    'showing-all-orders'     => 'Showing All Ventes',
    'orders-menu-alt'        => 'Show Users Management Menu',
    'create-new-order'       => 'Create New User',
    'show-deleted-orders'    => 'Show Deleted User',
    'editing-order'          => 'Editing User :name',
    'showing-order'          => 'Showing User :name',
    'showing-order-title'    => 'Fiche produit :name',

    // Flash Messages
    'createSuccess'   => 'Successfully created order! ',
    'updateSuccess'   => 'Successfully updated order! ',
    'deleteSuccess'   => 'Successfully deleted order! ',
    'deleteSelfError' => 'You cannot delete yourself! ',

    // Show User Tab
    'viewProfile'            => 'View Profile',
    'editUser'               => 'Edit User',
    'deleteUser'             => 'Delete User',
    'ordersBackBtn'           => 'Retour aux orders',
    'ordersPanelTitle'        => 'User Information',
    'labelUserName'          => 'Username:',
    'labelEmail'             => 'Email:',
    'labelFirstName'         => 'First Name:',
    'labelLastName'          => 'Last Name:',
    'labelRole'              => 'Role:',
    'labelStatus'            => 'Status:',
    'labelAccessLevel'       => 'Access',
    'labelPermissions'       => 'Permissions:',
    'labelCreatedAt'         => 'Created At:',
    'labelUpdatedAt'         => 'Updated At:',
    'labelIpEmail'           => 'Email Signup IP:',
    'labelIpEmail'           => 'Email Signup IP:',
    'labelIpConfirm'         => 'Confirmation IP:',
    'labelIpSocial'          => 'Socialite Signup IP:',
    'labelIpAdmin'           => 'Admin Signup IP:',
    'labelIpUpdate'          => 'Last Update IP:',
    'labelDeletedAt'         => 'Deleted on',
    'labelIpDeleted'         => 'Deleted IP:',
    'ordersDeletedPanelTitle' => 'Deleted User Information',
    'ordersBackDelBtn'        => 'Back to Deleted Users',

    'successRestore'    => 'User successfully restored.',
    'successDestroy'    => 'User record successfully destroyed.',
    'errorUserNotFound' => 'User not found.',

    'labelUserLevel'  => 'Level',
    'labelUserLevels' => 'Levels',

    'orders-table' => [
        'caption'   => '{1} :orderscount order total|[2,*] :orderscount total orders',
        'id'        => 'ID',
        'name'      => 'Nom',
        'stock'     => 'Stock',
        'price'     => 'Prix',
        'tax'     => 'Taux TVA',



        'created'   => 'Created',
        'updated'   => 'Updated',
        'actions'   => 'Actions',
        'updated'   => 'Updated',
    ],

    'buttons' => [
        'create-new'    => 'New User',
        'delete'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm"></span><span class="hidden-xs hidden-sm hidden-md"> </span>',
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Détails</span><span class="hidden-xs hidden-sm hidden-md"> </span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm"></span><span class="hidden-xs hidden-sm hidden-md"> </span>',
        'back-to-orders' => '<span class="hidden-sm hidden-xs">Retour aux </span><span class="hidden-xs">produits</span>',
        'back-to-order'  => 'Retour  <span class="hidden-xs">à la fiche produit</span>',
        'delete-order'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Delete</span><span class="hidden-xs"> User</span>',
        'edit-order'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Edit</span><span class="hidden-xs"> User</span>',
    ],

    'tooltips' => [
        'delete'        => 'Delete',
        'show'          => 'Show',
        'edit'          => 'Edit',
        'create-new'    => 'Create New User',
        'back-orders'    => 'Retour',
        'email-order'    => 'Email :order',
        'submit-search' => 'Submit Users Search',
        'clear-search'  => 'Clear Search Results',
    ],

    'messages' => [
        'orderNameTaken'          => 'Username is taken',
        'orderNameRequired'       => 'Username is required',
        'fNameRequired'          => 'First Name is required',
        'lNameRequired'          => 'Last Name is required',
        'emailRequired'          => 'Email is required',
        'emailInvalid'           => 'Email is invalid',
        'passwordRequired'       => 'Password is required',
        'PasswordMin'            => 'Password needs to have at least 6 characters',
        'PasswordMax'            => 'Password maximum length is 20 characters',
        'captchaRequire'         => 'Captcha is required',
        'CaptchaWrong'           => 'Wrong captcha, please try again.',
        'roleRequired'           => 'User role is required.',
        'order-creation-success'  => 'Successfully created order!',
        'update-order-success'    => 'Successfully updated order!',
        'delete-success'         => 'Successfully deleted the order!',
        'cannot-delete-yourself' => 'You cannot delete yourself!',
    ],

    'show-order' => [
        'id'                => 'User ID',
        'name'              => 'Username',
        'email'             => '<span class="hidden-xs">User </span>Email',
        'role'              => 'User Role',
        'created'           => 'Created <span class="hidden-xs">at</span>',
        'updated'           => 'Updated <span class="hidden-xs">at</span>',
        'labelRole'         => 'User Role',
        'labelAccessLevel'  => '<span class="hidden-xs">User</span> Access Level|<span class="hidden-xs">User</span> Access Levels',
    ],

    'search'  => [
        'title'             => 'Showing Search Results',
        'found-footer'      => ' Record(s) found',
        'no-results'        => 'No Results',
        'search-orders-ph'   => 'Search Users',
    ],

    'modals' => [
        'delete_order_message' => 'Are you sure you want to delete :order?',
    ],
];
