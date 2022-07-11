<?php

namespace PHPMVC\controllers;

use PHPMVC\lib\AbstractController;
use PHPMVC\models\EmployeeModel;

class EmployeeController extends AbstractController
{

    public function __Construct()
    {
        $this->EmployeeModel = $this->Model("EmployeeModel");
    }

    public function AddEmployee()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $name = trim(filter_input(INPUT_POST,"username",FILTER_SANITIZE_STRING));
            $duplicated = $this->EmployeeModel->IsUsernameDuplicated($name);
            if ($duplicated){
                $_SESSION['error'] = "Enter Another username ,this is duplicated";
                header("Location:".URLROOT."EmployeeController/AddEmployee");
                exit();
            }

            $Added = $this->EmployeeModel->AddNewEmployee($name);
            if ($Added)
            {
                $_SESSION['message'] = "Employee Has been Added Successfully";
                header("Location:".URLROOT."EmployeeController/AddEmployee");
                exit();
            }
        }else{
            $this->Route("add");
        }
    }
    public function UpdateEmployee($EmployeeId)
    {
        $data  = $this->EmployeeModel->GetEmployeeByID($EmployeeId);
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            if ($data->name == $_POST['name']){
                header("Location:".URLROOT."IndexController/index");
                exit();
            }elseif ($this->EmployeeModel->IsUsernameDuplicated($_POST['name'])){
                $_SESSION['error'] = "Enter Another username ,this is duplicated";
                header("Location:".URLROOT."EmployeeController/UpdateEmployee/".$EmployeeId);
                exit();
            }else{
                $name = trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
                $Updated = $this->EmployeeModel->UpdateEmployeeName($EmployeeId,$name);
                if ($Updated){
                    $_SESSION['message'] = "Your name has been updated succesfully";
                    header("Location:".URLROOT."EmployeeController/UpdateEmployee/".$EmployeeId);
                    exit();
                }
            }
        }else{
            $this->Route("update",$data);
        }
    }

    public function DeleteEmployee($id)
    {
        if ($this->EmployeeModel->DeleteEmployee($id))
        {
            $_SESSION['message'] = "Your name has been Deleted succesfully";
            header("Location:".URLROOT."IndexController/index");
            exit();
        }
    }


}