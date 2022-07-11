<?php

namespace PHPMVC\models;

use PHPMVC\lib\Database;

class IndexModel
{

    public function __Construct()
    {
        $this->db = new Database();
    }

    public function GetAllEmployees()
    {
        $this->db->query("SELECT * FROM Employee");
        $this->db->execute();
        if ($this->db->rowCount() > 0 ){
            return $this->db->resultSet();
        }
        return false;
    }
}