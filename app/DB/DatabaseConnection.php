<?php

namespace App\DB;


use App\Helper\SingletonPattern\ISingleton as ISingleton;
use App\Helper\SingletonPattern\TSingleton;

/**
 * Class DatabaseConnection
 * @package App\DB
 */
class DatabaseConnection implements ISingleton, QueryBuilderInterface
{
    use TSingleton;

    /**
     * @var DatabaseConfiguration
     */
    private $configuration;

    /**
     * @var
     */
    private $connection;

    /**
     * @var
     */
    public $result;

    /**
     * DatabaseConnection constructor.
     * @param DatabaseConfiguration $config
     */
    public function __construct(DatabaseConfiguration $config)
    {
        $this->configuration = $config;
        $this->connectToDb();
    }

    /**
     *
     */
    public function __destruct(){
        if (isset($this->connection)) {
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }

    /**
     * @return bool|string
     */
    private final function connectToDb(){
        $this->connection = new \mysqli($this->configuration->getHost(), $this->configuration->getUsername(), $this->configuration->getPassword(), $this->configuration->getDbName());

        if(mysqli_connect_error()){
            return "Can not connect to database ".mysqli_connect_error();
        }

        return true;
    }

    /**
     * @param $escape
     * @return mixed
     */
    public function escape($escape){
        $this->result = $this->connection->real_escape_string($escape);
        return $this->result;
    }

    /**
     * @param $query
     * @return mixed
     * Prepare statement with query
     */
    public function query($query){
        $this->result = $this->connection->query($query);
        return $this->result;
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function prepare($sql){
        $this->result = $this->connection->prepare($sql);
        return $this->result;
    }

    // Execute the prepared statement

    /**
     * @return mixed
     */
    public function execute()
    {
        return $this->connection->execute();
    }

    // Get result set as array of objects

    /**
     * @return mixed
     */
    public function resultSet($sql)
    {
        $this->result = $this->connection->prepare($sql);
        $this->result->execute();
        return $this->result;
    }

    // Get single record as object

    /**
     * @return mixed
     */
    public function single()
    {
        return $this->result->fetchAll();
    }

    // Get row count

    /**
     * @return mixed
     */
    public function rowCount()
    {
        return $this->connection->rowCount();
    }

    /**
     * @param $sql
     * @return array
     */
    public function find_by_sql($sql){
        $this->result = $this->connection->prepare($sql);
        $this->result->execute();
        $result = $this->result->get_result();

        $res = [];
        if($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $res[] = $row;
            }
        }
        return $res;
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function find_by_id($sql, $param = array(), $request = array()){
        $this->result = $this->connection->prepare($sql);
        /** bind_param() requires all params to be passed by reference,
         * so you can't pass function's return value directly
         * (without assigning it to a variable first, that is).
         * But, as was already mentioned in the comments, you don't need to escape the parameters at all,
         * that's one of the advantages of using prepared statements. **/

        $reference = implode(',', $request);

        $this->result->bind_param(implode(",", $param), $reference);

        $this->result->execute();
        $result = $this->result->get_result();

        $res=[];

        while ($row = $result->fetch_object()) {
            $res[] = $row;
        }
        return array_shift($res);
    }

}
