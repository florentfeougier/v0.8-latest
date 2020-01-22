<?php

return [

    // Titles
    'showing-all-deliveries'     => 'Showing All Users',
    'deliveries-menu-alt'        => 'Show Users Management Menu',
    'create-new-deliverie'       => 'Create New User',
    'show-deleted-deliveries'    => 'Show Deleted User',
    'editing-deliverie'          => 'Editing User :name',
    'showing-deliverie'          => 'Showing User :name',
    'showing-deliverie-title'    => ':name\'s Information',

    // Flash Messages
    'createSuccess'   => 'Successfully created deliverie! ',
    'updateSuccess'   => 'Successfully updated deliverie! ',
    'deleteSuccess'   => 'Successfully deleted deliverie! ',
    'deleteSelfError' => 'You cannot delete yourself! ',

    // Show User Tab
    'viewProfile'            => 'View Profile',
    'editUser'               => 'Edit User',
    'deleteUser'             => 'Delete User',
    'deliveriesBackBtn'           => 'Back to Users',
    'deliveriesPanelTitle'        => 'User Information',
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
    'deliveriesDeletedPanelTitle' => 'Deleted User Information',
    'deliveriesBackDelBtn'        => 'Back to Deleted Users',

    'successRestore'    => 'User successfully restored.',
    'successDestroy'    => 'User record successfully destroyed.',
    'errorUserNotFound' => 'User not found.',

    'labelUserLevel'  => 'Level',
    'labelUserLevels' => 'Levels',

    'deliveries-table' => [
        'caption'   => '{1} :deliveriescount deliverie total|[2,*] :deliveriescount total deliveries',
        'id'        => 'ID',
        'name'      => 'Username',
        'fname'     => 'First Name',
        'lname'     => 'Last Name',
        'email'     => 'Email',
        'role'      => 'Role',
        'created'   => 'Created',
        'updated'   => 'Updated',
        'actions'   => 'Actions',
        'updated'   => 'Updated',
    ],

    'buttons' => [
        'create-new'    => 'New User',
        'delete'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"> User</span>',
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Show</span><span class="hidden-xs hidden-sm hidden-md"> User</span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Edit</span><span class="hidden-xs hidden-sm hidden-md"> User</span>',
        'back-to-deliveries' => '<span class="hidden-sm hidden-xs">Back to </span><span class="hidden-xs">Users</span>',
        'back-to-deliverie'  => 'Back  <span class="hidden-xs">to User</span>',
        'delete-deliverie'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Delete</span><span class="hidden-xs"> User</span>',
        'edit-deliverie'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Edit</span><span class="hidden-xs"> User</span>',
    ],

    'tooltips' => [
        'delete'        => 'Delete',
        'show'          => 'Show',
        'edit'          => 'Edit',
        'create-new'    => 'Create New User',
        'back-deliveries'    => 'Back to deliveries',
        'email-deliverie'    => 'Email :deliverie',
        'submit-search' => 'Submit Users Search',
        'clear-search'  => 'Clear Search Results',
    ],

    'messages' => [
        'deliverieNameTaken'          => 'Username is taken',
        'deliverieNameRequired'       => 'Username is required',
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
        'deliverie-creation-success'  => 'Successfully created deliverie!',
        'update-deliverie-success'    => 'Successfully updated deliverie!',
        'delete-success'         => 'Successfully deleted the deliverie!',
        'cannot-delete-yourself' => 'You cannot delete yourself!',
    ],

    'show-deliverie' => [
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
        'search-deliveries-ph'   => 'Search Users',
    ],

    'modals' => [
        'delete_deliverie_message' => 'Are you sure you want to delete :deliverie?',
    ],
];
