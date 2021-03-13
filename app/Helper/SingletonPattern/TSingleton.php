<?php

namespace App\Helper\SingletonPattern;

use ReflectionClass;

/**
 * Trait TSingleton
 * @package App\Helper\SingletonPattern
 */
trait TSingleton
{
    /**
     *	Constructor.
     */
    protected function __construct() {}

    /**
     *	Drop clone singleton objects.
     *	Do not call this method. This is a PHP magic method that we override.
     */
    protected function __clone() {}

    /**
     *	Gets only one instance.
     *	Required by the ISingleton interface.
     *
     *	@params Optional multiple values as arguments for the constructor.
     *	@return Object instance from called class.
     */
    public static function getInstance()
    {
        static $instance = null ;

        if ( ! $instance )
        {
            $reflection = new ReflectionClass( get_called_class() ) ;
            $method     = $reflection->getConstructor() ;
            $instance   = $reflection->newInstanceWithoutConstructor() ;

            $method->setAccessible( true ) ;
            $method->invokeArgs( $instance, func_get_args() ) ;
        }

        return $instance ;
    }
}
