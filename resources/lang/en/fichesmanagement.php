s<?php

return [

    // Titles
    'showing-all-fiches'     => 'Showing All Ventes',
    'fiches-menu-alt'        => 'Show Fiches Management Menu',
    'create-new-fiche'       => 'Create New Fiche',
    'show-deleted-fiches'    => 'Show Deleted Fiche',
    'editing-fiche'          => 'Editing Fiche :name',
    'showing-fiche'          => 'Showing Fiche :name',
    'showing-fiche-title'    => 'Fiche produit :name',

    // Flash Messages
    'createSuccess'   => 'Successfully created fiche! ',
    'updateSuccess'   => 'Successfully updated fiche! ',
    'deleteSuccess'   => 'Successfully deleted fiche! ',
    'deleteSelfError' => 'You cannot delete yourself! ',

    // Show Fiche Tab
    'viewProfile'            => 'View Profile',
    'editFiche'               => 'Edit Fiche',
    'deleteFiche'             => 'Delete Fiche',
    'fichesBackBtn'           => 'Retour aux fiches',
    'fichesPanelTitle'        => 'Fiche Information',
    'labelFicheName'          => 'Fichename:',
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
    'fichesDeletedPanelTitle' => 'Deleted Fiche Information',
    'fichesBackDelBtn'        => 'Back to Deleted Fiches',

    'successRestore'    => 'Fiche successfully restored.',
    'successDestroy'    => 'Fiche record successfully destroyed.',
    'errorFicheNotFound' => 'Fiche not found.',

    'labelFicheLevel'  => 'Level',
    'labelFicheLevels' => 'Levels',

    'fiches-table' => [
        'caption'   => '{1} :fichescount fiche total|[2,*] :fichescount total fiches',
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
        'create-new'    => 'New Fiche',
        'delete'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm"></span><span class="hidden-xs hidden-sm hidden-md"> </span>',
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Détails</span><span class="hidden-xs hidden-sm hidden-md"> </span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm"></span><span class="hidden-xs hidden-sm hidden-md"> </span>',
        'back-to-fiches' => '<span class="hidden-sm hidden-xs">Retour aux </span><span class="hidden-xs">produits</span>',
        'back-to-fiche'  => 'Retour  <span class="hidden-xs">à la fiche produit</span>',
        'delete-fiche'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Delete</span><span class="hidden-xs"> Fiche</span>',
        'edit-fiche'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Edit</span><span class="hidden-xs"> Fiche</span>',
    ],

    'tooltips' => [
        'delete'        => 'Delete',
        'show'          => 'Show',
        'edit'          => 'Edit',
        'create-new'    => 'Create New Fiche',
        'back-fiches'    => 'Retour',
        'email-fiche'    => 'Email :fiche',
        'submit-search' => 'Submit Fiches Search',
        'clear-search'  => 'Clear Search Results',
    ],

    'messages' => [
        'ficheNameTaken'          => 'Fichename is taken',
        'ficheNameRequired'       => 'Fichename is required',
        'fNameRequired'          => 'First Name is required',
        'lNameRequired'          => 'Last Name is required',
        'emailRequired'          => 'Email is required',
        'emailInvalid'           => 'Email is invalid',
        'passwordRequired'       => 'Password is required',
        'PasswordMin'            => 'Password needs to have at least 6 characters',
        'PasswordMax'            => 'Password maximum length is 20 characters',
        'captchaRequire'         => 'Captcha is required',
        'CaptchaWrong'           => 'Wrong captcha, please try again.',
        'roleRequired'           => 'Fiche role is required.',
        'fiche-creation-success'  => 'Successfully created fiche!',
        'update-fiche-success'    => 'Successfully updated fiche!',
        'delete-success'         => 'Successfully deleted the fiche!',
        'cannot-delete-yourself' => 'You cannot delete yourself!',
    ],

    'show-fiche' => [
        'id'                => 'Fiche ID',
        'name'              => 'Fichename',
        'email'             => '<span class="hidden-xs">Fiche </span>Email',
        'role'              => 'Fiche Role',
        'created'           => 'Created <span class="hidden-xs">at</span>',
        'updated'           => 'Updated <span class="hidden-xs">at</span>',
        'labelRole'         => 'Fiche Role',
        'labelAccessLevel'  => '<span class="hidden-xs">Fiche</span> Access Level|<span class="hidden-xs">Fiche</span> Access Levels',
    ],

    'search'  => [
        'title'             => 'Showing Search Results',
        'found-footer'      => ' Record(s) found',
        'no-results'        => 'No Results',
        'search-fiches-ph'   => 'Search Fiches',
    ],

    'modals' => [
        'delete_fiche_message' => 'Are you sure you want to delete :fiche?',
    ],
];
