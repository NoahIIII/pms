<?php
session_start();
class validations
{
    public static $errors = [];


    public static function ValidateName($name)
    {
        if (empty($name)) {
            validations::$errors[] = 'name is requierd';
            $_SESSION['errors'] = validations::$errors;
            return false;
        } else if (strlen($name) <= 2) {
            validations::$errors[] = 'name must be greater than 2 chars';
            $_SESSION['errors'] = validations::$errors;
            return false;
        } else if (strlen($name) > 20) {
            validations::$errors[] = 'name must be smaller than 20 chars';
            $_SESSION['errors'] = validations::$errors;
            return false;
        } else {
            return true;
        }
    }

    public static function ValidateEmail($email)
    {
        if (empty($email)) {
            validations::$errors[] = 'email is requierd';
            $_SESSION['errors'] = validations::$errors;
            return false;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            validations::$errors[] = 'Invalid email';
            $_SESSION['errors'] = validations::$errors;
            return false;
        } else {
            return true;
        }
    }
    public static function ValidatePassword($password)
    {
        $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\s]).{8,16}$/';
        if (preg_match($pattern, $password)) {
            return true;
        } else if (strlen($password) < 8) {
            validations::$errors[] = 'Password should be at least 8 chars';
            $_SESSION['errors'] = validations::$errors;
            return false;
        } else if (strlen($password) > 16) {
            validations::$errors[] = 'Password must be less than 16 chars';
            $_SESSION['errors'] = validations::$errors;
            return false;
        } else if (!preg_match('/[A-Z]/', $password)) {
            validations::$errors[] = 'Password should contain at least one capital char';
            $_SESSION['errors'] = validations::$errors;
            return false;
        } else if (!preg_match('/[a-z]/', $password)) {
            validations::$errors[] = 'Password should contain at least one small char';
            $_SESSION['errors'] = validations::$errors;
            return false;
        } else if (!preg_match('/[^\w\s]/', $password)) {
            validations::$errors[] = 'Password should contain at least one special char';
            $_SESSION['errors'] = validations::$errors;
            return false;
        }
    }

    public static function ConfirmPsswordByID($con, $password_user, $id)
    {
        $sql = $con->query("SELECT password from users where id = $id;");
        $db_password = $sql->fetchColumn(PDO::FETCH_DEFAULT);
        if (password_verify($password_user, $db_password)) {
            return true;
        } else {
            return false;
        }
    }
    public static function ConfirmPsswordByEmail($con, $password_user, $email)
    {
        $sql = $con->query("SELECT password from users where email = '$email';");
        $db_password = $sql->fetchColumn(PDO::FETCH_DEFAULT);
        if (password_verify($password_user, $db_password)) {
            return true;
        } else {
            return false;
        }
    }
    public static function EmailExist($con, $new_email)
    {
        $sql = $con->query("SELECT email from users;");
        $emails = $sql->fetchall(PDO::FETCH_ASSOC);
        foreach ($emails as $email) {
            if ($email == $new_email) {
                validations::$errors[] = 'Email already exists';
                $_SESSION['errors'] = validations::$errors;
                return false;
            }
        }
        return true;
    }
    public static function TaskLength($input)
    {
        if (strlen($input) > 250) {
            validations::$errors[] = 'task can not be more than 250 chars';
            $_SESSION['errors'] = validations::$errors;
            return false;
        } else if (empty($input)) {
            validations::$errors[] = 'the new task can not be empty';
            $_SESSION['errors'] = validations::$errors;
            return false;
        } else {
            return true;
        }
    }
    public static function EmailNotExist($con, $new_email)
    {
        $sql = $con->query("SELECT email from users;");
        $emails = $sql->fetchall(PDO::FETCH_ASSOC);
        foreach ($emails as $email) {
            if ($email == $new_email) {
                return true;
            }
        }
        validations::$errors[] = 'email does not exist';
        $_SESSION['errors'] = validations::$errors;
        return false;
    }
    public static function RequestMethod($method)
    {
        if ($method == $_SERVER['REQUEST_METHOD']) {
            return true;
        } else {
            validations::$errors[] = 'Invalid Method';
            $_SESSION['errors'] = validations::$errors;
            return false;
        }
    }

    public static function ValidateLength($input,$max,$min,$input_name)
    {
          if(strlen($input)<$min)
          {
            validations::$errors[] = $input_name. 'should be more than'.$min;
            $_SESSION['errors'] = validations::$errors;
            return false;
          }
          elseif(strlen($input)>$max)
          {
            validations::$errors[] = $input_name.'should be lower than'.$max;
            $_SESSION['errors'] = validations::$errors;
          }

          else{
            return true;
          }
          
    }
    public static function CheckPhone($phone)
          {
            if(preg_match('/^\d{8,15}$/', $phone)=== 1)
            {
                return true;
            }
            else
            { 
                validations::$errors[] = 'please enter a valid phone number';
            $_SESSION['errors'] = validations::$errors;
            return false;
          }
          }
}

