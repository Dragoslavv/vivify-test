<?php
namespace App\Model;

use App\DB\QueryBuilder;

class Hero extends AbstractModel {

    protected $table_name = "vivify_hero";

    private $_db;

    public function __construct()
    {
        try {
            $this->_db = QueryBuilder::StartConnection();
        }
        catch(\Exception $e) {
            die($e->getMessage());
        }
    }

    public function create_table()
    {
        // TODO: Implement create_table() method.
    }

    public function delete_table()
    {
        // TODO: Implement delete_table() method.
    }

}
