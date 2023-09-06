<?php
session_start();
include_once '../helpers/functions.php';
include_once '../helpers/validations.php';
include_once '../Data/DB.php';
class register
{
    public $con;
    public function __construct()
    {
        $this->con = new PDO("mysql:host=localhost;dbname=pms;", "root", "");
    }

    public function CreateUser($name, $email, $password, $image)
    {
        if (validations::ValidateName($name) && validations::ValidateEmail($email) && validations::ValidatePassword($password) && validations::EmailExist($this->con, $email)) {
            $new_user['name'] = $name;
            $new_user['email'] = $email;
            $new_user['password'] = password_hash($password, PASSWORD_BCRYPT);
            $new_user['role'] = 'user';
            $new_user['image'] = $image;
            return $new_user;
        } else {
            header('../register.php');
        }
    }
    public function AddUSer($user)
    {
        $db = new db();
        $db->create('users', $user);
        $email = $user['email'];
        $new_user = $db->GetBy('users', "email = $email ");
        $_SESSION['auth'] = $new_user;
        header('location:../home.php');
    }
}


if (validations::RequestMethod("POST")) {
    foreach ($_POST as $key => $value) {
        $$key = functions::sanitaization($value);
    }
    $image = functions::HandleImage('profile_image');
    $register = new register();
    $new_user = $register->CreateUser($name, $email, $password, $image);
    $register->AddUSer($new_user);
} else {
    header('location:../register.php');
}
