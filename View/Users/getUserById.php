<?php

use App\utils\Validator;
use App\Controller\UserController;
use App\Helper\ErrorFactory\ErrorFactory as ErrorFactory;

//header for access type
header('Access-Control-Allow-Origin: *'); //* for allow publicly
header('Content-type: application/json');

if(Validator::validate(array("id"), $_POST)) {

    if(!Validator::regex_int($_POST['id'])){

        echo ErrorFactory::getInstance()->getError("108")->getJSONResponse();
        exit();
    }

    $user_exist = UserController::get_users(array("id" => $_POST['id']));

    if (!empty($user_exist)) {
        echo json_encode(array("code" => 200, "data" => $user_exist));

    } else {
        echo ErrorFactory::getInstance()->getError("106")->getJSONResponse();

    }

} else {
    echo ErrorFactory::getInstance()->getError("101")->getJSONResponse();
}

