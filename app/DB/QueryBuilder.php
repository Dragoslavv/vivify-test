<?php

namespace App\DB;

/**
 * Class QueryBuilder
 * @package App\DB
 */
class QueryBuilder
{
    /**
     * @var
     */
    private static $_db;

    /**
     * @return Object|null
     */
    public static function StartConnection() {

        $config = new DatabaseConfiguration(MYSQL_HOST, MYSQL_PORT, MYSQL_USER, MYSQL_PASS, MYSQL_NAME);

        self::$_db = DatabaseConnection::getInstance($config);

        return self::$_db;

    }

}