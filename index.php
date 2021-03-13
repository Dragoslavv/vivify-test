<?php
error_reporting(E_ALL); // Report all errors
ini_set('display_errors', 1); // Turn on error reporting

use App\Helper\ErrorFactory\ErrorFactory as ErrorFactory;


if ( isset($_GET['url']) && !empty($_GET['url']) ) {

    /* * *
     *
     * Parameters that are sent from the url address, we first check if they exist in our.
     * Calling the Route function we get all the files from the View folder, of course if there is in it.
     * By including the Route we call and Autoload
     *
     * * */
    require_once './vendor/autoload.php';
    require_once(__DIR__ . "/./app/config/config.php");
    require_once "./app/Helper/Route/Route.php";

    $router = new App\Helper\Route\Route($_GET['url']);

} else {
    ErrorFactory::getInstance()->getError("404")->responseWarn(false);

}