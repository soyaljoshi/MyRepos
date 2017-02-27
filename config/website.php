<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Broadlink Meta Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the website meta tags for your application.
    | These will be used for web scraping and open graph tags
    | on sites such as Facebook and Twitter.
    |
    */
    'name' => 'VaRG',
    'title' => 'VaRG',
    'description' => 'National Public health Laboratory (NPHL) is the government national reference laboratory under the Department of health services (DoHS) and Ministry of Health and Population (MoHP).',
    'author' => 'VaRG',
    'url' => 'www.vargnepal.com',
    'adminLogo' => 'assets/frontend/images/vargnepal.png',

    /*
    |--------------------------------------------------------------------------
    | Uploads Configuration
    |--------------------------------------------------------------------------
    |
    | Specify what type of storage you would like for your application. Just
    | as a reminder, your uploads directory MUST be writable by the
    | web server for the uploading to function properly.
    |
    | Supported: "local", "public"
    |
    */
    'uploads' => [
        'storage' => 'upload',
        'webpath' => '/uploads/',
    ],

];
