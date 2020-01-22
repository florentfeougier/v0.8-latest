<?php

return [

    // Titles
    'showing-all-products'     => 'Showing All Ventes',
    'products-menu-alt'        => 'Show Users Management Menu',
    'create-new-product'       => 'Create New User',
    'show-deleted-products'    => 'Show Deleted User',
    'editing-product'          => 'Editing User :name',
    'showing-product'          => 'Showing User :name',
    'showing-product-title'    => 'Fiche produit :name',

    // Flash Messages
    'createSuccess'   => 'Successfully created product! ',
    'updateSuccess'   => 'Successfully updated product! ',
    'deleteSuccess'   => 'Successfully deleted product! ',
    'deleteSelfError' => 'You cannot delete yourself! ',

    // Show User Tab
    'viewProfile'            => 'View Profile',
    'editUser'               => 'Edit User',
    'deleteUser'             => 'Delete User',
    'productsBackBtn'           => 'Retour aux products',
    'productsPanelTitle'        => 'User Information',
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
    'productsDeletedPanelTitle' => 'Deleted User Information',
    'productsBackDelBtn'        => 'Back to Deleted Users',

    'successRestore'    => 'User successfully restored.',
    'successDestroy'    => 'User record successfully destroyed.',
    'errorUserNotFound' => 'User not found.',

    'labelUserLevel'  => 'Level',
    'labelUserLevels' => 'Levels',

    'products-table' => [
        'caption'   => '{1} :productscount product total|[2,*] :productscount total products',
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
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm"></span><span class="hidden-xs hidden-sm hidden-md"> </span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm"></span><span class="hidden-xs hidden-sm hidden-md"> </span>',
        'back-to-products' => '<span class="hidden-sm hidden-xs">Retour aux </span><span class="hidden-xs">produits</span>',
        'back-to-product'  => 'Retour  <span class="hidden-xs">à la fiche produit</span>',
        'delete-product'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Delete</span><span class="hidden-xs"> User</span>',
        'edit-product'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Edit</span><span class="hidden-xs"> User</span>',
    ],

    'tooltips' => [
        'delete'        => 'Delete',
        'show'          => 'Show',
        'edit'          => 'Edit',
        'create-new'    => 'Create New User',
        'back-products'    => 'Retour',
        'email-product'    => 'Email :product',
        'submit-search' => 'Submit Users Search',
        'clear-search'  => 'Clear Search Results',
    ],

    'messages' => [
        'productNameTaken'          => 'Username is taken',
        'productNameRequired'       => 'Username is required',
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
        'product-creation-success'  => 'Successfully created product!',
        'update-product-success'    => 'Successfully updated product!',
        'delete-success'         => 'Successfully deleted the product!',
        'cannot-delete-yourself' => 'You cannot delete yourself!',
    ],

    'show-product' => [
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
        'search-products-ph'   => 'Search Users',
    ],

    'modals' => [
        'delete_product_message' => 'Are you sure you want to delete :product?',
    ],
];
