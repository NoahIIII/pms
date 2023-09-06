<?php
include_once '../Data/DB.php';
include_once '../helpers/validations.php';
include_once '../helpers/functions.php';
class login
{
    public $con;
    public $errors=[];
    public function __construct()
    {
        $this->con = new PDO("mysql:host=localhost;dbname=pms;", "root", "");
    }
    
    public  function login()
    {
        if(validations::RequestMethod("POST"))
        {
            $email=functions::sanitaization($_POST['email']);
            $password=functions::sanitaization($_POST['password']);
        if (validations::ValidateEmail($email)) {
            if (validations::EmailExist($this->con, $email)) {
                if (validations::ConfirmPsswordByEmail($this->con, $password, $email)) {
                    $db = new DB();
                    $_SESSION['auth'] = $db->GetBy('users', "email = '$email';");
                    header('location:../home.php');
                    // $_SESSION['auth']
                }
                else{
                    $this->errors[]="password does not match";
                    $_SESSION['errors']=$this->errors;
                    header('location:../index.php');
                }
            } else {
                $this->errors[]="email does not exist";
                $_SESSION['errors']=$this->errors;

                header('location:../index.php');
            }
        } else {
            header('location:../index.php');
        }
    }
    else{
        header('location:index.php');
    }
}
}

$login=new login();
$login->login();



