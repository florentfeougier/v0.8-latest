<?php

return [

    // Titles
    'showing-all-payments'     => 'Showing All Ventes',
    'payments-menu-alt'        => 'Show Users Management Menu',
    'create-new-payment'       => 'Create New User',
    'show-deleted-payments'    => 'Show Deleted User',
    'editing-payment'          => 'Editing User :name',
    'showing-payment'          => 'Showing User :name',
    'showing-payment-title'    => 'Fiche produit :name',

    // Flash Messages
    'createSuccess'   => 'Successfully created payment! ',
    'updateSuccess'   => 'Successfully updated payment! ',
    'deleteSuccess'   => 'Successfully deleted payment! ',
    'deleteSelfError' => 'You cannot delete yourself! ',

    // Show User Tab
    'viewProfile'            => 'View Profile',
    'editUser'               => 'Edit User',
    'deleteUser'             => 'Delete User',
    'paymentsBackBtn'           => 'Retour aux payments',
    'paymentsPanelTitle'        => 'User Information',
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
    'paymentsDeletedPanelTitle' => 'Deleted User Information',
    'paymentsBackDelBtn'        => 'Back to Deleted Users',

    'successRestore'    => 'User successfully restored.',
    'successDestroy'    => 'User record successfully destroyed.',
    'errorUserNotFound' => 'User not found.',

    'labelUserLevel'  => 'Level',
    'labelUserLevels' => 'Levels',

    'payments-table' => [
        'caption'   => '{1} :paymentscount payment total|[2,*] :paymentscount total payments',
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
        'back-to-payments' => '<span class="hidden-sm hidden-xs">Retour aux </span><span class="hidden-xs">produits</span>',
        'back-to-payment'  => 'Retour  <span class="hidden-xs">à la fiche produit</span>',
        'delete-payment'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Delete</span><span class="hidden-xs"> User</span>',
        'edit-payment'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Edit</span><span class="hidden-xs"> User</span>',
    ],

    'tooltips' => [
        'delete'        => 'Delete',
        'show'          => 'Show',
        'edit'          => 'Edit',
        'create-new'    => 'Create New User',
        'back-payments'    => 'Retour',
        'email-payment'    => 'Email :payment',
        'submit-search' => 'Submit Users Search',
        'clear-search'  => 'Clear Search Results',
    ],

    'messages' => [
        'paymentNameTaken'          => 'Username is taken',
        'paymentNameRequired'       => 'Username is required',
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
        'payment-creation-success'  => 'Successfully created payment!',
        'update-payment-success'    => 'Successfully updated payment!',
        'delete-success'         => 'Successfully deleted the payment!',
        'cannot-delete-yourself' => 'You cannot delete yourself!',
    ],

    'show-payment' => [
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
        'search-payments-ph'   => 'Search Users',
    ],

    'modals' => [
        'delete_payment_message' => 'Are you sure you want to delete :payment?',
    ],
];
