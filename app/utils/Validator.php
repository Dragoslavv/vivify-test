<?php

namespace App\utils;


/**
 * Class Validator
 * @package App\utils
 */
class Validator
{

    /**
     * @param array $name_array
     * @param $request
     * @return bool
     */
    public static function validate(array $name_array, $request) {

        foreach ( $name_array as $param ) {
            if ( !isset( $request[ $param ] ) ) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param $param
     * @return false
     */
    public static function regex_int($param){

        if( preg_match("/^[0-9]+$/",$param) ) {
            return $param;
        }

        return false;
    }

    /**
     * @param $email
     * @return false
     */
    public static function validate_email($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }
        return false;

    }
}