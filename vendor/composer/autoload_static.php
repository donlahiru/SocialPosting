<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0e141f153bc40fcc93ddf98f728a55d6
{
    public static $files = array (
        'aca594cec0c196659a3b7d4dc2665c0b' => __DIR__ . '/..' . '/j7mbo/twitter-api-php/TwitterAPIExchange.php',
        '7e702cccdb9dd904f2ccf22e5f37abae' => __DIR__ . '/..' . '/facebook/php-sdk-v4/src/Facebook/polyfills.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Facebook\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Facebook\\' => 
        array (
            0 => __DIR__ . '/..' . '/facebook/php-sdk-v4/src/Facebook',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0e141f153bc40fcc93ddf98f728a55d6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0e141f153bc40fcc93ddf98f728a55d6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
