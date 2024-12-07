<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Panels
    |--------------------------------------------------------------------------
    |
    | You can register as many Filament panels as you like, and each panel will
    | have its own distinct configuration, including navigation, resources,
    | and pages. Each panel also requires a dashboard.
    |
    */

    'panels' => [
        'default' => [
            'path' => 'admin', // Admin panel URL
            'name' => 'Filament Admin', // Panel display name
            'dashboard' => [
                'widgets' => [
                    \Filament\Widgets\AccountWidget::class,
                    \Filament\Widgets\FilamentInfoWidget::class,
                ],
                'columns' => 2,
            ],
            'resources' => [],
            'pages' => [
                \Filament\Pages\Dashboard::class,
            ],
            'widgets' => [],
            'middleware' => [
                'web',
                \Illuminate\Auth\Middleware\Authenticate::class,
            ],
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Auth
    |--------------------------------------------------------------------------
    |
    | You can specify the guard and the user model that Filament will use for
    | authentication.
    |
    */

    'auth' => [
        'guard' => 'web', // Specify the authentication guard for admins
        'user_model' => \App\Models\Admin::class, // Specify the Admin model for Filament
    ],

    /*
    |--------------------------------------------------------------------------
    | Dark Mode
    |--------------------------------------------------------------------------
    |
    | You can enable dark mode support for the administration interface, which
    | will allow users to switch between light and dark themes.
    |
    */

    'dark_mode' => true, // Enable dark mode if required

    /*
    |--------------------------------------------------------------------------
    | Branding
    |--------------------------------------------------------------------------
    |
    | This is the branding configuration for the administration interface.
    | You may add your own logo and favicon.
    |
    */

    'branding' => [
        'logo' => null, // Set your logo URL here
        'favicon' => null, // Set your favicon URL here
    ],

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | You can configure the layout settings for the administration interface,
    | including the sidebar width and the collapsed state.
    |
    */

    'layout' => [
        'sidebar' => [
            'width' => 'full',
            'collapsed' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Localization
    |--------------------------------------------------------------------------
    |
    | You can configure the localization settings for the administration
    | interface, including the default locale and date format.
    |
    */

    'localization' => [
        'default_locale' => 'en',
        'locales' => [
            'en' => 'English',
        ],
        'date_format' => 'Y-m-d',
    ],

    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    |
    | You can configure the notification settings for the administration
    | interface, including the notification duration and the position.
    |
    */

    'notifications' => [
        'duration' => 3000,
        'position' => 'top-right',
    ],

    /*
    |--------------------------------------------------------------------------
    | Styling
    |--------------------------------------------------------------------------
    |
    | You can configure the styling settings for the administration interface,
    | including custom CSS and JS files.
    |
    */

    'styling' => [
        'css' => [],
        'js' => [],
    ],
];
