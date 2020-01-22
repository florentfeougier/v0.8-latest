<?php

return [

    // Titles
    'showing-all-posts'     => 'Showing All Ventes',
    'posts-menu-alt'        => 'Show Posts Management Menu',
    'create-new-post'       => 'Create New Post',
    'show-deleted-posts'    => 'Show Deleted Post',
    'editing-post'          => 'Editing Post :name',
    'showing-post'          => 'Showing Post :name',
    'showing-post-title'    => 'Fiche produit :name',

    // Flash Messages
    'createSuccess'   => 'Successfully created post! ',
    'updateSuccess'   => 'Successfully updated post! ',
    'deleteSuccess'   => 'Successfully deleted post! ',
    'deleteSelfError' => 'You cannot delete yourself! ',

    // Show Post Tab
    'viewProfile'            => 'View Profile',
    'editPost'               => 'Edit Post',
    'deletePost'             => 'Delete Post',
    'postsBackBtn'           => 'Retour aux posts',
    'postsPanelTitle'        => 'Post Information',
    'labelPostName'          => 'Postname:',
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
    'postsDeletedPanelTitle' => 'Deleted Post Information',
    'postsBackDelBtn'        => 'Back to Deleted Posts',

    'successRestore'    => 'Post successfully restored.',
    'successDestroy'    => 'Post record successfully destroyed.',
    'errorPostNotFound' => 'Post not found.',

    'labelPostLevel'  => 'Level',
    'labelPostLevels' => 'Levels',

    'posts-table' => [
        'caption'   => '{1} :postscount post total|[2,*] :postscount total posts',
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
        'create-new'    => 'New Post',
        'delete'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm">Supprimer</span><span class="hidden-xs hidden-sm hidden-md"> </span>',
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Détails</span><span class="hidden-xs hidden-sm hidden-md"> </span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Modifier</span><span class="hidden-xs hidden-sm hidden-md"> </span>',
        'back-to-posts' => '<span class="hidden-sm hidden-xs">Retour aux </span><span class="hidden-xs">produits</span>',
        'back-to-post'  => 'Retour  <span class="hidden-xs">à la fiche produit</span>',
        'delete-post'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Delete</span><span class="hidden-xs"> Post</span>',
        'edit-post'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Edit</span><span class="hidden-xs"> Post</span>',
    ],

    'tooltips' => [
        'delete'        => 'Delete',
        'show'          => 'Show',
        'edit'          => 'Edit',
        'create-new'    => 'Create New Post',
        'back-posts'    => 'Retour',
        'email-post'    => 'Email :post',
        'submit-search' => 'Submit Posts Search',
        'clear-search'  => 'Clear Search Results',
    ],

    'messages' => [
        'postNameTaken'          => 'Postname is taken',
        'postNameRequired'       => 'Postname is required',
        'fNameRequired'          => 'First Name is required',
        'lNameRequired'          => 'Last Name is required',
        'emailRequired'          => 'Email is required',
        'emailInvalid'           => 'Email is invalid',
        'passwordRequired'       => 'Password is required',
        'PasswordMin'            => 'Password needs to have at least 6 characters',
        'PasswordMax'            => 'Password maximum length is 20 characters',
        'captchaRequire'         => 'Captcha is required',
        'CaptchaWrong'           => 'Wrong captcha, please try again.',
        'roleRequired'           => 'Post role is required.',
        'post-creation-success'  => 'Successfully created post!',
        'update-post-success'    => 'Successfully updated post!',
        'delete-success'         => 'Successfully deleted the post!',
        'cannot-delete-yourself' => 'You cannot delete yourself!',
    ],

    'show-post' => [
        'id'                => 'Post ID',
        'name'              => 'Postname',
        'email'             => '<span class="hidden-xs">Post </span>Email',
        'role'              => 'Post Role',
        'created'           => 'Created <span class="hidden-xs">at</span>',
        'updated'           => 'Updated <span class="hidden-xs">at</span>',
        'labelRole'         => 'Post Role',
        'labelAccessLevel'  => '<span class="hidden-xs">Post</span> Access Level|<span class="hidden-xs">Post</span> Access Levels',
    ],

    'search'  => [
        'title'             => 'Showing Search Results',
        'found-footer'      => ' Record(s) found',
        'no-results'        => 'No Results',
        'search-posts-ph'   => 'Search Posts',
    ],

    'modals' => [
        'delete_post_message' => 'Are you sure you want to delete :post?',
    ],
];
