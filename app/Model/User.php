<?php
namespace App\Model;

use App\DB\QueryBuilder;

class User extends AbstractModel {

    protected $table_name = "vivify_users";

    protected $fillUserTable = array(
        "id INT NOT NULL PRIMARY KEY AUTO_INCREMENT",
        "first_name VARCHAR(80) NOT NULL",
        "last_name VARCHAR(80) NOT NULL",
        "email VARCHAR(100) NOT NULL",
        "create_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP",
        "UNIQUE KEY unique_email (email)"
    );

    protected $fillUser = array(
        "first_name", "last_name", "email"
    );

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

    public function insert_table($data) {

        try {
            /** bind_param() requires all params to be passed by reference,
             * so you can't pass function's return value directly
             * (without assigning it to a variable first, that is).
             * But, as was already mentioned in the comments, you don't need to escape the parameters at all,
             * that's one of the advantages of using prepared statements. **/

            $first_name =  $data->getFirstName();
            $last_name =  $data->getLastName();
            $email =  $data->getEmail();

            $sql = "INSERT INTO ". $this->table_name ." (". implode(',', $this->fillUser) .") VALUES (?,?,?)";
            $stm = $this->_db->prepare($sql);
            $stm->bind_param('sss',
                $first_name,
                $last_name,
                $email
            );

            return $stm->execute();
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }


    public function get_user($data){

        try {
            $sql = "SELECT * FROM ". $this->table_name ." WHERE id=?";

            return $this->_db->find_by_id($sql,array("i"),array($data->getId()));
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function check_email($data){
        try {
            $sql = "SELECT id, email FROM ". $this->table_name ." WHERE email=?";

            return $this->_db->find_by_id($sql,array("s"),array($data->getEmail()));
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function find_table(){
        try {
            $sql = "SELECT 1 FROM ". $this->table_name ."";
            return $this->_db->query($sql);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function create_table(){

        try {
            $sql = "CREATE TABLE IF NOT EXISTS ". $this->table_name ."(";
            $sql .= "". implode(',', $this->fillUserTable) ."";
            $sql .= ")ENGINE = InnoDB AUTO_INCREMENT = 10000;";

            return $this->_db->resultSet($sql);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }


    public function delete_table()
    {
        try {
            $sql = "DROP TABLE ". $this->table_name ."";

            return $this->_db->resultSet($sql);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }
}
