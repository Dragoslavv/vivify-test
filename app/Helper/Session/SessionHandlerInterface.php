<?php

namespace App\Helper\Session;


/**
 * Interface SessionHandlerInterface
 * @package App\Helper\Session
 */
interface SessionHandlerInterface
{
    /* Methods */
    /**
     * @return mixed
     */
    public function close (  );

    /**
     * @param $session_id
     * @return mixedmber, 2020
     */
    public function destroy ($session_id );

    /**
     * @param $maxLifetime
     * @return mixed
     */
    public function gc ($maxLifetime );

    /**
     * @param $save_path
     * @param $session_name
     * @return mixed
     */
    public function open ($save_path , $session_name );

    /**
     * @param $session_id
     * @return mixed
     */
    public function read ($session_id );

    /**
     * @param $session_id
     * @param $session_data
     * @return mixed
     */
    public function write ($session_id , $session_data );
}