<?php

namespace App\Controller;

use App\Entity\UserEntity;
use App\Model\User;

class UserController extends AbstractController {

    public static function index(){

        $table = new User();

        if($table->find_table() !== false) {
            return true;
        } else {
            return $table->create_table();
        }

    }

    public static function save($request){
        $table = new User();
        $user = new UserEntity();

        $user->setFirstName($request['first_name']);
        $user->setLastName($request['last_name']);
        $user->setEmail($request['email']);

        return $table->insert_table($user);
    }

    public static function get_users($request){
        $table = new User();
        $user = new UserEntity();

        return $table->get_user($user->setId($request['id']));
    }

    public static function findUserByEmail($request) {
        $table = new User();
        $user = new UserEntity();

        return $table->check_email($user->setEmail($request['email']));
    }

    public static function destroy (){

        $table = new User();

        return $table->delete_table();
    }

}