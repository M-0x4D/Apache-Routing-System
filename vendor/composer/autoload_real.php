<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit833e4cf12ed75489748a97acf9596324
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

        spl_autoload_register(array('ComposerAutoloaderInit833e4cf12ed75489748a97acf9596324', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit833e4cf12ed75489748a97acf9596324', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit833e4cf12ed75489748a97acf9596324::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
