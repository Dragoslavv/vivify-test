<?php

namespace App\Helper\Route;

/**
 * Class Route
 * @package App\Helper\Route
 */
class Route {

    /**
     * @var string
     */
    private $dirname = 'View/';
    /**
     * @var
     */
    private $url;
    /**
     * @var array
     */
    private $files = array();

    /**
     * Route constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
        $this->url();
    }

    /**
     *
     */
    private final function url () {

        foreach ( glob($this->dirname . '*', GLOB_ONLYDIR) as $d ) {

            $f = glob($d . '/' . $this->url . '.php');

            if (count($f)) {
                $this->files = array_merge($this->files, $f);
            }
        }

        if ( !empty($this->files) && file_exists($this->files[0]) ) {

            require_once $this->files[0];

        } else {

            header('HTTP/1.1 404', true, 404);
            exit();

        }

    }

}