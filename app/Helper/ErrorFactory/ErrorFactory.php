<?php

namespace App\Helper\ErrorFactory;

use App\Helper\ErrorFactory\ErrorResponse as ErrorResponse;
use App\Helper\SingletonPattern\ISingleton as ISingleton;
use App\Helper\SingletonPattern\TSingleton;


/**
 * Class ErrorFactory
 * @package App\Helper\ErrorFactory
 */
class ErrorFactory implements ISingleton
{
    use TSingleton;

    /**
     * @var array
     */
    private $error_codes = array();

    /**
     * ErrorFactory constructor.
     */
    public function __construct()
    {
        $this->error_codes["001"] = new ErrorResponse("001", "500", "Generic error message.");
        $this->error_codes["101"] = new ErrorResponse("101", "400", "Parameters missing.");
        $this->error_codes["102"] = new ErrorResponse("102", "400", "The wizard is not allowed to take it.");
        $this->error_codes["106"] = new ErrorResponse("106", "500", "System error!");

        //Standard response for successful HTTP requests
        $this->error_codes["200"] = new ErrorResponse("200", "200", "Successful!");

        //The requested resource could not be found but may be available in the future.
        $this->error_codes["404"] = new ErrorResponse("404", "404", "This page can’t be found");

    }

    /**
     * @param $code
     * @return mixed
     */
    public function getError($code) {
        $res = $this->error_codes[$code];
        if ($res) {
            return $res;
        } else {
            return $this->error_codes["001"];
        }
    }

}
