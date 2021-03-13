<?php
use \App\utils\Validator;
use App\Helper\ErrorFactory\ErrorFactory as ErrorFactory;
use App\Controller\UserController;

//header for access type
header('Access-Control-Allow-Origin: *'); //* for allow publicly
header('Content-type: application/json');

if(Validator::validate(array("first_name","last_name","email"), $_POST)) {

    if(UserController::index()) {

       $user_exists = UserController::findUserByEmail(array("email" => $_POST['email']));

       if( isset($user_exists->email) && $user_exists->email === $_POST['email']) {

           echo ErrorFactory::getInstance()->getError("107")->getJSONResponse();
           exit();
       }

        if(!Validator::validate_email($_POST['email'])) {
            echo ErrorFactory::getInstance()->getError("102")->getJSONResponse();
            exit();
        }

        $register = UserController::save(array(
            "first_name"     => trim( $_POST['first_name'] ),
            "last_name"      => trim( $_POST['last_name'] ),
            "email"          => trim( $_POST['email'] )
        ));

        if( $register ) {

            echo ErrorFactory::getInstance()->getError("200")->getJSONResponse();

        } else {
            echo ErrorFactory::getInstance()->getError("106")->getJSONResponse();
        }

    } else {
        echo ErrorFactory::getInstance()->getError("105")->getJSONResponse();
    }

} else {
    echo ErrorFactory::getInstance()->getError("101")->getJSONResponse();
}
