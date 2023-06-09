<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc20d3724f7399a39f8ece59bd7c5451c
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Locng\\TextClassification\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Locng\\TextClassification\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc20d3724f7399a39f8ece59bd7c5451c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc20d3724f7399a39f8ece59bd7c5451c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc20d3724f7399a39f8ece59bd7c5451c::$classMap;

        }, null, ClassLoader::class);
    }
}
