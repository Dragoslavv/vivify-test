<?php

namespace App\Helper\SingletonPattern;


/**
 * Interface ISingleton
 * @package App\Helper\SingletonPattern
 */
interface ISingleton
{
    /**
     *	Gets only one instance. (ISingleton pattern)
     *
     *	@params Optional multiple values as arguments for the constructor.
     *	@return Object instance from called class.
     */
    public static function getInstance() ;
}
