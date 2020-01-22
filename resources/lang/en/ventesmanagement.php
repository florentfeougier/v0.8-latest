<?php

return [

    // Titles
    'showing-all-ventes'     => 'Toutes les ventes',
    'users-menu-alt'        => 'Show Ventes Management Menu',
    'create-new-vente'       => 'Ajouter une vente',
    'show-deleted-ventes'    => 'Show Deleted Vente',
    'editing-vente'          => 'Modifier la vente :name',
    'showing-vente'          => 'Vente: :name',
    'showing-vente-title'    => ':name\'s Information',

    // Flash Messages
    'createSuccess'   => 'Successfully created user! ',
    'updateSuccess'   => 'Successfully updated user! ',
    'deleteSuccess'   => 'Successfully deleted user! ',
    'deleteSelfError' => 'You cannot delete yourself! ',

    // Show Vente Tab
    'viewProfile'            => 'View Profile',
    'editVente'               => 'Modifier la vente',
    'deleteVente'             => 'Supprimer la vente',
    'usersBackBtn'           => 'Retour aux ventes',
    'usersPanelTitle'        => 'Vente Information',
    'labelVenteName'          => 'Ventename:',
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
    'usersDeletedPanelTitle' => 'Deleted Vente Information',
    'usersBackDelBtn'        => 'Back to Deleted Ventes',

    'successRestore'    => 'Vente successfully restored.',
    'successDestroy'    => 'Vente record successfully destroyed.',
    'errorVenteNotFound' => 'Vente not found.',

    'labelVenteLevel'  => 'Level',
    'labelVenteLevels' => 'Levels',

    'ventes-table' => [
        'caption'   => '{1} :userscount user total|[2,*] :userscount total users',
        'id'        => 'ID',
        'name'      => 'Nom',
        'date'     => 'Date',
        'location'     => 'Lieu',
        'is_public'     => 'Public',


        'created'   => 'Created',
        'updated'   => 'Updated',
        'actions'   => 'Actions',
        'updated'   => 'Updated',
    ],

    'buttons' => [
        'create-new'    => 'New Vente',
        'delete'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm"></span><span class="hidden-xs hidden-sm hidden-md"></span>',
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Voir</span><span class="hidden-xs hidden-sm hidden-md"></span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm"></span><span class="hidden-xs hidden-sm hidden-md"></span>',
        'back-to-ventes' => '<span class="hidden-sm hidden-xs">Back to </span><span class="hidden-xs">Ventes</span>',
        'back-to-vente'  => 'Back  <span class="hidden-xs">to Vente</span>',
        'delete-vente'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Delete</span><span class="hidden-xs"> Vente</span>',
        'edit-vente'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Edit</span><span class="hidden-xs"> Vente</span>',
    ],

    'tooltips' => [
        'delete'        => 'Delete',
        'show'          => 'Show',
        'edit'          => 'Edit',
        'create-new'    => 'Create New Vente',
        'back-ventes'    => 'Retour',
        'email-vente'    => 'Email :user',
        'submit-search' => 'Submit Ventes Search',
        'clear-search'  => 'Clear Search Results',
    ],

    'messages' => [
        'userNameTaken'          => 'Ventename is taken',
        'userNameRequired'       => 'Ventename is required',
        'fNameRequired'          => 'First Name is required',
        'lNameRequired'          => 'Last Name is required',
        'emailRequired'          => 'Email is required',
        'emailInvalid'           => 'Email is invalid',
        'passwordRequired'       => 'Password is required',
        'PasswordMin'            => 'Password needs to have at least 6 characters',
        'PasswordMax'            => 'Password maximum length is 20 characters',
        'captchaRequire'         => 'Captcha is required',
        'CaptchaWrong'           => 'Wrong captcha, please try again.',
        'roleRequired'           => 'Vente role is required.',
        'user-creation-success'  => 'Successfully created user!',
        'update-vente-success'    => 'Successfully updated user!',
        'delete-success'         => 'Successfully deleted the user!',
        'cannot-delete-yourself' => 'You cannot delete yourself!',
    ],

    'show-vente' => [
        'id'                => 'Vente ID',
        'name'              => 'Ventename',
        'email'             => '<span class="hidden-xs">Vente </span>Email',
        'role'              => 'Vente Role',
        'created'           => 'Created <span class="hidden-xs">at</span>',
        'updated'           => 'Updated <span class="hidden-xs">at</span>',
        'labelRole'         => 'Vente Role',
        'labelAccessLevel'  => '<span class="hidden-xs">Vente</span> Access Level|<span class="hidden-xs">Vente</span> Access Levels',
    ],

    'search'  => [
        'title'             => 'Showing Search Results',
        'found-footer'      => ' Record(s) found',
        'no-results'        => 'No Results',
        'search-ventes-ph'   => 'Search Ventes',
    ],

    'modals' => [
        'delete_user_message' => 'Are you sure you want to delete :user?',
    ],
];
