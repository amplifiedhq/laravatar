<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Avatar Driver
    |--------------------------------------------------------------------------
    |  This option defines the default avatar driver that will be used to
    |  generate the avatars. Laravatar provides a default driver to generate
    |  avatars using Gravatar. You can create your own driver by implementing
    |  the AvatarInterface contract.
    |
    | Supported: "gravatar", "boringavatar", "dicebear", "ui-avatars", 
    |
    */

    'default' => env('LARAVATAR_DRIVER', 'gravatar'),

    /*
    |--------------------------------------------------------------------------
    | Avatar Drivers
    |--------------------------------------------------------------------------
    |  Here you can define the configuration for each avatar driver. You can
    |  define the driver class, the driver options. Once you change the config
    |  you need to clear the config cache.
    |
    */

    'drivers' => [
        'gravatar' => [
            'class' => \AmplifiedHQ\Laravatar\Drivers\Gravatar::class,
            'options' => [
                'size' => 96,
            ],
        ],
        'boringavatar' => [
            'class' => \AmplifiedHQ\Laravatar\Drivers\BoringAvatar::class,
            'options' => [
                'size' => 96,
                'variant' => 'marble', /** @see \AmplifiedHQ\Laravatar\Drivers\BoringAvatar::$variants for supported variants */
                'squared' => false, 
            ],
        ],
        'dicebear' => [
            'class' => \AmplifiedHQ\Laravatar\Drivers\DiceBear::class,
            'options' => [
                'size' => 96,
                'style' => 'avataaars', /** @see \AmplifiedHQ\Laravatar\Drivers\DiceBear::$styles for supported styles */
                'format' => 'svg', /** @see \AmplifiedHQ\Laravatar\Drivers\DiceBear::$formats for supported formats */
            ],
        ],
        'ui-avatars' => [
            'class' => \AmplifiedHQ\Laravatar\Drivers\UiAvatars::class,
            'url' => 'https://ui-avatars.com/api/',
            'options' => [
                'size' => 96,
                'rounded' => false,
                'format' => 'png', /** @see \AmplifiedHQ\Laravatar\Drivers\UiAvatars::$formats for supported formats */
                // 'background' => 'ffffff', # Note: If you set a color, all generated avatars will have the same background color.
                // 'color' => '000000', # Note: If you set a background color, all generated avatars will have the same background color.
            ],
        ],
    ],
];
