<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd9544433587499479f331af03ccb8f9e
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/classes',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/classes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd9544433587499479f331af03ccb8f9e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd9544433587499479f331af03ccb8f9e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}