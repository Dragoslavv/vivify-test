<?php

namespace App\DB;

/**
 * Class DatabaseConfiguration
 * @package App\DB
 */
class DatabaseConfiguration
{
    /**
     * @var
     */
    private  $host;
    /**
     * @var
     */
    private  $port;
    /**
     * @var
     */
    private  $username;
    /**
     * @var
     */
    private  $password;
    /**
     * @var
     */
    private  $dbname;

    /**
     * DatabaseConfiguration constructor.
     * @param $host
     * @param $port
     * @param $username
     * @param $password
     * @param $dbname
     */
    public function __construct($host, $port, $username, $password, $dbname)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getDbName()
    {
        return $this->dbname;
    }

}