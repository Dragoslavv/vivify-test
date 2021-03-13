<?php

namespace App\Helper\ErrorFactory;


/**
 * Interface ErrorHandlerInterface
 * @package App\Helper\ErrorFactory
 */
interface ErrorHandlerInterface
{
    /**
     * @return mixed
     */
    public function getJSONResponse ();

    /**
     * @return mixed
     */
    public function sendResponse ();

    /**
     * @return mixed
     */
    public function responseInfo ();

    /**
     * @return mixed
     */
    public function responseWarn ();

    /**
     * @return mixed
     */
    public function responseError ();

}