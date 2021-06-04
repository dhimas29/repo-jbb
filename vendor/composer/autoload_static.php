<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit63b6539b591e0fb3e1ab29083998a508
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit63b6539b591e0fb3e1ab29083998a508::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit63b6539b591e0fb3e1ab29083998a508::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
