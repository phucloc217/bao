<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc20d3724f7399a39f8ece59bd7c5451c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitc20d3724f7399a39f8ece59bd7c5451c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc20d3724f7399a39f8ece59bd7c5451c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc20d3724f7399a39f8ece59bd7c5451c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
