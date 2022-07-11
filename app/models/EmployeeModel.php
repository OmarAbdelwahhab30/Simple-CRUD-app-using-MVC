<?php

namespace PHPMVC\models;

use PHPMVC\lib\Database;

class EmployeeModel
{


    public function __Construct()
    {
        $this->db = new Database();
    }


    public function IsUsernameDuplicated($name)
    {
        $this->db->query("SELECT * FROM employee WHERE name = :name");
        $this->db->bindValue(":name",$name);
        $this->db->execute();
        if ($this->db->rowCount() > 0)
        {
            return true;
        }
        return false;
    }

    public function AddNewEmployee($name)
    {
        $this->db->query("INSERT INTO employee (name) VALUES (:name)");
        $this->db->bindValue(":name",$name);
        if ($this->db->execute()){
            return true;
        }
        return false;

    }

    public function GetEmployeeByID($id)
    {
        $this->db->query("SELECT * FROM employee WHERE id = :id");
        $this->db->bindValue(":id",$id);
        $this->db->execute();
        if ($this->db->rowCount() > 0)
        {
            return $this->db->single();
        }
        return false;
    }

    public function UpdateEmployeeName($id,$name)
    {
        $this->db->query("UPDATE employee SET name =:name WHERE id =:id");
        $this->db->bindValue(":name",$name);
        $this->db->bindValue(":id",$id);
        if ($this->db->execute()){
            return true;
        }
        return  false;
    }

    public function DeleteEmployee($id)
    {
        $this->db->query("DELETE FROM employee WHERE id=:id");
        $this->db->bindValue(":id",$id);
        if ($this->db->execute())
        {
            return true;
        }
        return false;
    }
}