<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit08d81314dd2714d86065d44ed5ea8782
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alura\\DesignPattern\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alura\\DesignPattern\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit08d81314dd2714d86065d44ed5ea8782::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit08d81314dd2714d86065d44ed5ea8782::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit08d81314dd2714d86065d44ed5ea8782::$classMap;

        }, null, ClassLoader::class);
    }
}
