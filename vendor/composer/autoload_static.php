<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfb95e583577fbdedeb624a8cd3bad3b1
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfb95e583577fbdedeb624a8cd3bad3b1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfb95e583577fbdedeb624a8cd3bad3b1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfb95e583577fbdedeb624a8cd3bad3b1::$classMap;

        }, null, ClassLoader::class);
    }
}
