<?php

namespace App\Model;

use App\DB\DatabaseConnection;

/**
 * Class AbstractModel
 * @package App\Model
 */
abstract class AbstractModel
{
    /**
     * @var
     */
    protected $table_name;

    /**
     * @var DatabaseConnection
     */
    private $_db;

    /**
     * AbstractModel constructor.
     * @param DatabaseConnection $db
     */
    public function __construct(DatabaseConnection $db)
    {
        $this->_db = $db;

    }

    /**
     * @return mixed
     */
    abstract public function create_table();

    /**
     * @return mixed
     */
    abstract public function delete_table();

}