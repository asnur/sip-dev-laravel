<?php

return [

    /*
    |-------------------------------------
    | Messenger display name
    |-------------------------------------
    */
    'name' => env('CHATIFY_NAME', 'Konsultasi'),

    /*
    |-------------------------------------
    | Routes configurations
    |-------------------------------------
    */
    'routes' => [
        'prefix' => env('CHATIFY_ROUTES_PREFIX', 'chat'),
        'middleware' => env('CHATIFY_ROUTES_MIDDLEWARE', ['web', 'auth']),
        'namespace' => env('CHATIFY_ROUTES_NAMESPACE', 'App\Http\Controllers\vendor\Chatify'),
    ],

    /*
    |-------------------------------------
    | Pusher API credentials
    |-------------------------------------
    */
    'pusher' => [
        'key' => env('PUSHER_APP_KEY'),
        'secret' => env('PUSHER_APP_SECRET'),
        'app_id' => env('PUSHER_APP_ID'),
        'options' => (array) [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => env('PUSHER_APP_USETLS'),
            'encryption_master_key_base64' => env('PUSHER_APP_ENCRYPTION_KEY'),
        ],
    ],

    /*
    |-------------------------------------
    | User Avatar
    |-------------------------------------
    */
    'user_avatar' => [
        'folder' => 'users-avatar',
        'default' => 'avatar.png',
    ],

    /*
    |-------------------------------------
    | Attachments
    |-------------------------------------
    */
    'attachments' => [
        'folder' => 'attachments',
        'download_route_name' => 'attachments.download',
        'allowed_images' => (array) ['png', 'jpg', 'jpeg', 'gif'],
        'allowed_files' => (array) ['zip', 'rar', 'txt'],
    ],
];
