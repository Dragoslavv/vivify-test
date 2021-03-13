<?php

namespace App\Controller;


/**
 * Class AbstractController
 * @package App\Controller
 */
abstract class AbstractController
{
    /**
     * @return mixed
     */
    abstract static function index();

    /**
     * @return mixed
     */
    abstract static function destroy();

}