<?php

return [
    /*
    |--------------------------------------------------------------------------
    | API URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the package to call the Velocity Artisans API, this
    | should reflect the API endpoint for this application.
    | api.velocityartisan.com is the core system and should be updated.
    |
    */
    'url' => env('VA_API_URL', 'https://api.velocityartisans.com'),

    /*
    |--------------------------------------------------------------------------
    | API KEY
    |--------------------------------------------------------------------------
    |
    | This is the Authorization Bearer of the API call, this will validate you
    | if you need a key, login to your merchant/admin panel and head to the
    | Developer > API Keys section.
    |
    */
    'key' => env('VA_API_KEY', null),

    /*
    |--------------------------------------------------------------------------
    | API cache Lifetime
    |--------------------------------------------------------------------------
    |
    | Here you may specify the number of minutes that you wish the responses
    | to be allowed to remain idle before it expires. If you want them
    | to immediately set the lifetime to false.
    |
    */

    'cache_lifetime' => env('VA_CACHE_LIFETIME', 60)
];
