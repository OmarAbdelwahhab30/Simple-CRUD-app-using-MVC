<?php
namespace PHPMVC\lib;

use PDO;
use PDOException;

class Database
{

    private $dbhostname = DB_HOST_NAME;
    private $dbname = DB_NAME;
    private $dbpassword = DB_PASSWORD;
    private $dbusername = DB_USER_NAME;


    /**
     * @var false|PDOStatement
     */
    private $statement;

    public function __Construct()
    {
        try {
            $dsn = "mysql://hostname=".$this->dbhostname.";dbname=".$this->dbname;
            $this->dbhandler = new PDO($dsn,$this->dbusername,$this->dbpassword,array());

        }catch (PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }


    public function query($sql){
        $this->statement = $this->dbhandler->prepare($sql);
    }

    public function bindValue($parameter,$value,$type=null)
    {
        switch (is_null($type)){
            case is_int($value):
                $type= PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type= PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type= PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($parameter,$value,$type);
    }

    public function execute()
    {
        return $this->statement->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }


    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount()
    {
        return $this->statement->rowCount();
    }
}